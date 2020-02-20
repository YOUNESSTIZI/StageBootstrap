<!DOCTYPE html>
<html lang="eng">
<head>

<title>monsite-Login</title>

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
           <img src="fish.jpg" class="card-img" alt="fish background">
    
            <div class="card-img-overlay">
                
                <div class="text-center row">

                    <div class="col-4">
                        <a href="sitetest.html" title="hello again"><img  class="col-lg-15 card-img-top" style="margin-top:100px;margin-left:90px" src="" alt="logo"></a>
                    </div>
            
                    

                        <div class="col-5 "style="margin-left:160px" >
                            <!-- the LOGIN pane-->
                            <h2 class="card-title text-center text-white " style="margin-top:160px;margin-left:10px">WELCOME BACK AMIGO !</h2>
                           
                            <form  action="login.php" Method='POST' >
                                <!--email address-->
                                <div class="form-group ">
                                    <!--<label for="email" >Email address:</label>-->
                                    <!--small control form-control-sm-->
                                    <input type="email" class="form-control form-control-sm  mx-sm-5 mb-5 text-center" name="email" placeholder="email">
                                                                
                                                    
                                </div>
                                                    
                                <!--code-->
                                <div class="form-group  ">
                                    <!--<label for="pwd" >Password:</label>,,form-control-plaintext to make hidden case-->
                                    <input type="password" class="form-control form-control-sm mx-sm-5 mb-5 text-center" name="password" placeholder="password">
                                </div>
                            
                                <!--checkbox remembering-->
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class=" form-check-input " type="checkbox"><kbd>Remember me</kbd> 
                                    </label>
                                </div>
                            
                                <!--valider-->
                                                          
                                <button type="submit" class="btn btn-success ">Valider</button>
                                                            
                            </form>
                            <?php
                                include("connection.php");
                                if(isset($_POST["email"]) && isset($_POST["password"])){
                                    echo "<br> buenos ";
                                    $data = new database;
                                    $data->connection("localhost","root","","inscription2");
                                    $data->verify_account($_POST["email"],md5($_POST["password"]));
                                    $data->close_connection();  
                                }
                            ?>
                                                
                            <!--<img class="img-fluid" src="walid.jpg" alt="Chania" width="460" height="345"> -->
                           
                        </div>

                    
            
                </div>
            </div>    
        </div>
    </div>    
</body>



        