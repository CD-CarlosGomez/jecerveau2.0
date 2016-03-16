<?php
namespace App\Views\Layout;
include_once "LayoutCSS.class.php";
include_once "WithMenu.class.php";
use App\Views\Layout;
//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
$layout= new WithMenu(new LayoutCSS());
$layout->render();
?>
