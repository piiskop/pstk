<?php

namespace tuts;

/**
 * This is the common view class.
 *
 * @namespace tuts
 */
class View {
	
	/**
	 * This function tells how much time has been spent.
	 */
	private static function ago($time) {
		$periods = array (
				"second",
				"minute",
				"hour",
				"day",
				"week",
				"month",
				"year",
				"decade"
		);
		$lengths = array (
				"60",
				"60",
				"24",
				"7",
				"4.35",
				"12",
				"10"
		);
	
		$now = time ();
	
		$difference = $now - $time;
		$tense = "ago";
	
		for($j = 0; $difference >= $lengths [$j] && $j < count ( $lengths ) - 1; $j ++) {
			$difference /= $lengths [$j];
		}
	
		$difference = round ( $difference );
	
		if ($difference != 1) {
			$periods [$j] .= "s";
		}
	
		return "$difference $periods[$j] ago ";
	}
	
	/**
	 * This function builds the main structure in HTML.
	 *
	 * @param string $parameteres['menu']
	 *        	the body
	 * @param string $parameters['title]
	 *        	the title
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 */
	public static function buildView($parameters) 
	{	
		require_once 'HTML/Template/IT.php';
		require_once dirname(__FILE__) . '/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK,
				array(
						new ErrorView(),
						'raiseError'
				));
		$tpl = new \HTML_Template_it ( ROOT_FOLDER . 'html' );
		$tpl->loadTemplatefile ( 'from-design-to-web-template.html' );
		
		
		////
		
		if (isset($parameters['logos'])){
			$tpl->setCurrentBlock('logos');
			$tpl->setVariable(array(
				'LOGO' => $parameters['logos']	
			));
			$tpl->parse('logos');
		}
		
		if (isset($parameters['menus'])) {
			if (isset($parameters['menus'][MENU_COMMON])) {
				$tpl->setCurrentBlock('menu-items');
				$tpl->setVariable(
					array(
						'MENU-ITEMS' => $parameters['menus'][MENU_COMMON]
					));
				$tpl->parse('menu-items');
				// echo ' 190: ', $tpl->get('menu-items');
			}
			if (isset($parameters['menus'][MENU_OUTER])) {
				$tpl->setCurrentBlock('outer-links');
				$tpl->setVariable(
					array(
						'OUTER-LINKS' => $parameters['menus'][MENU_OUTER]
					));
				$tpl->parse('outer-links');
			}
			if (isset($parameters['menus'][MENU_INNER])) {
				$tpl->setCurrentBlock('inner-links');
				$tpl->setVariable(
					array(
						'INNER-LINK' => $parameters['menus'][MENU_INNER]
					));
				$tpl->parse('inner-links');
			}
		}
		
		
		
		////
		
		if (isset ( $parameters ['services'] )) {
			$tpl->setCurrentBlock ( 'services' );
			$tpl->setVariable ( array (
					'SERVICES' => $parameters ['services'] 
			) );
			$tpl->parse ( 'services' );
		}
		
		$tpl->setCurrentBlock ( 'html' );
		$tpl->setVariable ( array (
				'CALL-US' => 'Call us',
				'NOW' => 'Now',
				'QUICK' => 'Quick',
				'VIDEOS' => 'Video Tour',
				'OUR-WORKS' => 'How we design our works!',
				'TWITTER' => 'Twitter',
				'FEED' => 'Feed',
				'LIKE-US' => 'Like us on',
				'FACEBOOK' => 'Facebook',
				'ACTION' => '',
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'HREF-OF-VIDEOS' => 'http://youtube.com',
				'PHONE-NUMBER' => '(012) 35 6789',
				'TIME' => View::ago ( strtotime ( '2015-11-07 12:13:29' ) ),
				'TITLE' => 'Insert title here' 
		) );
		$tpl->parse ( 'html' );
		return $tpl->get ( 'html' );
	}
}