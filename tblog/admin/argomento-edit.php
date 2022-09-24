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
                              <h4>Modifica Argomento
                                <a href="argomento-view.php" class="btn btn-danger float-end">Indietro</a>
                              </h4>
                            <div class="card-body">
                                <?php
                                    if(isset($_GET['id']))
                                    {
                                    $argom_id = $_GET['id'];
                                    $argomento_modifica = "SELECT * FROM argomenti WHERE aid='$argom_id'";
                                    $argomento_modifica_run = mysqli_query($con, $argomento_modifica);

                                    if(mysqli_num_rows($argomento_modifica_run) > 0)
                                    {
                                            $row = mysqli_fetch_array($argomento_modifica_run);
                                            ?>
                                            
                            <form action="panel-codes.php" method="POST">
                                <input type="hidden" name="aid" value="<?= $row['aid'];?>">
                                      <div class="row">
                                          <div class="col-md-6 mb-3">
                                            <label for="">Nome</label>
                                            <input required type="text" name="nome" value="<?= $row['nome'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Slug (URL)</label>
                                            <input required type="text" name="slug" value="<?= $row['slug'];?>" class="form-control">
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <label for="">Descrizione</label>
                                            <textarea required  name="descrizione" row="4"  class="form-control"><?= $row['descrizione'];?></textarea>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <label for="">Meta Titolo</label>
                                            <input required type="text" name="a_titolo" value="<?= $row['a_titolo'];?>" max="252" class="form-control">
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Meta Descrizione</label>
                                            <textarea required name="a_descrizione" row="4"  class="form-control"><?= $row['a_descrizione'];?></textarea>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Meta Keyword</label>
                                            <textarea required name="a_keyword" row="4"  class="form-control"><?= $row['a_keyword'];?></textarea>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Navbar Status</label>
                                            <input type="checkbox" name="navbar_status" <?= $row['navbar_status']=='1' ? 'checked' : '' ?>width="70px" height="70px"/>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?= $row['status']=='1' ? 'checked' : '' ?> width="70px" height="70px"/>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                            <button type="submit" name="aggiorna_argomento" class="btn btn-primary">Salva Argomento</button>
                                        </div>
                                      </div>
                                    </form>

                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <h4>0 Record Trovato</h4>
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