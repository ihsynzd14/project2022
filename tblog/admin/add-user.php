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
                              <h4>Aggiungi Utente
                                <a href="view-register.php" class="btn btn-danger float-end">Indietro</a>
                              </h4>
                            <div class="card-body">

                            <form action="panel-codes.php" method="POST">
                                      <div class="row">
                                          <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Nome</label>
                                            <input type="text" name="nome"  class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Cognome</label>
                                            <input type="text" name="cognome"  class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Data di nascita</label>
                                            <input type="date" name="d_nascita"  class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Biografia</label>
                                            <input style="height:60px" type="text" name="biografia"  maxlength="500" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Ruolo</label>
                                            <select name="ruolo" required class="form-control">
                                              <option value="">--Selezionare Ruolo--</option>
                                              <option value="1">Admin</option>
                                              <option value="0">Utente</option>
                                            </select>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" width="70px" height="70px"/>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <button type="submit" name="aggiungi_utente" class="btn btn-primary">Aggiungi Utente</button>
                                        </div>
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
include('includes/scripts.php'); 
?>