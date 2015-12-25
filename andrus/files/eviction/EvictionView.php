<?php
/**
 * class EvictionView Väljatõstmise index.html vaade
 * @author peeter
 *
 */
class EvictionView{
	/**
	 * Ehitab ülesse lehe vaate
	 * @param boolean $parameters['build_result'] Kas näitame tulemust?
	 * @param string $parameters['result'] tulemuse text
	 * @param Owner $parameters['owner'] omanik
	 */
	public static function buildFormOfEviction($parameters){
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__));
		$tpl->loadTemplatefile('index.html');
		//echo '<pre>'; var_dump($parameters);echo '</pre>';
		
		if($parameters['build_result']){
			$tpl->setCurrentBlock('result');
			$tpl->setVariable(array(
					'RESULT'=>$parameters['result']
			));
			$tpl->parse('result');
		}
		
		$tpl->setCurrentBlock('form');
		$tpl->setVariable(array(
				'ISOWNERBRESENTCHECKT'=>$parameters['owner']->getIsPresent() ? ' checked="checked"':'',
				'ISOWNERAGREETCHECKT'=>$parameters['owner']->getAgrees() ? 'checked="checked"':'',
				'ISOWNERREACHABLECHECKT'=>$parameters['owner']->getIsReachable() ? 'checked="checked"':''
		));
		$tpl->parse('form');
		$tpl->parse('page');
		return $tpl->get('page');
	}
}