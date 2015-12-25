<?php
namespace tuts;

/**
 * This is the common view class.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace tuts
 */
class View
{

	/**
	 * This function tells how much time has been spent.
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param int $time
	 *        	the UNIX timestamp
	 * @return string tells how much time ago
	 */
	private static function ago($time)
	{
		$periods = array(
			"second",
			"minute",
			"hour",
			"day",
			"week",
			"month",
			"year",
			"decade"
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
		$tense = "ago";
		
		for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j ++) {
			$difference /= $lengths[$j];
		}
		
		$difference = round($difference);
		
		if ($difference != 1) {
			$periods[$j] .= "s";
		}
		
		return "$difference $periods[$j] ago ";
	}

	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param string $parameters['menu']
	 *        	the body
	 * @param string $parameters['title']
	 *        	the title
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 */
	public static function buildView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('from-design-to-web-template.html');
		if (isset($parameters['menu'])) {
			$tpl->setCurrentBlock('menu-items');
			$tpl->setVariable(
				array(
					'MENU-ITEMS' => $parameters['menu']
				));
			$tpl->parse('menu-items');
		}
		if (isset($parameters['services'])) {
			$tpl->setCurrentBlock('services');
			$tpl->setVariable(
				array(
					'SERVICES' => $parameters['services']
				));
			$tpl->parse('services');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(
			array(
				'ACTION' => '',
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'HREF-OF-VIDEOS' => 'http://youtube.com',
				'PHONE-NUMBER' => '(012) 35 6789',
				'TIME' => View::ago(strtotime('2015-11-07 12:13:29')),
				'TITLE' => 'Insert title here'
			));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}