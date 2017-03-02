<?php

  //
      define('access_token', '123');
      global $engine;

      class Engine {

          static $version = '2.0';
          static $env     = 'local';

          public $containers;

          public function init()
          {
            return new self();
          }

          public function response($data, $type)
          {
            if($type == 'error')
              $data = ['error' => $data['message']];

            echo json_encode($data);
          }

          public function withEngine($engine)
          {
            global $engine;
            $engine->version($engine);
          }

          public function version($engine)
          {
            echo "Engine version is: " .$engine::$version;
          }
      }
  //

  $engine = Engine::init();

  if(!defined('access_token'))
  {
    return $engine->response(['message' => 'Action is not permitted to you'], 'error');
  }

  // ****
      function p($var)
      {
        print_r($var);
        echo '<br>';
      }

      function env()
      {
        global $engine;
        return "[debug] This is " . $engine::$env . " environment<br>";
      }

      function version()
      {
        global $engine;
        $engine->version($engine);
      }
  // ****

  /* some tests
    echo env();
    echo version();
  */

  $models_files = [
  ];

  $dir    = '/var/www/old.vay.im/protected/models';
  $models_files = scandir($dir);

  //**** YII ABSTRACTION
    require_once('/var/www/framework/base/CComponent.php');

    require_once('/var/www/framework/base/CModel.php');
    require_once('/var/www/framework/db/ar/CActiveRecord.php');
  //****
  foreach($models_files as $file)
  {
    if(substr_count($file, '.php')>0){
      $models[] = $path = $dir.'/'.$file;
      $test = file_get_contents($path);
      var_dump($test);
      die();
    }
  }
  var_dump($models); die(); // contains paths to Model's files

  var_dump($models_files); // contains something
 ?>
