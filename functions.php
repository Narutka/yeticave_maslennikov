<?php
$is_auth = rand(0, 1);
$user_name = 'Максим'; // укажите здесь ваше имя     
$name_title = "Главная"; 

$categories = array("boards" => "Доски и лыжи",
                    "attachment" => "Крепления",
                    "boots" => "Ботинки",
                    "clothing" => "Одежда", 
                    "tools" => "Инструменты",
                    "other" => "Разное");

$lots = array(array("name" => "2014 Rossignol District Snowboard", "category" => "Доски и лыжи", "cost" => 10999, "src" => "img/lot-1.jpg"),
              array("name" => "DC Ply Mens 2016/2017 Snowboard", "category" => "Доски и лыжи", "cost" => 159999, "src" => "img/lot-2.jpg"),
              array("name" => "Крепления Union Contact Pro 2015 года размер L/XL", "category" => "Крепления", "cost" => 8000, "src" => "img/lot-3.jpg"),
              array("name" => "Ботинки для сноуборда DC Mutiny Charocal", "category" => "Ботинки", "cost" => 10999, "src" => "img/lot-4.jpg"),
              array("name" => "Куртка для сноуборда DC Mutiny Charocal", "category" => "Одежда", "cost" => 7500, "src" => "img/lot-5.jpg"),
              array("name" => "Маска Oakley Canopy", "category" => "Разное", "cost" => 5400, "src" => "img/lot-6.jpg"));

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

function close_lots(){
    $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
    $now = mktime(date("H"), date("i"), 0, date("m"), date("d"), date("Y"));   
    $diff = $tomorrow - $now;  
    $hours = floor($diff/3600); 
    $min = $diff/60 - $hours*60;   
    return sprintf("%02d:%02d", $hours, $min); 
}
?>