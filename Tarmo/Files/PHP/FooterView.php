<?php 
		require_once 'HTML/Template/IT.php';
		$tmpl = new \HTML_Template_IT(dirname(__FILE__) . '/../HTML');
		$tmpl->loadTemplatefile('footer.html');
		$tmpl->touchBlock('footer');
		$tmpl->parse('footer');
		echo $tmpl->get('footer');
?>