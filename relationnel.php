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

    <div class="row">
            
        <div class="col" >
            <h4 class="font-weight-bold" style="margin-top:60px;margin-left:60px">phase command:</h4>
            <form action="" method="POST" style="margin-top:45px;margin-left:10px">
                <div class="col-8 form-group">
                    <input type="text" class="form-control" name="nameClient" placeholder="name..." required><br>
                    <input type="text" class="form-control" name="ville" placeholder="ville..." required><br>
                    <hr style="width: 100%; background: none repeat scroll 0% 0% #FF0000; height: 5px;" /> 
                    <input type="text" class="form-control" name="Commande" placeholder="Votre Commande..." required><br>
                    <input type="text" class="form-control" name="Fournisseur" placeholder="Fournisseur..." required><br>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                    <button type="submit" class="btn ">commander/enregistrer</button>
                    
                </div>
             
                
                                
            </form>
            <form action="" method ="POST">
                <div class="row offset-1 col-4">
                    <input type="text" class="form-control" name="searchClient" placeholder="historique de votre client.." required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                    <button type="submit" class="btn btn-secondary ">afficher</button>
                </div>
            
            </form>

           
        </div>

        <div class="col">
            <h4 class="font-weight-bold" style="margin-top:60px;margin-left:70px">phase Comments:</h4>
            <h6 class="mb-2 text-dark text-left col">C'est une relation mode <b><ins>n-n</ins></b>.</h6>

            <?php
                include("connection.php");
                    $data = new database ;
                    if(isset($_POST["nameClient"]) && isset($_POST["Commande"]) && $_POST["Fournisseur"]){
                        $data->connection("localhost","root","","inscription2");
                        if(!($data->search_client($_POST["nameClient"],$_POST["ville"]))){
                            $data->insert_client($_POST["nameClient"],$_POST["ville"]);
                        } 
                        
                        ?><hr style="width: 100%; background: none repeat scroll 0% 0% #FF0000; height: 5px;" /> <?php
                        if(!($data->search_commande($_POST["Commande"],$_POST["Fournisseur"]))){
                            $data->insert_commande($_POST["Commande"],$_POST["Fournisseur"]);
                        } 

                        ?><hr style="width: 100%; background: none repeat scroll 0% 0% #FF0000; height: 5px;" /> <?php
                        
                        $data->insert_achat($_POST["nameClient"],$_POST["ville"],$_POST["Commande"],$_POST["Fournisseur"]);
                        $data->close_connection();
                    }
                    elseif(isset($_POST["searchClient"])){
                        $data->connection("localhost","root","","inscription2");
                        $data->historique_client($_POST["searchClient"]);
                        $data->close_connection();
                    
                    }
                    else{
                        echo"non valider";
                    }
                    
            ?>

        </div>

     
    </div>



</body>

</html>