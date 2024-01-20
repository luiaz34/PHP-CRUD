<?php
$rType = strtolower($_SERVER['REQUEST_METHOD']); // What HTML method reuqest was used
http_response_code(200); // HTTP status code, will be updated if there was an error (defaults to 200, OK)
//echo "this is CRUD Example with request $rType";
switch ($rType) { // Deal with each request method separately..
    case 'get':
        // handle a GET request
        include "viewArtistapi.php";
        break;
    case 'post':
        // handle a POST request
        include "createArtistapi.php";
        break;
    case 'put':
        // handle a PUT request
        include "editArtistapi.php";
        break;
    case 'delete':
        // handle a DELETE request
        include 'deleteArtistapi.php';
        break;
    default:
        // Unimplemented method
        http_response_code(405);
}
?>