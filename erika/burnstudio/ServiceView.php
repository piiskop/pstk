<?php
namespace burnstudio;

/**
 * Services visual part
 *
 * @namespace burnstudio
 */
class ServiceView {
	/**
	 * This function creates a HTML-block for a service item.
	 *
	 * @access public
	 * @param Service $parameters['service']
	 *        	the service
	 */
	public static function buildService($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT ( "./html" );
		$tpl->loadTemplatefile('burnstudio-copy.html');
		
		$src = $parameters['service']->getSrc();
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
						'ALT-IN-SERVICE' => $parameters['service']->getAlt(),
						'SRC-IN-SERVICE' => $src,
						'SIZES-IN-SERVICE' => $info[3],
						'BEGINNING-OF-URL' => BEGINNING_OF_URL,
						'HEADING-OF-SERVICE' => $parameters['service']->getHeading(),
						'HREF-IN-SERVICE' => $parameters['service']->getHref(),
						'LEAD-OF-SERVICE' => $parameters['service']->getLead()
				));
		$tpl->parse('service');
		return $tpl->get('service');
	}
}