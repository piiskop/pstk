<?php
namespace o;

/**
 * Created on 14.09.2015
 *
 * @copyright Copyright &copy; 2015, Kalmer Piiskop <pandeero@gmail.com>
 */
// preliminary tasks
if (! isset($_SESSION)) {
	session_start();
}

setlocale(LC_TIME, 'et_EE.UTF-8');
ini_set('display_errors', 1);

if (defined('E_DEPRECATED')) {
	error_reporting(E_ALL & ~ E_DEPRECATED & ~ E_STRICT);
} else {
	error_reporting(E_ALL & ~ E_STRICT);
}

date_default_timezone_set('Europe/Tallinn');

/**
 * This class describes the algorithm for making a chart using merge sorting.
 * 
 * @author kalmer
 * @namespace o
 */
class MergeSortChart
{

	/**
	 * @access private
	 * @author kalmer
	 * @var multitype[string] a recursive array of the result of the merging.
	 * 		Every player has his/her own subarray like this:<pre>
	 *  [kalmer] => Array
        (
            [player] => kalmer
            [winners] => Array
                (
                )

            [place] => 1
        )
	 * 		</pre><code>winners</code> contains the arrays of winners of the
	 * 		current player.
	 */
	private $results = array ();

	/**
	 * This function sorts an array according to the given index.
	 *
	 * @param mixed $array the array to sort, for instance <pre>
	 * 		1 => array (
	 'firstName' => 'kalmer',
	 'lastName'  => 'piiskop',
	 'id'        => 1,
	 'object'    => $human1,
	 'title'     => 'kalmer piiskop'
	 ),
	 2 => array (
	 'firstName' => 'haide',
	 'lastName'  => 'kuivas',
	 'id'        => 2,
	 'object'    => $human2,
	 'title'     => 'haide kuivas'
	 )
	 </pre>
	 * @param array  $sortRules array whose keys are titles and
	 * 		values are rules whose key is either <code>sortAscending</code> or
	 * 		<code>type</code> with the appropriate constant as the value.
	 * @return mixed $array the sorted array, for instance <pre>
	 * 		1 => array (
	 'firstName' => 'kalmer',
	 'lastName'  => 'piiskop',
	 'id'        => 1,
	 'object'    => $human1,
	 'title'     => 'kalmer piiskop'
	 ),
	 2 => array (
	 'firstName' => 'haide',
	 'lastName'  => 'kuivas',
	 'id'        => 2,
	 'object'    => $human2,
	 'title'     => 'haide kuivas'
	 )
	 </pre>
	 */
	function multiSort($array, $sortRules)
	{

		$invokeArguments = array ();

		$ascending = SORT_ASC;
		$descending = SORT_DESC;
		$sortType = SORT_LOCALE_STRING;

		foreach ($sortRules as $title => $rules)
		{

			if ($title == 'title')
			{
				$title2 = array ();

				$invokeArguments[] = &$title2;
				//echo ' 580: <pre>'; print_r($invokeArguments); echo '</pre>';
			}
			else
			{
				${$title} = array ();

				$invokeArguments[] = &${$title};
				//echo ' 587: <pre>'; print_r($invokeArguments); echo '</pre>';
			}

			if ($rules['sortAscending'])
			{
				$invokeArguments[] = &$ascending;
				//echo ' 593: <pre>'; print_r($invokeArguments); echo '</pre>';
			}
			else
			{
				$invokeArguments[] = &$descending;
				//echo ' 598: <pre>'; print_r($invokeArguments); echo '</pre>';
			}

			if (isset($rules['type']))
			{
				$rules['type'];
			}
			else
			{
				$invokeArguments[] = &$sortType;
			}
			//echo ' 602: <pre>'; print_r($invokeArguments); echo '</pre>';
		}

		foreach ($array as $key => $row)
		{

			foreach ($row as $caption => $value)
			{

				if ($caption == 'title')
				{
					$title2[$key] = $value;
				}
				else
				{
					${$caption}[$key] = $value;
				}

			}

		}

		$invokeArguments[] = &$array;

		setlocale(LC_ALL, 'et_EE.UTF-8');
		//  echo ' 617: <pre>'; print_r($array); echo '</pre>';
		call_user_func_array('array_multisort', $invokeArguments);

		return $array;
	}

