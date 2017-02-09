<?php include "db.php";

function showData($attribute, $table) {
    global $connection;
    $query = "SELECT * FROM $table GROUP BY " . $attribute;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query FAILED' . mysqli_error());
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $data = $row[$attribute];
                           
        echo "<option value='$data'>$data</option>";
    }
}

function showDayOfWeek($dateAttribute, $table) {
    global $connection;
    $query = "SELECT * FROM $table GROUP BY " . $dateAttribute;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query FAILED' . mysqli_error());
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        $date = $row[$dateAttribute];
        $unixTimestamp = strtotime($date);
        $weekday = date("l", $unixTimestamp);
                           
        echo "<option value='$weekday'>$weekday</option>";
    }
}

function createColumnArray($attribute) {
    global $connection;
    $query = "SELECT " . $attribute . " FROM datapoints";
    $result = mysqli_query($connection, $query);
    if (!$result) {
    die('Query FAILED' . mysqli_error($connection));
    }
    // make an array out of the column of values
    $array = array();
    while($row = mysqli_fetch_assoc($result)) {
        $array[] = $row[$attribute];
    }
    return $array;
}

// create a row (attribute, max, min, average, median, standard deviation) in the stats table
function displayStats($attribute) {
    $array = createColumnArray($attribute);
    echo "<tr>";
    echo "<td>$attribute</td>";
    echo "<td>" . getMax($array) . "</td>";
    echo "<td>" . getMin($array) . "</td>";
    echo "<td>" . getAverage($array) . "</td>";
    echo "<td>" . getMedian($array) . "</td>";
    echo "<td>" . stdDev($array) . "</td>";
    echo "</tr>";
}


























