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

  <style type="text/css"> 

    <script> <?php session_start(); ?> </script>



    #navigation {
      padding-bottom: 20px;
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

    .form-group {
     padding-right: 20px;
     padding-left: 20px;
   }
 </style>


 <!-- navigation -->
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
          <li><a href="#" class="not-active" >Add Artist</a></li>
         
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

<body class="linear-gradient">




  <!-- artist add form -->
  <!-- need success for artist name from bootstrap and need to make sure input is okay checks-->
  <form id="submitartistform" method="POST">
    <div class="form-group">
      <label for="artistnamelabel">Artist Name (stage)</label>
      <input type="text" class="form-control" name="artistnamelabel" id="artistnamelabel" placeholder="Lady Gaga">
    </div>
    <div class="form-group">
      <label for="artistfullname">Artist First Name</label>
      <input type="text" class="form-control" id="artistfullnamelabel" name="artistfullnamelabel" placeholder="Stefani">
    </div>
    <div class="form-group">
      <label for="artistfulllastname">Artist Last Name</label>
      <input type="text" class="form-control" id="artistfulllastnamelabel" name="artistfulllastnamelabel" placeholder="Germanotta">
    </div>
    <div class="form-group">
      <label for="artisttwitter">Artist twitter handle (no @)</label>
      <input type="text" class="form-control" id="artisttwitter" name="artisttwitter" placeholder="ladygaga">
    </div>
    <div class="form-group">
     <label for="example-date-input" class="col-2 col-form-label">Artist Birthday</label>
     <div class="col-10">
      <input class="form-control" type="date" value="1986-03-28" id="artistbirthday" name="artistbirthday">
    </div>

    <br>
    <div class="form-group">
      <label for="artistdesc">Artist Description</label>
      <textarea class="form-control" id="artistdesc" name="artistdesc" rows="3" placeholder="Lady Gaga, is an American singer, songwriter, and actress. At the beginning of her career, Gaga became known for her unconventionality and provocative work. A popular contemporary recording artist, she is noted for constantly experimenting with new musical ideas and images."></textarea>
    </div>
    <br>
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-default" name="submitartist" value="submit" id="submitartist"> Submit</button>
    </div>

  </form>












  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- my own script -->
  <script src="artistadd.js"></script>
  <script src="javascriptneeds.js"></script>

</body>
</html>
