

<form action="php.php" method="get">
<label>Nimi</label><input type="text" name="name"/> <label>Meiliaadress</label>
<input type="text" name="emailaddress"/>
<button type="submit" ></button>
<?php

var_dump(date('d.m.Y H:i:s', mktime(0, 0, 0,1,15,1979)));


?>



<?php

$variable1  = '2';
echo '3:' , ctype_digit($varable1);


?>