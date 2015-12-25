<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $kristen = array(
        'age'=> 20,
        'sex'=> "male",
        'phoneNumbers'=> array(
            '112',
            '110'
        )
    );
        
        foreach($kristen['phoneNumbers'] as $index => $value) {
            echo '<br/>', $value;
        }
        
        ?>
    </body>
</html>
