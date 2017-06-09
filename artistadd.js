//I wanted to keep this seperate
//what happens when the submit artist button is clicked
$("#submitartist").on("click", function(e) {
  //prevent the default action
  e.preventDefault();

//check inputs
var stage = $("#artistnamelabel").val();
var name = $("#artistfullnamelabel").val();
var last = $("#artistfulllastnamelabel").val();
var desc = $("#artistdesc").val();
var twitter = $("#artisttwitter").val();





if(stage === ""){
  alert("You have an empty stagename");
  return;
}
if(name === ""){
  alert("You have an empty first name");
  return;
}

if(last === ""){
  alert("You have an empty last name");
  return;
}

if(twitter === ""){
  alert("You have an empty twitter");
  return;
}



if(desc === ""){
  alert("You have an empty description");
  return;
}





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


