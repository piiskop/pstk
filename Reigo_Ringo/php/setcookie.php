<?php

/*
selleks et küpsist luua: 
setcookie(
	nimi, 
	väärtus, 
	kui kaua eksisteerib (kasutada ka kustutamiseks), 
	teekond serveris kus küpsis ligipääsetav,
	domeen mille jaoks küpsis on ligipääsetav, 
	kas küpsist peaks saatma kliendilt üle turvalise http ühenduse, 
	kas ligipääsetav läbi http protokolli
);
*/

// $_COOKIE on muutuja (massiiv ehk array, kus võti => väärtus) mille abil saab küpsisega asju teha
// alguses kontroll kas küpsis on juba olemas

if (!isset($_COOKIE['kasutaja'])) {
	
	echo "now creates cookie \n";
	
	$cookie_name = 'kasutaja';
	$cookie_value = 'Reigo Ringo';
	
	// kui kehtivuse lõpp on tulevikus siis +, aeg on sekundites
	setcookie($cookie_name, $cookie_value, time() + 1000);
	
	echo 'tehtud';
	
} else {
	echo 'cookie exists';
}

?>