	/**
	 * This function updates recursively the loosers with the information about
	 * their winners.
	 * 
	 * @access private
	 * @author kalmer
	 * @param string $parameters['looser'] the name of the looser
	 */
	private function updateLooser($parameters)
	{

		// for each player
		foreach ($this->results as $player => $result)
		{

			/*
			 * if the looser exists in the list of the winners over the current
			 * player
			 */
			if (isset($result['winners'][$parameters['looser']]))
			{
				/*
				 * update the list of the looser in the winners' list of the
				 * current player with the list of the looser
				 */
				$this->results[$player]['winners'][$parameters['looser']] =
						$this->results[$parameters['looser']];
				// update loosers of the player
				$this->updateLooser(array(
					'looser' => $player
				));
			}

		}

	}

	/**
	 * This function cleans the winners recursively if the looser has won over
	 * his/her previous winner.
	 * 
	 * @access private
	 * @author kalmer
	 * @param boolean    $parameters['deep']    Are we digged in recursively?
	 * @param mixed[int] $parameters['results'] the actual results of merging of
	 * 		the winner
	 * @param string     $parameters['winner']  the name of the winner
	 * @param string     $parameters['looser']  the name of the looser
	 * @param string     $parameters['parent']  the name of the parent
	 */
	private function cleanWinner($parameters)
	{

		// if the winner has an entry for his/her winners
		if (isset($parameters['results']['winners']))
		{
			// for each player who has won over the current winner
			foreach ($parameters['results']['winners'] as $player => $winners)
			{
				// if we are at the first level
				if (!$parameters['deep'])
				{
					// set the parent to be the current player
					$parameters['parent'] = $player;
				}

				// if the looser is the current player
				if ($parameters['looser'] === $player)
				{
					// remove the parent from the winners over the winner
					unset($this->results[$parameters['winner']]['winners'][
						$parameters['parent']
					]);
					// for each player
					foreach ($this->results as
							$previousLooser => $previousWinners)
					{
						// if the player has set winners
						if (isset($previousWinners['winners']))
						{
							// for each past winner
							foreach ($previousWinners['winners'] as
									$previousWinner =>
									$previousWinnersOverPreviousLooser)
							{
								// if the past winner is the current winner
								if ($previousWinner === $parameters['winner'])
								{

									/*
									 * remove the past winner from the list of
									 * winners over the past looser
									 */
									unset($this->results[$previousLooser][
										'winners'
									][$previousWinner]);
									/*
									 * insert the parent to the list of winners
									 * over the past looser
									 */
									$this->results[$previousLooser][
										'winners'
									][$parameters['parent']] = $this->results[
										$parameters['parent']
									];

									// update loosers of the past looser
									$this->updateLooser(array (
										'looser' => $previousLooser
									));
								}
							}
						}
					}
				}
				// clean winners
				$this->cleanWinner(array (
					'deep'    => true,
					'results' => $winners,
					'winner'  => $parameters['winner'],
					'looser'  => $parameters['looser'],
					'parent'  => $parameters['parent']
				));
			}
		}
	}

	/**
	 * This function finds out the depth of the array.
	 * 
	 * @access private
	 * @author kalmer
	 * @param mixed  $parameters['array']          the array
	 * @param string $parameters['keyForChildren'] the key for the children
	 * @return number the depth
	 */
	private function array_depth($parameters)
	{
		if (!empty($parameters['array'][$parameters['keyForChildren']]))
		{
			$parameters['array'] =
					$parameters['array'][$parameters['keyForChildren']];
		}

		$max_depth = 1;

		foreach ($parameters['array'] as $value)
		{
			if (is_array($value))
			{
				$depth = $this->array_depth(array (
					'array'          => $value,
					'keyForChildren' => $parameters['keyForChildren']
				)) + 1;
				if ($depth > $max_depth)
				{
					$max_depth = $depth;
				}
			}
		}

		return $max_depth;
	}

