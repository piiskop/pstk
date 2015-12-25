<?php
/**
 * returns 'getAdress'
 * leiab addressi atribuutid 'street, 'city', 'country'
 * @author rainer, armin
 * @param string $street
 * @param string $city
 * @param string $country
 * @return number välja
 * @echo 'Kuu Paide Soome'
 */
function getAddress($street = '', $city = '', $country = '') {
	if (mb_strlen($street) > 10)
	{
		$modifiedStreet = ucfirst($street);
	}
	else if (mb_strlen($street) > 5) {
		$modifiedStreet = strlen($street);
	}
	else (mb_strlen($street)<5);
	{}
	$rowOfStreet = '<br/>' . $modifiedStreet;
	$country = ucfirst($country);
	$address = $street  + ' ' + $city + ' ' + $country;
	return $address;
}

$street="Oja";
echo 'Ja ilusad aadressid on '.getAddress(Jalaka, Kihnu, Eesti);
echo 'Istu. Tubli. Viis.';
echo getAddress('Kuu', 'Paide', 'Soome');

// $target= 'city'
