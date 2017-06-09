//search button
//search goes to controller
$("#searchsubmit").on("click", function(e) {
  //prevent the default action

  e.preventDefault();

//setting the data and the identifier
var data = {
  searchterm : $('#searchbox').val(),


  isearch4u: "do it"
};

//ajax post request with promise handler
$.ajax({
 type: 'POST',
 url: "projcontroller.php",
 data: data, 
 success: function(response) {
  alert(response);
            //console.log(response);

          },
          error: function() {
            alert("There was an error searching");
          }
        });


});


//redirect send get request and then grab it from the url

$(function() {


  //autocomplete
  $(".auto").autocomplete({
    select: function( event, ui ) {
      //get something out of UI and use that to redirect
      //put it at the end of the


//set a breakpoint
      //keep it
      window.location = "artistpage.php?myvar=" + ui.item.value;
    },
    source: "projcontroller.php",

    minLength: 1
  });      

});


//favorites link


$("#favelink").on("click", function(e) {
 e.preventDefault();
   //gets the stagename
   $someelement = document.getElementById("welcomeheader");
  //gets the thing inside and converts it to string! so now we have our name!
  alert($someElementToString = $someelement.innerHTML);

   //do same for username
  //loggedinas
  $someelement2 = document.getElementById("loggedinas");
  alert($someElementToString2 = $someelement2.innerHTML);

  //now we need to send it to controller



//setting the data and the identifier
var data = {
  addtofave : $someElementToString,
  useremail: $someElementToString2,


  ifave4u: "addtofaveyes"
};

//ajax post request with promise handler
$.ajax({
 type: 'POST',
 url: "projcontroller.php",
 data: data, 
 success: function(response) {
  alert("Artist added to your favorites!");
            //console.log(response);

          },
          error: function() {
            alert("There was an error adding your artist to your favorites");
          }
        });


});


//artist fave redo
$(function(){
  if($('body').is('.PageType')){
    //alert("hello"); check

    //now we want to send a post request using the users email as listed
    //first extract the email
    $emailextract = document.getElementById("loggedinas");
    $emailextractfinal = $emailextract.innerHTML;
    //alert($emailextractfinal);
    //email successfully extracted

    //now we want to package it up as a post and send it to the controller so the controller can send it to the model.
var data = {
  //setting a post variable to be the email
  emailextract4 : $emailextractfinal,

//and setting the other one so we can use it in the controller
  ilist4u: "letmein"
};

//then comes the actual post request which connects to controller

$.ajax({
 type: 'POST',
 url: "projcontroller.php",
 data: data, 
 success: function(response) {
            alert("list is made!");
            console.log(response);

          },
          error: function() {
            alert("There was an error adding your artist to your favorites");
          }
        });







  }
});














