<?php
$is_auth = rand(0, 1);

require_once("functions.php");

$user_name = 'Максим'; // укажите здесь ваше имя

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
     
$name_title = "Главная";       
$main_content = include_template('index.php', array('categories' => $categories, 'lots' => $lots)); 
echo include_template('layout.php', array('is_auth'=> $is_auth, 'name_title' => $name_title, "user_name" => $user_name,
                                          'main_content' => $main_content, 'categories' => $categories));       
?>




