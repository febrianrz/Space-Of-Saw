<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalisis extends CI_Model
{

	function __construct()
	{
        parent::__construct();
	}

	public function find_frequent_itemsets($transactions, $minimum_support)
	{

	    $processedTransactions = array();
	    $items = array();
	    //var_dump($transactions);
	    foreach($transactions as $transaction)
	    {
	        if(!is_array($transaction)) 
	            continue;
	        $processed = array();

	        foreach($transaction as $item)
	        {

	            if(array_key_exists($item, $items))
	            {
	                $items[$item] += 1;
	            }

	            else

	            {

	                $items[$item] = 1;
	            }
	            array_push($processed, $item);

	        }// every transaction.

	        array_push($processedTransactions, $processed);
	    }

    	foreach(array_keys($items) as $index)
    	{
	        if($items[$index] < $minimum_support)
	        {
	            unset($items[$index]);
	        }
    	}


    	$sortedTransactions = array();
    	//var_dump($processedTransactions);
    	foreach($processedTransactions as $currentTransactions)
    	{
        	$tmp = array();

        	foreach($currentTransactions as $item)
        	{
            	if(array_key_exists($item, $items))
            	{
	                // key exits = frequent item.
	                //array_push($tmp, array($item, $items[$item]));
	                $tmp[$item] = $items[$item];
            	}
        	}

        	// sort based on most frequent item.
       		arsort($tmp);
        	//var_dump($tmp);
        	array_push($sortedTransactions, array_keys($tmp));
    	}


    	//var_dump($sortedTransactions);
	    // Create a Fp-Tree
	    $tree = new FPTree();

	    // Add all Transactions.
	    foreach($sortedTransactions as $currentTransactions)
	    {
	        $tree->add($currentTransactions);
	    }

	    for itemset in find_with_suffix(master, []):
            yield itemset


	    foreach(find_with_suffix($tree, array(), $minimum_support) as $itemset)
	    {
	        yield $itemset;
	    }

	}// end function`}`


	function find_with_suffix($tree, $suffix, $minimum_support)
	{
		/* $element = ($item, $nodes)
	   	$item is the item it self like (a, b, ..., e)
	   	$nodes is the linked list for that item (e1 -> e2 -> e3 .... ) */
	 	foreach($tree->getItems() as $element)
	 	{
		    $item = $element[0];
		    $nodes = $element[1];
		    $support = 0;
		    /* calculate support of each linked list. */
		    foreach($nodes as $n)
		    {
	        	$support += $n->getCount();
	    	}

		    if($support >= $minimum_support && !array_key_exists($item, $suffix))
		    {
		        $found_set = array_merge(array($item), $suffix);
		        /* yields current found set */
		        yield $found_set;

				$condTree =  conditional_tree_from_paths($tree->prefixPaths($item),$minimum_support);


	            foreach(find_with_suffix($condTree, $found_set, $minimum_support) as $s)
	            {
	            	yield $s;
	        	}
	   		}
		}
	}

	function conditional_tree_from_paths($paths, $minimum_support)
	{

		$tree = new FPTree();
		$conditionItem = null;
		$items = array();

		foreach($paths as $path)
		{
		    if($conditionItem == null)
		    {
		        $conditionItem = end($path)->getItem();
		        //reset($path);
		    }

		    $point = $tree->root;

		    foreach($path as $node)
		    {
		        //next_point = point.search(node.item)
		        $nextPoint = $point->search($node->getItem());

		        if($nextPoint == null)
		        {
		            // Add a new node to the tree.
		            array_push($items, $node->getItem());
		            $count 		= ($node->getItem() == $conditionItem) ? $node->getCount() : 0;
		            $nextPoint 	= new FPNode($tree, $node->getItem(), $count);
		            $point->add($nextPoint);
		            $tree->updateRoute($nextPoint);
		        }

		        $point = $nextPoint;
		    }
		}

		// assert condition_item is not None
		foreach($tree->prefixPaths($conditionItem) as $path)
		{
		    $count = end($path)->getCount();
		    //reset($path);
		    foreach(array_reverse(array_slice($path, 0, count($path) - 1)) as $node)
		    {
		        $tmpCount = $node->getCount();
		        $node->setCount($tmpCount + $count);
		    }
		}

		// as set.
		$items = array_unique($items);


		foreach($items as $item)
		{

		    $currentSupport = 0;
		    foreach($tree->getNodes($item) as $n)
		    {
		        $currentSupport += $n->getCount();
		    }

		    if($currentSupport < $minimum_support)
		    {
		        foreach($tree->getNodes($item) as $n)
		        {
		            $parent = $n->getParent();
		            if($parent != null)
		            {
		                $parent->remove($n);
		            }
		        }
		    }

		}

		// Remove leaves .
		foreach($tree->getNodes($conditionItem) as $node)
		{
		    $parent = $node->getParent();
		    if($parent != null)
		    {
		        $parent->remove($node);
		    }
		}

		return $tree;
	}

	class FPNode 
	{
		var $tree;
		var $item;
		var $count;
		var $parent;
		var $children;
		var $neighbor;

		/**
		 * @param $tree
		 * @param $item
		 * @param int $count
		 */
		public function __construct($tree, $item, $count=1)
		{
		    $this->tree = $tree;
		    $this->item = $item;
		    $this->count = $count;
		    $this->parent = null;
		    $this->children = array();
		    $this->neighbor = null;
		}



		/**
		* @param $child
		*/
		public function add($child)
		{
		    $item = $child->getItem();
		    if(!array_key_exists($item, $this->children))
		    {
		        $child->setParent($this);
		        $this->children[$item] = $child;
		    }
		}



		/**
		 * @param $item
		 * @return null
		 */
		public function search($item)
		{
		    //return array_key_exists($item, $this->children);
		    if(array_key_exists($item, $this->children))
		    {
		        return $this->children[$item];
		    }

		    else

		    {
		        return null;
		    }
		}



		/**
		 * @param $child
		 */
		public function remove($child)
		{
		    $item = $child->getItem();
		    if($this->search($item))
		    {
		        unset($this->children[$item]);
		        $child->setParent(null);
		        //self._tree._removed(child)
		        $this->tree->removed($child);
		        foreach($child->getChildren() as $sub_child)
		        {
		            $sub_item = $sub_child->getItem();
		            if($this->search($sub_item))
		            {
		                // self._children[sub_child.item]._count += sub_child.count
		                $currentCount = $this->children[$sub_child->getItem()]->getCount();
		                $subCount = $sub_child->getCount();
		                $this->children[$sub_child->getItem()]->setCount($currentCount + $subCount);
		                $sub_child->setParent(null);
		            }

		            else

		            {
		                $this->add($sub_child);
		            }
		        }

		        $child->setChildren(null);
		    }
		}

		/**
		 *
		 */
		public function increment()
		{
		    $this->count++;
		}


		/**
		 * @return bool
		 */
		public function isRoot()
		{
		    return $this->item == null && $this->count == null;
		}


		/**
		 * @return mixed
		 */
		public function getTree()
		{
		    return $this->tree;
		}


		/**
		 * @param mixed $tree
		 */
		public function setTree($tree)
		{
		    $this->tree = $tree;
		}

		/**
		 * @return mixed
		 */
		public function getItem()
		{
		    return $this->item;
		}

		/**
		 * @param mixed $item
		 */
		public function setItem($item)
		{
		    $this->item = $item;
		}

		/**
		 * @return int
		 */
		public function getCount()
		{
		    return $this->count;
		}

		/**
		 * @param int $count
		 */
		public function setCount($count)
		{
		    $this->count = $count;
		}

		/**
		 * @return null
		 */
		public function getParent()
		{
		    return $this->parent;
		}

		/**
		 * @param null $parent
		 */
		public function setParent($parent)
		{
		    $this->parent = $parent;
		}

		
		/**
		 * @return null
		 */
		public function getNeighbor()
		{
		    return $this->neighbor;
		}

		/**
		 * @param null $neighbor
		 */
		public function setNeighbor($neighbor)
		{
		    $this->neighbor = $neighbor;
		}

		/**
		 * @return array
		 */
		public function getChildren()
		{
		    return $this->children;
		}

		/**
		 * @param array $children
		 */
		public function setChildren($children)
		{
		    $this->children = $children;
		}
	}

	class FPTree
	{

		var $root;
		var $routes;

		public function __construct()
		{
		    $this->root = new FPNode($this, null, null);
		    // Item -> (head, tail)
		    $this->routes = array();
		}

		public function add($transaction)
		{
		    $point = $this->root;

		    foreach($transaction as $item)
		    {
		        $nextPoint = $point->search($item);

		        if($nextPoint != null)
		        {
		            $nextPoint->increment();
		        }

		        else

		        {
		            // Null
		            $nextPoint = new FPNode($this, $item, 1);
		            $point->add($nextPoint);
		            $this->updateRoute($nextPoint);
		        }

		        $point = $nextPoint;
		    }
		}

		public function updateRoute($point)
		{
		    $item = $point->getItem();

		    if(array_key_exists($item, $this->routes))
		    {
		        $route = $this->routes[$item];
		        $route[1]->setNeighbor($point);
		        $this->routes[$item] = array($route[0], $point);
		    }

		    else

		    {
		        // $item not found.
		        // add new pair with the same item.
		        // used as linked list but (head, tail) only.
		        $this->routes[$item] = array($point, $point);
		    }
		}

		public function getItems()
		{
		    $items = array();
		    foreach(array_keys($this->routes) as $item)
		    {
		        array_push($items, array($item, $this->getNodes($item)));
		    }

		    return $items;
		}

		public function getNodes($item)
		{

		    if(array_key_exists($item, $this->routes))
		    {

		        $node = $this->routes[$item][0];
		        $nodes = array();


		        while($node != null)
		        {
		            array_push($nodes, $node);
		            $node = $node->getNeighbor();
		        }
		        return $nodes;
		    }

		    else

		    {
		        return null;
		    }
		}

		public function getPath($node)
		{
		    $path = array();
		    while($node != null && !$node->isRoot())
		    {
		        array_push($path, $node);
		        $node = $node->getParent();
		    }

		    return array_reverse($path);
		}

		public function prefixPaths($item)
		{
		    $paths = array();

		    foreach($this->getNodes($item) as $node)
		    {
		        array_push($paths, $this->getPath($node));
		    }

		    return $paths;
		}

		public function removed($node)
		{
		    $item = $node->getItem();
		    if(array_key_exists($item, $this->routes))
		    {
		        $route = $this->routes[$item];

		        $head = $route[0];
		        $tail = $route[1];

		        if($node == $head)
		        {
		            if($node == $tail || $node != $node->getNeighbor())
		            {
		                unset($this->routes[$item]);
		        	}

		        	else
			        {

			            $this->routes[$item] = array($node->getNeighbor(), $tail);
			        }
		   		}

			    else

			    {

		            $nodes = $this->getNodes($item);
		            foreach($nodes as $n)
		            {
		                // if n.neighbor is node:
		                if($n->getNeighbor() == $node)
		                {
		                    $n->setNeighbor($node->getNeighbor());
		                    if($node == $tail)
		                    {
		                        $this->routes[$item] = array($head, $n);
		                    }
		                }

		            }
		        }
		    }
		}

		public function printTree()
		{
		    echo "Tree\n";
		    echo "Root";
		    $this->inspect($this->root, 0);
		}

		public function inspect($node, $level)
		{
		    for($i = 0; $i < $level; ++$i)
		    {
		        echo '..';
		    }
		    if($node != null)
		    {


		        echo "(". $node->getItem() . ":" . $node->getCount() . ")" . " ==> ";
		        foreach($node->getChildren() as $child)
		        {
		            echo "(" . $child->getItem() . ":" . $child->getCount() . "), ";
		        }
		        echo "\n";
		        foreach($node->getChildren() as $child)
		        {
		            $this->inspect($child, $level + 1);
		        }
		    }
		}

		public function printNeighbors($item)
		{
		    $nodes = $this->getNodes($item);

		    if($nodes != null)
		    {
		        foreach($nodes as $node)
		        {
		            echo "(" . $node->getItem() . ":" . $node->getCount() . ") -> ";
		        }
		    }
		    echo "\n";
		}

		public function printAllPrefix($item)
		{
		    $paths = $this->prefixPaths($item);

		    foreach($paths as $path)
		    {
		        foreach($path as $node)
		        {
		            echo "(" . $node->getItem() . ":" . $node->getCount() . ") -> ";
		        }

		        echo "\n";
		    }
		}

		public function getRoot()
		{
		    return $this->root;
		}


		public function setRoot($root)
		{
		    $this->root = $root;
		}


		public function getRoutes()
		{
		    return $this->routes;
		}


		public function setRoutes ($routes)
		{
		    $this->routes = $routes;
		}

	}



}