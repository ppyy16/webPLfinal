//redirect send get request and then grab it from the url
//autocomplete onclick

$(function() {


  //autocomplete
  $(".auto").autocomplete({
  	select: function( event, ui ) {
  		//get something out of UI and use that to redirect
  		//put it at the end of the


  		//keep it
  		window.location = "artistpage.php?myvar=" + ui.item.value;
  	},
    source: "projcontroller.php",

    minLength: 1
  });      

});


//favorites link onclick
$("#favelink").on("click", function(e) {
 e.preventDefault();
   //gets the stagename
   $someelement = document.getElementById("welcomeheader");
  //gets the thing inside and converts it to string! so now we have our name!
  $someElementToString = $someelement.innerHTML;

   //do same for username
  //loggedinas
  $someelement2 = document.getElementById("loggedinas");
  $someElementToString2 = $someelement2.innerHTML;

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






//onclick function for favelist
$("#getartists").on("click", function(e) {
 e.preventDefault();
 // a way to get rid of the button after using it
 $( "#getartists" ).empty();

   //okay we're getting the email good
   $someelement2 = document.getElementById("loggedinas");
   $someElementToString2 = $someelement2.innerHTML;

  //now we need to send it to controller
//setting the data and the identifier
//sending it out right
var data = {
  useremail: $someElementToString2,


  favelist: "list"
};

//ajax post request with promise handler
//not returning the r
$.ajax({
 type: 'POST',
 url: "projcontroller.php",
 data: data, 
 success: function(response) {

           //response is an array
           //we want to get that shit out of that shitty array
           //magic: it worked
           var array = JSON.parse(response);
           
           array.forEach(function(entry) {
            $('#myfeed').append(
              '<ul><li><a href="artistpage.php?myvar=' + entry +'">' + entry + '</a></li></ul>'

              );
          });



         },
         error: function() {
          alert("There was an error adding your artist to your favorites");
        }
      });

});












