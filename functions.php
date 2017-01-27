<?php include "db.php";

function showData($attribute) {
    global $connection;
    $query = "SELECT * FROM datapoints GROUP BY " . $attribute;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query FAILED' . mysqli_error());
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $data = $row[$attribute];
                           
        echo "<option value=''>$data</option>";
    }
}

function showDayOfWeek($dateAttribute) {
    global $connection;
    $query = "SELECT * FROM datapoints GROUP BY " . $dateAttribute;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query FAILED' . mysqli_error());
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $date = $row[$dateAttribute];
        
        $unixTimestamp = strtotime($date);
        
        $weekday = date("l", $unixTimestamp);
            
                           
        echo "<option value=''>$weekday</option>";
    }
}
