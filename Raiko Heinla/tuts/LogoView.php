<?php
namespace tuts;

/**
 * this class deals with the visual part of logos
 */

class LogoView
{
	/**
	 * this function creates a HTML-block for a logo
	 */
	
	public static function buildLogo($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_it(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('from-design-to-web-template.html');
		
		$tpl->setCurrentBlock('logo');
		$tpl->setVariable(
			array(
				'ALT-OF-LOGO' => $parameters['logo']->getAlt(),
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'SRC-OF-LOGO' => $parameters['logo']->getSrc(),
				'SIZES-OF-LOGO' => $parameters['logo']->getSizes()
			));
		$tpl->parse('logo');
		return $tpl->get('logo');
	}
}