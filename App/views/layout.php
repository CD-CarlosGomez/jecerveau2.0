<?php
namespace App\Views\Layout;
include_once "layouts/LayoutCSS.class.php";
use App\Views\Layout;
$layout= new LayoutCSS($mainMenu);
$layout->render();
?>