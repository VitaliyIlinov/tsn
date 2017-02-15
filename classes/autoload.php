<?php
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . DIRECTORY_SEPARATOR . lcfirst($class_name) . '.php';
    try {
        if (file_exists($file)) {
            require_once $file;
//        echo $file;
            return true;
        }

        throw new Exception($file . ' - not found');

    } catch (Exception $e) {
        echo 'Exception in file ', $e->getFile(). ',  error: '.$e->getMessage()."\n";
    }
});