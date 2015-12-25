<?php

require_once 'conf.php';

class millegiView{

	public static function vastus($parameters){
		
		require_once 'C:/wamp/bin/php/php5.4.12/Template/IT.php';
		
		$tpl = new \HTML_Template_IT(dirname(__FILE__));
		$tpl->loadTemplatefile('final.html');
	
		$tpl->setCurrentBlock('html');
			$tpl->setVariable(array(
					'VASTUS'=>$parameters['vastus']
			));
		$tpl->parse('html');
		return $tpl->get('html');
	}	
		
}
