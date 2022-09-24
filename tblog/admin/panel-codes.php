<?php include('../config/dbcon.php');
      include('authentication.php');
      
      if(isset($_POST['elimina_post']))
      {
        $pid = $_POST['elimina_post'];

        $controlla_immagine = "SELECT * FROM posts WHERE pid = '$pid' LIMIT 1";
        $immagine_result = mysqli_query($con,$controlla_immagine);
        $f_result = mysqli_fetch_array($immagine_result);
        $immagine = $f_result['immagine'];

        $query = "DELETE FROM posts WHERE pid = '$pid' LIMIT 1";
        $query_run = mysqli_query($con,$query);
        
        if($query_run)
        {
            if(file_exists('../caricati/posts/'.$immagine)){
                unlink('../caricati/posts/'.$immagine);
            }
          move_uploaded_file($_FILES['immagine']['tmp_name'],'../caricati/posts/'.$filenome);
          
          $_SESSION['message'] = "Post Eliminato!";
          header('Location: post-view.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: post-view.php');
          exit(0);
        }
      }


      if(isset($_POST['aggiorna_post']))
      {
        $pid = $_POST['pid'];

        $p_aid = $_POST['p_aid'];
        $nome = $_POST['nome'];
        $slug = $_POST['slug'];
        $descrizione = $_POST['descrizione'];

        $p_titolo = $_POST['p_titolo'];
        $p_descrizione = $_POST['p_descrizione'];
        $p_keyword = $_POST['p_keyword'];

        $vecchio_filenome = $_POST['vecchio_immagine'];
        $immagine = $_FILES['immagine']['name'];

        $aggiornato_filenome = "";

        if($immagine != NULL)
        {
        //rinomina quel imagina
        $immagine_extensione = pathinfo($immagine, PATHINFO_EXTENSION);
        $filenome = time().'.'.$immagine_extensione;
        $aggiornato_filenome = $filenome;        
        }
        else
        {
          $aggiornato_filenome = $vecchio_filenome;
        }
        
        $status = $_POST['status'] == true ? '1' : '0';

        $query = "UPDATE posts SET p_aid='$p_aid',nome='$nome',slug='$slug',descrizione='$descrizione',p_titolo='$p_titolo',p_descrizione='$p_descrizione',p_keyword='$p_keyword',immagine='$aggiornato_filenome',status='$status' WHERE pid = '$pid' ";

        $query_run = mysqli_query($con,$query);

         
        if($query_run)
        {
          if($immagine != NULL)
          {
            if(file_exists('../caricati/posts/'.$vecchio_filenome)){
                unlink('../caricati/posts/'.$vecchio_filenome);
            }
          move_uploaded_file($_FILES['immagine']['tmp_name'],'../caricati/posts/'.$filenome);
          }
          $_SESSION['message'] = "Post Aggiornato!";
          header('Location: post-view.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: post-view.php');
          exit(0);
        }

      }



      if(isset($_POST['post_add']))
      {

        $p_aid = $_POST['aid'];

        $nome = $_POST['nome'];
        $slug = $_POST['slug'];
        $descrizione = $_POST['descrizione'];

        $p_titolo = $_POST['p_titolo'];
        $p_descrizione = $_POST['p_descrizione'];
        $p_keyword = $_POST['p_keyword'];

        $immagine = $_FILES['immagine']['name'];
        //rinomina quel imagina
        $immagine_extensione = pathinfo($immagine, PATHINFO_EXTENSION);
        $filenome = time().'.'.$immagine_extensione;

        $status = $_POST['status'] == true ? '1' : '0';

        $query = "INSERT INTO posts (p_aid,nome,slug,descrizione,p_titolo,p_descrizione,p_keyword,immagine,status) VALUES ('$p_aid','$nome','$slug','$descrizione','$p_titolo','$p_descrizione','$p_keyword','$filenome','$status')";
        $query_run = mysqli_query($con,$query);
        
        if($query_run)
        {
          move_uploaded_file($_FILES['immagine']['tmp_name'],'../caricati/posts/'.$filenome);
          $_SESSION['message'] = "Post Aggiungato!";
          header('Location: post-view.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: post-view.php');
          exit(0);
        }
        
      }



      if(isset($_POST['elimina_argomento']))
      {
          $aid = $_POST['elimina_argomento'];
          //2 = elimina
          $query = "UPDATE argomenti SET status='2' WHERE aid='$aid' LIMIT 1";
          $query_run = mysqli_query($con,$query);


          if($query_run)
          {
            $_SESSION['message'] = "Argomento Eliminato!";
            header('Location: argomento-view.php');
            exit(0);
          }
          else
          {
            $_SESSION['message'] = "Qualcosa non andato bene!";
            header('Location: argomento-view.php');
            exit(0);
          }
  
      }
          
      if(isset($_POST['aggiorna_argomento']))
      {
        $aid = $_POST['aid'];
        $nome = $_POST['nome'];
        $slug = $_POST['slug'];
        $descrizione = $_POST['descrizione'];

        $a_titolo = $_POST['a_titolo'];
        $a_descrizione = $_POST['a_descrizione'];
        $a_keyword = $_POST['a_keyword'];

        $navbar_status = $_POST['navbar_status'] == true ? '1' : '0';
        $status = $_POST['status'] == true ? '1' : '0';

        $query = "UPDATE argomenti SET nome='$nome',slug='$slug',descrizione='$descrizione',a_titolo='$a_titolo',a_descrizione='$a_descrizione',a_keyword='$a_keyword',navbar_status='$navbar_status',status='$status' WHERE aid='$aid'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
          $_SESSION['message'] = "Argomento Aggiornato!";
          header('Location: argomento-view.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: argomento-view.php');
          exit(0);
        }

      }


      if(isset($_POST['argomento_add']))
      {
        $nome = $_POST['nome'];
        $slug = $_POST['slug'];
        $descrizione = $_POST['descrizione'];

        $a_titolo = $_POST['a_titolo'];
        $a_descrizione = $_POST['a_descrizione'];
        $a_keyword = $_POST['a_keyword'];

        $navbar_status = $_POST['navbar_status'] == true ? '1' : '0';
        $status = $_POST['status'] == true ? '1' : '0';

        $query = "INSERT INTO argomenti (nome,slug,descrizione,a_titolo,a_descrizione,a_keyword,navbar_status,status) VALUES ('$nome','$slug','$descrizione','$a_titolo','$a_descrizione','$a_keyword','$navbar_status','$status')";
        $query_run = mysqli_query($con,$query);

        
        if($query_run){
          $_SESSION['message'] = "Argomento Aggiungato!";
          header('Location: argomento-add.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: argomento-add.php');
          exit(0);
        }
      }


      if(isset($_POST['elimina-utente']))
      {
        $user_id = $_POST['elimina-utente'];

        $query = "DELETE FROM utenti WHERE uid='$user_id'";
        $query_run = mysqli_query($con, $query);
        
        if($query_run){
          $_SESSION['message'] = "Admin/Utente e' stato eliminato";
          header('Location: view-register.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: view-register.php');
          exit(0);
        }

      }

      if(isset($_POST['aggiungi_utente']))
      {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $password = $_POST['password'];
        $d_nascita = $_POST['d_nascita'];
        $biografia = $_POST['biografia'];
        $ruolo = $_POST['ruolo'];
        $status = $_POST['status'] == true ? '1' :'0';
      
        $query = "INSERT INTO utenti (username,email,nome,cognome,password,d_nascita,biografia,ruolo,status) VALUES ('$username','$email','$nome','$cognome','$password','$d_nascita','$biografia','$ruolo','$status')";
        $query_run = mysqli_query($con,$query);

        if($query){
          $_SESSION['message'] = "Admin/Utente e' stata aggiungato";
          header('Location: view-register.php');
          exit(0);
        }
        else
        {
          $_SESSION['message'] = "Qualcosa non andato bene!";
          header('Location: view-register.php');
          exit(0);
        }
      }



      if(isset($_POST['aggiorna_utente']))
      {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $password = $_POST['password'];
        $d_nascita = $_POST['d_nascita'];
        $biografia = $_POST['biografia'];
        $ruolo = $_POST['ruolo'];
        $status = $_POST['status'] == true ? '1' :'0';

        $query = "UPDATE utenti SET username='$username',email='$email',nome='$nome',cognome='$cognome',password='$password',d_nascita='$d_nascita',biografia='$biografia',ruolo='$ruolo',status='$status'
                     WHERE uid='$user_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run){
            $_SESSION['message'] = "Aggiornamento completato!";
            header('Location: view-register.php');
            exit(0);
        }
      }
      

?>