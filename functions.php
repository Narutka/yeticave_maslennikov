<?php
function include_template($name, $data) {
    $name = "templates/" . $name;
    $result = "";
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}


function format_number($number, $ruble){
    $number = ceil($number);
    if($number >= 1000){
    $number = number_format($number, 0, ' ', ' '); 
    }     
    return $ruble ? $number . "<b class='rub'>р</b>" : $number; 
}    
?>