	/**
	 * This function creates the chart using merge sorting.
	 * 
	 * @access public
	 * @author kalmer
	 * @param string[string[int]] $parameters['matches'] the matches where the
	 * 		index is <code>winner</code> or <code>looser</code> and the value
	 * 		is the name of either winner or looser
	 */
	public function manageResults($parameters)
	{

		// for each match result
		foreach ($parameters['matches'] as $match)
		{
			// if there is no entry for the winner yet
			if (!isset($this->results[$match['winner']]))
			{
				// set an entry for the winner
				$this->results[$match['winner']] = array (
					'player'  => $match['winner'],
					'winners' => array ()
				);
			}

			/*
			 * manage all the cases where the winner has previously lost to
			 * somebody in the winner’s winners’ critical path
			 */
			$this->cleanWinner(array (
				'deep'    => false,
				'results' => $this->results[$match['winner']],
				'winner'  => $match['winner'],
				'looser'  => $match['looser'],
				'parent'  => NULL
			));

			// set an entry for the looser
			$this->results[$match['looser']]['player'] = $match['looser'];
			// insert the list of the winner to the winners' list of the looser
			$this->results[$match['looser']]['winners'][$match['winner']] =
					$this->results[$match['winner']];

			// update loosers of the looser
			$this->updateLooser(array (
				'looser' => $match['looser']
			));
		}
// 				echo ' 381: <pre>';print_r($this->results); echo '</pre>';
		
		// for each player
		foreach ($this->results as $player => $arrayOfPlayer)
		{
			// if there is an entry for the winners by the player
			if (isset ($arrayOfPlayer['winners']))
			{
				/*
				 * set the place of the player according to the length of the
				 * critical path of the player's winners
				 */
				$this->results[$player]['place'] = $this->array_depth(array (
					'array'          => $arrayOfPlayer,
					'keyForChildren' => 'winners'
				)) - 1;
			}
			// otherwise
			else
			{
				// set the place as 1 for the player
				$this->results[$player]['place'] = 1;
			}

		}
// 		echo ' 59: <pre>';print_r($this->results); echo '</pre>';
		// sort the list of the players according to their places ascending
		$sortedResults = MergeSortChart::multiSort($this->results, array (
			'place' => array (
				'sortAscending' => TRUE,
				'type'          => SORT_NUMERIC
			)
		));
// 		echo ' 340: <pre>';print_r($sortedResults); echo '</pre>';
		foreach ($sortedResults as $player => $arrayOfPlayer)
		{
			echo ' 629: <br/>', $player, ', (', $arrayOfPlayer['place'], ')';
		}

	}

}

/**
 * @author kalmer
 * @var string[string][] index is either <code>winner</code> or
 * 		<code>looser</code>, value is the name of the player
 */
