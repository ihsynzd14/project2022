<?php 
include('includes/header.php');
include('includes/navbar.php');

if(isset($_SESSION['auth']))
{
     $_SESSION['message'] = "Hai gia fatto registrazione !";
     header("Location: index.php");
     exit(0);
}


?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php include('includes/message.php');?>
            
                
            <div class="card">
                    <div class="card-header">
                        <h4>Registrazione</h4>
                    </div>
                    <div class="card-body">

                    <form action="registercode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <input required type="text" name="u_nome" placeholder="Entrare username" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email id</label>
                                <input required type="email" name="email" placeholder="Entrare email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Nome</label>
                                <input required type="text" name="nome" placeholder="Entrare nome" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Cognome</label>
                                <input required type="text" name="cognome" placeholder="Entrare cognome" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input required type="password" name="password"  placeholder="Entrare password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirmazione di Password</label>
                                <input required type="password" name="cpassword"  placeholder="Ripetere password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Data di nascita</label>
                                <input required type="date" name="d_nascita" placeholder="Entrare data di nascita" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Biografia</label>
                                <textarea required type="text" name="biografia" maxlength="500" placeholder="Entrare biografia (max. 500 caratteri)" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                            <button type="submit" name="register_btn" class="btn btn-primary">Registrati Ora</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>

