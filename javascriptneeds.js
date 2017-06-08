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



$(document).ready(function(){
  $(".editor-header a").click(function(e){
    e.preventDefault();

    var _val = $(this).data("role"),
        _sizeValIn = parseInt($(this).data("size-val") + 1),
        _sizeValRe = parseInt($(this).data("size-val") - 1),
        _size = $(this).data("size");
    if(_size == "in-size"){
      document.execCommand(_val, false, _sizeValIn + "px");
    } else{
      document.execCommand(_val, false, _sizeValRe + "px");
    }
  });
});

$(document).ready(function(){
  var $text = $("#text"),
      $submit = $("input[type='submit']"),
      $listComment = $(".list-comments"),
      $loading = $(".loading"),
      _data,
      $totalCom = $(".total-comment");

  $totalCom.text($(".list-comments > div").length);

  $($submit).click(function(){
    if($text.html() == ""){
      alert("Plesea write a comment!");
      $text.focus();
    } else{
      _data = $text.html();
      $.ajax({
        type: "POST",
        url: window.local,
        data: _data,
        cache: false,
        success: function(html){
          $loading.show().fadeOut(300);
          $listComment.append("<div>"+_data+"</div>");
          $text.html("");
          $totalCom.text($(".list-comments > div").length);
        }
      });
      return false;
    }
  });
});

//view artist
//need to make a way to get to artist through search