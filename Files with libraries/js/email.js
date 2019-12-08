$('#checkout').click(function() {


  var email = sessionStorage.getItem("email")
  var cartSummary = sessionStorage.getItem("cartSummary");
  var address = sessionStorage.getItem("address");
  var total = "$"+sessionStorage.getItem("total");
  Email.send("manjiyani.alim@gmail.com",
email,
"Reciept",
'<table><tr><th>Reciept</th></tr><tr><th>Email: </th><td>'+email+'</td></tr><tr><th>Pickup Store: </th><td>'+address+'</td></tr><tr><th>Total Cost: </th><td>'+total+'</td></tr><tr><th>Message: </th><td>Your order will be avilable at store within 40 mins</td></tr></table>',
"smtp25.elasticemail.com",
"manjiyani.alim@gmail.com",
"9c1c6633-46fe-44f1-83a5-72a2e3abbf7f");

var myJSONText =  sessionStorage.getItem("cartSummary");
var userId = sessionStorage.getItem("userId");
alert("Receipt Sent to email");
$.ajax({
       type: "POST",
       url: "includes/checkout.php",
       data: { orderSummary : myJSONText,
                userName: userId
              },
       success: function() {
              sessionStorage.setItem("payment", "done");
              location.href ="index.html";
        }
});

});
