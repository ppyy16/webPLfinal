//search button
//search goes to controller
// $("#searchsubmit").on("click", function(e) {
//   //prevent the default action

//  e.preventDefault();

// //setting the data and the identifier
//  var data = {
//         searchterm : $('#searchbox').val(),


//       isearch4u: "do it"
//     };

// //ajax post request with promise handler
//     $.ajax({
//          type: 'POST',
//          url: "projcontroller.php",
//          data: data, 
//          success: function(response) {
//             alert(response);
//             //console.log(response);

//          },
//         error: function() {
//             alert("There was an error searching");
//         }
//      });


// });





//redirect send get request and then grab it from the url
//autocomplete onclick

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
              '<ol><li><a href="artistpage.php?myvar=' + entry +'">' + entry + '</a></li></ol>'

              );
          });









          // $.each(array, function(id, itm){


          //   $('#myfeed').append(
          //     '<ol><li>' + id +'</li></ol>'
          //     );



          // })

          












        },
        error: function() {
          alert("There was an error adding your artist to your favorites");
        }
      });

});












