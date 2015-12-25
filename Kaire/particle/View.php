<?php
namespace particle;

/**
 * This is the common view class.
 *
 * @author 
 * @namespace particle
 */
class View
{

	/**
	 * This function builds the CSS-part.
	 *
	 * @access private
	 * @author k
	 * @return string the CSS-part
	 * @uses BEGINNING_OF_URL for image paths
	 * @uses ROOT_FOLDER for the path to the CSS-template folder
	 */
	private static function buildCss()
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'css');
		$tpl->loadTemplatefile('from-design-to-web-template.css');
		$tpl->setCurrentBlock('css');
		$tpl->setVariable(array(
			'BEGINNING-OF-URL' => BEGINNING_OF_URL
		));
		$tpl->parse('css');
		return $tpl->get('css');
	}

	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @author k
	 * @param string $parameters['address']
	 *        	the address
	 * @param string $parameters['blogDate']
	 *        	the date of the blog
	 * @param string $parameters['blogEntry']
	 *        	the blog entry
	 * @param Human $parameters['designer']
	 *        	the designer
	 * @param string $parameters['menu']
	 *        	the body
	 * @param string $parameters['phoneNumber']
	 *        	the phone number
	 * @param string $parameters['title']
	 *        	the title
	 * @param string $parameters['twitter']
	 *        	the Twitter-time
	 * @return string the parsed HTML-structure
	 * @uses BEGINNING_OF_URL for links
	 * @uses ErrorView for displaying error messages
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_SIDE for the menu in sidebar
	 */
	public static function buildView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		require_once dirname(__FILE__) . '/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 
			array(
				new ErrorView(),
				'raiseError'
			));
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'html');
		$tpl->loadTemplatefile('particle-template.html');
		if (isset($parameters['menus'])) {
			if (isset($parameters['menus'][MENU_COMMON])) {
				$tpl->setCurrentBlock('common-menu');
				$tpl->setVariable(
					array(
						'COMMON-MENU' => $parameters['menus'][MENU_COMMON]
					));
				$tpl->parse('common-menu');
			}
			if (isset($parameters['menus'][MENU_SIDE])) {
				$tpl->setCurrentBlock('menu-in-sidebar');
				$tpl->setVariable(
					array(
						'MENU-IN-SIDEBAR' => $parameters['menus'][MENU_SIDE]
					));
				$tpl->parse('menu-in-sidebar');
			}
		}
		if (isset($parameters['posts'])) {
			$tpl->setCurrentBlock('posts');
			$tpl->setVariable(array(
				'POSTS' => $parameters['posts']
			));
			$tpl->parse('posts');
		}
		require_once dirname(__FILE__) . '/Model.php';
		$model = new Model();
		$model->setComplete();
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(
			array(
				'ACTION' => '',
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'FOLLOW-ME' => $model->translate(
					array(
						'property' => 'followMe'
					)),
				'HEADING' => $parameters['title'],
				'OLDER-POSTS' => $model->translate(
					array(
						'property' => 'olderPosts'
					)),
				'NEWER-POSTS' => $model->translate(
					array(
						'property' => 'newerPosts'
					)),
				'SEARCH' => \pstk\String::translate('search'),
				'SUBSCRIBE' => $model->translate(
					array(
						'property' => 'subscribe'
					)),
// 				'STYLE' => \tuts\View::buildCss(),
				'TITLE' => mb_strtoupper($parameters['title'], 'UTF-8')
			));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}