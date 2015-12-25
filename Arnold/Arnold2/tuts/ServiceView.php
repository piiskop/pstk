<?php
namespace tuts;

/**
 * This class deals with the visual part of services.
 *
 * @author arnold:tserepov <tserepov@gmail.com>
 * @namespace tuts
 */
class ServiceView
{

	/**
	 * This function creates a HTML-block for a service item.
	 *
	 * @access public
	 * @author arnold:tserepov <tserepov@gmail.com>
	 * @param Service $parameters['service']
	 *        	the service
	 */
	public static function buildService($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'tutshtml');
		$tpl->loadTemplatefile('/burnstudio2-template.html');
		$src = $parameters['service']->translate(
			array(
				'property' => 'src'
			));
		// @formatter:off
		$info = getimagesize(sprintf(
			'%1$simages/%2$s',
			ROOT_FOLDER, // 1
			$src // 2
		));
		// @formatter:on
		$tpl->setCurrentBlock('service');
		$tpl->setVariable(
			array(
				'ALT-IN-SERVICE' => $parameters['service']->translate(
					array(
						'property' => 'alt'
					)),
				'SRC-IN-SERVICE' => $src,
				'SIZES-IN-SERVICE' => $info[3],
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'HEADING-OF-SERVICE' => $parameters['service']->translate(
					array(
						'property' => 'heading'
					)),
				'HREF-IN-SERVICE' => $parameters['service']->translate(
					array(
						'property' => 'href'
					)),
				'LEAD-OF-SERVICE' => $parameters['service']->translate(
					array(
						'property' => 'lead'
					))
			));
		$tpl->parse('service');
		return $tpl->get('service');
	}
}