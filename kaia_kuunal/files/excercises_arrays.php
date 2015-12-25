<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Harjutusi massiividega</title>
	</head>
	<body>
	<?php
	
		/*
		 * 1. Teha oma tabelid reastusteks (array)
		 */
		
		$googleDb = array(
			'students' => array(
				array(
					'id' => 1,
					'first_name' => 'Paul-Matis',
					'last_name' => 'Türnpuu'
				),
				array(
					'id' => 2,
					'first_name' => 'Kaia',
					'last_name' => 'Küünal'
				),
				array(
					'id' => 3,
					'first_name' => 'Laura-Liis',
					'last_name' => 'Pärna'
				)
			),
			'standard_bearers' => array(
				array(
					'id' => 1,
					'student_id' => 1,
					'start_year' => 2008,
					'end_year' => 2009			
				)
			),
			'assistants' => array(
				array(
					'id' => 1,
					'student_id' => 2,
					'standard_bearer_id' => 1	
				),
				array(
					'id' => 2,
					'student_id' => 3,
					'standard_bearer_id' => 1
				)
			)		
		);
		
	?>
	
	<p>Esimene massiiv: tabelid ja nende sisu</p>	
	<ol>
		<?php
		
			// Tables
			foreach ($googleDb as $tableName => $tableRows) {
				echo '<li><b>' . $tableName . '</b> (kandeid: '
					. count($tableRows) . ')';
				
				// Table rows
				foreach ($tableRows as $tableRow) {
					
					echo '<ol style="margin-bottom: 10px;">';
					
					// Row fields and values
					foreach ($tableRow as $fieldName => $fieldValue) {
						echo '<li><b>' . $fieldName . ':</b> '
							. $fieldValue . '</li>';
					}
					
					echo '</ol>';
				}
				
				echo '</li>';				
			}
			
		?>
	</ol>
		
	<hr />
	
	<?php
	
		$permacultureDb = array(
			'categories' => array(
				array(
					'id' => 1,
					'name' => 'fruit'
				),
				array(
					'id' => 2,
					'name' => 'vegetable'
				),
				array(
					'id' => 3,
					'name' => 'grain'
				),
				array(
					'id' => 4,
					'name' => 'nut'
				),
				array(
					'id' => 5,
					'name' => 'root'
				),
				array(
					'id' => 6,
					'name' => 'ornamental'
				),
				array(
					'id' => 7,
					'name' => 'oil'
				),
				array(
					'id' => 8,
					'name' => 'herb'
				),
				array(
					'id' => 9,
					'name' => 'mushroom'
				),
				array(
					'id' => 10,
					'name' => 'medicinal'
				)
			),
			'climate_zones' => array(
				array(
					'id' => 1,
					'name' => 'tropical'	
				),
				array(
					'id' => 2,
					'name' => 'subtropical'
				),
				array(
					'id' => 3,
					'name' => 'temperate'
				),
				array(
					'id' => 4,
					'name' => 'cold'
				)
			),
			'crops' => array(
				array(
					'id' => 1,
					'name' => 'lemon',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => true
				),
				array(
					'id' => 2,
					'name' => 'tomato',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => true
				),
				array(
					'id' => 3,
					'name' => 'potato',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true
				),
				array(
					'id' => 4,
					'name' => 'broccoli',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true
				),
				array(
					'id' => 5,
					'name' => 'walnut',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true
				),
				array(
					'id' => 6,
					'name' => 'chrysanthemum',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => false
				),
				array(
					'id' => 7,
					'name' => 'banana',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true
				),
				array(
					'id' => 8,
					'name' => 'rose',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => false
				),
				array(
					'id' => 9,
					'name' => 'mint',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true
				),
				array(
					'id' => 10,
					'name' => 'shiitake',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true
				),
				array(
					'id' => 11,
					'name' => 'aloe vera',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => true
				)
			),
			'crops_categories' => array(
				array(
					'id' => 1,
					'crop_id' => 1,
					'category_id' => 1
				),
				array(
					'id' => 2,
					'crop_id' => 1,
					'category_id' => 6
				),
				array(
					'id' => 3,
					'crop_id' => 2,
					'category_id' => 1
				),
				array(
					'id' => 4,
					'crop_id' => 2,
					'category_id' => 3
				),
				array(
					'id' => 5,
					'crop_id' => 3,
					'category_id' => 2
				)
			),
			'crops_zones' => array(
				array(
					'id' => 1,
					'crop_id' => 1,
					'climate_zone_id' => 1
				),
				array(
					'id' => 2,
					'crop_id' => 1,
					'climate_zone_id' => 2
				),
				array(
					'id' => 3,
					'crop_id' => 2,
					'climate_zone_id' => 3
				),
				array(
					'id' => 4,
					'crop_id' => 3,
					'climate_zone_id' => 3
				),
				array(
					'id' => 5,
					'crop_id' => 4,
					'climate_zone_id' => 3
				)
			)
		);
		
		$sportsDb = array(
			'countries' => array(
				array(
					'id' => 1,
					'name' => 'Estonia'
				),
				array(
					'id' => 2,
					'name' => 'USA'
				),
				array(
					'id' => 3,
					'name' => 'Brazil'
				)
			),
			'matches' => array(
				array(
					'id' => 1,
					'start_dt' => '2015-02-01 12:00:00',
					'end_dt' => '2015-02-01 13:30:00',
					'country_id' => 2
				),
				array(
					'id' => 2,
					'start_dt' => '2015-02-28 14:30:00',
					'end_dt' => '2015-02-28 15:45:00',
					'country_id' => 3
				)
			),
			'teams' => array(
				array(
					'id' => 1,
					'name' => 'BC Hoops',
					'country_id' => 2
				),
				array(
					'id' => 2,
					'name' => 'BC Katse',
					'country_id' => 1
				)
			),
			'matches_teams' => array(
				array(
					'id' => 1,
					'team_id' => 1,
					'match_id' => 1,
					'score' => 104,
					'is_winner' => true
				),
				array(
					'id' => 2,
					'team_id' => 2,
					'match_id' => 1,
					'score' => 64,
					'is_winner' => false
				)
			)
		);
		
		$routesTables = array(
			'cities' => array(
				'id',
				'name'
			),
			'cities_countries' => array(
				'id',
				'city_id',
				'country_id'
			),
			'countries' => array(
				'id',
				'name'
			),
			'directions' => array(
				'id',
				'description',
				'distance',
				'duration',
				'route_id'
			),
			'locations' => array(
				'id',
				'street',
				'city_country_id',
				'lat',
				'lng'
			),
			'routes' => array(
				'id',
				'start_id',
				'destination_id'
			)			
		);
		
	?>
	
	<p>Optimaalne teekond: tabelid ja nende väljad</p>
	
	<ol>
		<?php 
			foreach ($routesTables as $tableName => $tableFields) {
				echo '<li><b>' . $tableName . '</b>: '
					. implode(', ', $tableFields) . '</li>';
			}
		?>
	</ol>
	
	<hr />
	
	<?php 
		
		/*
		 *   Tee lausest 2.1 lause 2.2:
		 *		2.1 külmast tulest langes pime leek
		 * 		2.2 langes tulest külmast leek pime
		 */
		$sentence = 'külmast tulest langes pime leek';
		$wordOrder = explode(' ', $sentence);
		
		// Word indexes when rearranged: 2, 1, 0, 4, 3
		
		// Reverse words in the array: 4, 3, 2, 1, 0
		$newWordOrder = array_reverse($wordOrder);
		
		// Remove words 4 and 3 from the beginning
		$lastWords = array_splice($newWordOrder, 0, 2);
		
		// Insert them again at the end
		$newWordOrder = array_merge($newWordOrder, $lastWords);
		
		echo $sentence . '<br />' . implode(' ', $newWordOrder) . '<hr />';
		
		
		/*
		 *  Liida reastuste 3.1 ja 3.2 väärtused vastavalt indeksitele:
		 *		3.1		2,4,6,8,10
		 *		3.2		3,5,7,9,11
		 */
		$firstArr = array(2, 4, 6, 8, 10);
		$secondArr = array(3, 5, 7, 9, 11);
		
		for ($i = 0; $i < count($firstArr); $i++) {
			echo $firstArr[$i] . ' + ' . $secondArr[$i] . ' = '
				. ($firstArr[$i] + $secondArr[$i]) . '<br />';
		}

	?>
	</body>
</html>