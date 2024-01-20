
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
            font-size:24px; 
            margin-bottom:20px; 
            color:#333; }
        label { 
            font-size:16px; 
            color:#555; 
            display:block; 
            margin-bottom:5px; }
        .form-control { 
            width:100%; 
            padding:12px; 
            border:1px solid #ccc; 
            border-radius:5px; 
            background-color:#fff; 
            color:#333; 
            transition:border-color 0.3s; }
        .form-control:focus { 
            border-color:#007bff; 
            box-shadow:0 0 5px rgba(0, 123, 255, 0.5); }
        .row { 
            margin-bottom:15px; }
        .button-container { 
            text-align:center; 
            margin-top:30px; }
        .btn-primary { 
            background-color:#007bff; 
            color:#fff; 
            border:none; 
            padding:12px 20px; 
            border-radius:5px; 
            cursor:pointer; 
            transition:background-color 0.3s; }
        .btn-primary:hover { 
            background-color:#0056b3; }
        textarea.form-control { 
            resize:vertical; }
        @media (max-width:768px) { 
            .form-group, .row { 
                margin-bottom:15px; 
            } 
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 style="color:white;">Event Registration Form</h2>

        <form id="addEventForm">
            <div class="form-group">
                <label for="name" style="color:white;">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="row">
            <div class="form-group col-sm-6">
                <label for="event_category"style="color:white;">Event Category:</label>
                <input type="text" class="form-control" id="event_category" name="event_category" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="event_date"style="color:white;">Event Date:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            </div>
            <div class="row" >
            <div class="form-group col-sm-6">
                <label for="start_time"style="color:white;">Start Time:</label>
                <input type="time" class="form-control" id="start_time" name="start_time" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="end_time"style="color:white;">End Time:</label>
                <input type="time" class="form-control" id="end_time" name="end_time" required>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-sm-6" >
                <label for="fees"style="color:white;">Fees:</label>
                <input type="text" class="form-control" id="fees" name="fees" required>
            </div>

            <div class="form-group col-sm-6">
                <label for="maximum_capacity"style="color:white;">Maximum Capacity:</label>
                <input type="number" class="form-control" id="maximum_capacity" name="maximum_capacity" required>
            </div>
            </div>

            <div class="form-group">
                <label for="performance_detail"style="color:white;">Performance Detail:</label>
                <textarea class="form-control" id="performance_detail" name="performance_detail" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="artistid"style="color:white;">ArtistID</label>
                <input type="text" class="form-control" id="artistid" name="artistid" rows="4" required>
            </div>

            <div class="button-container">
                <input type="button" class="btn btn-primary" id="addevent" value="Add Event">
            </div>
            <div class="addeventmsg"></div>
        </form>
        
        
    </div>
    
    <!-- Include jQuery and Bootstrap JS (and other scripts) -->

    
    

    <!-- Your script for the datepicker and form submission -->
    <script>
   
   jQuery.noConflict();
        (function($) {
        $(document).ready(function() {
            
            $('#addevent').click(function(){

                var name = $('#name').val();
                var event_date = $('#event_date').val();
                var start_time = $('#start_time').val();
                var end_time = $('#end_time').val();
                var event_category = $('#event_category').val();
                var fees = $('#fees').val();
                var maximum_capacity = $('#maximum_capacity').val();
                var performance_detail = $('#performance_detail').val();
                var artistid = $('#artistid').val();
                

                $.ajax({
                    method: "POST",
                    url: "CRUD(event).php",
                    data: {
                        Name: name,
                        event_Date: event_date,
                        start_Time: start_time,
                        end_Time: end_time,
                        event_Category: event_category,
                        Fees: fees,
                        maximum_Capacity: maximum_capacity,
                        performance_Detail: performance_detail,
                        artistid: artistid
                    }
                
                }).done(function(msg) {
                    swal("Done!", "Even register successfully");
                    var retObj = JSON.parse(msg);
                    console.log(retObj);
                    reloadevent();
                     
                })
            });
            function reloadevent(){
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
            }
            

        });
    })(jQuery);
    </script>
   
</body>

</html>
