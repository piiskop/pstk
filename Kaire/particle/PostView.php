<?php
namespace particle;

/**
 * This class deals with the visual part of posts.
 *
 * @author 
 * @namespace tuts
 */
class PostView
{

	/**
	 * This function creates a HTML-block for a post item.
	 *
	 * @access public
	 * @author 
	 * @param Service $parameters['post']
	 *        	the post
	 * @return string the parsed post
	 * @uses BEGINNING_OF_URL for links
	 */
	public static function buildPost($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('particle-template.html');
		$tpl->setCurrentBlock('post-item');
		$date = strtotime($parameters['post']->getDate());
		$tpl->setVariable(
			array(
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'DATE-OF-POST' => date('d', $date),
				'MONTH-OF-POST' => date('M', $date),
				'HREF-TO-COMMENTS' => \pstk\String::translate('comments'),
				'HREF-TO-POST' => $parameters['post']->translate(
					array(
						'property' => 'heading',
						'isSlug' => true
					)),
				'LABEL-OF-POST' => $parameters['post']->translate(
					array(
						'property' => 'heading'
					)),
				'LEAD-OF-POST' => $parameters['post']->translate(
					array(
						'property' => 'lead'
					)),
				'NUMBER-OF-COMMENTS' => count(
					$parameters['post']->getComments())
			));
		$tpl->parse('post-item');
		return $tpl->get('post-item');
	}
}