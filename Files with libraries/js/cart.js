



 var cartSummary = [];
 var retrievedData;
 var total = 0;
 if(sessionStorage.getItem("cartSummary"))
 {
   retrievedData = sessionStorage.getItem("cartSummary");
 }

 if(retrievedData)
 {
    cartSummary = JSON.parse(retrievedData);
 }
 var table = document.querySelector("#table-cart-products");



 function createAccountSummary()
{
  var id;
  for(var i = 0; i < cartSummary.length ; i++)
  {
    id = cartSummary[i][3];
    for(var j = i+1; j < cartSummary.length ; j++)
    {
      if(id == cartSummary[j][3])
      {
        cartSummary[i][4] = parseInt(cartSummary[i][4]) + 1;
        cartSummary.splice(j, 1);
        j--;
      }

    }
  }



  for (var i = 0; i < cartSummary.length ; i++) {
      table.appendChild(buildTr(i));
  }

  sessionStorage.setItem("cartSummary", JSON.stringify(cartSummary));
  sessionStorage.setItem("total", total);
  discount(total);
}

function discount(total)
{
  var userId = sessionStorage.getItem("userId");
  var tempDiscount = 0;
  var finalDiscount = 0;
  $.ajax({
         type: "POST",
         url: "includes/discount.php",
         data: {  userName: userId  },
         success: function(data) {
              tempDiscount = data;
              tempDiscount = parseFloat(parseFloat(tempDiscount)/100);
              finalDiscount = parseFloat((15*parseFloat(total))/100);

              if(tempDiscount < finalDiscount)
              {
                finalDiscount = tempDiscount;
              }
              if(!tempDiscount)
              {
                finalDiscount = 0;
              }
              document.getElementById("subtotal").innerHTML = "$ "+total;
              document.getElementById("discount").innerHTML = "$ "+finalDiscount.toFixed(2);
              document.getElementById("total").innerHTML = "$ "+parseFloat(total-finalDiscount).toFixed(2);
          }
  });


}

function buildTr(index) {
  var summaryTr = document.createElement("tr");
  summaryTr.className = 'table-row';
  if(cartSummary)
  {
    summaryTr.appendChild(buildTdCol1(cartSummary[index][0]));
    summaryTr.appendChild(buildTdCol2(cartSummary[index][1]));
    summaryTr.appendChild(buildTdCol3(cartSummary[index][2]));
    var price = cartSummary[index][2];
    price = price.replace(/\$/g, '');
    price = price.trim();
    price = parseFloat(price);
    summaryTr.appendChild(buildQuantity(cartSummary[index][4]));


    summaryTr.appendChild(buildTdCol5(parseFloat(price * parseFloat(cartSummary[index][4])).toFixed(2)));
    cartSummary[index][5] = parseFloat(price * parseFloat(cartSummary[index][4])).toFixed(2);
    total = parseFloat(total);
    total = total + parseFloat(price * parseFloat(cartSummary[index][4]));
  }

  return summaryTr;
}

function buildTdCol2(data) {
  var td = document.createElement("td");
  td.textContent = data;
  td.className = 'column-2';
  return td;
}

function buildTdCol3(data) {
  var td = document.createElement("td");
  td.textContent = data;
  td.className = 'column-3';
  return td;
}

function buildTdCol5(data) {
  var td = document.createElement("td");
  td.textContent = data;
  td.className = 'column-5';
  return td;
}

function buildQuantity(data)
{
  var td = document.createElement("td");
  td.appendChild(buildDiv(data));
  td.className = 'column-4';
  return td;
}


function buildTdCol1(data){
  var td = document.createElement("td");
  td.className = 'column-1';
  td.appendChild(buildCol1(data));
  return td;
}

function buildCol1(data)
{
  var div = document.createElement('div');
  div.className = 'cart-img-product b-rad-4 o-f-hidden';
  div.appendChild(buildImage(data));
  return div;
}

function buildImage(data)
{
  var img = document.createElement('img');
  img.setAttribute("src", data);
  img.setAttribute("alt", "IMG-PRODUCT");
  return img;
}

function buildDiv(data) {
    var div = document.createElement('div');
    div.className = 'flex-w of-hidden w-size17';
    // div.innerHTML = 	'<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">\
    // <i class="fs-12 fa fa-minus" aria-hidden="true"></i>\
    // </button>';
    div.appendChild(buildInput(data));
    // div.innerHTML = div.innerHTML +
    // '<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">\
    //  <i class="fs-12 fa fa-plus" aria-hidden="true"></i>\
    //  </button>';
    return div;
}


