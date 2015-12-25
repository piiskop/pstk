<?php

/**
 * 
 * 
 */
require_once 'Country.php';
require_once 'TvSeries.php';
require_once 'CountryHasTvSeries.php';


/*
echo $country->getId ();
echo $country2->getId ();
echo '<br>';

echo $country->getName ();
echo $country2->getName ();
echo sizeof ( $countries );
echo '<pre>';var_dump ( $countries );echo '</pre>';

echo '<pre>';var_dump ( $countries2 );echo '</pre>';
echo $countries2 [1]->getName ();


echo $tvseries->getId ();
echo $tvseries->getName();
echo $tvseries->getType();
echo $tvseries->getSeasons();
echo $tvseries->getStart_date();
echo $tvseries->getEnd_date();
echo '<br>';
echo $tvseries2->getId ();
echo $tvseries2->getName();
echo $tvseries2->getType();
echo $tvseries2->getSeasons();
echo $tvseries2->getStart_date();
echo $tvseries2->getEnd_date();
echo '<br>';


echo sizeof ( $tvserieses );
echo '<pre>';var_dump ( $tvserieses );echo '</pre>';

echo '<pre>';var_dump ( $tvserieses2 );echo '</pre>';
echo $tvserieses2 [1]->getName ();
*/
$CountryHasTvSeries = new CountryHasTvSeries;
$CountryHasTvSeries->setCountry_idCountry ( 1 );
$CountryHasTvSeries->setTvSeries_IdTvSeries ( 1 );

$CountryHasTvSeries2 = new CountryHasTvSeries;
$CountryHasTvSeries2->setCountry_idCountry ( 1 );
$CountryHasTvSeries2->setTvSeries_IdTvSeries ( 2 );

$allCountries = country::getCountries();
$allCountries [1]->insertIdsOfTvSeries(1);
$allCountries [1]->insertIdsOfTvSeries(2);
$allTvSeries = tvSeries::getTvSeries();
$allTvSeries [1]->insertIdsOfCountries(1);
$allTvSeries [2]->insertIdsOfCountries(1);

foreach ($allCountries as $id=>$country){
	
	echo '<br>', $country -> getName();
	
	foreach ($country -> idsOfTvSeries() as $TvSeriesId){
		
		echo '<br>', $allTvSeries [$TvSeriesId] -> getName();
		
	}
	
} 

echo '<br>';
echo '<pre>';var_dump ( $allTvSeries );echo '</pre>';
foreach ($allTvSeries as $id=>$TvSeries){
	
	echo '<br>', $TvSeries -> getName();
	
	foreach ($TvSeries -> idsOfCountries() as $CountryId) {
		
		echo '<br>', $allCountries [$CountryId] -> getName();
			
	}	
	
}






