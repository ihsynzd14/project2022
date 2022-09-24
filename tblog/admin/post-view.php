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
                              <h4>Lista Posts
                                <a href="post-add.php" class="btn btn-primary float-end">Aggiungi Post</a>
                              </h4>
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Post ID</th>
                                                    <th>Nome</th>
                                                    <th>Argomento</th>
                                                    <th>Immagine</th>
                                                    <th>Status</th>
                                                    <th>Modifica</th>
                                                    <th>Elimina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                     //$posts = "SELECT * FROM posts WHERE status!='2'";
                                                     $posts = "SELECT p.*, a.nome AS argomento_nome FROM posts p,argomenti a WHERE a.aid = p.p_aid";
                                                     $posts_run = mysqli_query($con,$posts);

                                                     if(mysqli_num_rows($posts_run) > 0)
                                                     {
                                                         foreach($posts_run as $post)
                                                         {
                                                            ?>
                                                            <tr>
                                                            <td><?= $post['pid'];?></td>
                                                            <td><?= $post['nome'];?></td>
                                                            <td><?= $post['argomento_nome'];?></td>
                                                            <td>  <img src="../caricati/posts/<?= $post['immagine'];?>" width="60px" height="60px" /></td>
                                                            <td><?= $post['status'] == '1' ? 'Archiviato' : 'Visibile' ?></td>
                                                            <td>
                                                                <a href="post-edit.php?id=<?= $post['pid'];?>" class="btn btn-success">Modifica</a>
                                                            </td>
                                                            <td>
                                                                <form action="panel-codes.php" method="POST">
                                                                <button type="submit" name="elimina_post" value="<?= $post['pid'];?>" class="btn btn-danger">Elimina</button>
                                                                </form>
                                                                
                                                            </td>
                                                            </tr>
                                                            <?php
                                                         }   
                                                     }
                                                     else{
                                                         ?>

                                                         <tr>
                                                         <td colspan="6">0 Record Trovato</td>
                                                         </tr>

                                                         <?php
                                                        }
                                                ?>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>
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