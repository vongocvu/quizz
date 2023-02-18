<?php 

   define('_DIR_ROOT_', __DIR__);

   //Xử lý http root
   if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on'){
      $web_root = 'https://'.$_SERVER['HTTP_HOST'] . '/';
   }else{
      $web_root = 'http://'.$_SERVER['HTTP_HOST'] . '/';
   }
   
   $dirRoot = str_replace('\\', '/', _DIR_ROOT_);

   $documentRoot = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

   $folder = str_replace(strtolower($documentRoot), '', strtolower($dirRoot));
   
   $web_root = $web_root.$folder;
   
   define('_WEB_ROOT', $web_root);
   
   require_once 'core/Connection.php';
   require_once 'core/QueryBuilder.php';
   require_once 'core/DB.php';
   require_once 'core/Database.php';
   

   require_once 'core/Model.php';
   require_once "app/App.php";
   require_once "core/Controller.php";
