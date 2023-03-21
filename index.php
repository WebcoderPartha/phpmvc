<?php
    include_once 'app/config/Config.php';
    spl_autoload_register(function($class){
        include_once 'system/lib/'.$class.'.php';
    });
    $main = new Main();


//

//    $url = isset($_GET['url'])? $_GET['url']: NULL;
//    if ($url != NULL){
//        $url = rtrim($url, '/');
//        $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
//    }else{
//        unset($url);
//    }
//
//    $controllerURL = isset($url[0]) ? $url[0] : NULL;
//    $Method = isset($url[1]) ? $url[1] : NULL;
//    $param = isset($url[2]) ? $url[2] : NULL;
//
//    if ($controllerURL){
//
//        include 'app/controllers/'.$controllerURL.'.php';
//        $controller = new $controllerURL();
//
//        if ($param){
//            $controller->$Method($param);
//        }else{
//            if ($Method){
//                $controller->$Method();
//            }else{
//
//            }
//        }
//
//    }else{
//
//        include 'app/controllers/Index.php';
//        $controller = new Index();
//        $controller->home();
//
//    }
//



