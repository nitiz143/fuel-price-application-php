<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Location</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : '';
    $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : '';

    // Here you can process the latitude and longitude, for example, save them to the database
    // For now, we'll just display them
    echo "Latitude: " . $latitude . " Longitude: " . $longitude;
}
?>


    <button onclick="getLocation()">Get Location</button>
    <p id="location"></p>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            document.getElementById("location").innerHTML = "Latitude: " + latitude +
            "<br>Longitude: " + longitude;

            // Send the location to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "get_location.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("latitude=" + latitude + "&longitude=" + longitude);
        }
    </script>
</body>
</html>
