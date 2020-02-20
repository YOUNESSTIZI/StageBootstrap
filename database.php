
<!Doctype html>

<html>
<body>
<!--après avoir include this code to your code "include "database.php"" vous pouvez en servir de :



-- function database($database_name):c'est un void qui sert à créer la database!

-- function drop_database($database_name);c'est un void :supprimer une data deja créer!

-- function use_database($database_name)

-->

<?php 

class database //cette classe sert à créer /controller /modifier la base de donnée
{
    private $database;
    private $connection ;
    
    //= new connection(); ca n'a pas marché

    
    public function set_connection($conn){
        $this->connection = $conn;
    }

    public function set_database($data_base){
        $this->database = $data_base;
    }

    public function database_name($database_name){
        //creation d'une database dans ma coonection $conn 

        $sql =" CREATE DATABASE $database_name";

        $x = $this->connection;//this is to avoid $this-conn->close() at line 63
        set_database();
        if($this->database){
            echo "<br>votre database $database_name a ete bien creer";
            
        }
        else{
            echo "<br>la database $database_name <marked>n'a ete pas bien creer!</marked>";
        }
     
    
    }

    
    public function use_database($database_name){
        //usage d'une database
        $sql = "USE $database_name";

        $x = $this->connection;//this is to avoid $this-conn->..() 

        if($x->query($sql)){
            echo "<br>votre database $database_name est bien en usage";
            $this->database = $x->query($sql);
            
        }
        else{
            echo "<br>la database $database_name <marked> n'est pas bien en usage! </marked>";
        }
    }



    public function drop_database($database_name){
        //supprimer la database déja crée
        $sql = "DROP DATABASE $database_name ";
        $x = $this->connection;//this is to avoid $this-conn->close() 
        if($x->query($sql)){
            echo "<br> la database $database a ete bien supprime";
        }
        else{
            echo "<br>la database $database <marked>n'a ete pas bien creer!</marked>";
        }
    }
    
    
   
}

?>


</body>

</html>