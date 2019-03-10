$(document).ready(function() {

   $('#addManufacturer').on('click', function () {
      $.ajax({
         type: 'GET',
         url: 'add-manufacturer',
         data: {text: 'test'},
         contentType: 'application/json',
         success: function () {
            console.log('wow');
         }
      });
   });
});