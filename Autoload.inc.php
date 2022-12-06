<?php

function autoload($className)
{
    $path = "../Classes/";
    $extension = ".class.php";
    $fileName = $path . $className . $extension;

    if (!file_exists($fileName)) {
        return false;
    } else {
        include_once $fileName;
    }
}

spl_autoload_register("autoload");

