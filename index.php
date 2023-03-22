<?php
if(!session_id()){
  session_start();
}

require_once __DIR__ . './src/models/autoload.php';
require_once __DIR__ . './src/controllers/main.controllers.php';

try {
  if(!empty($_GET) && isset($_GET)){
    $_GET['action'] = $_GET['action'] ?? '';

    if($_GET['action'] === 'register'){
      require_once('./src/controllers/register.controllers.php');
      getViewRegister();
    } else if ($_GET['action'] === 'login'){
      require_once('./src/controllers/login.controllers.php');
      getViewLogin();
    } else if ($_GET['action'] === 'profil'){
      require_once('./src/controllers/profil.controllers.php');
      getViewProfil();
    } else if ($_GET['action'] === 'disconnect'){
      getViewDisconnect();   
    } else if ($_GET['action'] === 'forum'){
      require_once('./src/controllers/topic.controllers.php');
      getViewForum();
    }

  } else {
    getViewHomePage();
    // getViewError();
  }


} catch (Exception $e) {
  throw new Exception($e->getMessage());
}
