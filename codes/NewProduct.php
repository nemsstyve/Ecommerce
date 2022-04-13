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
   <link rel="stylesheet" href="../css/auth.css"/>
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
                      <a class="nav-link active link" aria-current="page" href="EspacePersonnelCommercant.php">EPC</a>
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

                <h4 class="mb-3">Add new product</h4>
                    <form method='post' action='NewProduct.php' id='form' enctype='multipart/form-data'>
                        
                        <div class="success" style='color : green; font-size: 20px; display : none'>Insertion réussie</div>
                        <div class="alreadyuse" style='color : red; font-size: 20px; display : none'>Vous avez déjà ajouté un produit portant ce nom </div>
                        <div class="empty" style='color : red; font-size: 20px; display : none'>Remplissez tous les champs </div>
                        <div class="errorinsert" style='color : red; font-size: 20px; display : none'>Error lors de l'insertion, revérifiez les informations</div>
                        <div class="errquantstock" style='color : red; font-size: 20px; display : none'>le prix et la quantité doivent être supérieux à 10</div>
                        <div class="errcategory" style='color : red; font-size: 20px; display : none'>Catégorie inexistante, réessayer</div>
                            
                        <div class="row g-3">
                            
                            <div class="col-sm-6">
                                <label  class="form-label">Nom du produit</label>
                                <input type="text"   class="form-control" name="nom" placeholder="Ecrivez le nom du roduit" value="<?php if(isset($_POST['nom'])){echo htmlentities($_POST['nom']);}?>" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Catégorie</label>
                                <?php
                                     $idpers = $_SESSION['email'];
						                         $dsn = 'mysql:host=localhost;dbname=ecommerce';
                                     $bdd= new PDO($dsn, 'root', '');	
                                     $select = 'select categoryname from category';
                                     $stmt = $bdd -> query($select);
                                    // $stmt -> execute(array($idpers));

                                         echo' <select class="form-select" name="categoryname" required>';
                                          while($recupname = $stmt->fetch())
                                            { 
                                                echo ' <option value='.$recupname["categoryname"].'>'.$recupname["categoryname"].'</option>';
                                            }
                                          echo '</select>';
                                        
                 
                                ?>	
						
                            </div>

                    
                            <div class="col-sm-6">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" value="<?php if(isset($_POST['description'])){echo htmlentities($_POST['description']);}?>" placeholder="Description du produit" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Quantité à stocker <!--<span class="text-muted">(Optional)</span>--></label>
                                <input type="text" class="form-control" name="stock"  value="<?php if(isset($_POST['stock'])){echo htmlentities($_POST['stock']);}?>" placeholder="Quantité à stocker">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Prix unitaire </label>
                                <input type="number" min="15" class="form-control" name="prix" value="<?php if(isset($_POST['prix'])){echo htmlentities($_POST['prix']);}?>" placeholder="Renseignez le prix du produit">
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Image </label>
                                <input type='file' name='photo' size="30"  accept="image/*" class="form-control">
                                <input type='hidden' name='MAX_FILE_SIZE' value='1000000'/>
                            </div>

                            <div class="my-3">
                               
                                
                                <hr/>
                                <button class="w-10 btn btn-dark btn-lg" type="submit">Ajouter</button>

                            </div>    
                          
                        </div>    
                    </form>
                    
                    <!--  Connexion avec la base de données -->

                    <?php
                        

                        Function valid_extension($file)
                        {
                           $tab=array("jpg", "png", "jpeg", "gif");
                           $ext=strtolower(substr(strrchr($file,'.'),1));
                           if(in_array($ext,$tab))
                              return true;
                            return false;
                        }
                        Function max_size($file)
                        {
                            $maxsize=100000000000000000000000000000;
                            if(isset($_POST['$file']['MAX_FILE_SIZE'])){
                                $maxsize=$_POST['MAX_FILE_SIZE'];
                            if($file['size']<=$maxsize)
                                return true;
                            return false;
                            }
                        }
                        Function move_file($sourcefile, $destpath, $destname){
                            if(!(is_dir($destpath)))
                                mkdir($destpath);
                            $dest=$destpath."/".$destname;
                            $destname="im_ser_".$destname;
                            $dest=$destpath."/".$destname;
                            move_uploaded_file($sourcefile, $dest);
                            // echo "Destpath=".$destpath." ";
                            // echo "</br>Dest=".$dest;
                            return $dest;
                        }
                        Function faire(){
                            if(isset($_FILES['photo'])){
                                if($_FILES['photo']['error']==0){
                                    $file=$_FILES['photo'];
                                    $file_name=$file['name'];
                                    if(valid_extension($file_name)){
                                        // if(max_size($file)){
                                        if(move_file($file['tmp_name'], "tofs_server",$file['name'])){
                                            $d=move_file($file['tmp_name'], "tofs_server",$file['name']);
                                            return $d;
                                        }
                                    }
                                    else{
                                        echo "Votre extension n'est pas valid</br> Veuillez choisir une image svp";
                                    }
                                }
                                else{
                                    echo "Une erreur s'est produit lors de votre téléchagement</br>Veuillez reessayer ultérieurement";
                                }
                            }
                        }
                       
                        $dsn = 'mysql:host=localhost;dbname=ecommerce';
                        $bdd= new PDO($dsn, 'root', '');		
                                            
                        $requete = "INSERT INTO produit (productname ,description,QuantiteStock,prixU,email,categoryid) VALUES
                                      (:productname,:description,:QuantiteStock,:prixU,:email,:categoryid)";
                        $insertproduct = $bdd->prepare($requete);              
              
                            /*Recupération des données transmises par le formulaire*/
                        if( isset($_POST['nom']) && isset($_POST['categoryname']) && isset($_POST['description'])&& isset($_POST['stock']) && isset($_POST['prix']))
                        {
                            /*$code=$_POST['code'];*/
                            //$code=$_POST['code'];
                            $idpers = $_SESSION['email'];
                            $nom=$_POST['nom'];
                            $category=$_POST['categoryname'];
                            $description=$_POST['description'];
                            $stock=$_POST['stock'];
                            $prix=$_POST['prix'];
                                    
                            /*Vérification des informations*/
                            if((!empty($nom))&&(!empty($category))&&(!empty($description))&&(!empty($stock))&&(!empty($prix)))
                            {
                                if(($_POST['stock']>=10) && ($_POST['prix']>=10)/*&&($_POST['code']>=1)*/)
                                {
                                    /*$creer->bindParam(':code',$code);*/
                                    // $creer->bindParam(':code',$code);
                                    $selectid = 'select * from category where categoryname like ? ';
                                    $stmt = $bdd -> prepare($selectid);
                                    $stmt -> execute(array(
                                    $category
                                    ));

                                    if($stmt->execute())
                                    {
                                        $row = $stmt -> fetch();
                                        
                                        while($row)
                                        {
                                            
                                            $categoryid = $row['categoryid'];
                                            $row = $stmt -> fetch();
                                        }
                                        $verify = false;
                                        $requeteAllProducts = "select * from produit";
                                        $res = $bdd -> query($requeteAllProducts);
                                        
                                        $ligne = $res -> fetch();
                                        while($ligne)
                                        {
                                            if(($idpers == $ligne['email']) and ($nom == $ligne['productname']))
                                            {
                                                $verify = true;
                                                break;
                                            }
                                            else
                                                $ligne = $res -> fetch();
                                        }

                                        if($verify == true)
                                        {
                                            echo "<script>
                                            $('.alreadyuse').slideDown('slow');
                                            </script>";
                                            
                                        }
                                        else
                                        {
                                          $insertproduct->bindParam(':productname',$nom);
                                          $insertproduct->bindParam(':email',$idpers);
                                          $insertproduct->bindParam(':categoryid',$categoryid);
                                          $insertproduct->bindParam(':description',$description);
                                          $insertproduct->bindParam(':QuantiteStock',$stock);
                                          $insertproduct->bindParam(':prixU',$prix);
                                          $run=$insertproduct->execute();
                                          //fin de vérication des informations
                                      
                                  
                                          /*procédé à l'éxécution*/
                              
                                          if($run) 
                                          { 
                                      
                                              //LES images
                                              $requeteimg="insert into image(url,code) values(:url,:code)";
                                              $send=$bdd->prepare($requeteimg);
                                              $code=$bdd->lastInsertId();
                                              $url=faire();
                                              $send->bindParam(':url',$url);
                                              $send->bindParam(':code',$code);           
                                              $send->execute();
                                              echo "<script>
                                              $('.success').slideDown('slow');
                                              </script>";
                                                

                                          }    
                                          else 
                                          {
                                            echo "<script>
                                            $('.errorinsert').slideDown('slow');
                                            </script>";
                                          }
                                        }  
                                    }
                                    else
                                    {
                                      echo "<script>
                                            $('.errcategory').slideDown('slow');
                                            </script>";
                                    }
                                      
                                
                                } 
                                else
                                {
                                  echo "<script>
                                  $('.errquantstock').slideDown('slow');
                                  </script>";
                                }             
                            }
                            else
                            {
                              echo "<script>
                              $('.empty').slideDown('slow');
                              </script>";
                            
                            }
                        }                 
                                          
                      ?>
                          
                </div>
            </div>
        
        </div>

        
      </main>

      <!-- FOOTER -->
      <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
