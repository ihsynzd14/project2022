<?php 
include('includes/header.php');
include('includes/navbar.php');

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message']))
    {
      $_SESSION['message'] = "Hai gia fatto acceso !";
    }
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
                        <h4>Accedi</h4>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input required name="email" type="email" placeholder="Enter email adress" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input required name="password" type="password" placeholder="Enter password" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                <button name="login_btn" type="submit" class="btn btn-primary">Accedi Ora</button>
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

