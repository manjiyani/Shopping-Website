 function login() {
  location.href = "login.php";
 }
 function customerSignUp() {
   location.href = "customerSignUp.php";
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
         }

       });

     }
