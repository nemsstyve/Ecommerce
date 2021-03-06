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
   
    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

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
                <a class="nav-link active link" aria-current="page" href="#">Accueil</a>
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

  <br/> <br/>
  <?php $categoryname = $_GET['categoryname'] ?>
  <h1 class="titre">Catalogue de <?php echo "$categoryname"?></h1>
  <br/>
  <br/>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">


      
      
      
      <?php
        $dsn = 'mysql:host=localhost;dbname=ecommerce';
        $bdd= new PDO($dsn, 'root', '');
        $requete = 'select p.code,productname,QuantiteStock,description,url,prixU, pers.prenom, pers.nom from category c join produit p join personne pers join image i on c.categoryid=p.categoryid and p.email = pers.email and p.code=i.code where categoryname="'.$categoryname.'" ';	// On recupere les biens qui ont des images dans la table `image`
        $urls = $bdd->query($requete);
        $t = 0;
        while($row = $urls->fetch()){
            $t++;
      ?>
        <?php $lien="productcommande.php?productname=".$row['productname']."&code=".$row['code']; ?>
        <div  style="margin-bottom: 3%;" class="col-md-6 col-lg-4 d-flex align-items-stretch"> 
                
                <div  class="card" style="width: 100%;">
                    
                    <img src="<?= $row["url"] ?>" class="card-img-top" style="width:100%;height:300px" alt="Fissure in Sandstone"/>
                    
                    <div class="card-body">
                    
                        <h5 class="card-title">Propri??taire : <span style="color : #fec500"><?= $row["prenom"]. " " . $row["nom"]?></span></h5>
                        <h3 class="card-text"> <?= $row["productname"] ?></h3>
                        <p class="card-text"> <?= $row["description"] ?></p>
                        <p class="card-text"> <?= $row["prixU"] ?> ??? </p>
                        
                    
                        <?php 
                             echo '<form action="LoginClientCommande.php" method="post" >';
                             echo'<input type="hidden" name="code" value='.$row['code'].'>';
                             echo'<input type="hidden" name="quant" value='.$row['QuantiteStock'].'>';
                             echo"<center>";echo'<input  type="submit" class="btn btn-success"  value="Commander">';
                             echo"</center>";
                             echo '</form>';
                        
                        
                        ?>

                    </div>

                </div>

       </div>
                
                
        
        
        
        
       <?php  }
          if($t==0)
          {
            echo'<center><h4 style="color:orange">Pas de Produit enregistr?? pour le moment</h1></center>';
          }
          
          
        ?>
    </div><!-- /.row -->
  </div>


<!--
  <br/> <br/>
  <h1 class="titre">Nos R??alisations</h1>
  <br/> <br/>

  <div class="container marketing">
    <div class="row">

          <div class="col-lg-4">  

            <img  src="../images/siteweb.jpg"  width="400" height="500" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
      
                 
    
          </div>

          <div class="col-lg-4">  

            <img  src="../images/siteweb.jpg"  width="400" height="500" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
        
          
                 
              

          </div>

          <div class="col-lg-4">  

            <img  src="../images/siteweb.jpg"  width="400" height="500" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
        
          
          </div>
  
 
     
    </div>
  </div>  

  <br/>

  <center><a class="btn btn-primary" href="#">Plus de r??alisations &raquo;</a></center>
-->
  <br/><br/>


  
</main>

<!-- FOOTER -->

<footer id="footer" class="foot">
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
                      S??n??gal<br/>
                      <strong>T??l??phone:</strong>+221 78 140 12 17<br/> 
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
          &copy; Copyright<strong>WebsiteName</strong>. Tout Droits Reserv??s
      </div>
      <div class="credits">
          Designed by <a href="#">WebsiteName</a>
      </div>
  </div>
</footer>
<!-- <footer class="container">
      <p class="float-end"><a href="#">Back to top</a></p>
      <p>&copy; 2017???2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>-->


  <script src="../css/bootstrap.bundle.min.js"></script>



      
  </body>
</html>
