<?php 
include_once("includes/config.php");
// require_once('../gescap/libs/Utilities.php');
    // SessionUtil::logOut(); 
    session_destroy();

 header('location: index.php');?>