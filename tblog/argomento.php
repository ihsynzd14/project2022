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
                $argomento = "SELECT aid,slug FROM argomenti WHERE slug='$slug' LIMIT 1";
                $argomento_run = mysqli_query($con,$argomento);
                
                if(mysqli_num_rows($argomento_run) > 0)
                {
                    $argomento_fetched = mysqli_fetch_array($argomento_run);
                    $arg_id = $argomento_fetched['aid'];

                    $posts = "SELECT p_aid,nome,slug,created_at FROM posts WHERE p_aid ='$arg_id'";
                    $posts_run = mysqli_query($con,$posts);

                    if(mysqli_num_rows($posts_run) > 0)
                    {
                        foreach($posts_run as $posto)
                        {
                            ?>
                            <a href="posts.php?titolo=<?= $posto['slug'];?>" class="text-decoration-none">
                            <div class="card card-body shadow-sm mb-4">
                                <h5><?= $posto['nome'];?></h5>
                                <div>
                                    <label class="text-dark me-2">Postato: <?= date('d-M-Y', strtotime($posto['created_at']));?></label>
                                </div>
                              </div>
                             </a>
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
                    <h4>Non esiste nessun argomento cosi !</h4>
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

