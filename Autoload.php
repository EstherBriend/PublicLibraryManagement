<?php

spl_autoload_register("autoload");

function autoload($className){
    $path = "./Classes/";
    $extension = ".class.php";
    $fileName = $path.$className.$extension;

    if(!file_exists($fileName)){
        return false;
    }else{
        include_once $fileName;
    }


}

?>