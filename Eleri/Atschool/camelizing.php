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

        function camelize($str)
        {
            $splitting = explode("-", $str);
            foreach ($splitting as $index => $value) {
                if ($index > 0) {
                    $bigLetter = mb_strtoupper(substr($value, 0, 1), "UTF-8");
                    $restPiece = substr($value, 1);
                    $splitting[$index] = $bigLetter.$restPiece;
                }
            }
            return implode("", $splitting);
        }

        $i = camelize("background-color");
        $j = camelize("list-style-image");
        echo $i. "<br>";
        echo $j;
        ?>
    </body>
</html>
