<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .login-button {
    background-color: rgb(107, 6, 72);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fs-4" href="#">OkayNasa</a>
      <!--navbar-toggler-->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">OkayNasa</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <!-- Events drop-down-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#event" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Events
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#futureEvent">Upcoming Events</a></li>
                <li><a class="dropdown-item" href="#pastevent">Past Events</a></li>
              </ul>
            </li>
            <!--contact drop-down-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Contact
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">General Inquires</a></li>
                <li><a class="dropdown-item" href="#">Event Bookings</a></li>
                <li><a class="dropdown-item" href="#">Feed Back</a></li>
                <li><a class="dropdown-item" href="#">FAQs</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Join Our Team</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
          <input type="button" class="login-button" value="Admin-Login">
        </div>
      </div>
    </div>
  </nav>
  <section class="intro">
    <div class="hello d-flex justify-content-center align-items-center w-100 h-100">
      <p class="okay text-white">Welcome to our club, OkayNasa</p>
    </div>
  </section>
  <section class="card-view" id="pastevent">
    <div class="container py-5">
      <h1 class="text-center text-white">Past Events</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <div class="col">
          <div class="card"style="background-color: rgba(0, 0, 0, 0.5);">
            <img src="cesquax.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white">Event Name: EDM festival</h5>
              <p class="card-text text-white">Artist Name:Alan Walker</p>
              <p class="card-text text-white">Date: 2023-10-01</p>
              <p class="card-text text-white">Start time:23:00</p>
              <p class="card-text text-white">End time:00:30</p>

              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
            <img src="the1975.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white">Event Name:Rocky!!</h5>
              <p class="card-text text-white">Artist Name:The1975</p>
              <p class="card-text text-white">Date:2023-07-02</p>
              <p class="card-text text-white">Start time:19:20</p>
              <p class="card-text text-white">End time: 22:00</p>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
            <img src="japan.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white">Event Name: Hip Hop</h5>
              <p class="card-text text-white">Artist Name: steve akoi</p>
              <p class="card-text text-white">Date: 2023-05-12</p>
              <p class="card-text text-white">Start time: 19:00</p>
              <p class="card-text text-white">End time: 20:00</p>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
      <input type="button" class="text-white"id="viewmorepast" value="View More" style="background: black;">
      </div>
    </div>
  </section>
  <section class="futureEvent" id="futureEvent">
    <div class="container py-5">
      <h1 class="text-center text-white">Upcoming Events</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
        <div class="col">
          <div class="card"style="background-color: rgba(0, 0, 0, 0.5);">
            <img src="lany.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white">Event Name:hey!!party</h5>
              <p class="card-text text-white">Artist Name:Lany</p>
              <p class="card-text text-white">Date:2023-04-01</p>
              <p class="card-text text-white">Start time:17:00</p>
              <p class="card-text text-white">End time:20:00</p>

              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
            <img src="mashmellow.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white">Event Name:Mellow Party!!</h5>
              <p class="card-text text-white">Artist Name:Mashmellow</p>
              <p class="card-text text-white">Date:2023-02-02</p>
              <p class="card-text text-white">Start time:15:00</p>
              <p class="card-text text-white">End time:18:00</p>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
            <img src="dj-khalad.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-white">Event Name:Dj party</h5>
              <p class="card-text text-white">Artist Name:DJ khalad</p>
              <p class="card-text text-white">Date:2023-03-02</p>
              <p class="card-text text-white">Start time:20:00</p>
              <p class="card-text text-white">End time:23:00</p>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-facebook"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
      <input type="button" class="text-white"id="viewmorefuture" value="View More" style="background: purple;">
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('.login-button').click(function(){
        window.location.href = 'admin.php';
      });
      $('#viewmorepast').click(function(){
        window.location.href = 'last6month.php';
      })
      $('#viewmorefuture').click(function(){
        window.location.href = 'upcomingEvent.php';
      })

    })
  </script>

</body>


</html>