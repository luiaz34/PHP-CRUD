<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} else {
    $nameEmail = $_SESSION['user_id'];
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" type="text/css" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Include DataTables CSS -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">



    <!-- Include DataTables JavaScript -->

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <style>
        

        /* Rest of your existing .sid styles */
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" id="both">
            <div class="sid  col-2 min-vh-100 d-flex flex-column justify-content-between">
                <div class=" p-2" style="width: 100%;">
                    <a class="d-flex text-decoration-none mt-1 align-items-center text-white">
                        <span class="fs-5 d-none d-sm-inline">SideMenu</span>
                    </a>


                    <hr class="dropdown-divider" style="height: 1px; background-color: white; margin-top: 10px;">

                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link text-white" id="homeLink">
                                <i class="fs-5 fa fa-house"></i><span class="fs-7 ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown py-2 py-sm-0">
                            <a class="nav-link text-white dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-calendar-days"></i><span class="fs-7 ms-1 d-none d-sm-inline">Events</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item fs-7 ms-1" id="viewEvent">View Event</a></li>
                                <li><a class="dropdown-item fs-7 ms-1" id="createEvent">Create Event</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown py-2 py-sm-0">
                            <a class="nav-link text-white dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i><span class="fs-7 ms-1 d-none d-sm-inline">Aritsts</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item fs-7 ms-1" id="viewartist">View Artist</a></li>
                                <li><a class="dropdown-item fs-7 ms-1" id="artist">Create Artist</a></li>
                            </ul>
                        </li>





                    </ul>

                </div>
                <div class="logoutbtn">
                    <a href="logout.php" class="text-white text-decoration-none py-2 py-sm-0" style="margin-left: 18px;">
                        <i class="fa-solid fa-right-from-bracket"></i><span class="fs-7 ms-3 d-none d-sm-inline">Logout</span>
                    </a>
                </div>

            </div>

            <div class="hello col-10" style="padding: 0; flex-direction: column;border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <div class="box-style">
                    <h2 class="text">Hello, <span style="color: purple;"><?php echo $nameEmail; ?></span></h2>
                    <p>Welcome to the Admin Dashboard</p>
                </div>
            </div>




        </div>

    </div>
    <script>
        jQuery.noConflict();
        (function($) {

            $(document).ready(function() {
                $('#homeLink').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        location.reload();  // Reload the current page
    });
                var dataTableInstance;
                $('#artist').click(function() {
                    $.ajax({
                            method: "POST",
                            url: "createArtist.php",
                        })
                        .done(function(response) {
                            $('.hello').html(response);
                        });
                });


                $('#viewartist').click(function() {

                    $.ajax({
                        method: "GET",
                        url: "CRUD(artist).php",
                    }).done(function(response) {
                        var retObj = JSON.parse(response);
                        var table_str =

                            '<table class="table"><thead><tr><th>id</th><th>artist_name</th><th>biography</th><th>facebook_username</th><th>twitter_username</th><th>instagram_username</th><th>pr_image_url</th><th><em>Edit Artist</em></th><th><em>Delete Artist</em></th></tr></thead><tbody>';
                        if (retObj.length) {

                            $.each(retObj, function(key, value) {

                                table_str += '<tr><td>' + value.id + '</td><td>' + value.artist_name + '</td><td>' + value.biography + '</td><td>' + value.facebook_username + '</td><td>' + value.twitter_username + '</td><td>' + value.instagram_username + '</td><td>' + value.pr_image_url + '</td><td><input type="button" value="Edit Event" class="editbutton bg-primary text-white" style="align-items: center;"></td><td><input type="button" value="Delete Event" class="deletebutton bg-danger text-white" style="align-items: center;"></td></tr>';

                            });

                        }
                        table_str += '</tbody></table>';
                        $('.hello').html('<div class="table-container">' + table_str + '</div>');

                    });
                    $('.hello').on('click', '.deletebutton', function() {
                        var artistId = $(this).closest('tr').find('td:first').text();
                        swal({
                                title: "Are you sure?",
                                text: "Once deleted, you will not be able to recover this imaginary file!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    });
                                    $.ajax({
                                            method: "DELETE",
                                            url: "CRUD(artist).php",
                                            data: {
                                                artistId: artistId
                                            }
                                        })
                                        .done(function(response) {
                                            console.log(response);
                                            reloadArtistTable();
                                        });


                                } else {
                                    swal("Your imaginary file is safe!");

                                }
                            });


                    });

                    function reloadArtistTable() {
                        $.ajax({
                            method: "GET",
                            url: "viewArtistapi.php",
                        }).done(function(response) {
                            var retObj = JSON.parse(response);
                            var table_str = '<table class="table"><thead><tr><th>id</th><th>artist_name</th><th>biography</th><th>facebook_username</th><th>twitter_username</th><th>instagram_username</th><th>pr_image_url</th><th><em>Edit Artist</em></th><th><em>Delete Artist</em></th></tr></thead><tbody>';

                            if (retObj.length) {
                                $.each(retObj, function(key, value) {
                                    table_str += '<tr><td>' + value.id + '</td><td>' + value.artist_name + '</td><td>' + value.biography + '</td><td>' + value.facebook_username + '</td><td>' + value.twitter_username + '</td><td>' + value.instagram_username + '</td><td>' + value.pr_image_url + '</td><td><input type="button" value="Edit Event" class="editbutton bg-primary text-white" style="align-items: center;"></td><td><input type="button" value="Delete Event" class="deletebutton bg-danger text-white" style="align-items: center;"></td></tr>';
                                });
                            }

                            table_str += '</tbody></table>';
                            $('.hello').html('<div class="table-container">' + table_str + '</div>');
                        });
                    }
                    $('.hello').on('click', '.editbutton', function() {

                        var eventId = $(this).closest('tr').find('td:first').text();

                        $.ajax({
                                method: 'POST',
                                url: 'editArtist.php',
                                data: {
                                    editId: eventId
                                }
                            })
                            .done(function(response) {
                                $('.hello').html(response);

                            });



                    });

                });




                $('#createEvent').click(function() {


                    $.ajax({
                            method: "POST",
                            url: "createEvent.php", // Change this URL to the actual events.php file path
                        })
                        .done(function(response) {
                            $('.hello').html(response); // Load the response content into the hello div
                        });
                });


                $('#viewEvent').click(function() {
                    $.ajax({
                            method: "GET",
                            url: "CRUD(event).php", // Change this URL to the actual events.php file path
                        })
                        .done(function(response) {
                            var retObj = JSON.parse(response);
                            var table_str =

                                '<table class="table"><thead><tr><th>id</th><th>name</th><th>event_date</th><th>start_time</th><th>end_time</th><th>event_category</th><th>fees</th><th>maximum_capacity</th><th>performance_detail</th><th>artist_id</th><th><em>Edit Event</em></th><th><em>Delete Event</em></th></tr></thead><tbody>';
                            if (retObj.length) {

                                $.each(retObj, function(key, value) {

                                    table_str += '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.event_date + '</td><td>' + value.start_time + '</td><td>' + value.end_time + '</td><td>' + value.event_category + '</td><td>' + value.fees + '</td><td>' + value.maximum_capacity + '</td><td>' + value.performance_detail + '</td><td>' + value.artist_id + '</td><td><input type="button" value="Edit Event" class="editbutton bg-primary text-white" style="align-items: center;"></td><td><input type="button" value="Delete Event" class="deletebutton bg-danger text-white" style="align-items: center;"></td></tr>';

                                });

                            }
                            table_str += '</tbody></table>';
                            var editview = ''
                            $('.hello').html('<div class="table-container">' + table_str + '</div>');

                        });

                    $('.hello').on('click', '.deletebutton', function() {
                        var eventId = $(this).closest('tr').find('td:first').text();
                        console.log(eventId);
                        swal({
                                title: "Are you sure?",
                                text: "Once deleted, you will not be able to recover this imaginary file!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    }); 

                        $.ajax({
                                method: "DELETE",
                                url: 'CRUD(event).php',
                                data: {
                                    deleteId: eventId
                                }

                            })
                            .done(function(response) {
                                reloadevent();
                            });
                        }
                        else {
                                    swal("Your imaginary file is safe!");

                                }
                            });
                    });
                    function reloadevent(){
                        $.ajax({
                            method: "GET",
                            url: "viewEventapi.php", // Change this URL to the actual events.php file path
                        })
                        .done(function(response) {
                            var retObj = JSON.parse(response);
                            var table_str =

                                '<table class="table"><thead><tr><th>id</th><th>name</th><th>event_date</th><th>start_time</th><th>end_time</th><th>event_category</th><th>fees</th><th>maximum_capacity</th><th>performance_detail</th><th>artist_id</th><th><em>Edit Event</em></th><th><em>Delete Event</em></th></tr></thead><tbody>';
                            if (retObj.length) {

                                $.each(retObj, function(key, value) {

                                    table_str += '<tr><td>' + value.id + '</td><td>' + value.name + '</td><td>' + value.event_date + '</td><td>' + value.start_time + '</td><td>' + value.end_time + '</td><td>' + value.event_category + '</td><td>' + value.fees + '</td><td>' + value.maximum_capacity + '</td><td>' + value.performance_detail + '</td><td>' + value.artist_id + '</td><td><input type="button" value="Edit Event" class="editbutton bg-primary text-white" style="align-items: center;"></td><td><input type="button" value="Delete Event" class="deletebutton bg-danger text-white" style="align-items: center;"></td></tr>';

                                });

                            }
                            table_str += '</tbody></table>';
                            var editview = ''
                            $('.hello').html('<div class="table-container">' + table_str + '</div>');

                        });
                    }
                    $('.hello').on('click', '.editbutton', function() {

                        var eventId = $(this).closest('tr').find('td:first').text();

                        $.ajax({
                                method: 'POST',
                                url: 'editEvent.php',
                                data: {
                                    editId: eventId
                                }
                            })
                            .done(function(response) {
                                $('.hello').html(response);

                            });



                    });
                });





            });
        })(jQuery);
    </script>


</body>

</html>