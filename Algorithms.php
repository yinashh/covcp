<?php


// find max
function getMax($arr) {
    return max($arr);
}





// find min
function getMin($arr) {
    return min($arr);
}





// find average
function getAverage($arr) {
    if (!is_array($arr)) return false;
        
    return array_sum($arr)/count($arr);
}
//test
//$array = array(5, 10, 15);
//echo getAverage($array) . "<br />"; // 10


            
            
            
            
            
// find median
function getMedian($arr) {
    // sort values
    sort($arr, SORT_NUMERIC);

    // find median
    $half = floor(count($arr)/2);
                
    // if array length is odd, return middle value. Else if even, return value between two middle values
    if(count($arr) % 2) {
        return $arr[$half];
    }
    else {
        return ($arr[$half-1] + $arr[$half]) / 2.0;
    }
}
//test
//$speeds = array(2, 0, 5, 4);
//echo getMedian($speeds) . "<br />";
            
            
            
            
            
            
// find standard deviation
// Population or sample SD?
function stdDev($arr) {
    // create an array filled with the average value of the input array
    $average = getAverage($arr);
    $averages = array_fill(0, count($arr), $average);
                
    // function to calculate the square of (value - mean)
    if (!function_exists('sd_square')) {
        function sd_square($x, $mean) { 
            return pow($x - $mean,2); 
        }
    }
                
    // map square of the difference between each value and the average value
                $squareDiffs = array_map("sd_square", $arr, $averages);
                
    // Find sum of squareDiffs values and divide by number of values (ie. find average of squareDiffs)
    $avgSquareDiff = getAverage($squareDiffs);

    $stdDev = sqrt($avgSquareDiff);
    return $stdDev;
}
//test
//$data = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 25);
//echo stdDev($data) . "<br />";
        
            

?>















