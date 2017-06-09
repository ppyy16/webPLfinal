//I wanted to keep this seperate
//what happens when the submit artist button is clicked
$("#submitreg").on("click", function(e) {
  //prevent the default action
  e.preventDefault();

 
var name = $("#userfirstname").val();
var last = $("#userlastname").val();
var pass = $("#userpassword").val();
var email = $("#useremail").val();






 if(name === ""){
  alert("You have an empty name");
  return;
}


 if(last === ""){
  alert("You have an empty lastname");
  return;
}



 if(pass === ""){
  alert("You have an empty password");
  return;
}


 if(email === ""){
  alert("You have an empty email");
  return;
}





//setting the data
    var data = {
      userfirstname: $('#userfirstname').val(),
      userlastname: $('#userlastname').val(),
      userpassword: $('#userpassword').val(),
      useremail: $('#useremail').val(),
      userbirthday: $('#userbirthday').val(),


      submitregform: "yes"
    };

//using the data and sending it through a post with promise handling
    $.ajax({
         type: 'POST',
         url: "projcontroller.php",
         data: data, 
         success: function(response) {
            alert("Registeration complete");
            //console.log(response);
             
         },
        error: function() {
            alert("There was an error submitting comment");
        }
     });
           

});




