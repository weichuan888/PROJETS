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
        <input type="password" name="password" placeholder="Votre Mot de passe">
      </label>
      <br/>
      <input type="submit" name="Send" value="LOGIN">
    </form>

  </body>
</html>

<?php
// check connection
class Login
{
  public $login;

  function __construct() {
    try {
      $this->pdo = new PDO('mysql:host=localhost;dbname=Toothies', 'root', 'user');
      // echo "connexion réussi!";

    }
    catch (Exception $e)
    {
      echo "Connexion échoué";
      exit();
    }
  }
  public function Ok()
  {
    return $this->pdo;
    echo "connexion test";
  }
}
function Connexion()
{
  $pseudo=$_POST['pseudo'];
  $password=$_POST['password'];

  $Connect= new Login();
  $machin= $Connect->Ok();
  $request = $machin->prepare('SELECT * FROM users WHERE pseudo= :pseudo AND password= :password');
  $request->execute(array(
    'pseudo' => $pseudo,
    'password' => $password));
  $resulat = $request->fetch();
  $passwordFromData = $resulat['password'];
  // $PseudoCorrect = pseudo_verify($_POST['pseudo'], $resulat['pseudo']);

  if ($password === $passwordFromData && $pseudo === $resulat['pseudo'])
  {
    session_start();
    $_SESSION['ID'] = $resulat['ID'];
    $_SESSION['pseudo'] = $resulat['pseudo'];
    $_SESSION['password'] = $resulat['password'];

    echo "vous etes connecté";
    // header('Location: /content');
  }
  else
  {
    echo "Non pas connecté";
    // if ($PasswordCorrect)
    // {
    //   session_start();
    //   $_SESSION['id'] = $resulat['id'];
    //   $_SESSION['pseudo'] = $resulat['pseudo'];
    //   $_SESSION['password'] = $resulat['password'];
    //
    //   echo "vous etes connecté";
    // }
    // else
    // {
    //   echo "Mauvais";
    // }
  }
}
Connexion();
  // public function add()
  // {
  //   $request = $this->login->prepare("INSERT INTO users(pseudo, password) VALUES(?, ?)");
  //   $request->execute();
  //   // return $this->login;
  //   // echo "connexion test";
  // }
  // public function Check()
  // {
  //   $request = $this->login->query("SELECT * FROM users WHERE pseudo");
  //   $Truc = $req->fetchObject();
  //   if ($request->rowCount() == 1)
  //   {
  //     if ($Truc->password == $Pass)
  //     {
  //       return true;
  //     }
  //     else {
  //       return false;
  //     }
  //   }
  //   return;
  // }

//
// function Test()
// {
//   $Enter = new login();
//   $login = $Enter->Ok();
//   // $User_Name= mysql_real_escape_string($User_Name);
//   // $Pass= mysql_real_escape_string($Pass);
//   $request=$login->query("SELECT * FROM users WHERE nom=".$User_Name);
//
//   $lol= $request->execute();
//   var_dump($lol);
// }
// Test();
//
//
//
//
// $User_Name = $_POST['pseudo'];
// $Pass = $_POST['mdp'];
//
// if (isset($User_Name) && isset($Pass))
// {
//   echo "Connecté";
// }
// else
// {
//   echo "Erreur";
// }

// if (isset($_POST['Send']))
// {
//   $User_Name= !empty($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
//   $Pass = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;
//
//   if (isset($User_Name, $Pass))
//    {
//      $Login=new Login();
//    }
//   $query = $login->prepare('SELECT * FROM users WHERE nom');
//
//   $query->bindValue(':pseudo', $User_Name);
//
//   $query->execute();
//
//   $test= $query->fetch(PDO::FETCH_ASSOC);
//
//   if ($test === false)
//   {
//     die ('Erreur');
//   }
//   else {
//     $ValidPass = password_verify($Pass, $test['mdp']);
//     if ($ValidPass)
//     {
//       $_SESSION['pseudo']=$test['pseudo'];
//       $_SESSION['mdp'] = time();
//
//     }
//     else
//     {
//       die ('erreur');
//     }
//   }
// }
?>
