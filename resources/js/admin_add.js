$(document).ready(function() {

   $('#addManufacturer').on('click', function () {

      var data = $(this).parents('.form-group').find('input').val();

      $.ajax({
         type: 'GET',
         url: 'add-manufacturer',
         data: {data: data},
         contentType: 'application/json',
         success: function (data) {
            console.log(data.data);
            $('#manufacturersTable').html(data.view);
         }
      });
   });

   $('body').on('click', '.delete-manufacturer, .delete-user', function () {

      var id = $(this).data('id');

      if($(this).hasClass('delete-user')){

         deleteRow(id, 'delete-user', '#usersTable');

      } else {

         deleteRow(id, 'delete-manufacturer', '#manufacturersTable');
      }
   });

   $('#register-user').on('click', function () {

      var data = {
         name: $('#name').val(),
         email: $('#email').val(),
         password: $('#password').val(),
         userType: $('#userType').val()
      };

      $.ajax({
         type: 'GET',
         url: 'register-user',
         data: data,
         contentType: 'application/json',
         success: function (data) {
            console.log(data);
            $('#usersTable').html(data.view);
         }
      });
   });
});

function addRow() {

}

function deleteRow(id, url, resultsBlock) {

   $.ajax({
      type: 'GET',
      url: url,
      data: {id: id},
      contentType: 'application/json',
      success: function (data) {

         $(resultsBlock).html(data.view);
      }
   });
}