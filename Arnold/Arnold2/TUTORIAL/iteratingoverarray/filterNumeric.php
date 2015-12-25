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

        function filterNumeric($arr)
        {
            $empty = [];

            for ($i = 0; $i <= count($arr); $i++) {

                if (is_numeric($arr[$i])) {
                    $empty[]= $arr[$i];
                }
            }
            return $empty;
        }

        $array = ["a", 1, "b", 2];

        $arr = filterNumeric($array);
        echo ("<pre>");
        echo var_dump($arr);
        echo ("</pre>");
        ?>
    </body>
</html>
