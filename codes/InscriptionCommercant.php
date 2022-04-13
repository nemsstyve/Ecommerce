<?php
	session_start();
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Site commercial </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
   
    <!-- Bootstrap core CSS -->
   <link href="../css/bootstrap.min.css" rel="stylesheet">
   <script src="../css/jquery-3.4.1.min.js"></script>
   <script src="../css/bootstrap.js"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/navbar-top.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      
      </ul>
      <form class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link active link" aria-current="page" href="accueil.php">Accueil</a>
            </li>

            <li class="nav-item">
              <a  class="nav-link  link"  href="#">A Propos</a>
            </li>

           <li class="nav-item">
            <a  class="nav-link  link float"  href="#">Contacts</a>
          </li>

          <div class="dropdown">
            <button style="margin-right:65px;" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              S'Inscrire
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li class="dropdown-header">En tant que :</li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="InscriptionCommercant.php">Commercant</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="InscriptionClient.php">Client</a></li>
            </ul>
          </div>
           
          <div class="dropdown">
            <button style="margin-right:65px;" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Se connecter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li class="dropdown-header">En tant que :</li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="LoginCommercant.php">Commercant</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="LoginClient.php">Client</a></li>
            </ul>
          </div>
          
            
        </ul>
   
    </form>
    </div>
  </div>
</nav>

<main class="container">
   
<div class="col-md-12 col-lg-12">
    
    </div class="container">    
        <div class="row">

            <h4 class="mb-3">Inscription commercant</h4>
                <form method='post' action='InscriptionCommercant.php' id='form' enctype='multipart/form-data'>
                    
                    <div class="yes" style='color : green; font-size: 20px; display : none'>Inscription réussie</div>
                    <div class="err0" style='color : red; font-size: 20px; display : none'>Veuillez remplir tous les champs </div>
                    <div class="err" style='color : red; font-size: 20px; display : none'>Inscription échouée </div>
                    <div class="err1" style='color : red; font-size: 20px; display : none'>Inscription échouée : le numéro de téléphone et l'email sont déjà utilisés</div>
                    <div class="err2" style='color : red; font-size: 20px; display : none'>Inscription échouée : le numéro de téléphone est déjà utilisé</div>
                    <div class="err3" style='color : red; font-size: 20px; display : none'>Inscription échouée : l'email est déjà utilisé</div>
                         
                    <div class="row g-3">
                        
                        <div class="col-sm-6">
                            <label  class="form-label">Prénom</label>
                            <input type="text"   class="form-control" name="prenom" placeholder="Ecrivez votre prénom" value="<?php if(isset($_POST['prenom'])){echo htmlentities($_POST['prenom']);}?>" required>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" placeholder="Ecrivez votre nom" value="<?php if(isset($_POST['nom'])){echo htmlentities($_POST['nom']);}?>" required>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email']);}?>" placeholder="Adresse mail" required>
                            </div>
                        </div>

                
                        <div class="col-sm-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="<?php if(isset($_POST['password'])){echo htmlentities($_POST['password']);}?>" placeholder="créer un mot de passe" required>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Adresse <!--<span class="text-muted">(Optional)</span>--></label>
                            <input type="text" class="form-control" name="adresse"  value="<?php if(isset($_POST['adresse'])){echo htmlentities($_POST['adresse']);}?>" placeholder="Exemple : 10 Bis Avenue du beau site, Sèvres">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Age </label>
                            <input type="number" min="10" class="form-control" name="age" value="<?php if(isset($_POST['age'])){echo htmlentities($_POST['age']);}?>" placeholder="Vous devez avoir au moins 10 ans">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Nature </label>
                            <input type="text"  class="form-control" name="nature"  readonly value="commerçant">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Tel </label>
                            <input type="text" min="10" class="form-control" name="tel" value="<?php if(isset($_POST['tel'])){echo htmlentities($_POST['tel']);}?>" placeholder="Votre numéro de téléphone">
                        </div>


                        <div class="my-3">
                            <label lass="form-label">Sexe</label>  
                            <div class="form-check">
                                <input id="credit" name="sexe" value="m" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label">M</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="sexe" value="f" type="radio" class="form-check-input" required>
                                <label class="form-check-label">F</label>
                            </div>
                            <hr/>
                            <button class="w-10 btn btn-dark btn-lg" type="submit">Sign In</button>

                        </div>    
                       
                    </div>    
                </form>
                
                <!--  Connexion avec la base de données -->

                <?php
                    
                    $dsn = 'mysql:host=localhost;dbname=ecommerce';
                    $bdd= new PDO($dsn, 'root', '');		
                                        
                    $requete = "INSERT INTO personne (email ,mdp,nom,prenom,adresse,age,sexe,tel,nature) VALUES
                                   (:email,:mdp,:nom,:prenom,:adresse,:age,:sexe,:tel,:nature)";
                    
                    #Faire un select sur la table personne
                    $select='SELECT * from personne';

                    #Exécution de la requete retournant toutes les personnes de la base !
                    $savepersonnes1 = $bdd->query($select);

                    #Exécution de la requete retournant toutes les personnes de la base !
                    $savepersonnes2 = $bdd->query($select);                    
                                
                    $stmt=$bdd->prepare($requete);
                    $veriftel=false;
                    $verifemail=false;
                                    
                    if(isset($_POST['email']) and isset($_POST['password']) and isset($_POST['nom']) and  isset($_POST['prenom'])
                         and isset($_POST['adresse'])and isset($_POST['age']) and isset($_POST['sexe']) and isset($_POST['tel']) 
                         and isset($_POST['nature']) ) 
                    {
                        
                        $email = $_POST['email'];
                        $mdp = $_POST['password'];
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $adresse = $_POST['adresse'];
                        $age = $_POST['age'];
                        $sexe = $_POST['sexe'];
                        $_SESSION['email'] = $_POST['email'];
                        $tel=$_POST['tel'];
                        $nature = $_POST['nature'];
                                        
                                    
                        if(!empty($email) and !empty($mdp) and !empty($nom) and !empty($prenom) and !empty($adresse) and !empty($age) and !empty($sexe) and !empty($tel) and !empty($nature) )
                        {
                                            
                            if( $nature == "commerçant")
                            {
                                            
                                while($saves = $savepersonnes1->fetch())
                                {
                                                    
                                    if($tel==$saves['tel']) 
                                    {
                                        $veriftel=true;
                                        break;     
                                                    
                                    }
                                                        
                                }

                                while($saves1 = $savepersonnes2->fetch())
                                {
                                                    
                                    if($email == $saves1['email'])
                                    {
                                        $verifemail=true;
                                        break;     
                                                                
                                    }
                                                            
                                                        
                                }
                                                        
                                if($veriftel==true && $verifemail==true )
                                {
                                    echo "<script>
                                        $('.err1').slideDown('slow');
                                        </script>";
                                }

                                else if($veriftel==true && $verifemail==false)
                                {
                                    echo "<script>
                                        $('.err2').slideDown('slow');
                                        </script>";

                                }
                                
                                else if($verifemail==true && $veriftel==false )
                                {
                                    echo "<script>
                                        $('.err3').slideDown('slow');
                                        </script>";

                                }
                                                    
                                else
                                {
                                    $stmt->bindParam(':email', $email);
                                    $stmt->bindParam(':mdp', $mdp);
                                    $stmt->bindParam(':nom', $nom);
                                    $stmt->bindParam(':prenom', $prenom);
                                    $stmt->bindParam(':adresse', $adresse);
                                    $stmt->bindParam(':age', $age);
                                    $stmt->bindParam(':sexe', $sexe);
                                    $stmt->bindParam(':tel', $tel);
                                    $stmt->bindParam(':nature', $nature);
                        
                                    if($stmt->execute())
                                    {
                                        echo "<script>
                                                $('.yes').slideDown('slow');
                                                window.location.href='EspacePersonnelCommercant.php';
                                            </script>";
                                           
                                        echo" <script>
                                                $(':input','#id-formulaire')
                                                .not(':button, :submit, :reset, :hidden')
                                                .val('')
                                                .removeAttr('checked')
                                                .removeAttr('selected')
                                            </script>";    
                                                            
                                    }
                                                            
                                    else
                                    {
                                        echo "<script>
                                                $('.err').slideDown('slow');
                                            </script>";
                                    }

                                }
                                
                            }
                                                
                            else
                            {
                                    echo 'nature inconnue';
                            }
                                                    
                                            
                        }
                        else 
                        {
                                echo "<script>
                                                $('.err0').slideDown('slow');
                                </script>";
                        }
                    }
                                
                                
                ?>
                



            </div>
        </div>

    </div>
  
