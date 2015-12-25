<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function find($arr, $value)
        {
            for ($i = 0; $i <= count($arr); $i++) {
                if ($arr[$i] === $value) {
                    return 1;
                }
            }
            return -1;
        }

        $arr = ["test", 2, 1.5, false];
        $index = find($arr, false);

        echo $index;
        ?>
    </body>
</html>
