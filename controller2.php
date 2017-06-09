<?php
session_start();
require_once('projectmodel.php');

require_once('projectview.php');



echo "hi";

if(isset($_POST['favelist']) && $_POST['favelist'] == 'list') {
//echo "hi";

    $useremail = $_POST['useremail'];

    $model = new projectmodel();


    try {
        $favelistadd = $model->favelist($useremail);
        $view->favelist($useremail);
    } catch(Exception $e) {
        // we want to redirect the user
        //some error message
    }
} else {
    //header('Location:index5.html');
}

?>