</main>

<!-- FOOTER -->

<footer style="margin-top: 15%;" id="footer" class="foot">
  <div class="footer-top  footer-default">
    <br/>
      <div class="container">
          <div class="row">
              
              <div class="col-lg-4 col-md-6 footer-info"> 
                  <h3 style="animation: flash 1.4s linear infinite;margin-top:2%;letter-spacing:5px;">FASTISOFT</h3>
                 
              </div>
             
              <div style= "margin-top:10px" class="col-lg-2 col-md-6 footer-links">
                  <h4> Liens utiles <h4>
                      <ul>
                          <li><a href="#">Link</a></li>
                          <li><a href="#">Link</a></li>
                          <li><a href="#">Link</a></li>
                          <li><a href="#">Link</a></li>
                          <li><a href="#">Link</a></li>
                      </ul>
              </div>
         
              <div style= "margin-top:10px" class="col-lg-3 col-md-6 footer-contact"> 
                  <h4> Contactez-nous</h4>
                  <p>
                      Bambilor   Rue:6 <br/>
                      Bambilor,  Dakar<br/>
                      Sénégal<br/>
                      <strong>Téléphone:</strong>+221 78 140 12 17<br/> 
                      <strong>Em@il:</strong>BabacarNdong@gmail.com<br/>
                  </p>
      
                  <div class="social-links">
                      <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                      <a href="#" class="twitter"><i class="fa fa-facebook"></i></a>
                      <a href="#" class="twitter"><i class="fa fa-instagram"></i></a> 
                      <a href="#" class="twitter"><i class="fa fa-google-plus"></i></a>
                      <a href="#" class="twitter"><i class="fa fa-linkedin"></i></a>      
                  </div> 
              </div>  

              <div style= "margin-top:10px" class="col-lg-3 col-md-6 footer-newsletter">
                  <h4>Our Nemsletter</h4>
                  <p> ________ ________ ________ ________ _________
                  ________  _______ _________  _______  _______
                  ________ _________ ___________</p>
                  <form accept="" mthod="post">
                      <input type="email"  name="email"/><input type="submit" value="s'abonner"/>
                  </form>
              </div>
  
          </div>
      </div>
  </div>
 
  <div class="container">
      <div class="copyright">
          &copy; Copyright<strong>WebsiteName</strong>. Tout Droits Reservés
      </div>
      <div class="credits">
          Designed by <a href="#">WebsiteName</a>
      </div>
  </div>
</footer>

<script src="../css/bootstrap.bundle.min.js"></script>



      
  </body>
</html>
