<?php
class PupilView{
	public static function buildView($params) {
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER);
		var_dump($tpl);
		$tpl->loadTemplatefile('kontrolltoo.html');
		$tpl->setCurrentBlock('form');
		$tpl->setVariable(array (
				"NAME" =>$params["name"]
		));
		$tpl->parse('form');
		return $tpl->get('form');
	}
}