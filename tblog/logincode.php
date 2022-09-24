<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM utenti WHERE email='$email' AND password = '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data){
            $user_id = $data['uid'];
            $user_email = $data['email'];
            $user_username = $data['username'];
            $user_nome = $data['nome'];
            $user_cognome = $data['cognome'];
            $user_dnascita = $data['d_nascita'];
            $user_biografia = $data['biografia'];
            $user_role = $data['ruolo']; //0=utente 1=admin
            $user_stat = $data['status'];
            $user_timestamp = $data['created_at'];
        }

        $_SESSION['auth']= true;
        $_SESSION['auth_role']= "$user_role";
        $_SESSION['auth_user']= [
            'user_id'=>$user_id,
            'user_username'=>$user_username,
            'user_nome'=>$user_nome,
            'user_cognome'=>$user_cognome,
            'user_email'=>$user_email,
        ];

        if($_SESSION['auth_role'] == '1') // admin
        {
            $_SESSION['message']= "Ti diamo benvenuto all' Admin Panel!";
            header("Location: admin/index.php");
            exit(0);
        }
        elseif($_SESSION['auth_role'] == '0') // utente
        {
            $_SESSION['message']= "Hai effetuato accesso!";
            header("Location: index.php");
            exit(0);
        }

    }
    else
    {
        $_SESSION['message']= "Credenziale non valido!";
        header("Location: login.php");
        exit(0);
    }
}
else
{
    $_SESSION['message']= "Non hai permesso di accedere di la !";
    header("Location: login.php");
    exit(0);
}