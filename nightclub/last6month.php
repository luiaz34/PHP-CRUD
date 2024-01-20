<!DOCTYPE html>
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

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky  ">
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
              <a class="nav-link active" aria-current="page" href="http://localhost/nightclub/homepage.php">Home</a>
            </li>
            <!-- Events drop-down-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Events
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="http://localhost/nightclub/upcomingEvent.php">Upcoming Events</a></li>
                <li><a class="dropdown-item" href="#">Past Events</a></li>
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
        </div>
      </div>
    </div>
  </nav>
  <section class="card-view" id="pastevent">
  <div class="container py-5">
  <h1 class="text-center text-white">Past Events</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

  </div>
  </div>
    
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
        $(window).on('load', function() {
            $.ajax({
                method: 'GET',
                url: "CRUD(home).php",
            })
            .done(function(response) {
                var retObj = JSON.parse(response);
                console.log(response);
                var card = ''; // Define card variable outside the loop
                
                if (retObj.length) {
                    $.each(retObj, function(key, value) {
                        // Generate card HTML for each event
                        card += `
                            <div class="col">
                                <div class="card" style="background-color: rgba(0, 0, 0, 0.5);">
                                    <img src="${value.pr_image_url}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Event Name: ${value.name}</h5>
                                        <p class="card-text text-white">Artist Name: ${value.artist_name}</p>
                                        <p class="card-text text-white">Date: ${value.event_date}</p>
                                        <p class="card-text text-white">Start time: ${value.start_time}</p>
                                        <p class="card-text text-white">End time: ${value.end_time}</p>
                                        <a href="${value.twitter_username}"><i class="fa fa-twitter"></i></a>
                                        <a href="${value.instagram_username}"><i class="fa fa-instagram"></i></a>
                                        <a href="${value.facebook_username}"><i class="fa fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>`;
                    });
                }
                
                // Append the generated cards to the .last section
                $('.row').html(card);
            });
        });
    });
</script>

</body>
  </html>
