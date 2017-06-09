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


if(isset($_POST['submitartistform']) && $_POST['submitartistform'] == 'submit') {
    $artiststagename = $_POST['artistnamelabel'];
    $artistfullname = $_POST['artistfullnamelabel'];
    $artistbirthday = $_POST['artistbirthday'];
    $artistdesc = $_POST['artistdesc'];
    $artistfulllastnamelabel = $_POST['artistfulllastnamelabel'];
    $artisttwitter = $_POST['artisttwitter'];

    
    //verify that username and password are correct
    $model = new projectmodel();

    //echo "foo";
    
//send to new model to add artist
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






//autosearch

if (isset($_GET['term'])){

 

$autosearch = $_GET['term'];



    $model = new projectmodel();

try {
    $finalsearch = $model->autosearch($autosearch);
    $view->autosearch($autosearch);



    }

    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


}




//faves controller

if(isset($_POST['ifave4u']) && $_POST['ifave4u'] == 'addtofaveyes') {
//echo "hi";

    $addtofave = $_POST['addtofave'];
    $useremail = $_POST['useremail'];

    $model = new projectmodel();


    try {
        $addartisttofaves = $model->addartisttofaves($addtofave, $useremail);
    } catch(Exception $e) {
        // we want to redirect the user
        //some error message
    }
} else {
    //header('Location:index5.html');
}















//fave lister
//if the post request says i list4 you and the value is let me in then
if(isset($_POST['ilist4u']) && $_POST['ilist4u'] == 'letmein') {
//echo "hi";
    //make a variable called emailextract4 that holds the user email

    $emailextract4 = $_POST['emailextract4'];

    //set up a new model and send it off with the variable you just made

    $model = new projectmodel();

    //send model off with variable and catch try it

    try {
        $artistlistdisplayfinal = $model->artistlistdisplay($emailextract4);
    } catch(Exception $e) {
        // we want to redirect the user
        //some error message
    }
} else {
    //header('Location:index5.html');
}











?>