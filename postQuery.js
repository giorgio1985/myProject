function prova(){
	$(document).ready(function() {
    $("div#myProfile").submit(function() {
       //prevent Default functionality
       // e.preventDefault();
       var username = $("#username").val();
       var email = $("#email").val();
       var phone = $("#phone").val();
       var password = $("#password").val();
      
         $.ajax({
         	type: "POST",
         	//url: "",
         	dataType: "html",
         	data: "username=" + username + "&email=" + email + "&phone=" + phone + "&password=" + password,
         	success: function(){
               window.location.href="./index.html";
         	},
         	error: function(){
         		alert("chiamata fallita!");
         	}
         });
         return false;
});

   });

}