<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap stuff -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fanhub</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<?php
session_start();
$_SESSION['loggedin'] = true;
 $_SESSION['artisturlname'] = htmlspecialchars($_GET["myvar"]);
require_once('projectview.php');
        

$view = new projectview();


$view->filloutartist($_GET["myvar"]);


?>


    <style type="text/css"> 

   #userimgdiv {
        text-align: center;

    }

     .linear-gradient {
        background: linear-gradient(#b3daff, transparent); 
        background-repeat: no-repeat;

    }


    .navbar-custom {
        background-color:#000000;
        color:#ffffff;
        border-radius:0;
    }
#welcomeheader{
        text-align: center;
    }

    #userimg {
            height: 200px;

            width: 200px;
            object-fit: cover;

            overflow: hidden;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border:7px solid #FFFFFF;
        }


        #tablewrap {
            margin: 50px;

        }



    .wrapper { 
/*  border : 2px solid #000; 
*/  overflow:hidden;
padding: 25px;
}

.wrapper div {
 min-height: 200px;
 padding: 10px;
}
#myartists {
  background-color: gray;
  float:left; 
  margin-right:20px;
  width:140px;
/*  border-right:2px solid #000;
*/}
#myfeed { 
  background-color: white;
  overflow:hidden;
  margin:10px;
  border:2px dashed #ccc;
  min-height:50px;
}

.feedclass {

  background-color: white;
  overflow:hidden;
  margin:10px;
  border:2px dashed #ccc;
  min-height:50px;

}

@media screen and (max-width: 400px) {
 #myartists { 
    float: none;
    margin-right:0;
    width:auto;
    border:0;
    border-bottom:2px solid #000;    
}
}

#loggedinas:hover {background-color: transparent;
  color: #999999;

}

#loggedinas:focus {background-color: transparent;
  color: #999999;
    
}


</style>

<div id="navigation">
    <nav id="navbaritself" class="navbar navbar-custom">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="userpage.php">Fanhub</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="addartist.php">Add Artist</a></li>
        <li><a href="#">Settings</a></li>
        <li><a id= "loggedinas" href="#"><?php
//session_start();
   //Read your session (if it is set)
         if (isset($_SESSION['username'])){
          echo $_SESSION['username'];
      }
      else {
        echo "Please set your name in settings";
    }

    ?></a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <form class="navbar-form navbar-right">
        <input type="text" id="searchbox" class="form-control" placeholder="Search...">
        <input type="submit" id="searchsubmit">
    </form>
</div>
</div>
</nav>
</div>



</head>

<body class="linear-gradient">


<div id="favelinkwrapper"> 

<a id="favelink" href="#">Add to Favorites</a>



</div>

<h1 id="welcomeheader"><?php if (isset($_SESSION['artisturlname'])){
        echo $_SESSION['artisturlname'];
    }
    ?></h1>

    </h1>
    <div id="userimgdiv">
        <img src="sampleuser.jpg" id="userimg" class="img-circle" alt="Cinque Terre" align= "middle">
        <h4><?php
   //Read your session (if it is set)
         if (isset($_SESSION['last2']) && isset($_SESSION['first2'])){
          echo $_SESSION['first2'] . " " . $_SESSION['last2'];
      }
      else {
        echo "Please set your name in settings";
    }

    ?></h4>
    <span class="text-muted">Artist</span>
</div>


<div>


</div>


</div>



<div class="wrapper">

    <div id="myartists">

        this is my artists
    </div>



    <div id="myfeed" class="feedclass">
<table class="table" id="matable">
  <thead class="thead-inverse">
    <tr>
      <th>Stagename</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Birthday</th>
      <th>description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><?php
   //Read your session (if it is set)
         if (isset($_SESSION['stagename2'])){
          echo $_SESSION['stagename2'];
      }
      else {
        echo "Stagename not set";
    }
    ?></th>
      <td><?php
   //Read your session (if it is set)
         if (isset($_SESSION['last2'])){
          echo $_SESSION['last2'];
      }
      else {
        echo "Last name not set";
    }
    ?></td>
      <td><?php
   //Read your session (if it is set)
         if (isset($_SESSION['first2'])){
          echo $_SESSION['first2'];
      }
      else {
        echo "First name not set";
    }
    ?></td>
      
      <td><?php
   //Read your session (if it is set)
         if (isset($_SESSION['birthday2'])){
          echo $_SESSION['birthday2'];
      }
      else {
        echo "Birthday not set";
    }
    ?></td>
      <td><?php
   //Read your session (if it is set)
         if (isset($_SESSION['description2'])){
          echo $_SESSION['description2'];
      }
      else {
        echo "Description not set";
    }
    ?></td>

    </tr>
  
  </tbody>
</table>
    </div>

</div>

<!-- embed dynamically made twitter out of hashtag using artist stage name
 -->

 <div class="feedclass">
            <a class="twitter-timeline"  href="https://twitter.com/hashtag/ladygaga" data-widget-id="872943995458125825" data-screen-name="<?php
   //Read your session (if it is set)
         if (isset($_SESSION['twitter2'])){
          echo $_SESSION['twitter2'];
      }
      else {
        echo "Stagename not set";
    }
    ?>"><?php
   //Read your session (if it is set)
         if (isset($_SESSION['twitter2'])){
          echo $_SESSION['twitter2'];
      }
      else {
        echo "Stagename not set";
    }
    ?> Tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          

</div>












<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="javascriptneeds.js"></script>
<!-- my own script -->
<!-- <script src="tablehw4.js"></script>
--></body>
</html>



