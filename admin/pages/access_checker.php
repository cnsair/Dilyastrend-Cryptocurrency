<?php

  if(!isset($_SESSION))
  {
    session_start();
  }
  
    $kc = new DB; 
    $connect = $kc->getConn();

    $crud = new Crud($connect);
    $user_cl = new User($connect);

    $user_access = $crud->select("users", "*", "(AllowUser = '".$user_cl->saltKeys(3)."') && 
                                                (ID = '".$_SESSION["duid"]."') &&
                                                (accesslevel = '1') &&
                                                (activestatus = 2)
                                ");
                
    if(!$user_access)
    {
        header("Location: ../../confirm-account");
    }

    //Database Variables                                           
    $allow_user = $user_access[0]["AllowUser"];
    $fname = $user_access[0]["Fname"];
    $sname = $user_access[0]["Sname"];
    $email = $user_access[0]["Email"];
    $photo = $user_access[0]["Photo"];
    $phone = $user_access[0]["Phone"];
    $uname = $user_access[0]["Uname"];

 ?>