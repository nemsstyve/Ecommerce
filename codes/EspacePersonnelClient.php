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

          <div class="dropdown text-end">
            <a style="margin-right : 105px;"  href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            
                <li><a style="font-weight: bold;" class="dropdown-item" href="#">Profil :</a></li>  
                <li><hr class="dropdown-divider"></li>
                <li><?php
                            $dsn = 'mysql:host=localhost;dbname=ecommerce';
                            $bdd= new PDO($dsn, 'root', '');		
                            
                                      
                            $select = "SELECT * FROM personne  WHERE email like ? ";
                            $stmt = $bdd -> prepare($select);
                            $stmt -> execute(array($_SESSION['email']));

                            if($stmt->execute())
                            {
                              $row = $stmt -> fetch();
                              $t = 0;
                              
                              while($row)
                              { $t++;
                                
                                echo '
                                    <a class="dropdown-item">'.$row["prenom"].' '.$row["nom"].'</a>';
                                $row = $stmt -> fetch();
                              }
                              
                              
                            }
                            
                          ?></li>
                  
              
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
          
            
        </ul>
   
    </form>
    </div>
  </div>
</nav>

<main class="container">
  <br/> <br/>
    <h1 class="titre">Produit (s) ~~ commandé (s)</h1>
    <br/>
    <br/>

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php
          $dsn = 'mysql:host=localhost;dbname=ecommerce';
          $bdd= new PDO($dsn, 'root', '');	
          $C="SELECT com.statut, p.code,productname,categoryname,description,QuantiteStock,prixU,url FROM personne pers, produit p, category c,commande com, image i where p.code = i.code and  p.code = com.code and p.categoryid=c.categoryid and pers.email like ? ORDER BY categoryname ASC ";
            //requete pour rechercher des produits et images	
          $E=$bdd->prepare($C); 
          $E->execute(array($_SESSION['email']));
          if($E->execute())
          {
            $row = $E -> fetch();
            $t = 0;
            while($row)
            {
              $t++;
        	                 
       ?>
          <div  style="margin-bottom: 3%;" class="col-md-6 col-lg-4 d-flex align-items-stretch"> 
           
           <div  class="card" style="width: 100%;">
             
             <img src="<?= $row["url"] ?>" class="card-img-top" style="width:100%;height:300px" alt="Fissure in Sandstone"/>
             
             <div class="card-body">
               
               <h5 class="card-title">Article : <?= $row["productname"] ?></h5>
               <p class="card-text"> Description : <?= $row["description"] ?></p>
               <p class="card-text"> Statut : <?= $row["statut"] ?></p>
               <center>
                   <a class="btn btn-primary" style="background-color: #fec500;border:0px; " href="#">
                                       commande en attente de validation
                                 
                   </a>
               </center>   

             </div>

           </div>

         </div>  
        
        <?php  $row = $E -> fetch();}
          if($t==0)
          {
            echo'<center><h4 style="color:orange">Pas de Produit enregistré pour le moment</h1></center>';
          }
          }
          
        ?>  
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
