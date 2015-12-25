<?php
namespace burnstudio;
/**
 * This is the general view
 *
 * @namespace burnstudio
 */
class View {
	/**
	 * This function tells how much time has been spent.
	 *
	 * @access private
	 * @param int $time
	 *        	the UNIX timestamp
	 * @return string tells how much time ago
	 */
	
	private static function ago($time)
	{
		$periods = array(
				"sekundit",
				"minutit",
				"tundi",
				"päeva",
				"nädalat",
				"kuud",
				"aastat",
				"aastakümmet"
		);
		$lengths = array(
				"60",
				"60",
				"24",
				"7",
				"4.35",
				"12",
				"10"
		);
	
		$now = time();
	
		$difference = $now - $time;
// 		$tense = "ago";
	
		for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j ++) {
			$difference /= $lengths[$j];
		}
	
		$difference = round($difference);
	
// 		if ($difference != 1) {
// 			$periods[$j] .= "s";
// 		}
	
		return "$difference $periods[$j] tagasi ";
	}
	
	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @param string $parameters['menu']
	 *        	the body
	 * @param string $parameters['title']
	 *        	the title
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 */
	public static function buildView($parameters) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT ( "./html" );
		$tpl->loadTemplatefile ( 'burnstudio-copy.html' );
		
		
		if (isset($parameters['menu'])){					//block name
			$tpl->setCurrentBlock ( 'menu-itmes' );			//inside block name is another block name
			$tpl->setVariable ( array (
					'MENU-ITEM' => $parameters['menu']		// {MENU-ITEM} in html file
			));
			$tpl->parse('menu-items');
		}
		
		
		if (isset($parameters['services'])) {
			$tpl->setCurrentBlock('services');
			$tpl->setVariable( array(
						'SERVICES' => $parameters['services']
					));
			$tpl->parse('services');
		}
		
		
		$tpl->setCurrentBlock ( 'html' );
		$tpl->setVariable ( array (
				'TITLE' => 'Burnstudio',
				'ACTION' => '',
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'HREF-OF-VIDEOS' => 'http://youtube.com',
				'PHONE-NUMBER' => '(012) 35 6789',
				'TIME' => View::ago(strtotime('2015-11-07 12:13:29')),
		));
		$tpl->parse ( 'html' );

		return $tpl->get ( 'html' );
	}
}