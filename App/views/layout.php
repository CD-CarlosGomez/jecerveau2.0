<?php
namespace App\Views\Layout;
include_once "layouts/LayoutCSS.class.php";
include_once "layouts/WithMenu.class.php";
include_once "layouts/WithSiteMap.class.php";
include_once "layouts/WithTemplate.class.php";
use App\Views\Layout;
//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
$layout= new LayoutCSS();
$layout->render();
?>