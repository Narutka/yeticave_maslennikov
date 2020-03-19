<?php
require_once("functions.php");
      
$main_content = include_template('index.php', array('categories' => $categories, 'lots' => $lots)); 
echo include_template('layout.php', array('is_auth'=> $is_auth, 'name_title' => $name_title, "user_name" => $user_name,
                                          'main_content' => $main_content, 'categories' => $categories));       
?>




