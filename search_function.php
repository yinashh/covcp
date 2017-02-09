<!Doctype html>
<html>
    <head>
        <title>Search Bar</title>
        <link rel="stylesheet" href="css/style.css" />
        <script type="text/javascript">
            function active(){
                var searchBar = document.getElementById('searchBar');
                
                if(searchBar.value == 'Search...'){
                    searchBar.value == ''
                    searchBar.placeholder = 'Search...'
                }
            }
            
            function inactive(){
                var searchBar = document.getElementById('searchBar');
                
                if(searchBar.value == ''){
                    searchBar.value = 'Search...'
                    searchBar.placeholder = ''
                }
            }
            
        </script>
    </head>
    <body>
        <form action="search_function.php" method="post">
            <input type="text" name="searchBar" id="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="off" onMouseDown="active();" onBlur="inactive()" />
            <input type="submit" name="submit" id="searchBtn" value="Go!" />
        </form>
    </body>
</html>


<?php include "db.php";

            if(!isset($_POST['submit'])){
                global $connection;
                $query = "SELECT * FROM datapoints WHERE TripID LIKE " . $_POST['searchBar'];
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die('Query FAILED' . mysqli_error($connection));
                }
                //$num_row = mysql_num_rows($query);
    
                while ($row = mysql_fetch_array($query)){
                    $tripID = $row['TripID'];
                    //$segmentID = $row['segmentID'];
                    //$userID = $row['userID'];
                    //$startTime = $row['startTime'];
                    //$endTime = $row['endTime'];
                    //$dataPoints = $row['dataPoints'];
                    $flagged = $row['flagged'];

                    echo '<h3>' . $tripID . '</h3>';
                }
            }

?>