<?php include('../config/dbcon.php');
      include('authentication.php');
      include('includes/header.php'); 
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Pannello di Amministrazione</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">solo amministratori</li>
                        </ol>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Modifica Utente</h4>
                            <div class="card-body">
                              <?php
                              if(isset($_GET['id']))
                              {
                                $utente_id = $_GET['id'];
                                $utenti = "SELECT * FROM utenti WHERE uid='$utente_id'";
                                $utenti_run = mysqli_query($con,$utenti);

                                if(mysqli_num_rows($utenti_run) > 0)
                                {
                                  foreach($utenti_run as $user)
                                  {
                                    
                                    ?>

                                    <form action="panel-codes.php" method="POST">
                                      <input type="hidden" name="user_id" value="<?=$user['uid'];?>">
                                      <div class="row">
                                          <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" value="<?=$user['username'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="<?=$user['email'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Nome</label>
                                            <input type="text" name="nome" value="<?=$user['nome'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Cognome</label>
                                            <input type="text" name="cognome" value="<?=$user['cognome'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Data di nascita</label>
                                            <input type="date" name="d_nascita" value="<?=$user['d_nascita'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Biografia</label>
                                            <input style="height:60px" type="text" name="biografia" value="<?=$user['biografia'];?>" maxlength="500" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Ruolo</label>
                                            <select name="ruolo" required class="form-control">
                                              <option value="">--Selezionare Ruolo--</option>
                                              <option value="1" <?= $user['ruolo']== '1' ? 'selected':'' ?> >Admin</option>
                                              <option value="0" <?= $user['ruolo']== '0' ? 'selected':'' ?>>Utente</option>
                                            </select>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?= $user['status']== '1' ? 'checked':'' ?> width="70px" height="70px"/>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <button type="submit" name="aggiorna_utente" class="btn btn-primary">Aggiorna Utente</button>
                                        </div>
                                      </div>
                                    </form>
                                    <?php
                                    }
                                }
                                else
                                {
                                  ?>
                                  <h4> 0 Record Trovato</h4>
                                  <?php
                                  
                                }
                              }
                              ?>
                            </div>
                        </div>
                    </div>
                  </div>     
                </div>                     
</div>



<?php 
include('includes/footer.php'); 
include('includes/scripts.php'); 
?>