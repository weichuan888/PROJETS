<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <form class="formulaire" action="inscription.php" method="post">
      <label>Votre Nom:
        <input type="text" name="surname">
      </label>
      <br/>

      <label>Votre Prénom:
        <input type="text" name="name" >
      </label>
      <br/>

      <label>Votre email:
        <input type="email" name="mail" >
      </label>
      <br/>

      <label>Votre pseudo:
        <input type="text" name="pseudo" >
      </label>
      <br/>

      <label>Votre Mot de passe:
        <input type="password" name="mdp" >
      </label>
      <br/>
      <label>Vueillez réecrire votre mot de passe:
        <input type="password" name="mdp2" >
      </label>
      <br/>
      <input type="submit" name="envoyer" value="Envoyer">
    </form>

  </body>
</html>

<?php

class Inscription
{
  public $pdo;
  // Check la connexion OK

  function __construct() {
    try
    {
      $this->pdo = new PDO('mysql:host=localhost;dbname=Toothies', 'root', 'user');

      echo "Connexion réussi!";
    }
    catch(Exception $e)
    {
      echo "echec de la connexion à la base de données";
      exit();
    }
  }
  public function Remplir()
  {
    return $this->pdo;
    echo "Formulaire test";
  }

}


// Phase 2 formulaire

  // $pdo->RemplirFormulaire();
  // Reussi à afficher la db

  function Afficher_Users()
  {
    $Inscription = new Inscription();
    $pdo = $Inscription->Remplir();
    $reponse=$pdo->query('SELECT * FROM users');
    while($donnees =$reponse->fetch())
    {
      echo '<p>Je m\'appelle ' . $donnees['nom'] . " " . $donnees['prenom'] . 'et mon adresse email est le ' . $donnees['email'] . '</p>';
    }
    $reponse->closeCursor();
  }
  Afficher_Users();


// Fonction inserer les champs dans la db ok
  function Add_Users()
  {
    $Surname = isset($_POST['surname']) ? $_POST['surname'] : "";
    $Name = isset($_POST['name']) ? $_POST['name'] : "";
    $Mail = isset($_POST['mail']) ? $_POST['mail'] : "";
    $Pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
    $PassOne = isset($_POST['mdp']) ? $_POST['mdp'] : "";
    $PassTwo = isset($_POST['mdp2']) ? $_POST['mdp2'] : "";

    if($Surname != "" && $Name != "" && $Mail != "" && $Pseudo != "" && $PassOne != "" && $PassTwo != "")
    {
      $Inscription = new Inscription();
      $pdo = $Inscription->Remplir();
      $request = $pdo->prepare("INSERT INTO users (nom, prenom, email, pseudo, password, passworddeux) VALUES(?, ?, ?, ?, ?, ?)");
      $request->execute([$Surname, $Name, $Mail, $Pseudo, $PassOne, $PassTwo]);
    }
  }

 ?>

<?php
  // Savoir si les champs du formulaire sont bien remplis.
  $Surname = $_POST['surname'];
  $Name = $_POST['name'];
  $Mail = $_POST['mail'];
  $Pseudo = $_POST['pseudo'];
  // $PassOne = hash("sha256", htmlentities($_POST['mdp']));
  // $PassTwo = hash("sha256", htmlentities($_POST['mdp2']));




  if(empty($Surname))
  {
    echo "Veuillez indiquer votre nom svp.";
  }
  else if (empty($Name))
  {
    echo "Veuillez indiquer votre prénom svp.";
  }
  else if (empty($Mail))
  {
    echo "Veuillez indiquer votre adresse email svp.";
  }
  else if (empty($Pseudo))
  {
    echo "Veuillez indiquer votre pseudo svp.";

  }
  else if (empty($_POST['mdp']) || empty($_POST['mdp2']))
  {
    echo "Veuillez indiquer vos mot de passe svp.";
  }
  else if (($_POST['mdp']) != ($_POST['mdp2']))
  {
    echo "Les mots de passe sont différents.";
  }
  else
  {
    Add_Users();
    echo "Les champs sont validés.";
  }






 ?>
