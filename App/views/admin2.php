<?php
namespace App\Models\Layout;
defined("APPPATH") OR die("Access denied");
use App\Models\Layout;

//$layout=new WithSiteMap(new WithTemplate(new WithMenu(new LayoutCSS())));
$layout= new \LayoutCSS();
$layout->render();
?>











<!--DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php //echo $title ?></title>
    </head>
    <body>
        <table class="table">

            <thead>
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Nombre
                    </th>
                </tr>
            </thead>
            <tbody-->
                <?php
                //foreach ($users as $user)
                //{
                ?>
                <!--tr>
                    <td><?php //echo $user["id"] ?></td>
                    <td><?php //echo $user["nombre"] ?></td>
                </tr-->>
                <?php
                //}
                ?>
            <!--/tbody>
        </table>
    </body>
</html--->