$matches = array (
// 		array (
// 				'winner' => 'kalmer',
// 				'looser' => 'mari'
// 			),
// 		array (
// 				'winner' => 'kalmer',
// 				'looser' => 'boris'
// 			),
// 		array (
// 				'winner' => 'ivar',
// 				'looser' => 'kalmer'
// 			),
// 		array (
// 				'winner' => 'jakov',
// 				'looser' => 'kalmer'
// 			),
// 		array (
// 				'winner' => 'marek',
// 				'looser' => 'kalmer'
// 			),
// 		array (
// 				'winner' => 'kristjan',
// 				'looser' => 'ivar'
// 			),
// 		array (
// 				'winner' => 'kristjan',
// 				'looser' => 'malle'
// 			),
// 		array (
// 				'winner' => 'malle',
// 				'looser' => 'ivar'
// 			),
// 		array (
// 				'winner' => 'kristjan',
// 				'looser' => 'jakov'
// 			),
// 		array (
// 				'winner' => 'taavi',
// 				'looser' => 'kristjan'
// 			),
// 		array (
// 				'winner' => 'kalmer',
// 				'looser' => 'kristjan'
// 			),
	
	
	
	array (
		'winner' => 'rainer',
		'looser' => 'illimar'
	),
	array (
		'winner' => 'tarmo',
		'looser' => 'rainer'
	),
	array (
		'winner' => 'kristjan',
		'looser' => 'kalmer'
	),
	array (
		'winner' => 'per',
		'looser' => 'rando'
	),
	array (
		'winner' => 'ülle',
		'looser' => 'riina'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'aivar'
	),
	array (
		'winner' => 'stiina',
		'looser' => 'ülle'
	),
	array (
		'winner' => 'riina',
		'looser' => 'helena'
	),
	array (
		'winner' => 'boris',
		'looser' => 'aivar'
	),
	array (
		'winner' => 'ahto',
		'looser' => 'ville'
	),
	array (
		'winner' => 'tarmo',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'tarmo',
		'looser' => 'ahto'
	),
	array (
		'winner' => 'kristi',
		'looser' => 'helena'
	),
	array (
		'winner' => 'ranno',
		'looser' => 'tarmo'
	),
	array (
		'winner' => 'ranno',
		'looser' => 'per'
	),
	array (
		'winner' => 'külli',
		'looser' => 'katrin'
	),
	array (
		'winner' => 'kristiina',
		'looser' => 'stiina'
	),
	array (
		'winner' => 'genadi',
		'looser' => 'aivar'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'boris'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'genadi'
	),
	array (
		'winner' => 'indrek',
		'looser' => 'rando'
	),
	array (
		'winner' => 'per',
		'looser' => 'genadi'
	),
	array (
		'winner' => 'ivar',
		'looser' => 'ville'
	),
	array (
		'winner' => 'per',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'riina',
		'looser' => 'kristi'
	),
	array (
		'winner' => 'ivar',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'tarmo',
		'looser' => 'per'
	),
	array (
		'winner' => 'ivar',
		'looser' => 'priit'
	),
	array (
		'winner' => 'kristiina',
		'looser' => 'külli'
	),
	array (
		'winner' => 'kristiina',
		'looser' => 'janelle'
	),
	array (
		'winner' => 'indrek',
		'looser' => 'illimar'
	),
	array (
		'winner' => 'janelle',
		'looser' => 'riina'
	),
	array (
		'winner' => 'külli',
		'looser' => 'janelle'
	),
	array (
		'winner' => 'kaie',
		'looser' => 'helena'
	),
	array (
		'winner' => 'ahto',
		'looser' => 'rainer'
	),
	array (
		'winner' => 'stiina',
		'looser' => 'janelle'
	),
	array (
		'winner' => 'ivar',
		'looser' => 'ranno'
	),
	array (
		'winner' => 'rainer',
		'looser' => 'ville'
	),
	array (
		'winner' => 'rando',
		'looser' => 'ahto'
	),
	array (
		'winner' => 'stiina',
		'looser' => 'külli'
	),
	array (
		'winner' => 'aivar',
		'looser' => 'ahto'
	),
	array (
		'winner' => 'boris',
		'looser' => 'genadi'
	),
	array (
		'winner' => 'stiina',
		'looser' => 'katrin'
	),
	array (
		'winner' => 'ivar',
		'looser' => 'kalmer'
	),
	array (
		'winner' => 'genadi',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'boris',
		'looser' => 'priit'
	),
	array (
		'winner' => 'ville',
		'looser' => 'illimar'
	),
	array (
		'winner' => 'aivar',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'kristi',
		'looser' => 'kaie'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'tarmo'
	),
	array (
		'winner' => 'katrin',
		'looser' => 'riina'
	),
	array (
		'winner' => 'kristjan',
		'looser' => 'ivar'
	),
	array (
		'winner' => 'priit',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'illimar',
		'looser' => 'rando'
	),
	array (
		'winner' => 'boris',
		'looser' => 'tarmo'
	),
	array (
		'winner' => 'illimar',
		'looser' => 'rando'
	),
	array (
		'winner' => 'ahto',
		'looser' => 'illimar'
	),
	array (
		'winner' => 'illimar',
		'looser' => 'stiina'
	),
	array (
		'winner' => 'kristiina',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'aivar',
		'looser' => 'kristiina'
	),
	array (
		'winner' => 'janelle',
		'looser' => 'katrin'
	),
	array (
		'winner' => 'illimar',
		'looser' => 'rando'
	),
	array (
		'winner' => 'rando',
		'looser' => 'stiina'
	),
	array (
		'winner' => 'ville',
		'looser' => 'stiina'
	),
	array (
		'winner' => 'priit',
		'looser' => 'per'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'indrek'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'kristjan'
	),
	array (
		'winner' => 'kalmer',
		'looser' => 'kristjan'
	),
	array (
		'winner' => 'boris',
		'looser' => 'indrek'
	)
);


$mergeSortChart = new MergeSortChart();
$mergeSortChart->manageResults(array (
	'matches' => $matches
));