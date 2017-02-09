<?php
include_once "db.php";
include_once "functions.php";
include_once "Algorithms.php";

$datapoints = "datapoints";
?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        <script async defer src="https://maps.googleapis.com/maps/api/jskey=AIzaSyAxKAbTtKDKGJL62koh5wns8Fv1pYa9f3E&callback=initMap">
        </script>
        <script type="text/javascript" src="/resources/js/report.js"></script>
        <script type="text/javascript" src="external/js/jquery-3.1.1.js"></script>
        
        <link rel="stylesheet" type="text/css" href="external/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/maps.css">
        
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <title>Traffic Vision</title>
    </head>
    
    <body>
        <header>
            <nav>
                <div class="row">
                    <a href="#"> <!--link to index.html-->
                        <img src="resources/img/logo.png" alt="Traffic Vision Logo" class="nav-logo">
                    </a>
                    
                    <ul class="main-nav">
                        <li><a href="#">Home</a></li> <!--link to index.html-->
                        <li><a href="#">Search</a></li> <!--link to search.html-->
                        <li><a href="#">Report Generation</a></li> <!--link to report.html-->
                        <li><a href="#">Help</a></li> <!--link to help.html-->
                        <li><a href="#"><i class="ion-power"></i></a></li> <!--link to login.html-->
                    </ul>
                </div>
            </nav>
        </header>
        
        <h1>Report Generation</h1>
        
        <div class="row">
            <section class="sidebar">
                <h2>Filters</h2>
                <!-- dropdown menus -->
                
                <select name="tripID">
                <!-- pre-selected option -->
                <option value="tripID" selected>TripID</option>
                <?php
                $tripID = "TripID";
                showData($tripID, $datapoints);
                ?>
                </select>  
               
                <select name="longitude">
                <!-- pre-selected option -->
                <option value="longitude" selected>Longitude</option>
                <?php
                $longitude = "longitude";
                showData($longitude, $datapoints);
                ?>
                </select>    
            
                <select name="latitude">
                <!-- pre-selected option -->
                <option value="latitude" selected>Latitude</option>
                <?php
                $latitude = "latitude";
                showData($latitude, $datapoints);
                ?>
                </select>   
            
                <select name="date">
                <!-- pre-selected option -->
                <option value="date" selected>Date</option>
                <?php
                $date = "date";
                showData($date, $datapoints);
                ?>
                </select>   
            
                <!-- add day option -->
                <select name="weekday">
                <!-- pre-selected option -->
                <option value="weekday" selected>Day of Week</option>
                <?php
                $date = "date";
                showDayOfWeek($date, $datapoints);
                ?>
                </select>
            
                <select name="time">
                <!-- pre-selected option -->
                <option value="time" selected>Time</option>
                <?php
                $time = "time";
                showData($time, $datapoints);
                ?>
                </select>
                
                <form class="" action="report.php" method="post">
                    <button name="submit">Generate Report</button>
                </form>
                
            </section>
        </div>
        
        <div class="row">
            <h2>My Google Maps Demo</h2>
            <div id="map"></div>
        </div>
        
        <!-- Google Maps API -->
        <script>
            initMap();
            //initMapTest();
        </script>
        
        <div class="row">
          <h2>Statistics</h2>
           <table style="width:100%">
            <tr>
                <th>Data</th>
                <th>Maximum</th>
                <th>Minimum</th> 
                <th>Average</th>
                <th>Median</th>
                <th>Standard Deviation</th>
            </tr>
            <?php
            if (isset($_POST['submit'])) {
                displayStats('speed');
                displayStats('acceleration');
            }
            ?>
            </table>

        </div>
        
    </body>
</html>