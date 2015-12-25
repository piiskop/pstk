<?php
namespace tuts;

/**
 * This class deals with the data of menus.
 * @namespace tuts
 */
class Menu
{

	/**
	 * @var array[int] the raw data of menus
	 */
private static $rawMenus = array(
		1 => array(
			'id' => 1,
			'type' => 'common'
		),
		2 => array(
			'id' => 2,
			'type' => 'outer'
		),
		3 => array(
			'id' => 3,
			'type' => 'inner'
		)
	);
}