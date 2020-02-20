<!DOCTYPE html>
<html lang="eng">
<head>

<title>monsite-SignIn</title>

<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="test.css" />
<link rel="stylesheet" href="all.css" /> <!--this is for pictures styles!-->
<!--these links are for javascript-code for animations-->
<script src="javascriptcode.min.js"></script>
<script src="javascriptcode2.min.js"></script>
<script src="javascriptcode3.min.js"></script> 


</head>

<body>
            
    <div class="container-flex" >
        <div class="card ">
            <!--<img src="fish.jpg" class="card-img" alt="fish background">-->
    
            <div class="card-img-overlay">
                <!-- the SIGN IN pane .. l'astuce is to devise it en 4 or five equals columns!-->
                <div class="row">
              

                    <!--la troixième partie-->
                    <div class="col-6 offset-5 ">
                        <!--description de l'inscription -->
                        <br>
                        <div class=" text-dark ">
                            <h1><b> Inscription</b></h1>
                            <h6 class="mb-2 text-dark text-left col">C'est <b><ins>GRATUIT</ins></b> et ca restera pour toujours.</h6>
                        </div>
                               

                        <!--form d'inscription-->
                        <form class="form-inline" action="inscription.php" method="POST">
                            <input type="text" class="form-control mb-2 mr-sm-2" name="firstname" placeholder="Your First Name..">
                            <input type="text" class="col-5 form-control mb-2 mr-sm-2" name="lastname" placeholder="Your Last Name..">
                            <input type="text" class="col-8 form-control mb-2 mr-sm-2" name="email" placeholder="numéro de mobile ou email..">
                            <input type="password" class="col-8 form-control mb-2 mr-sm-2" name="password" placeholder="nouveau mot de passe..">
                            <input type="password" class="col-8 form-control mb-2 mr-sm-2" name="mdp_verification" placeholder="réecrire votre mot de passe..">
                                   
                        
                        <!--date de naissance-->
                            <div class="w-100"></div>
                            <label for="datedenaissance" class="text-dark mr-sm-2" ><b>Date  de  naissance :</b></label>
                            <input type="datetime" class="col-3 form-control form-control-sm mb-2 mr-sm-2" name="datedenaissance" placeholder="YYYY/MM/JJ">
                            <input type="text" class="col-5 form-control form-control-sm mb-2 mr-sm-2" name="home" placeholder="where?..">
                        
                        <!--gender-->
                            <div class="text-success">
                                <div class="form-check-inline">
                                    <label class="form-check-label  mr-sm-2" for="homme" >
                                        <input type="radio" class="form-check-input " name="option_gender" value="homme">homme
                                    </label>
                                </div>
                        <!--l'astuce ici c'est de faire le meme "name" pour que on aura une seule option choisit à la fois !!!-->
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="Femme">
                                        <input type="radio" class="form-check-input " name="option_gender" value="Femme">Femme
                                    </label>
                                </div>
                                <div class="form-check-inline" for="personnalise">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input " name="option_gender" value="Personnalisé">Personnalisé
                                    </label>
                                </div>

                        <!--le boutton de validation -->
                                <br><br>
                                <button type="submit" class="btn btn-secondary mr-sm-2">inscription</button>
                                <button type="reset" class="btn btn-primary mr-sm-2">reset</button>
                            </div>
                
                        </form>
                       
                        <!--mon label d'inscription-->
                            <br><br>
                            <p class="bg-light  border border-light rounded-top">
                                En appuyant sur Inscription, vous acceptez <ins>nos Conditions générales</ins>,
                                notre Politique d’utilisation des données et notre Politique d’utilisation des cookies.
                                Vous recevrez peut-être des notifications par texto de notre part 
                                et vous pouvez à tout moment vous désabonner.

                            </p>
                                
                          

                    </div>
                
                </div>
            </div>
        </div>
    </div>        
</body>



        