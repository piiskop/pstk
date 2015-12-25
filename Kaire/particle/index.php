<?php
namespace particle;
require_once dirname(__FILE__) . '/settings.php';

/**
 * This class controls everything.
 *
 * @author k
 * @namespace particle
 */
class Controller
{

	/**
	 * This function is the stn.
	 *
	 * @access public
	 * @author k
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_SIDE for the menu in sidebar
	 * @uses View for the visual part
	 */
	public static function start()
	{
		require_once dirname(__FILE__) . '/MenuElement.php';
		require_once dirname(__FILE__) . '/Post.php';
		$posts = \particle\Post::getListOfTypePost(
			array(
				'forAutocompletion' => false
			));
		$blockOfPosts = '';
		foreach ($posts as $idPost => $post) {
			require_once dirname(__FILE__) . '/PostView.php';
			$blockOfPosts .= \particle\PostView::buildPost(
				array(
					'post' => $post['object']
				));
		}
		require_once dirname(__FILE__) . '/Model.php';
		$model = new \particle\Model();
		$model->setComplete();
		require_once dirname(__FILE__) . '/MenuView.php';
		require_once dirname(__FILE__) . '/View.php';
		echo \particle\View::buildView(
			array(
				'menus' => array(
					MENU_COMMON => MenuView::buildMenu(
						array(
							'type' => MENU_COMMON
						)),
					MENU_SIDE => MenuView::buildMenu(
						array(
							'type' => MENU_SIDE
						))
				),
				'posts' => $blockOfPosts,
				'title' => $model->translate(
					array(
						'property' => 'title'
					))
			));
	}
}
\particle\Controller::start();