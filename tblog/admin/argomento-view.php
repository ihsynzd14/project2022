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
                              <h4>Lista Argomenti
                                <a href="argomento-add.php" class="btn btn-primary float-end">Aggiungi Argomento</a>
                              </h4>
                            <div class="card-body">


                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripe">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Status</th>
                                                <th>Modifica</th>
                                                <th>Elimina</th>
                                            </tr>
                                            <tbody>
                                            <?php 
                                                    $argomento = "SELECT * FROM argomenti WHERE status!='2'";
                                                    $argomento_run = mysqli_query($con,$argomento);
                                                    
                                                    if(mysqli_num_rows($argomento_run))
                                                    {
                                                        foreach($argomento_run as $uno)
                                                        {
                                            ?>

                                                            <tr>
                                                                <td><?= $uno['aid'];?></td>
                                                                <td><?= $uno['nome'];?></td>
                                                                <td>
                                                                    <?php
                                                                    if($uno['status'] == '1'){ echo 'Archiviato'; } else{ echo 'Visibile'; }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <a href="argomento-edit.php?id=<?= $uno['aid'];?>" class="btn btn-success">Modifica</a>
                                                                </td>
                                                                <td>
                                                                    <form action="panel-codes.php" method="POST">
                                                                    <button type="submit" name="elimina_argomento" value="<?= $uno['aid'];?>" class="btn btn-danger">Elimina</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                                                                        <?php

                                                        }
                                                    }
                                                        else
                                                        {
                                                        ?>

                                                            <tr>
                                                                <td colspan="5">0 Record Trovato</td>
                                                            </tr>

                                                        <?php
                                                        }
                                                ?>
                                            </tbody>
                                        </thead>
                                    </table>
                                </div>
                                
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