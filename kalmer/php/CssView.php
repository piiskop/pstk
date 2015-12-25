<?php
namespace pstk;

/**
 * This is the common CSS-view class.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace pstk
 */
class CssView
{

	/**
	 * This function builds the CSS-part.
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @param string $parameters['fileName'] the name of the CSS-file
	 * @return string the CSS-part
	 * @uses BEGINNING_OF_URL for image paths
	 * @uses ROOT_FOLDER for the path to the CSS-template folder
	 */
	public static function buildCss($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'css');
		$tpl->loadTemplatefile($parameters['fileName'] . '.css');
		$tpl->setCurrentBlock('css');
		$tpl->setVariable(array(
			'BEGINNING-OF-URL' => BEGINNING_OF_URL
		));
		$tpl->parse('css');
		return $tpl->get('css');
	}
	
}