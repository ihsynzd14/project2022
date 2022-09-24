<?php
session_start();

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Devi essere registrato per accedere panello !";
    header("Location: ../login.php");
    exit(0);
}   
else
{

}

?>