function buildInput(data)
{
  var input = document.createElement('input');
  input.className = 'size8 m-text18 t-center num-product';
  input.setAttribute("type", "number");

  input.setAttribute("value", data);
  return input;
}

function initMap() {
      var map = new google.maps.Map(document.getElementById('map'));
      var input = document.getElementById('address');

      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.setComponentRestrictions(
            {'country': ['ca']});
      // Bind the map's bounds (viewport) property to the autocomplete object,
      // so that the autocomplete requests use the current map bounds for the
      // bounds option in the request.
      autocomplete.bindTo('bounds', map);

      // Set the data fields to return when the user selects a place.
      autocomplete.setFields(
          ['address_components', 'geometry', 'icon', 'name']);

      autocomplete.addListener('place_changed', function() {

        var place = autocomplete.getPlace();
        if (!place.geometry) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
        }

        var address = '';
        if (place.address_components) {
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
          nearest();
        }

      });

    }

function nearest() {
 var bounds = new google.maps.LatLngBounds;
 var markersArray = [];

 var origin1 = '50 Quarry Edge Drive, Brampton, ON';
 var origin2 = '3757 Keele Street, North York, ON';
 var origin3 = '30 Coventry Rd, Brampton, ON L6T 5P9';
 var origin4 = '1500 Dundas St E, Mississauga, ON L4X 1L4';
 var origin5 = '15 Resolution Dr, Brampton, ON L6W 0A6';
 var destination = document.getElementById('address').value;

 var destinationIcon = 'https://chart.googleapis.com/chart?' +
     'chst=d_map_pin_letter&chld=D|FF0000|000000';
 var originIcon = 'https://chart.googleapis.com/chart?' +
     'chst=d_map_pin_letter&chld=O|FFFF00|000000';
 var map = new google.maps.Map(document.getElementById('map'));
 var geocoder = new google.maps.Geocoder;

 var service = new google.maps.DistanceMatrixService;
 service.getDistanceMatrix({
   origins: [origin1, origin2, origin3, origin4, origin5],
   destinations: [destination],
   travelMode: 'DRIVING',
   unitSystem: google.maps.UnitSystem.METRIC,
   avoidHighways: false,
   avoidTolls: false
 }, function(response, status) {
   if (status !== 'OK') {
     alert('Error was: ' + status);
   } else {
     var originList = response.originAddresses;
     var destinationList = response.destinationAddresses;
     deleteMarkers(markersArray);

     var showGeocodedAddressOnMap = function(asDestination) {
       var icon = asDestination ? destinationIcon : originIcon;
       return function(results, status) {
         if (status === 'OK') {
           map.fitBounds(bounds.extend(results[0].geometry.location));
           markersArray.push(new google.maps.Marker({
             map: map,
             position: results[0].geometry.location,
             icon: icon
           }));
         } else {
           alert('Geocode was not successful due to: ' + status);
         }
       };
     };
     var nearestStoreDistance;
     var nearestStore;
     for (var i = 0; i < originList.length; i++) {
       var results = response.rows[i].elements;
       geocoder.geocode({'address': originList[i]},
           showGeocodedAddressOnMap(false));
       for (var j = 0; j < results.length; j++) {
         geocoder.geocode({'address': destinationList[j]},
             showGeocodedAddressOnMap(true));
             if(i == 0)
             {
               nearestStoreDistance = results[j].distance.text;
               nearestStore = originList[i];
             }
             if(nearestStoreDistance > results[j].distance.text)
             {
               nearestStore = originList[i];
               nearestStoreDistance = results[j].distance.text;
             }


         //alert(originList[i] + ' to ' + destinationList[j] +
          //   ': ' + results[j].distance.text + ' in ' +
            // results[j].duration.text + '<br>');
       }
     }
     document.getElementById('nearestStore').innerHTML = nearestStore;
   }
 });
}

function deleteMarkers(markersArray) {
  for (var i = 0; i < markersArray.length; i++) {
    markersArray[i].setMap(null);
  }
  markersArray = [];
}

function proceedCheckout()
{
    sessionStorage.setItem("email", document.getElementById('email').value);
    sessionStorage.setItem("address", document.getElementById('pickup').value);
    location.href ="checkout.php";
}
createAccountSummary();
