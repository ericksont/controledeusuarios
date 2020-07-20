<?php
    
    require_once "../conf.php";
    print "<pre/>";

    print "Classe PostgreSQL <br/>";
    require_once "dbs/PostgreSQLTest.php";
    $dbTest = new PostgreSQLTest();
    $dbTest->connect();
    $dbTest->select();
    print "<br/>";

    print "Classe models/User <br/>";
    require_once "models/UserTest.php";
    $userTest = new UserTest();
    $userTest->login();
    print "<br/>";

    print "Classe controllers/UserController <br/>";
    require_once "controllers/UserControllerTest.php";
    $userControllerTest = new UserControllerTest();
    $userControllerTest->login();
    print "<br/>";

?>