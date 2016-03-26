<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
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
            <tbody>
                <?php
                foreach ($users as $user){
                ?>
                <tr>
                    <td><?php echo $user["pkiBUser"] ?></td>
                    <td><?php echo $user["username"] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
