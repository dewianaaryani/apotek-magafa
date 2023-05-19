<?php 

if(!function_exists('rupiahFormat')){
    function rupiahFormat($number){
        return 'Rp. ' . number_format($number, 0, ',', '.');
    }
}