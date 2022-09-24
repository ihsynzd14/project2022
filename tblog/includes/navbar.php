<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
  <div class="container">
    <a class="navbar-brand d-block d-sm none d-md-none"></a>

    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <?php
          $navbar_argomento = "SELECT * FROM argomenti WHERE navbar_status = '0' AND status ='0' ";
          $navbar_argomento_run = mysqli_query($con,$navbar_argomento);

          if(mysqli_num_rows($navbar_argomento_run) > 0)
          {
            foreach($navbar_argomento_run as $argomento)
            {
              ?>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="argomento.php?titolo=<?= $argomento['slug']; ?>"><?= $argomento['nome']; ?></a>
                  </li>
              <?php
            }
          }
        ?>
        

        <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_nome'];?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Mio Profilo</a></li>
            <li>
            <form action="allcode.php" method="POST">
              <button name="logout_btn" type="submit" class="dropdown-item">Logout</button>
            </form>
            </li>
          </ul>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Accedi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Registrati</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>