<<<<<<< HEAD
<!Doctype html>
<html>
    <head>
        <title>Search Bar</title>
        <link rel="stylesheet" href="css/style.css" />
=======
//RUNS ON SERENA'S LOCAL DATABASE UNTIL AWS SET UP

<?php
    //if($_GET['q'] == 'Search...'){
        //header('Location: search_function.php');
    //}
    if($_GET['q'] !== ''){
        $con = mysql_connect('localhost','root','TestCOV345');
        $db = mysql_select_db('cov_sample_data')
?>
    <head>
    <head></head>
>>>>>>> e4ad6c9f0566381f6cf45191ff188c6ce420aea0
        <script type="text/javascript">
            function active(){
                var searchBar = document.getElementById('searchBar');
                
                if(searchBar.value == 'Search...'){
                    searchBar.value == ''
                    searchBar.placeholder = 'Search...'
                }
            }
<<<<<<< HEAD
            
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
=======
        </script>
    </head>
    <body>
        <form action="search_function.php" method="GET" id="searchForm" />
            <input type="text" id="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="off" onMouseDown="active();" onBlur="" />
            <input type="submit" name="submit" id="searchBtn" value="Go!" />
        </form>
        <?php
            
            if(!isset($_POST['submit'])){
                echo '';
            } else {
            
            $query = mysql_query("SELECT * FROM trips WHERE tripID LIKE '%$q%' OR startTime LIKE '%$q' ");
            $num_row = mysql_num_rows($query);
    
            while ($row = mysql_fetch_array($query)){
                $tripID = $row['tripID'];
                $segmentID = $row['segmentID'];
                $userID = $row['userID'];
                $startTime = $row['startTime'];
                $endTime = $row['endTime'];
                $dataPoints = $row['dataPoints'];
                $flags = $row['flags'];
                
                echo '<h3>' . $tripID . '</h3><p>' . startTime '</p><br />';
            }
            }
        ?>
    </body>
</html>

<?php
    } else {
        header('Location: search_function.php')
    }
?>
>>>>>>> e4ad6c9f0566381f6cf45191ff188c6ce420aea0
