//I wanted to keep this seperate
//what happens when the submit artist button is clicked
$("#submitartist").on("click", function(e) {
  //prevent the default action
  e.preventDefault();

//setting the data
    var data = {
      artistnamelabel: $('#artistnamelabel').val(),
      artistfullnamelabel: $('#artistfullnamelabel').val(),
      artistbirthday: $('#artistbirthday').val(),
      artistdesc: $('#artistdesc').val(),
      artistfulllastnamelabel: $('#artistfulllastnamelabel').val(),
      artisttwitter: $('#artisttwitter').val(),


      submitartistform: "submit"
    };

//using the data and sending it through a post with promise handling
    $.ajax({
         type: 'POST',
         url: "projcontroller.php",
         data: data, 
         success: function(response) {
            alert("Artist Submitted");
            //console.log(response);
             
         },
        error: function() {
            alert("There was an error submitting comment");
        }
     });
           

});


