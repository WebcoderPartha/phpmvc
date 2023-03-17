<?php

    include "system/lib/Main.php";
    include 'system/lib/Config.php';
    include "system/lib/MainController.php";
    include "system/lib/Database.php";
    include "system/lib/Model.php";
    include "system/lib/Load.php";


    $url = isset($_GET['url'])? $_GET['url']: NULL;
    if ($url != NULL){
        $url = rtrim($url, '/');
        $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
    }else{
        unset($url);
    }

    $controllerURL = isset($url[0]) ? $url[0] : NULL;
    $Method = isset($url[1]) ? $url[1] : NULL;
    $param = isset($url[2]) ? $url[2] : NULL;

    if ($controllerURL){

        include 'app/controllers/'.$controllerURL.'.php';
        $controller = new $controllerURL();

        if ($param){
            $controller->$Method($param);
        }else{
            if ($Method){
                $controller->$Method();
            }else{

            }
        }

    }else{

        include 'app/controllers/Index.php';
        $controller = new Index();
        $controller->home();

    }




