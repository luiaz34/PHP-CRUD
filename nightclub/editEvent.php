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

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .btn {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 style="color:white;">Edit Event Form</h2>

        <form id="addEventForm">
            <div class="form-group">
                <label for="name" style="color:white;">Name:</label>
                <input type="text" class="form-control" id="name" name>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="event_category" style="color:white;">Event Category:</label>
                    <input type="text" class="form-control" id="event_category" name="event_category">
                </div>
                <div class="form-group col-md-6">
                    <label for="event_date" style="color:white;">Event Date:</label>
                    <input type="date" class="form-control" id="event_date" name="event_date">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="start_time" style="color:white;">Start Time:</label>
                    <input type="time" class="form-control" id="start_time" name="start_time">
                </div>

                <div class="form-group col-md-6">
                    <label for="end_time" style="color:white;">End Time:</label>
                    <input type="time" class="form-control" id="end_time" name="end_time">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="fees" style="color:white;">Fees:</label>
                    <input type="text" class="form-control" id="fees" name="fees">
                </div>

                <div class="form-group col-md-6">
                    <label for="maximum_capacity" style="color:white;">Maximum Capacity:</label>
                    <input type="number" class="form-control" id="maximum_capacity" name="maximum_capacity">
                </div>
            </div>

            <div class="form-group">
                <label for="performance_detail" style="color:white;">Performance Detail:</label>
                <textarea class="form-control" id="performance_detail" name="performance_detail" rows="4"></textarea>
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
                var maximum_capacity = $('#maximum_capacity').val();
                var performance_detail = $('#performance_detail').val();
                
                $.ajax({
                    method: "PUT",
                    url: "CRUD(event).php",
                    data: {
                        EditId : editId,
                        Name: name,
                        event_Date: event_date,
                        start_Time: start_time,
                        end_Time: end_time,
                        event_Category: event_category,
                        Fees: fees,
                        maximum_Capacity: maximum_capacity,
                        performance_Detail: performance_detail,
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
                    reloadevent();  
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    $('#addeventmsg').html("AJAX request failed: " + textStatus);
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
        });
    })(jQuery);
    </script>
</body>

</html>