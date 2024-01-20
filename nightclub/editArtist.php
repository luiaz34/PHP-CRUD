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
    <title>Edit Event</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery and jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
            .container {
                max-width: 600px;
            margin-top: -70px;
            padding: 30px;
            background-color: #f9f9f9;
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

.addeventmsg {
    margin-top: 20px;
    text-align: center;
    font-style: italic;
    color: #888;
}

    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 style="color:white;">Edit Artist Form</h2>

        <form id="addEventForm">
            <div class="form-group">
                <label for="name" style="color:white;">Artist_name:</label>
                <input type="text" class="form-control" id="name" name>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="event_category" style="color:white;">biography:</label>
                    <input type="text" class="form-control" id="event_category" name="event_category">
                </div>
                <div class="form-group col-md-6">
                    <label for="event_date" style="color:white;">facebook_username:</label>
                    <input type="text" class="form-control" id="event_date" name="event_date">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="start_time" style="color:white;">twitter_username:</label>
                    <input type="text" class="form-control" id="start_time" name="start_time">
                </div>

                <div class="form-group col-md-6">
                    <label for="end_time" style="color:white;">instagram_username:</label>
                    <input type="text" class="form-control" id="end_time" name="end_time">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="fees" style="color:white;">pr_image_url:</label>
                    <input type="text" class="form-control" id="fees" name="fees">
                </div>
            </div>

            <input type="hidden" id="editId" name="editId" value="<?php echo $_POST['editId']; ?>">
            <script>
                var editIdValue = document.getElementById('editId').value;
                console.log('Value of editId:', editIdValue);
            </script>


            <div class="button-container">
                <input type="button" class="btn btn-primary" id="addevent" value="Save Changes">
            </div>
            <div class="addeventmsg"></div>
        </form>

    </div>
    <script>
        jQuery.noConflict();
        (function($) {
        $(document).ready(function() {
            $('#addevent').click(function() {
                
                var editId = $('#editId').val();
                var name = $('#name').val();
                var event_date = $('#event_date').val();
                var start_time = $('#start_time').val();
                var end_time = $('#end_time').val();
                var event_category = $('#event_category').val();
                var fees = $('#fees').val();
               
                
                $.ajax({
                    method: "PUT",
                    url: "CRUD(artist).php",
                    data: {
                        EditId : editId,
                        Name: name,
                        event_Date: event_date,
                        start_Time: start_time,
                        end_Time: end_time,
                        event_Category: event_category,
                        Fees: fees,
                        
                    }
                }).done(function(msg) {
                    var retObj = JSON.parse(msg);
                    console.log(retObj);

                    try {
                        var retObj = JSON.parse(msg);
                        $('#addeventmsg').html(retObj.message);
                        console.log(retObj.message);
                    } catch (e) {
                        $('#addeventmsg').html("An error occurred: " + msg);
                    }
                    reloadArtistTable();
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    $('#addeventmsg').html("AJAX request failed: " + textStatus);
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

        });
    })(jQuery);
    </script>
</body>

</html>