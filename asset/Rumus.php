<?php
 
class Rumus {
 
    var $ratax, $ratay;

    public function Meanx($sumperiode,$sumx){
    	$ratax = $sumx/$sumperiode;
    	return $ratax;
    }
	
	public function Meany($sumperiode,$sumnilai){
    	$ratay = $sumnilai/$sumperiode;
    	return $ratay;
    }

    public function Carib($sumxy,$sumxsquare,$sumperiode,$rtx,$rty){
		$b = ($sumxy-($sumperiode*$rtx*$rty))/($sumxsquare-($sumperiode*pow($rtx,2)));
		return $b;		    	
    }

    public function Caria($rty,$rtx,$b){
    	$a = $rty-($b*$rtx);
    	return $a;
    }

    public function Prediksi($a,$b,$periode)
    {
    	$yramal = $a + $b * $periode;
    	return $yramal;
    }

    public function Mad($sumerror,$periode){
    	$emad = $sumerror/$periode;
    	return $emad;
    } 

    public function Mse($sumerror2,$periode){
    	$emse = $sumerror2/$periode;
    	return $emse;
    }
}
 
?>