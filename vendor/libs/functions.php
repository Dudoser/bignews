<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function explodeTag ($listTag) {
	for ($i=0; $i < count($listTag); $i++) { 
        for ($j=0; $j < count($listTag[$i]); $j++) { 
            if ($listTag[$i][$j]['tag'] != '') {
                if (strpos($listTag[$i][$j]['tag'], ',')) {
                    $listTag[$i][$j]['tag'] = explode(',', $listTag[$i][$j]['tag']);
                }
            }
        }
    }
}