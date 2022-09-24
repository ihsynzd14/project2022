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
                    <?php include('includes/message.php') ?>
                    <div class="card">
                        <div class="card-header">
                              <h4>Aggiungi Argomento
                                <a href="argomento-view.php" class="btn btn-danger float-end">Indietro</a>
                              </h4>
                            <div class="card-body">

                            <form action="panel-codes.php" method="POST">
                                      <div class="row">
                                          <div class="col-md-6 mb-3">
                                            <label for="">Nome</label>
                                            <input required type="text" name="nome" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Slug (URL)</label>
                                            <input required type="text" name="slug" class="form-control">
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <label for="">Descrizione</label>
                                            <textarea required  name="descrizione" row="4"  class="form-control"></textarea>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <label for="">Meta Titolo</label>
                                            <input required type="text" name="a_titolo" max="252" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Meta Descrizione</label>
                                            <textarea required name="a_descrizione" row="4"  class="form-control"></textarea>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea required name="a_keyword" row="4"  class="form-control"></textarea>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Navbar Status</label>
                                            <input type="checkbox" name="navbar_status" width="70px" height="70px"/>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" width="70px" height="70px"/>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <button type="submit" name="argomento_add" class="btn btn-primary">Salva Argomento</button>
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