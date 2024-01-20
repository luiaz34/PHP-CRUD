<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" type="text/css" href="login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="form_container">
    <!--login-->

    <div class="form login_form">
      <form>
        <h2>Login</h2>
        <div class="input_box">
          <input type="email" placeholder="Enter Your Email" id="loginEmail">
          <i class="fa-regular fa-envelope email" style="color: white;"></i>
        </div>
        <div class="input_box">
          <input type="password" placeholder="Enter Your Password" id="loginPassword">
          <i class="fa-solid fa-lock password" style="color: white;"></i>
        </div>
        <div id="loginErrorMessage">

        </div>
        <input type="submit" class="button" name="login" id="loginBtn" value="Login">
        <!--login button-->

      </form>
    </div>
    <script>
      jQuery.noConflict();
        (function($) {
      $('#loginBtn').click(function() {
        var email = $('#loginEmail').val();
        var password = $('#loginPassword').val();
        var home = $(".home");
        console.log("Login button clicked");
        $.ajax({
            method: "POST",
            url: "authenticate.php",
            data: {
              iemail: email,
              ipassword: password
            },
          })
          .done(function(msg) {
            var retObj = JSON.parse(msg);
            console.log(retObj);
            if (retObj.message === 'Invalid email or password.') {
              $('#loginErrorMessage').html(retObj.message);
            } else if (retObj.message === 'Login successful.') {
              window.location.href = 'admin.php';
            }
          });

      });
    })(jQuery);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>