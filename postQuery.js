function myprofile(){
  $(function() {
    $("form#myProfile").on("submit", function(e) {
       //prevent Default functionality
       e.preventDefault();
    
      var form=$("#myProfile").serialize();
         $.ajax({
          type: "POST",
          url: "./index.php",
          dataType: "html",
          data: form,
          success: function(data){
               $("#risposta").html(data);
               window.location.href="./private.php";
          },
          error: function(){
            alert("chiamata fallita!");
          }
         });
         return false;
});
   });
//}

}