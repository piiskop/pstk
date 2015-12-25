<?php
namespace tuts;

/**
 * This class deals with the visual part of logos.
 *
 * @author arnold:tserepov <tserepov@gmail.com>
 * @namespace tuts
 */
class LogoView
{

	/**
	 * This function creates a HTML-block for a logo.
	 *
	 * @access public
	 *@author arnold:tserepov <tserepov@gmail.com>
	 * @param Logo $parameters['logo']
	 *        	the logo
	 * @uses BEGINNING_OF_URL the beginning of the URL
	 */
	public static function buildLogo($parameters)
	{
		require_once dirname(__FILE__) . '/ErrorView.php'; ///////////////////////
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK,
				array(
						new ErrorView(),
						'raiseError'
				));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'tutshtml');
		$tpl->loadTemplatefile('burnstudio2-template.html');
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