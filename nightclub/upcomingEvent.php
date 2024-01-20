<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" type="text/css" href="last6month.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<style>
  .table {
    background-image: linear-gradient(to bottom, black,purple);
    height: 100vh;
    width: 100%;
  }

  .table1 {
    
    color: white;
    padding: 5px;
    border-radius: 5px;
    overflow: auto; /* Ensure the table content doesn't overflow */
  }

  /* Apply styles to the DataTable */
  .table1 table.dataTable {
    width: 100%;
    border-collapse: collapse;
    background-color: #333;
  }

  .table1 th,
  .table1 td {
    background-color: #333;
    padding: 8px;
    border: 1px solid white;
    color: white;
  }

  .table1 th {
    background-color: #333;
  }

  /* .table1 tr:nth-child(even) {
    background-color: #333;
  } */

  /* .dataTables_wrapper {
    color: white;
    
  } */

  .table1 .dataTables_filter {
    background-color: #333;
    padding: 5px; /* Adjust padding as needed */
    margin: 0; /* Remove margin */
  }
  .table1  .dataTables_info{
    background-color: #333;
    padding: 5px; /* Adjust padding as needed */
    margin: 0;
  }
  .table1 .dataTables_paginate {
    background-color: #333;
    padding:5px; /* Adjust padding as needed */
    margin: 0;
    border-radius: 5px;
  }

  .table1 .dataTables_paginate .paginate_button {
    background-color: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 5px;
    margin: 2px;
    padding: 5px 10px; /* Adjust padding as needed */
    color:white;
  }

  .table1 .dataTables_paginate .paginate_button.current {
    background-color: rgba(255, 255, 255, 0.3);
    color: white;
  }
  .table1 .dataTables_length{
    background-color: #333;
    padding: 5px; /* Adjust padding as needed */
    margin: 0; /* Remove margin */
  }

  .table1 .dataTables_length option{
    background-color: #333;

  }
 

</style>



    
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky">
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
              <a class="nav-link dropdown-toggle" href="#event" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Events
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Upcoming Events</a></li>
                <li><a class="dropdown-item" href="http://localhost/nightclub/last6month.php">Past Events</a></li>
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
  <section class="table">
    <div class="table1">
    <h1 class="text-center text-white">Upcoming Events</h1>
        <table class="hello"></table>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        jQuery.noConflict();
        (function($) {
        $(document).ready(function() {
            $(window).on('load', function() {
                $.ajax({
                method: 'POST',
                url: "CRUD(home).php",
            })
            .done(function(response) {
                var retObj = JSON.parse(response);
                console.log(response);
                $('.hello').DataTable({

data: retObj,

columns: [

  { title: 'id', data: 'id' },

  { title: 'Artist_name', data: 'artist_name' },

  { title: 'Biography', data: 'biography' },

  { title: 'Event_name', data: 'name' },

  { title: 'event_date', data: 'event_date' },

  { title: 'start_time', data: 'start_time' },

  { title: 'end_time', data: 'end_time' },

  { title: 'Event_fees', data: 'fees' }

],

});
            });
            });
        });
    })(jQuery);
    </script>
</body>
</html>