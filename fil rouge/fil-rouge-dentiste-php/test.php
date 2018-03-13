<?php


        // $PDO = new PDO( 'mysql:host=localhost;dbname=Toothies', 'root', 'user' );
        // echo "connexion successfully";
        // $test=$PDO->prepare("SELECT * FROM users");
        // $test->execute();
        // $PDO = null;
        //
        //


  // class DB
  // {
  //   public $_PDO;
  //   function __construct()
  //   {
  //     try {
  //         $PDO = new PDO( 'mysql:host=localhost;dbname=Toothies', 'root', 'user' );
  //         echo "connexion successfully";
  //     }
  //       catch (PDOException $e) {
  //       print "Error!: " . $e->getMessage() . "<br/>";
  //       die();
  //     }
  //   }
  //   public function getDB()
  //   {
  //     return $this->PDO;
  //   }
  // }
  //
  // function Afficher() {
  //   $AA= new PDO();
  //   $_PDO = $AA->getDB();
  //
  //   $reponse = $_PDO->query("SELECT * from users");
  //   while ($truc = $reponse->fetch())
  //   {
  //     echo "<p> {$truc['name']} </p>";
  //   }
  // }
  //
  // function Envoyer() {
  //   $Name = isset($_POST['name']) ? $_POST['name'] : "";
  //
  //   if($_POST['name']!= "")
  //   {
  //     $request =
  //
  //
  //   }
  //
  // }


 ?>

 <?php
 // // récuperer les variables
 // extract($_POST);
 //
 //  print_r("Bonjour je m\'appelle" . $surname . $name);
 //
 //  if(isset($_POST['submit']))
 //  {
 //    $Surname = $_POST['surname'];
 //    $Name = $_POST['name'];
 //    $Mail = $_POST['mail'];
 //    $Pseudo = $_POST['pseudo'];
 //    $Pass = $_POST['mdp'];
 //    $Genre = $_POST['sexe'];
 //    echo "Salut" .$Surname;
 //  }
 //
 //
 //
 //
 //  // check connection
 //    function Connect()
 //    {
 //      $dbhost = "localhost";
 //      $dbuser = "root";
 //      $dbpass = "user";
 //      $dbname = "Toothies";
 //
 //
 //      $link= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('unable to Connect to' . $dbhost);
 //      // mysql_select_db($dbname) or die ('Could not open the db' . $dbname);
 //
 //      // $sql = "INSERT INTO users ($Surname, $Name, $Mail, $Pseudo, $Pass, $Genre) VALUES (?, ?, ?, ?, ?, ?)";
 //      // if (mysql_query($link,$sql))
 //      // {
 //      //   echo "Enregistré";
 //      // }
 //      // else
 //      // {
 //      //   echo "Erreur, cela ne marche pas.";
 //      // }
 //      //
 //      // mysql_close($link);
 //      //
 //    //   $reponse = $link->query("SELECT * FROM users");
 //    //   while ($donnes = $reponse->fetch())
    //   {
    //     echo $donnes['surname'] . '<br/>';
    //
    //   }
    //   $reponse->closeCursor();
    //
    // }
    // Connect();




  // verifier les champs d inscription
  // if (!empty($_POST['pseudo']))
  // {
  // }

  // $connexion = mysql_connect('localhost', 'root', 'user', 'Toothies')
  // if (!$connexion) {
  //   die('Unable to connect to mysql' . mysql_error());
  // }
  // echo "connected to mysql <br>";
  // mysql_close($connexion);
  //
  //
  //


  ?>


  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>connection</title>
    </head>
    <body>
      <form class="connection" action="connection.php" method="post">
        <label>Votre pseudo :
          <input type="text" name="pseudo" placeholder="Votre Pseudo">
        </label>
        <br/>
        <label>Votre Mot de passe :
          <input type="password" name="mdp" placeholder="Votre Mot de passe">
        </label>
        <br/>
        <input type="submit" name="Send" value="LOGIN">

      </form>

    </body>
  </html>

  <?php

  // $User_Pseudo = $_POST['pseudo'];
  // $Pass = $_POST['mdp'];

  // if (empty($_POST['pseudo']))
  // {
  //   echo "Veuillez indiquer votre nom d'utilisateur svp";
  // }
  // else if (empty($_POST['mdp']))
  // {
  //   echo "Veuillez indiquer le mot de passe svp";
  // }
  // else {
  //   echo "Les champs sont validés.";
  // }


  //   $Pseudo2_verif = strtolower($Pseudo2);
  //   $Pseudo2_verif = substr("$Pseudo2_verif", 0, 10);
  //   if ($Pseudo2_verif!="chat")
  //   {
  //     echo 'Votre Pseudo est incorrect';
  //     exit();
  //   }
  //   else
  //   {
  //     echo 'Bienvenue dans notre site ' . $Pseudo2;
  //
  //   }
  //
  // }

   ?>


  <?php
  // check connection
  class Login
  {
    public $login;

    function __construct() {
      try {
        $this->login = new Login('mysql:host=localhost;dbname=Toothies', 'root', 'user');
        echo "connexion réussi!";

      }
      catch (Exception $e)
      {
        echo "Connexion échoué";
        exit();
      }
    }
    public function Ok()
    {
      return $this->login;
      echo "connexion test";
    }
  }



  if (isset($_POST['Send']))
  {
    $User_Name= !empty($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
    $Pass = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;

    $query = $login->prepare('SELECT * FROM users WHERE nom');

    $query->bindValue(':pseudo', $User_Name);

    $query->execute();

    $test= $query->fetch(PDO::FETCH_ASSOC);

    if ($test === false)
    {
      die ('Erreur');
    }
    else {
      $ValidPass = password_verify($Pass, $test['mdp']);
      if ($ValidPass)
      {
        $_SESSION['pseudo']=$test['pseudo'];
        $_SESSION['mdp'] = time();

      }
      else
      {
        die ('erreur');
      }
    }
  }
    // $login_user = $_POST['pseudo'];
    // $mdp = $_POST['mdp'];

    // $_SESSION['pseudo'] = $login_user;


  // session_start();
  // $error = '';
  // $bLogin = false;




  // $user = isset($_SESSION['Send']) ? $_SESSION['Send'] : "";
  //
  // if($User_Name && $Pass)
  // {
  //   if(isset($_POST['Send']))
  //   {
  //     $bLogin = Logine($User_Name, $Pass);
  //     if ($bLogin == true)
  //     {
  //       $_SESSION['Send'] = $User_Name;
  //     }
  //     else
  //     {
  //       echo "Login ou Mot de passe incorrecte.";
  //     }
  //   }
  // }
  //
  // function Connecter()
  // {
  //   $Enter = new Login();
  //   $login = $Enter->Ok();
  //   $request = $login->prepare('SELECT * FROM users WHERE nom');
  //   $Check = $reponse->fetch();
    // if($Check == 1)
    // {
    //   try
    //   {
    //     $_SESSION['pseudo'] = $_POST['pseudo'];
    //     $_SESSION['mdp'] = $_POST['mdp'];
    //     echo "Vous êtes connecté.";
    //   }
    //
    //   die
    //   {
    //     echo "Erreur, vous avez entré de mauvais identifiants!";
    //   }
    // }



    // function Connect()
    // {
    //   $dbhost = "localhost";
    //   $dbuser = "root";
    //   $dbpass = "user";
    //   $dbname = "Toothies";
    //
    //
    //   $link= new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die ('unable to Connect to' . $dbhost);
    //   mysql_select_db($dbname) or die ('Could not open the db' . $dbname);
    //
    // }
    // Connect();

    // mysql_connect($Toothies, $root, $user) or die ("Erreur de connexion");
    // mysql_select_db($users) or die ("base inexistante");
    // $sql = 'SELECT * FROM users';
    // $query= mysql_query($sql) or die ("Erreur");


   ?>

  <?php
