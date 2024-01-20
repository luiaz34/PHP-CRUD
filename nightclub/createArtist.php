<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
} else {
    $nameEmail = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>



    <style>
        .container {
    max-width: 600px;
    margin-top: -10px;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    background-color: grey; /* Match the sidebar background color */
            border-radius: 0 10px 10px 0;
            color:white !important; /* Match the sidebar border-radius */ 
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 25px;
}

label {
    font-size: 16px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
    transition: border-color 0.3s;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.row {
    margin-bottom: 15px;
}

.button-container {
    text-align: center;
    margin-top: 30px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.button-container::before,
.button-container::after {
    content: '';
    display: table;
    clear: both;
}

@media (max-width: 768px) {
    .form-group {
        margin-bottom: 15px;
    }

    .row {
        margin-bottom: 15px;
    }
}

    </style>
</head>

<body>
<div class="container mt-5">
        <h2 style="color:white;">Artist Registration Form</h2>

        <form id="addForm">
            <div class="form-group">
                <label for="name" style="color:white;">Name or bandname:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="biography" style="color:white;">Biography:</label>
                    <input type="text" class="form-control" id="biography" name="biography" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="image" style="color:white;">Artist's image:</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="twitter_username" style="color:white;">Twitter Username:</label>
                    <input type="email" class="form-control" id="twitter_username" name="twitter_username" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="instagram_username" style="color:white;">Instagram Username:</label>
                    <input type="email" class="form-control" id="instagram_username" name="instagram_username" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="facebook_username" style="color:white;">Facebook Username:</label>
                    <input type="email" class="form-control" id="facebook_username" name="facebook_username" required>
                </div>
            </div>


            <div class="button-container">
                <input type="button" class="btn btn-primary" id="addartist" value="Add Artist">
            </div>
        </form>



    </div>
    

    <script>

jQuery.noConflict();
        (function($) {
            $(document).ready(function() {
                $('#addartist').click(function(){
                    var name = $('#name').val();
                    var biography = $('#biography').val();
                    var image = $('#image').val();
                    var twitter_username = $('#twitter_username').val();
                    var instagram_username = $('#instagram_username').val();
                    var facebook_username = $('#facebook_username').val();
                    $.ajax({
                    method: "POST",
                    url: "CRUD(artist).php",
                    data: {
                        name:name,
                        biography:biography,
                        image: image,
                        twitter_username: twitter_username,
                        instagram_username: instagram_username,
                        facebook_username: facebook_username
                    }
                })
                .done(function(msg) {
                    
                    var retObj = JSON.parse(msg);
                    alert(retObj.message);
                    console.log(retObj);
                    reloadArtistTable();
                    
                })
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
                

            });
        })(jQuery);
       </script>
   
</body>

</html>