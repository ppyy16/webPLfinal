<?php
session_start();
require_once('projectmodel.php');

require_once('projectview.php');




//@TODO: ERORR HANDLING NEEDS TO BE MANAGED
//wrong password popup not showing
//getting information from the user after login and confirming login here
if(isset($_POST['cmd']) && $_POST['cmd'] == 'login') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    //verify that username and password are correct
    $model = new projectmodel();
    
    try {
        $login = $model->verify_login($user, $pass);
        //setcookie('loggedIn', 'yes');
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        $firstname = $model->getfirstname($user);
        $_SESSION['firstname'] = $firstname;
        $lastname = $model->getlastname($user);
        $_SESSION['lastname'] = $lastname;

        echo "Login succeeded";
        header('Location:userpage.php');
        //give failed password error pls
    } catch(Exception $e) {
        // we want to redirect the user
        //echo "Login failed: " . $e->getMessage();
        //echo "login failed";

    }
} else {
    //header('Location:index5.html');
    //echo "Login failed: " . $e->getMessage();
}


//new instance of view to use
$view = new projectview();

//add new artist form js runs in addartist.js
if(isset($_POST['submitartistform']) && $_POST['submitartistform'] == 'submit') {
    $artiststagename = $_POST['artistnamelabel'];
    $artistfullname = $_POST['artistfullnamelabel'];
    $artistbirthday = $_POST['artistbirthday'];
    $artistdesc = $_POST['artistdesc'];
    $artistfulllastnamelabel = $_POST['artistfulllastnamelabel'];
    $artisttwitter = $_POST['artisttwitter'];

    
    
    $model = new projectmodel();


    try {


        $addartist = $model->addartist($artiststagename, $artistfullname, $artistfulllastnamelabel ,$artistbirthday, $artistdesc, $artisttwitter);
        
    } catch(Exception $e) {
        //we couldnt run it so redirect or refresh page?
    }
} else {
    //header('Location:index5.html');
}

//is search term existing and is it not empty
if(isset($_POST['isearch4u']) && $_POST['isearch4u'] == 'do it') {
//echo "hi";

    $artiststagename = $_POST['searchterm'];

    $model = new projectmodel();


    try {
        $searchartist = $model->searchartist($artiststagename);
    } catch(Exception $e) {
        // we want to redirect the user
        //some error message
    }
} else {
    //header('Location:index5.html');
}






//autosearch controller
if (isset($_GET['term'])){



    $autosearch = $_GET['term'];



    $model = new projectmodel();

    try {
        $finalsearch = $model->autosearch($autosearch);
        $view->autosearch($autosearch);



    }

    catch(PDOException $e) {
        //echo 'ERROR: ' . $e->getMessage();
    }


}




//artist faves controller
if(isset($_POST['ifave4u']) && $_POST['ifave4u'] == 'addtofaveyes') {
//echo "hi";

    $addtofave = $_POST['addtofave'];
    $useremail = $_POST['useremail'];

    $model = new projectmodel();


    try {
        $addartisttofaves = $model->addartisttofaves($addtofave, $useremail);
    } catch(Exception $e) {
        //echo 'ERROR: ' . $e->getMessage();
    }
} 







//favorites list controller function
if(isset($_POST['favelist']) && $_POST['favelist'] == 'list') {


    $useremail = $_POST['useremail'];

    $model = new projectmodel();


    try {
        $favelistadd = $model->favelist($useremail);
        $view->favelist($useremail);
    } catch(Exception $e) {
        //echo 'ERROR: ' . $e->getMessage();
    }
} 



//registeration control check -> goes to registeruser.js
if(isset($_POST['submitregform']) && $_POST['submitregform'] == 'yes') {
    $userfirstname = $_POST['userfirstname'];
    $userlastname = $_POST['userlastname'];
    $userpassword = $_POST['userpassword'];
    $useremail = $_POST['useremail'];
    $userbirthday = $_POST['userbirthday'];

    
    
    $model = new projectmodel();

    
//send to new model and run it based on it
    try {


        $addartist = $model->reguser($userfirstname, $userlastname, $userpassword ,$useremail, $userbirthday);
        if(!$addartist) {
            echo "duplicate user";
        }
        else {
            echo "duplicate user";
        }
        
    } catch(Exception $e) {
       //echo 'ERROR: ' . $e->getMessage();
    }
} 


?>