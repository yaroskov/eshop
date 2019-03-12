$(document).ready(function() {

   addRow('#addManufacturer', 'add-manufacturer');
   addRow('#addColor', 'add-color');

   deleteRow();

   registerUser();

});

function registerUser() {

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
}

function addRow(dom, url) {

   $(dom).on('click', function () {

      var data = $(this).parents('.form-group').find('input').val();

      var resultsBlock = $(this).parents('.tab-pane').find('.resultsBlock');

      $.ajax({
         type: 'GET',
         url: url,
         data: {data: data},
         contentType: 'application/json',
         success: function (data) {

            resultsBlock.html(data.view);
         }
      });
   });
}

function deleteRow() {

   $('body').on('click', '.delete-row', function () {

      var url = $(this).data('url');

      var id = $(this).data('id');

      var resultsBlock = $(this).parents('.resultsBlock');

      $.ajax({
         type: 'GET',
         url: url,
         data: {id: id},
         contentType: 'application/json',
         success: function (data) {

            resultsBlock.html(data.view);
         }
      });

   });
}