$(document).ready(function() {

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