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
        $arr = ["Plum","Orange","Donkey","Carrot","JavaScript"];
        
        $max = count($arr)-1;
        $min = 0;
        
        $rand = rand($min, $max);
        echo ($arr[$rand]);
        ?>
    </body>
</html>
