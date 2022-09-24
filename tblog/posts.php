<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
        
            <div class="col-md-9">
            <?php
            if(isset($_GET['titolo']))
            {
                //if anyone tries to sql inject so that time it will escape from it !

                $slug = mysqli_real_escape_string($con,$_GET['titolo']);
                $posts = "SELECT * FROM posts WHERE slug ='$slug'";
                $posts_run = mysqli_query($con,$posts);
                
                if(mysqli_num_rows($posts_run) > 0)
                {
                        foreach($posts_run as $posto)
                        {
                            ?>

                                <div class="card card-body shadow-sm mb-4">
                                    <div class="card-header">
                                        <h5><?= $posto['nome'];?></h5>
                                    </div>

                                    <div class="card-body">
                                        <label class="text-dark me-2">Postato: <?= date('d-M-Y', strtotime($posto['created_at']));?></label>
                                        <hr/>
                                        <?php // se esiste immagine fallo vedere se non esiste non mostri icona con errore di vuoto foto?>
                                        <?php if($posto['immagine'] != null) : ?> 
                                        <img src="caricati/posts/<?= $posto['immagine'];?>" class="w-25" alt="<?= $posto['nome'];?>"/>
                                        <?php endif; ?>
                                        
                                    <div>
                                           <?= $posto['descrizione']; ?>
                                        
                                        </div>
                                    </div>
                                </div>
                                
                             <?php
                        }

                }
                else
                {
                    ?>
                    <h4>Non esiste nessun post cosi !</h4>
                    <?php
                }
            }
            else
            {
                ?>
                    <h4>Non esiste nessun URL cosi !</h4>
                <?php
            }
            ?>

            </div>
            <div class="col-md-3">
              <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-bod">
                        tuo advertiso
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>

