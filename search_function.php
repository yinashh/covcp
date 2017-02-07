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
        <script type="text/javascript">
            function active(){
                var searchBar = document.getElementById('searchBar');
                
                if(searchBar.value == 'Search...'){
                    searchBar.value == ''
                    searchBar.placeholder = 'Search...'
                }
            }
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
