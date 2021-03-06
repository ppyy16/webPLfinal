

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


      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 


    <script> <?php session_start(); 

    if (!isset($_SESSION['username'])){
          header('Location:index5.html');
}
?> </script>

    <style type="text/css"> 

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
    } 

    body{
        padding-top:60px;
    }


    #welcomeheader{
        text-align: center;
    }

    #navigation {
        padding-bottom: 60px;
    }

    #userimgdiv {
        text-align: center;

    }

    #linear-gradient {
        background: linear-gradient(#b3daff, transparent); 
        background-repeat: no-repeat;

    }


    .navbar-custom {
        background-color:#000000;
        color:#ffffff;
        border-radius:0;
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
  min-height:170px;
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

#searchbarcontainer{
margin-left : 500px ;
margin-right : 500px ;
       
  
}
/*a:hover,a:visited { color:#000; }
*/

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
        <a class="navbar-brand" href="#">Fanhub</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="addartist.php">Add Artist</a></li>
      
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

    
</div>
</div>
</nav>
</div>



</head>

<body id="linear-gradient" class="PageType">




<div id="searchbarcontainer">
    <form action='' method='post'>
        <p><label>Artist Search:</label><input id="searchbar" type='text' name='country' value='' class='auto'></p>

    </form>

    </div>


    <h1 id="welcomeheader">Welcome <?php if (isset($_SESSION['firstname'])){
        echo $_SESSION['firstname'];
    }
    ?>!</h1>
    <div id="userimgdiv">
        <img src="whyunosave.jpg" id="userimg" class="img-circle" alt="Cinque Terre" align= "middle">
        <h4><?php
   //Read your session (if it is set)
         if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
          echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
      }
      else {
        echo "Please set your name in settings";
    }

    ?></h4>
</div>


<div class="wrapper">
<a id="getartists" href="#"><span class="glyphicon glyphicon-refresh"></span>Refresh Artists</a><br><br>
<strong>My Artists</strong><br>
    <div id="myfeed">
    
        
    </div>

</div>









<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    


<script src="listfavorites.js"></script>
<script>
jQuery(function(){
   jQuery('#getartists').click();
});
</script>
<script src="javascriptneeds.js"></script>
<!-- my own script -->

</body>
</html>
