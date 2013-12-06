<?php

class CollectionController extends BaseController {

        public function calculPriorite($collections){
        	$array = array();
            foreach ($collections as $k => $collection){
            	foreach ($collection as $v => $motcle){
            		foreach ($array as $l => $arraymot){
	            		if (in_array($motcle, $arraymot))
	            		{
	            			$arraymot[1] = $arraymot[1] + 1;
	            		}
	            		else
	            		{
	            			$subarray = array($motcle,1);
	            			array_push($subarray,$array);
	            		}
	            	}
            	}
            }
	        return $array;
	    }
}