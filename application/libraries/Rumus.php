<?php
 
class Rumus
{
 
    var $ratax, $ratay;

    public function Meanx($jumlah_periode,$jumlah_x)
    {
    	$ratax = $jumlah_x/$jumlah_periode;
    	return $ratax;
    }
	
	public function Meany($jumlah_periode,$jumlah_y)
    {
    	$ratay = $jumlah_y/$jumlah_periode;
    	return $ratay;
    }

    public function Carib($jumlah_xy,$jumlah_xkuadrat,$jumlah_periode,$rata_x,$rata_y)
    {
		$b = ($jumlah_xy-($jumlah_periode*$rata_x*$rata_y))/($jumlah_xkuadrat-($jumlah_periode*pow($rata_x,2)));
		return $b;		    	
    }

    public function Caria($rata_y,$rata_x,$b)
    {
    	$a = $rata_y-($b*$rata_x);
    	return $a;
    }

    public function Prediksi($a,$b,$periode)
    {
    	$yramal = $a + $b * $periode;
    	return $yramal;
    }

    public function Mad($sumerror,$periode)
    {
    	$emad = $sumerror/$periode;
    	return $emad;
    } 

    public function Mse($sumerror2,$periode)
    {
    	$emse = $sumerror2/$periode;
    	return $emse;
    }
}
 
?>