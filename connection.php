<!--ce code contient qlq fonctions concernant la connection 
-après avoir include this code to your code "include "connection.php"" vous pouvez en servir de :


-->

<!Doctype html>

<html>
<body>

<?php 

class database 
{   
    private $conn;
   

        
    public function connection($servername,$usarname,$password,$bd_name){
        //create connection
        //$conn= new mysqli($servername,$usarname,$password);
        
    
        $this->conn = new PDO("mysql:host=$servername;dbname=$bd_name",$usarname,$password);
        
        //check connection
        try{
            
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<br>Connected successfully"; 

        }catch(PDOException $e)
        {
            echo "<br>connection failed :" .$e->getMessage();
        }
    
        
    }
   
    public function close_connection(){
        $this->conn = null;
        echo "<br>connection closed";
        
    }

    public function create_table($sql){
        try{
            $this->conn->exec($sql);
            echo "<br>Table created successfully";
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }
        
    }

    public function insert_inscription($firstname,$lastname,$email,$password,$date_de_naissance,$home,$Gender){
        $sql = "INSERT INTO inscription(firstname,lastname,email,password,date_de_naissance,home,Gender)VALUES('$firstname','$lastname','$email','$password','$date_de_naissance','$home','$Gender')";
        //echo "<br>$sql";
        try{
            $this->conn->exec($sql);
            echo "<br>new record successfully inserted";
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }

    }
    public function insert_client($name,$Ville){
        $sql = "INSERT INTO client(Name,Ville)VALUES('$name','$Ville')";
        echo "<br>$sql";
        try{
            $this->conn->exec($sql);
            echo "<br>new client successfully added";
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }

    }
    public function insert_commande($name,$fournisseur){
        $sql = "INSERT INTO commande(Nom_commande,fournisseur)VALUES('$name','$fournisseur')";
        echo "<br>$sql";
        try{
            $this->conn->exec($sql);
            echo "<br>new command successfully added";
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }

    }
    public function search_client($name,$Ville){
        $sql = "SELECT * FROM client WHERE Name LIKE '$name' AND Ville LIKE '$Ville';";
        echo "<br>$sql";
        try{
            //$test = $this->conn->prepare($sql);
            $test =$this->conn->query($sql);
            if($test->fetchColumn()>0){
                echo "<br><ins>vous etes notre fidel client</ins>";
                return 1;
            }           
            else{
                echo "<ins> nouveau client </ins>";
                return 0;
            }
            
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }
    }

    public function search_commande($name,$fournisseur){
        $sql = "SELECT * FROM commande WHERE Nom_commande LIKE '$name' AND fournisseur LIKE '$fournisseur';";
        echo "<br>$sql";
        try{
            //$test = $this->conn->prepare($sql);
            $test =$this->conn->query($sql);
            if($test->fetchColumn()>0){
                echo "<br><ins>la commande existe </ins>";
                return 1;
            }           
            else{
                echo "<ins> nouveau commande </ins>";
                return 0;
            }
            
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }
    }
    public function verify_account($email,$password){
        $sql = "SELECT * FROM inscription WHERE email LIKE '$email' AND password LIKE '$password';";
       // $sql = "SELECT * FROM inscription";
        echo "$sql";
        try{
            //$test = $this->conn->prepare($sql);
            $test =$this->conn->query($sql);
            if($test->fetchColumn()>0)
           // $test->execute();
            //$result = $test->fetch(PDO::FETCH_ASSOC);
            //if($result->rowsCount() >= 1){
                echo "<ins>vous etes connecte</ins>";
            //}
            else{
                echo "<ins> le password ou email sont pas correctes";
            }
            
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }

    }

    public function insert_achat($nameClient,$Ville,$nameCommande,$fournisseur){
        $sql = "insert into achat (idClient, idCommande) 
                VALUES (
                    (SELECT id 
                        FROM client 
                        WHERE Name = '$nameClient' AND Ville = '$Ville')
                    , (SELECT id
                        FROM commande
                        WHERE Nom_Commande = '$nameCommande' AND fournisseur = '$fournisseur')
                );";
        echo "<br>$sql";
        try{
            $this->conn->exec($sql);
            echo "<br>new achat successfully added";
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }

    }

    public function historique_client($name){
        $sql = "SELECT idCommande,achat.reg_date 
        FROM achat LEFT JOIN client
        ON client.id= achat.idClient
        WHERE client.Name ='$name';";
        
        echo "<br>$sql<br>";
        echo "<br><br><h4>les commandes de <ins>$name</ins>: </h4><br><br>";
        try{
            ?><div class="row">
                    <div class = "col">
                        <b>commande</b>
                    </div>
                    <div class = "col">
                        <b>date</b>
                    </div>
                </div>
            
            <hr style="width: 100%; background: none repeat scroll 0% 0% #FF0000; height: 5px;" /> <?php

            $test = $this->conn->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $test->execute();
           
           
            while ($row = $test->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                //$data = $row[0]."\t".$row[1]."<br>";
                $sql1 = "SELECT Nom_Commande 
                From commande
                WHERE commande.id=".$row[0].";";
                $test1 = $this->conn->prepare($sql1,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $test1->execute();
                $row1 = $test1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
                ?><div class="row">
                    <div class = "col">
                        
                        <?php print $row1[0] ?>
                        
                    </div>
                   
                    <div class = "col">
                        
                            <?php print $row[1] ?>
                    </div>
                </div>
            
                <hr style="width: 100%; background: none repeat scroll 0% 0% #FF0000; height: 5px;" /> <?php
                //$data = $row1[0] . "\t" . $row[1] . "<br>";
                //print $data;
            }
            $test = null;
        }
        catch(PDOException $e){
            echo "<br>error :".$e->getMessage();
        }
    }
}




/*$sql = "CREATE TABLE Inscription (
    id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email_num VARCHAR(50) NOT NULL,
    date_naissance VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$data->create_table($sql);*/

/*$data = new database ;
$data->connection("localhost","root","","inscription");
$data->insert_inscription("'tizi'","'youness'","'younesstizi@gmail.com'",'$_POST[1998-10-06]');
$data->close_connection();

if(isset($_POST["firstname"])){
    $data = new database;
    $data->connection("localhost","root","","inscription2");
    $data->insert_inscription($_POST["firstname"],$_POST["lastname"],$_POST["email"]);
    $data->close_connection();
  }
*/


?>


</body>

</html>