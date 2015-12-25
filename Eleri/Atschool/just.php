<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Just</title>
    </head>
    <body>
        <?php
        $styles = ["Jazz", "Blues"];
        $styles[] = "Rock’n’Roll";
        $styles[count($styles)-2] = "Classic";
        
        $music = array_pop($styles);
        echo ($music);
        ?>
    </body>
</html>
