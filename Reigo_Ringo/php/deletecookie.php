
<?php

// et kustutada selleks tuleb määrata aegumistähtaeg minevikku, näiteks 100 sekundit tagasi
setcookie ("kasutaja", "", time() - 100);

echo 'kustutatud';

?>