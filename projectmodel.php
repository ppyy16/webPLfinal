<?php
/*
 * projectmodel
 */

require_once('/home/ps4ww/.mysqlpass.inc.php');

class projectmodel {
    private static $host='localhost';
    private static $user='dbuser';
    private static $db = 'fanhub';
    
    private $connection;
    
    public function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host=" . self::$host,
                self::$user,
                MySQLPassword::$password
                );
        } catch (PDOException $e) {
            // failure to connect
            throw new Exception("Could not connect: " . $e->getMessage());
        }
        
        if(!$this->connection->query("USE " . self::$db)) {
            throw new Exception("Could not select Database");
        }
        
    }
    
    /*
     * return true if $user and $pass are in the students table,
     * otherwise throw an exception
     */
    
    public function verify_login($user, $pass) {
        $prepared = $this->connection->prepare(
            "SELECT password FROM users WHERE email = :email"
            );
        
        if(!$prepared->execute([":email" => $user])) {
            // FAILING TO EXECTURE THE QUERY
            throw new Exception("FATAL ERROR SEND IN BACKUPS!");
        }
        
        if($prepared->rowCount() == 0 ) {
            //alert("Login failed");
            throw new Exception("User $user not found");
        }
        
        $row = $prepared->fetch(PDO::FETCH_ASSOC);
        $stored_pass = $row['password'];
        
        if(sha1($pass) != $stored_pass) {
            throw new Exception("Password wrong");
            //alert("Login failed");
        }
        
        return true;
    }


    //take in username and return name
    public function getfirstname($user) {
        $prepared = $this->connection->prepare(
            "SELECT * FROM users WHERE email = :email"
            );

        $prepared->execute([":email" => $user]);
        foreach ($prepared->fetchAll(PDO::FETCH_ASSOC) as $row) { 
            'Name: '. $row['firstname'];
        }


        
        if(!$prepared->execute([":email" => $user])) {
            // FAILING TO EXECTURE THE QUERY
            throw new Exception("FATAL ERROR SEND IN BACKUPS! (query failed)");
        }
        
        if($prepared->rowCount() != 1 ) {
            // no results
            throw new Exception("Error getting your information");
        }

        
        
        return $row['firstname'];
    }



//get user last name
    public function getlastname($user) {
        $prepared = $this->connection->prepare(
            "SELECT * FROM users WHERE email = :email"
            );

        $prepared->execute([":email" => $user]);
        foreach ($prepared->fetchAll(PDO::FETCH_ASSOC) as $row) { 
            'Last: '. $row['lastname'];
        }


        
        if(!$prepared->execute([":email" => $user])) {
            // FAILING TO EXECTURE THE QUERY
            throw new Exception("FATAL ERROR SEND IN BACKUPS! (query fail)");
        }
        
        if($prepared->rowCount() != 1 ) {
            // no results
            throw new Exception("Error getting your information");
        }

        
        
        return $row['lastname'];
    }



 //adds artists to the database
    public function addartist($artiststagename, $artistfullname, $artistfulllastnamelabel, $artistbirthday, $artistdesc, $artisttwitter){
       $prepared = $this->connection->prepare(
        "INSERT INTO artists (stagename, first, last, birthday, description, twitterid) VALUES (:stagename, :first, :last, :birthday, :description, :twitter);"
        );



       if(!$prepared->execute(array(
        ":stagename" => $artiststagename,
        ":first" => $artistfullname,
        ":last" => $artistfulllastnamelabel,
        ":birthday" => $artistbirthday,
        ":description" => $artistdesc,
        ":twitter" => $artisttwitter
        ))) {
            // FAILING TO EXECTURE THE QUERY
        throw new Exception("FATAL ERROR SEND IN BACKUPS! (query)");
}

if($prepared->rowCount() == 0 ) {
            // no results
    throw new Exception("Error adding your artist");
}



return;


}




//fillout the page for the artist
public function filloutartist($artiststagename){
    $artisttable = array();

    $prepared = $this->connection->prepare("SELECT * FROM artists WHERE stagename =:stagename");
    $prepared->execute([":stagename" => $artiststagename]);


    while($row = $prepared->fetch(PDO::FETCH_ASSOC)) {
        $artisttable[] = $row;  
    }




    if(!$prepared->execute(array(
        ":stagename" => $artiststagename
        ))) {
            // FAILING TO EXECTURE THE QUERY
        throw new Exception("FATAL ERROR SEND IN BACKUPS! (query)");
}

if($prepared->rowCount() == 0 ) {
            // no results
    throw new Exception("Error adding your artist");
}

//print_r($fullarray);
if($artisttable == null){
    throw new Exception("Error adding your artist");

}


return $artisttable;

}



//autosearch
public function autosearch($autosearch){
    $return_arr = array();



    try {
        $stmt = $this->connection->prepare('SELECT stagename FROM artists WHERE stagename LIKE :term');
        $stmt->execute(array(':term' => '%' .$autosearch. '%'));
        
        while($row = $stmt->fetch()) {
            $return_arr[] =  $row['stagename'];
        }


        if( count($return_arr) == null ){
            $return_arr[] = 'No matches found';

        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    return $return_arr;
}




//add artist to faves
//need to get username of the person clicking it............

public function addartisttofaves($addtofave, $useremail) {
    //check for duplicates


    $prepared = $this->connection->prepare(
        "INSERT INTO userfavorites (stagename, email) VALUES (:stagename, :email);"
        );


    if(!$prepared->execute(array(
        ":stagename" => $addtofave,
        ":email" => $useremail
        ))) {
            // FAILING TO EXECTURE THE QUERY
        throw new Exception("FATAL ERROR SEND IN BACKUPS! (query)");
}

if($prepared->rowCount() == 0 ) {
            // no results
    throw new Exception("Error adding your artist to your favorites");
}


return;


}



//fave list biz log

public function favelist($useremail){
    $return_arr = array();
    $prepared = $this->connection->prepare(
        "SELECT * FROM userfavorites WHERE email = :email"
        );

    

    if(!$prepared->execute([":email" => $useremail])) {
            // FAILING TO EXECTURE THE QUERY
        throw new Exception("FATAL ERROR SEND IN BACKUPS! (query fail)");
    }


    foreach ($prepared->fetchAll(PDO::FETCH_ASSOC) as $row) { 
        $return_arr[] =  $row['stagename'];
    }

    if($prepared->rowCount() == 0 ) {
            // no results
        throw new Exception("Error getting your information");


    }


    return $return_arr;
}





//register biz log
public function reguser($userfirstname, $userlastname, $userpassword ,$useremail, $userbirthday)
{

//duplicate check
//SELECT COUNT(*) FROM users WHERE email = $useremail;
    $prepared2 = $this->connection->prepare(
        "SELECT * FROM users WHERE email = :email;");

 //results is the error   
    $results = $prepared2->execute([":email" => $useremail]);


    if($prepared2->rowCount() != 0 ) {
        return false;
    }



    $prepared = $this->connection->prepare(
        "INSERT INTO users (firstname, lastname, password, birthday, email) VALUES (:firstname, :lastname, sha1(:password), :birthday, :email);"
        );


    if(!$prepared->execute(array(
        ":firstname" => $userfirstname,
        ":lastname" => $userlastname,
        ":password" => $userpassword,
        ":birthday" => $userbirthday,

        ":email" => $useremail
        ))) {
            // FAILING TO EXECTURE THE QUERY
        throw new Exception("FATAL ERROR SEND IN BACKUPS! (query)");
}

if($prepared->rowCount() == 0 ) {
            // no results
    throw new Exception("Error registering");
}



return true;

}


}


?>