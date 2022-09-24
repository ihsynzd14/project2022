<?php 
session_start();
include("config/dbcon.php");

if(isset($_POST['register_btn']))
{

$u_nome = mysqli_real_escape_string($con, $_POST['u_nome']); 
$email = mysqli_real_escape_string($con, $_POST['email']);
$nome = mysqli_real_escape_string($con, $_POST['nome']);
$cognome = mysqli_real_escape_string($con, $_POST['cognome']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
$d_nascita = mysqli_real_escape_string($con, $_POST['d_nascita']);
$biografia = mysqli_real_escape_string($con, $_POST['biografia']);

if($password == $cpassword)
{
// controllo di email
    $checkemail = "SELECT email FROM utenti WHERE email = '$email'";
    $checkemail_run = mysqli_query($con,$checkemail);

    if(mysqli_num_rows($checkemail_run) > 0){
        // email esiste
        $_SESSION['message'] = "Email gia esiste";
        header("Location: register.php");
        exit(0);
    }
    else
    {
        $user_query = "INSERT INTO utenti (username,email,nome,cognome,password,d_nascita,biografia) VALUES ('$u_nome','$email','$nome','$cognome','$password','$d_nascita','$biografia')";
        $user_query_run = mysqli_query($con, $user_query);

        if($user_query_run)
        {
            $_SESSION['message'] = "Registrazione completato !";
            header("Location: login.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Qualcosa non andato bene :( ";
            header("Location: register.php");
            exit(0);
        }
    }

}
else
{
$_SESSION['message'] = "Il password e confirmazione di password non sono stessi";
header("Location: register.php");
exit(0);
}

}

else{
    header("Location: register.php");
    exit(0);
}
?>