<?php
/**
 *
 * @author kalmer
 * @namespace o
 * @uses O_FOLDER for common files
 */
namespace o;

/**
 * Created on 16.11.2013
 * This class describes the <code>body</code>.
 *
 * @author kalmer
 * @copyright Copyright &copy; 2013, Kalmer Piiskop <pandeero@gmail.com>
 */
class BodyView
{

	/**
	 * This function builds the part of supporter logos.
	 *
	 * @access protected
	 * @author kalmer
	 * @param string                          $parameters['folder']       the
	 * 		folder for the TPL-files
	 * @param string                          $parameters['file']         the
	 * 		TPL-file name without the ending
	 * @param integer|string[string][integer] $parameters['logos']        the
	 * 		logos, whereas the lowest-level-indexes are <code>hrefOLogo</code>,
	 * 		<code>idInquiry</code> and <code>nimi</code>
	 * @param string                          $parameters['block']        the
	 * 		template block name
	 * @param string                          $parameters['category']     the
	 * 		supporter category
	 * @param integer[string]                 $parameters['sizes']        the
	 * 		<code>width</code> and <code>height</code> of the target logos
	 * @param integer                         $parameters['minimalWidth'] If the
	 * 		image is smaller than the given minimal width then our logo will be
	 * 		shown instead.
	 * @param integer $parameters['widthOfBlock']                         the
	 * 		width of the block in pixels
	 * @return string the parsed block of the logos
	 * @uses DOMAIN for addressing
	 * @uses O_FOLDER to access the manager for errors
	 * @uses View     for managing errors
	 */
	protected static function buildLogos($parameters)
	{
		require_once O_FOLDER . 'errors/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
			new ErroView(), 'raiseError'
		));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . $folder);
		$tpl->loadTemplatefile($file . '.tpl');

		foreach ($logos as $idx => $logo)
		{
			require_once dirname(__FILE__) . '/../pildid/Pic.php';

			$firstImage = new Pic;
			$firstImage->getFirstImage(
				'inquiry',
				$logo['idInquiry'],
				$sizes,
				isset($parameters['minimalWidth']) ?
						$parameters['minimalWidth'] : 200
			);

			$infoAboutFinalTargetInWeb = getimagesize($firstImage->src);

			$tpl->setCurrentBlock($block . '-supporter-logo');
			$tpl->setVariable    (array (
				$block . '-CAPTION-OF-LOGO'  => $logo['nimi'],
				$block . '-CATEGORY-IN-LOGO' => $category['id'],
				$block . '-INDEX'            => $idx,
				$block . '-LINK-OF-LOGO'     => $logo['hrefOLogo'],
				$block . '-WIDTH-OF-LOGO'    => $infoAboutFinalTargetInWeb[0],
				$block . '-HEIGHT-OF-LOGO'   => $infoAboutFinalTargetInWeb[1],
				$block . '-SUPPORTER-LOGO'   => $firstImage->src,
				$block . '-WIDTH-OF-BLOCK'   => $parameters['widthOfBlock'],
			));
			$tpl->parseCurrentBlock();
		}

		$tpl->setCurrentBlock($block . '-supporter-logos');
		$tpl->setVariable    (array (
			$block . '-CATEGORY'             => $category['id'],
			$block . '-CATEGORY-TRANSLATION' => $category['translation']
		));
		$tpl->parseCurrentBlock();
		return $tpl->get($block . '-supporter-logos');
	}

	/**
	 * This function builds one outer news.
	 *
	 * @access private
	 * @author kalmer
	 * @param string         $parameters['class']         the additional class
	 * 		name for the outer news
	 * @param string[string] $parameters['outerNewsItem'] the outer news item
	 * @param integer        $parameters['width']         the width of the
	 * 		<code>body</code> in pixels
	 * @return string the parsed block
	 * @uses O_FOLDER to access the manager for errors
	 * @uses View     for managing errors
	 */
	private static function buildOuterNews($parameters)
	{
		require_once O_FOLDER . 'errors/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
			new ErrorView(), 'raiseError'
		));
		$tpl = new \HTML_Template_IT(sprintf(
			'%1$s/../assets/tpl/%2$u',
			dirname(__FILE__),   // 1
			$parameters['width'] // 2
		));
		$tpl->loadTemplatefile('body.tpl');

		if (isset($parameters['outerNewsItem']['title']))
		{

			$tpl->setCurrentBlock('caption-in-outer-news-list');
			$tpl->setVariable    (array (
				'CAPTION-IN-OUTER-NEWS-LIST' => $parameters['outerNewsItem']['title'],
				'ADDITIONAL-CLASS'           => $parameters['class'],
				'HREF-IN-CAPTION-IN-OUTER'   => $parameters['outerNewsItem']['link']
			));
			$tpl->parseCurrentBlock();
		}

		if (isset ($parameters['outerNewsItem']['pubdate']))
		{
			$parts = explode(' (', $parameters['outerNewsItem']['author']);
			$tpl->setCurrentBlock('entering-time-in-outer-news-list');
			$tpl->setVariable(array (
				'ADDRESS-IN-TIME'        => $parts[0],
				'AUTHOR-IN-TIME'         =>
						substr($parts[1], 0, strlen($parts[1]) - 1),
				'ENTERING-TIME-IN-OUTER' => date(
					'd.n.Y',
					strtotime($parameters['outerNewsItem']['pubdate'])
				),
				'HREF-IN-TIME'           => $parameters['outerNewsItem']['link']
			));

			$tpl->parseCurrentBlock();
		}

		if (isset ($parameters['outerNewsItem']['imageurl']) && ($parameters['outerNewsItem']['imageurl'] != ''))
		{
			$tpl->setCurrentBlock('news-pic-in-outer-news-list');
			$tpl->setVariable    (array (
				'AUTHOR'                          =>
						$parameters['outerNewsItem']['media']['group_credit'],
				'NEWS-PIC-SRC-IN-OUTER-NEWS-LIST' =>
						$parameters['outerNewsItem']['imageurl'],
				'TITLE-IN-OUTER'                  => isset (
					$parameters['outerNewsItem']['media']['group_title']
				) ? $parameters['outerNewsItem']['media']['group_title'] : ''
			));
			$tpl->parseCurrentBlock();
		}

		if (isset ($parameters['outerNewsItem']['description']))
		{

			$parts = explode(
				"<strong>",
				$parameters['outerNewsItem']['description']
			);

			$tpl->setCurrentBlock('lead-in-outer-news-list');
			$tpl->setVariable    (
				'LEAD-IN-OUTER',
				substr($parts[1], 0, strlen($parts[1]) - 9)
			);
			$tpl->parseCurrentBlock();
		}
		$tpl->parse('outer-news-item');
		return $tpl->get('outer-news-item');
	}

	/**
	 * This function builds the content of the <code>body</code>.
	 *
	 * @access public
	 * @author kalmer
	 * @param string         $parameters['alias']          the alias
	 * @param string[string] $parameters['breadcrumb']     the breadcrumb as
	 * 		links and texts
	 * @param boolean        $parameters['broad']          Do we show the broad
	 * 		page?
	 * @param string         $parameters['content']        the content to be
	 * 		displayed on the page
	 * @param boolean        $parameters['error']          Are we in the error
	 * 		state?
	 * @param boolean        $parameters['facebookOnline'] Is Facebook online?
	 * @param string         $parameters['id']             the ID of the object
	 * 		(optional)
	 * @param string         $parameters['type']           the type of the
	 * 		original object
	 * @param integer        $parameters['idOfLanguage']   the ID of the
	 * 		language
	 * @param boolean        $parameters['intro']          Is it the intro page?
	 * @param Page           $parameters['page']           the page
	 * @param string         $parameters['suffix']         the suffix
	 * @param Human|boolean  $parameters['user']           the current user or
	 * 		<code>FALSE</code>
	 * @param integer        $parameters['width']          the width
	 * @uses ALBUMS                                 for link the widget for the
	 * 		Facebook page
	 * @uses DEFAULT_LANGUAGE                       for knowing the current
	 * 		language
	 * @uses DOMAIN                                 for addressing
	 * @uses Language                               for translations
	 * @uses MenuItem                               for menus
	 * @uses NestedSet                              for menus
	 * @uses NESTED_SET_MENU_FOR_INTRO              for the menu on the intro
	 * 		page
	 * @uses NESTED_SET_MENU_FOR_LOGGED_IN          for people logged in
	 * @uses NESTED_SET_MENU_FOR_MAIN_ADMINISTRATOR for the administration menu
	 * @uses NESTED_SET_MENU_FOR_REGISTERED_USER    for registered user
	 * @uses NESTED_SET_MENU_MAIN_BUTTONS           for main buttons
	 * @uses NESTED_SET_MENU_PUBLIC                 for the public menu
	 * @uses NESTED_SET_MENU_WE                     for the menu about us
	 * @uses O_FOLDER                               for the templates from "O"
	 * @uses OFFLINE                                for displaying different
	 * 		content for offline and online
	 * @uses RequisitesView                         for requisites
	 * @uses HumanView                              for log-in-form
	 * @uses View                                   for error handling
	 */
	public static function buildBody($parameters)
	{

		require_once O_FOLDER . 'errors/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
			new ErrorView(), 'raiseError'
		));

		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(sprintf(
			'%1$s/../assets/tpl/%2$u',
			dirname(__FILE__), // 1
			$parameters['width']             // 2
		));
		$tpl->loadTemplatefile('body.tpl');

		if (isset($parameters['broad']) || ($parameters['width'] < 321))
		{
			$jsNormal = '';
		}
		else
		{

			$templateForJsNormal = new \HTML_Template_IT(sprintf(
				'%1$s/../assets/tpl/%2$u',
				dirname(__FILE__),   // 1
				$parameters['width'] // 2
			));

			$templateForJsNormal->loadTemplatefile('body.tpl');

			if (!OFFLINE && isset($parameters['facebookOnline']))
			{
				$templateForJsNormal->setCurrentBlock('facebook-albums');

				$templateForJsNormal->setVariable(array (
					'SUBFOLDER-FOR-ALBUMS' => ALBUMS
				));

				$templateForJsNormal->parseCurrentBlock();
			}

			$templateForJsNormal->setCurrentBlock('js-normal');

			$templateForJsNormal->setVariable(array (
				'BEGINNING-OF-URL-IN-JS-NORMAL' => DOMAIN
			));

			$templateForJsNormal->parseCurrentBlock();

			$jsNormal = $templateForJsNormal->get('js-normal');
		}

		$templateForScripts = new \HTML_Template_IT(
			O_FOLDER . 'assets/tpl'
		);

		$templateForScripts->loadTemplatefile('page_Kai.tpl');
		$templateForScripts->setCurrentBlock ('scripts');

		$templateForScripts->setVariable(array (
			'JS-NORMAL' => $jsNormal
		));

		$templateForScripts->parse('scripts');

		$isError = (isset($parameters['isError']) && $parameters['isError']);

		if (isset($parameters['user']) && is_object($parameters['user']) &&
				!$isError)
		{

			if (isset ($parameters['breadcrumb']))
			{

				foreach ($parameters['breadcrumb'] as $link => $val)
				{
					$tpl->setCurrentBlock('position');

					$tpl->setVariable(array (
						'LINK-TO-POSITION'  => $link,
						'STEP'              => (end($parameters[
							'breadcrumb
						']) === $val) ? 'active' : 'completed',
						'VALUE-OF-POSITION' => str_replace(
							' ',
							'&#160;',
							$val
						)
					));

					$tpl->parseCurrentBlock();
				}

			}
			else if (isset ($_SESSION['nestedSets']))
			{
				require_once O_FOLDER . 'puu/NestedSet.php';

				$nestedSets = explode(',', $_SESSION['nestedSets']);

				$idOfNestedSet = $nestedSets[count($nestedSets) - 1];

				$nestedSetForPosition = new NestedSet();
				$nestedSetForPosition->setId($idOfNestedSet);
				$nestedSetForPosition->setCompleteNestedSet();

				$descendantNestedSets =
						$nestedSetForPosition->getDescendantNestedSets();

				if (isset ($descendantNestedSets[$idOfNestedSet]))
				{

					foreach ($descendantNestedSets[
						$idOfNestedSet
					]->path as $idNestedSet => $txt)
					{
						$elInPath = new NestedSet($idNestedSet);

						$descendantNestedSetsOfElementInPath =
								$elInPath->getDescendantNestedSets();

						if (isset ($descendantNestedSetsOfElementInPath[
							$idNestedSet
						]->idEl))
						{

							require_once dirname(__FILE__) .
									'/../puu/SystemMenuItem.php';

							$menuEl = new SystemMenuItem;

							$menuEl->setId($descendantNestedSetsOfElementInPath[
								$idNestedSet
							]->idEl);

							$menuEl->setCompleteSystemMenuItem();

							if (isset ($menuEl->page))
							{

								$href = '?function=loadPage&amp;page=' .
										$menuEl->page->getId();

								$caption = $menuEl->page->title;
							}
							else
							{
								$href = strtr($menuEl->ref, '&', '&amp;');

								$caption = $menuEl->title;

								if (strstr($menuEl->ref, '[ID-OF-USER]' ) > -1)
								{

									if (isset ($_SESSION['User_ID']))
									{

										$href = str_replace(
											'[ID-OF-USER]',
											'&amp;idHuman=' .
													$_SESSION['idUser'],
											$menuEl->ref
										);

									}

								}

								if (strstr(
									$menuEl->ref,
									'[ID-OF-COMPANY]'
								) > -1)
								{

									if (isset ($_SESSION['idCompany']))
									{

										$href = str_replace(
											'[ID-OF-COMPANY]',
											'&amp;idContact=' .
													$_SESSION['idCompany'],
											$menuEl->ref
										);

									}

								}

							}

							$tpl->setCurrentBlock('position');

							$tpl->setVariable(array (
								'BEGINNING-OF-URL'  => DOMAIN,
								'LINK-TO-POSITION'  =>
										isset ($href) ? $href : '#',
								'STEP'              => end(
									$descendantNestedSets[
												$idOfNestedSet
											]->path
								) === $txt ? 'active' : 'completed',
								'VALUE-OF-POSITION' =>
										str_replace(' ', '&#160;', $caption)
							));

							$tpl->parseCurrentBlock();
						}
					}

				}

			}

		}

		$menus = array ();

		require_once O_FOLDER . 'puu/SystemMenuItemView.php';

		if ($isError)
		{
			$buildMenuOfLanguages = FALSE;
		}
		else
		{
			$buildMenuOfLanguages = TRUE;

			if (isset($parameters['user']) && is_object($parameters['user']))
			{
				require_once O_FOLDER . 'puu/SystemMenuItemView.php';

				if ($parameters['user']->isMainAdministrator())
				{
					$isMainAdministrator = TRUE;

					$menus['forMainAdministrator'] = SystemMenuItemView::buildMenu(array(
						'alias'  => $parameters['alias'],
						'block'  => '2',
						'root'   => NESTED_SET_MENU_FOR_MAIN_ADMINISTRATOR,
						'suffix' => $parameters['suffix'],
						'user'   => $parameters['user'],
						'width'  => $parameters['width']
					));

					$menus['loggedIn']          =
							SystemMenuItemView::buildMenuForLoggedIn(array (
								'alias'  => $parameters['alias'],
								'user'   => $parameters['user'],
								'width'  => $parameters['width']
							));

					$menus['forRegisteredUser'] = SystemMenuItemView::buildMenu(array (
						'alias'  => $parameters['alias'],
						'block'  => 'open',
						'root'   => NESTED_SET_MENU_FOR_REGISTERED_USER,
						'suffix' => $parameters['suffix'],
						'user'   => $parameters['user'],
						'width'  => $parameters['width']
					));

				}
				else
				{
					$isMainAdministrator = FALSE;

					$menus['loggedIn']          =
							SystemMenuItemView::buildMenuForLoggedIn(array (
								'alias'  => $parameters['alias'],
								'user'   => $parameters['user'],
								'width'  => $parameters['width']
							));

					$menus['forRegisteredUser'] = SystemMenuItemView::buildMenu(array (
						'alias'  => $parameters['alias'],
						'block'  => 'open',
						'root'   => NESTED_SET_MENU_FOR_REGISTERED_USER,
						'suffix' => $parameters['suffix'],
						'user'   => $parameters['user'],
						'width'  => $parameters['width']
					));

				}

			}
			else
			{
				$isMainAdministrator = FALSE;
			}

// echo ' 679: <pre>';print_r(debug_print_backtrace()); echo '</pre>';
			$idOfObject = $parameters['page']->getId();

			if ((($parameters['page']->getTypeOfObject() === 'Page') &&
					(ID_OF_OPENING_PAGE <> $idOfObject)) ||
					($parameters['page']->getTypeOfObject() != 'Page') ||
					$isMainAdministrator)
			{

				$menus['aboutUs'] = SystemMenuItemView::buildMenu(array (
					'alias'  => $parameters['alias'],
					'block'  => 'we',
					'root'   => NESTED_SET_MENU_WE,
					'suffix' => $parameters['suffix'],
					'user'   => $parameters['user'],
					'width'  => $parameters['width']
				));

			}

		}

		$menus['public']  = SystemMenuItemView::buildMenu(array (
			'alias'  => $parameters['alias'],
			'block'  => '1',
			'root'   => NESTED_SET_MENU_PUBLIC,
			'suffix' => $parameters['suffix'],
			'user'   => $parameters['user'],
			'width'  => $parameters['width']
		));

		if (($parameters['page']->getTypeOfObject() === 'Page') &&
				(ID_OF_OPENING_PAGE == $idOfObject))
		{

			$menus['forIntro'] = SystemMenuItemView::buildMenu(array (
				'alias'  => $parameters['alias'],
				'block'  => 'intro',
				'root'   => NESTED_SET_MENU_FOR_INTRO,
				'suffix' => $parameters['suffix'],
				'user'   => $parameters['user'],
				'width'  => $parameters['width']
			));

		}

		$outerNews = array ();

		if (($parameters['width'] > 899) && !$isError && !OFFLINE)
		{
			require_once O_FOLDER . 'magpierss-0.72/rss_fetch.inc';

			$rss = fetch_rss(RSS_FEED);

			if (is_object($rss))
			{
				$firstOuterNewsItems = array_slice($rss->items, 0, 1);
				$secondOuterNewsItems = array_slice($rss->items, 1, 1);
				$remainingOuterNewsItems = array_slice($rss->items, 2, 1);

				if (($parameters['width'] > 1301) && ($parameters['width'] < 1800))
				{
					$additionalClassForOuterNews = 'CaptionInEdge';
				}
				else
				{
					$additionalClassForOuterNews = 'CaptionInWideColumn';
				}

				$outerNews['first'] = BodyView::buildOuterNews(array (
					'class'         => $additionalClassForOuterNews,
					'outerNewsItem' => $firstOuterNewsItems[0],
					'width'         => $parameters['width']
				));
				$outerNews['second'] = BodyView::buildOuterNews(array (
					'class'         => $additionalClassForOuterNews,
					'outerNewsItem' => $secondOuterNewsItems[0],
					'width'         => $parameters['width']
				));
				$outerNews['remaining'] = '';

				foreach ($remainingOuterNewsItems as $remainingItem)
				{
					$outerNews['remaining'] .= BodyView::buildOuterNews(
						array (
							'class'         => $additionalClassForOuterNews,
							'outerNewsItem' => $remainingItem,
							'width'         => $parameters['width']
						)
					);
				}

			}

		}

		if (!OFFLINE && !$isError)
		{
			require_once O_FOLDER . 'varud/Inquiry.php';

			$inquiry = new \o\Inquiry;

			$currentSupporterLogos = '';

			if (isset ($_GET['idEvent']) || isset ($_GET['iDOCompetition']))
			{

				if (isset ($_GET['idEvent']))
				{

					require_once dirname(__FILE__) .
							'/../o/turniirid/Incident.php';

					$event = new \o\Incident($_GET['idEvent']);
				}
				else
				{
					$competition = new \o\Competition($_GET['iDOCompetition']);

					$event = $competition->event;
				}

				foreach ($inquiry->categories as $cat)
				{
					$supporterLogos = $event->getLogos($cat['id']);

					if (sizeOf($supporterLogos) > 0)
					{

						$currentSupporterLogos .= BodyView::buildLogos(
							array (
								'folder'       => '/assets/tpl',
								'file'         => 'page_Kai',
								'logos'        => $supporterLogos,
								'block'        => 'current',
								'category'     => $cat,
								'sizes'        => array (
									'width'  => 132,
									'height' => 120
								),
								'widthOfBlock' => 132
							)
						);

					}

				}

			}
			else if ($parameters['width'] > 320)
			{

				foreach ($inquiry->categories as $cat)
				{

					require_once O_FOLDER . 'turniirid/Incident.php';

					$supporterLogos = Incident::getActualLogos($cat['id']);

					if (sizeOf($supporterLogos) > 0)
					{

						$currentSupporterLogos .= BodyView::buildLogos(
							array (
								'folder'       => '/assets/tpl',
								'file'         => 'page_Kai',
								'logos'        => $supporterLogos,
								'block'        => 'current',
								'category'     => $cat,
								'sizes'        => array (
									'width'  => (($parameters['width'] > 1301) ?
											200 : 122),
									'height' => 244
								),
								'widthOfBlock' => ($parameters['width'] >
										1800) ? 200 : 122
							)
						);

					}

				}

			}

		}

		$menus['mainButtons'] = SystemMenuItemView::buildMenu(array (
			'block'  => 'mainButtons',
			'root'   => NESTED_SET_MENU_MAIN_BUTTONS,
			'suffix' => $parameters['suffix'],
			'user'   => $parameters['user'],
			'width'  => $parameters['width']
		));

		$login = '';

		require_once O_FOLDER . 'View.php';

		if (!$isError)
		{
			require_once O_FOLDER . 'haldus/kasutajad/HumanView.php';

			if (isset($parameters['user']) && is_object($parameters['user']) &&
			$parameters['user']->isLoggedIn(array (
				$parameters['suffix']
			)))
			{

				$contentOfLogin = HumanView::buildLoggedIn(array (
					'suffix' => $parameters['suffix'],
					'width'  => $parameters['width']
				));
			}
			else
			{
				$contentOfLogin = \o\HumanView::buildButtonForLoginForm(array (
					'isDraggable' => FALSE,
					'width'       => $parameters['width']
				));

// 				$login .= HumanView::buildLoginForm(array (
// 					'functions'               => array (),
// 					'idOfFieldOfInfo'         => 'messageForLoggingIn',
// 					'idOfFieldOfInfoOriginal' => '',
// 					'idOfTarget'              => 'wrapperForLoggingIn',
// 					'suffix'                  => $parameters['suffix'],
// 					'width'                   => $parameters['width']
						
// 				));
			}

// echo ' 760: ', $contentOfLogin;
			$login = \o\View::buildTarget(array (
				'buildNavigation'   => FALSE,
				'content'           => $contentOfLogin,
				'highSlidable'      => FALSE,
				'id'                => '',
				'type'              => 'ButtonsOfLogin',
				'insertionAddition' => '',
				'width'             => $parameters['width']
			));

		}
// echo ' 772: ', $login;
		if (isset($parameters['broad']) && $parameters['broad'])
		{
// 			echo ' 763: ', $parameters['content'];
			$contentOfSite = BodyView::buildBig(array (
				'content' => $parameters['content'],
				'width'   => $parameters['width']
			));
		}
		else
		{
			$contentOfSite = BodyView::buildNormal(array (
				'content'               => $parameters['content'],
				'currentSupporterLogos' =>
						$isError ? NULL : $currentSupporterLogos,
				'user'                  => $parameters['user'],
				'id'                    =>
						isset($parameters['id']) ? $parameters['id'] : NULL,
				'type'                  => isset($parameters['type']) ?
						$parameters['type'] : NULL,
				'idOfLanguage'          => $parameters['idOfLanguage'],
				'login'                 => $login,
				'menus'                 => $menus,
				'outerNews'             => $outerNews,
				'page'                  => $parameters['page'],
				'rss'                   => isset($rss) ? $rss : NULL,
				'suffix'                => $parameters['suffix'],
				'width'                 => $parameters['width']
			));
		}
// echo ' 783: ', $contentOfSite;
		if (isset($_SESSION['nestedSets']) && !$isError)
		{

			$nestedSets = array_reverse(array_slice(
				explode(',', $_SESSION['nestedSets']),
				3
			));
			foreach ($nestedSets as $nestedSet)
			{
				require_once O_FOLDER . 'puu/SystemMenuItemView.php';

				$submenu = SystemMenuItemView::buildMenu(array (
					'alias'       => $parameters['alias'],
					'block'       => 'submenu',
					'root'        => $nestedSet,
					'secondLevel' => TRUE,
					'suffix'      => $parameters['suffix'],
					'user'        => $parameters['user'],
					'width'       => $parameters['width']
				));

				if ($submenu != '')
				{
					break;
				}

			}

		}

		if (($parameters['width'] > 1301) && ($parameters['width'] < 1800) && !$isError &&
				!isset($parameters['intro']))
		{
			$bestPlayers = BodyView::buildBestPlayers(array (
				'suffix' => $parameters['suffix'],
				'width'  => $parameters['width']
			));
		}
		else
		{
			$bestPlayers = '';
		}
// echo ' 974: ', FB_BADGE;
		require_once O_FOLDER . 'rekvisiidid/RequisitesView.php';
// echo ' 833: ', BodyView::buildLanguageMenu(
// 				array (
// 					'id'     => isset($parameters['id']) ?
// 							$parameters['id']: NULL,
// 					'type'   => $parameters['type'],
// 					'suffix' => $parameters['suffix'],
// 					'width'  => $parameters['width']
// 				)
// 			);
// echo ' 855: ', $login;
		$tpl->setCurrentBlock('body');
		$tpl->setVariable    (array (
			'BADGE'                        => FB_BADGE,
			'USERNAME-IN-FACEBOOK'         => ALBUMS,
			'BEST-PLAYERS-IN-BODY'         => $bestPlayers,
			'CONTENT-OF-SITE'              => $contentOfSite,
			'CURRENT-SUPPORTER-LOGOS'      => isset($currentSupporterLogos) ?
					$currentSupporterLogos : '',
			'HUMAN'                        => \o\View::buildTarget(array (
				'buildNavigation'   => TRUE,
				'highSlidable'      => TRUE,
				'id'                => '',
				'insertionAddition' => '',
				'type'              => 'user',
				'width'             => $parameters['width']
			)),
			'LANGUAGES'                    => (isset($parameters[
				'type'
			]) && $buildMenuOfLanguages) ? BodyView::buildLanguageMenu(
				array (
					'id'     => isset($parameters['id']) ?
							$parameters['id']: NULL,
					'type'   => $parameters['type'],
					'suffix' => $parameters['suffix'],
					'width'  => $parameters['width']
				)
			) : '',
			'LOCATION'                     => DOMAIN,
			'LOGGED-IN'                    => $login,
			'LOGIN'                        => \o\View::buildTarget(array (
				'buildNavigation'   => TRUE,
				'highSlidable'      => TRUE,
				'id'                => '',
				'idOfDiv'           => 'Login',
				'insertionAddition' => '',
				'type'              => 'Login',
				'width'             => $parameters['width']
			)),
			'MENU-WITH-PRIORITY-LOGGED-IN' =>
					isset($menus['loggedIn']) ? $menus['loggedIn'] : '',
			'MENU-WITH-PRIORITY-PUBLIC'    => (isset($menus['public']) ?
					$menus['public'] : ''),
			'REQUISITES'                   => RequisitesView::buildRequisites(
				array (
					'user'  => $parameters['user'],
					'width' => $parameters['width']
				)
			),
			'SCRIPTS'                      =>
					$templateForScripts->get('scripts'),
			'SUBMENU'                      => isset($submenu) ? $submenu : ''
		));
		$tpl->parseCurrentBlock();
// 		echo ' 866: ', $contentOfSite;
		return $tpl->get('body');
	}

	/**
	 * This function builds the big view.
	 *
	 * @access private
	 * @author kalmer
	 * @param string  $parameters['content'] the content of the page
	 * @param integer $parameters['width']   the width
	 * @return string the parsed HTML
	 * @uses O_FOLDER to get to the core
	 * @uses View     for managing errors
	 */
	private static function buildBig($parameters)
	{

		require_once O_FOLDER . 'errors/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
			new ErrorView(),
			'raiseError'
		));

		$tpl = new \HTML_Template_IT(sprintf(
			'%1$sassets/tpl/%2$u',
			O_FOLDER,            // 1
			$parameters['width'] // 2
		));
		$tpl->loadTemplatefile('Page.tpl');
// echo ' 895: ', $parameters['content'];
		$tpl->setCurrentBlock('big');
		$tpl->setVariable    (array (
			'BIG-CONTENT' => $parameters['content'],
		));
		$tpl->parseCurrentBlock();
		return $tpl->get('big');
	}

	/**
	 * This function builds the list of the best players.
	 *
	 * @access private
	 * @author kalmer
	 * @param string  $parameters['suffix'] the suffix
	 * @param integer $parameters['width']  the width of the <code>body</code>
	 * 		in pixels
	 * @return string the parsed list
	 * @uses O_FOLDER to access the manager for errors
	 * @uses View     for managing errors
	 */
	private static function buildBestPlayers($parameters)
	{
		require_once O_FOLDER . 'errors/ErrorView.php';
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
			new ErrorView(), 'raiseError'
		));
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(O_FOLDER . 'assets/tpl');
		$tpl->loadTemplatefile('rankings.tpl');

		require_once O_FOLDER . 'konkureerimine/Ranking.php';
		$timestamps = Ranking::getTimestamps();

		if (sizeOf($timestamps) > 0)
		{
			$rankings = Ranking::getRankings($timestamps[0]);

			$atLeastAPlayer = FALSE;

			foreach ($rankings as $idRanking)
			{
				$ranking = new Ranking($idRanking);
				if ($ranking->getPos() > 1)
				{
					break;
				}
				else
				{

					require_once dirname(__FILE__) .
							'/../haldus/kasutajad/Human.php';
					$user = new Human();
					$user->setId($ranking->getIdHuman());
					$user->setCompleteHuman($parameters);

					if ($ranking->getIdSchool() > 0)
					{

						require_once dirname(__FILE__) .
								'/../haldus/kasutajad/School.php';

						$school = new School($ranking->getIdSchool());

						$nameOSchool = $school->name;
					}
					else
					{
						$nameOSchool = '';
					}

					if ($ranking->getTypeOCompetition() == 'F')
					{
						$tpl->setCurrentBlock('females');

						$tpl->setVariable(array (
							'FIRST-NAME-OF-FEMALE' => $user->firstName,
							'LAST-NAME-OF-FEMALE'  => $ranking->getLastName(),
							'SCHOOL-OF-FEMALE'     => ($nameOSchool == '') ?
									'' : sprintf(
										' (%1$s)',
										$nameOSchool
									)
						));

					}
					else
					{
						$tpl->setCurrentBlock('males');

						$tpl->setVariable(array (
							'FIRST-NAME-OF-MALE' => $user->firstName,
							'LAST-NAME-OF-MALE'  => $ranking->getLastName(),
							'SCHOOL-OF-MALE'     => ($nameOSchool == '') ?
									'' : sprintf(
										' (%1$s)',
										$nameOSchool
									)
						));

					}

					$tpl->parseCurrentBlock();

					$atLeastAPlayer = TRUE;
				}

			}

			if ($atLeastAPlayer)
			{

				$tpl->setCurrentBlock('rankings');
				$tpl->setVariable    (array (
					'ADDITIONAL-CLASS'   => (($parameters['width'] > 1301) &&
							($parameters['width'] < 1800)) ?
							'  BoxInSidebar' : '',
					'LOCATION-IN-NORMAL' => DOMAIN
				));
				$tpl->parseCurrentBlock();
				return $tpl->get('rankings');
			}

		}

		return '';
	}

	/**
	 * This function build the middle page part taken it has three columns.
	 *
	 * @author Kalmer Piiskop
	 * @param string                     $parameters['content']
	 * 		the content
	 * @param string                     $parameters['currentSupporterLogos']
	 * 		the current supporter logos
	 * @param User|boolean               $parameters['user']
	 * 		the user or <code>FALSE</code>
	 * @param string                     $parameters['id']
	 * 		the ID of the original object (optional)
	 * @param string                     $parameters['type']
	 * 		the type of the original object
	 * @param integer                    $parameters['idOfLanguage']
	 * 		the ID of the language
	 * @param integer                    $parameters['idOfPageNews']
	 * 		the ID of the page news
	 * @param boolean                    $parameters['isError']
	 * 		are we in the error state?
	 * @param boolean                    $parameters['isIntro']
	 * 		is it the intro?
	 * @param string                     $parameters['login']
	 * 		If the user is logged in then we display his/her link and the
	 * 		options for logging in otherwise.
	 * @param string[string]             $parameters['outerNews']
	 * 		the outer news, either <code>first</code>, <code>second</code> or
	 * 		<code>remaining</code>
	 * @param string[string]             $parameters['menus']
	 * 		the menus
	 * @param Page                       $parameters['page']
	 * 		the page
	 * @param PageNews|PageNews[integer] $parameters['pageNews']
	 * 		the page news
	 * @param mixed                      $parameters['rss']
	 * 		the result of the RSS query
	 * @param string                     $parameters['suffix']
	 * 		the suffix
	 * @param integer                    $parameters['width']
	 * 		the width
	 * @uses ALBUMS                        for Facebook things
	 * @uses ALIAS_OF_PAGE                 for the page form
	 * @uses ALIAS_OF_REQUISITES           for the requisites form
	 * @uses CACHE_FOLDER                  for the cache
	 * @uses DOMAIN                        for addressing
	 * @uses FB_API_KEY                    for Facebook's things
	 * @uses FB_BADGE                      for the Facebook's badge
	 * @uses IMAGES_FOLDER                 for accessing images
	 * @uses O_FOLDER                      for common files
	 * @uses LABEL_SHOW_PAGE_FORM_UPDATE   for the label for showing the form
	 * 		for updating the page
	 * @uses LABEL_HIDE_PAGE_FORM_UPDATE   for the label for hiding the form for
	 * 		updating the page
	 * @uses SystemMenuItemView                      for menus
	 * @uses Model                         for translations
	 * @uses NESTED_SET_MENU_MAIN_BUTTONS  for main buttons
	 * @uses OFFLINE                       for checkings whether we use the
	 * 		internet connection
	 * @uses PageNews                      for managing page news
	 * @uses PageNewsView                  for managing page news
	 * @uses Pic                           for images
	 * @uses RSS_FEED                      for the outer news feed
	 * @uses View                          for managing errors
	 */
	function buildNormal($parameters)
	{

		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, array (
			new ErrorView(), 'raiseError'
		));
		$tpl = new \HTML_Template_IT(sprintf(
			'%1$s/../assets/tpl/%2$u',
			dirname(__FILE__),   // 1
			$parameters['width'] // 2
		));
		$tpl->loadTemplatefile('body.tpl');

		if ((($parameters['width'] > 899) && ($parameters['width'] < 1301)) || ($parameters['width'] > 1799))
		{
			$bestPlayers = BodyView::buildBestPlayers(array (
				'suffix' => $parameters['suffix'],
				'width'  => $parameters['width']
			));
		}

		$idsOfNews = array ();

		require_once O_FOLDER . 'View.php';

		if (isset($parameters['pageNews']))
		{

			if (is_array($parameters['pageNews']))
			{

				foreach ($parameters['pageNews'] as $idNews =>$contentONews)
				{
					require_once O_FOLDER . 'uudised/PageNews.php';

					$builtNews = PageNews::buildNewsContent(array (
						'pageNews' => $contentONews,
						'user'     => $parameters['user'],
						'width'    => $parameters['width']
					));
				}

				$idsOfNews = array_keys($parameters['pageNews']);
			}
			else
			{
				require_once O_FOLDER . 'uudised/PageNews.php';

				$builtNews = PageNews::buildNewsContent(array (
					'pageNews' => $parameters['pageNews'],
					'user'     => $parameters['user'],
					'width'    => $parameters['width']
				));

				if ($parameters['pageNews']->getIdOfPageNews() > 0)
				{
					$idsOfNews[] = $parameters['pageNews']->getIdOfPageNews();
				}

			}

		}
		else
		{

			$idOfPage = $parameters['page']->getId();
			$title    = $parameters['page']->translate(array (
				'block' => 'title'
			));
// echo ' 1096: <pre>';print_r($_SESSION);echo '</pre>';
			$tpl->setCurrentBlock('page-content');
			$tpl->setVariable    (array (
				'ADMINISTRATION-FOR-PAGE' =>
						(($parameters['page']->getTypeOfObject() === 'Page') &&
						($parameters['page']->getId() <> 0)) ?
						View::buildButtonOfObject(array (
							'alias'             => ALIAS_OF_PAGE,
							'buildNavigation'   => TRUE,
							'buildTarget'       => TRUE,
							'classes'           => 'HandleForOpening',
							'display'           => is_object(
								$parameters['user']
							) && $parameters['user']->isAllowed(
								'u',
								$parameters['page']
							) ? 'inline' : 'none',
							'forShow'           => sprintf(
								LABEL_SHOW_PAGE_FORM_UPDATE,
								$title // 1
							),
							'forHide'           => sprintf(
								LABEL_HIDE_PAGE_FORM_UPDATE,
								$title // 1
							),
							'highSlidable'      => TRUE,
							'id'                => $idOfPage,
							'idOfDiv'           =>
									('Page' . $parameters['page']->getId()),
							'insertionAddition' => '',
							'longLabel'         => TRUE,
							'post'              => '§AMPERSAND§draggable=true',
							'type'              => 'Page',
							'width'             => $parameters['width']
						)) : '',
				'CONTENT-OF-USER-PAGE'    =>
						((($parameters['page']->getTypeOfObject() === 'Page') &&
						(ID_OF_OPENING_PAGE <> $idOfPage)) ||
						$parameters['page']->getTypeOfObject() != 'Page') ?
						$parameters['content'] : '',
				'DOMAIN-FOR-FACEBOOK'     => DOMAIN,
				'ID-OF-PAGE-IN-CONTENT'   => $idOfPage,
				'SLUG-FOR-FACEBOOK'       => $parameters['page']->getSlug()
			));
			$tpl->parseCurrentBlock();

			if ((!isset($parameters['isError']) || !$parameters['isError']) &&
					($parameters['page']->getTypeOfObject() === 'Page') &&
					(sizeOf($parameters['page']->getNewsArray()) > 0))
			{
				$newsArray = $parameters['page']->getNewsArray();

				if (isset ($_GET['displayAllNews']))
				{
					require_once O_FOLDER . 'uudised/PageNewsView.php';

					$newsList = PageNewsView::buildNews(array (
						'doWeDisplayAll' => FALSE,
						'pageNews'       => $newsArray,
						'width'          => $parameters['width']
					));

					$idsOfNews = array_keys($newsArray['ids']);
				}
				else
				{

					if (sizeOf($parameters['page']->getCurrentNews()) > 0)
					{
						$currentNews = $parameters['page']->getCurrentNews();

						require_once O_FOLDER . 'uudised/PageNewsView.php';

						$newsList = PageNewsView::buildNews(array (
							'doWeDisplayAll' => FALSE,
							'pageNews'       => $currentNews,
							'width'          => $parameters['width']
						));

						$idsOfNews = array_keys($currentNews);

						if (sizeOf($currentNews) <> sizeOf($parameters['page']->newsArray))
						{
							$tpl->setCurrentBlock('all-news');

							$tpl->setVariable( array (
								'ID-OF-PAGE' => $parameters['page']->getId()
							));

							$tpl->parseCurrentBlock();
						}

					}
					else
					{
						$newsArray = $parameters['page']->getNewsArray();

						require_once O_FOLDER . 'uudised/PageNewsView.php';

						$newsList = PageNewsView::buildNews(array (
							'doWeDisplayAll' => FALSE,
							'pageNews'       => $newsArray,
							'width'          => $parameters['width']
						));
						$idsOfNews = array_keys($newsArray['ids']);
					}

				}

			}

		}

		if (sizeOf($idsOfNews) > 0)
		{
			$tpl->setCurrentBlock('ids-of-news');

			$tpl->setVariable(array (
				'IDS-OF-NEWS' => implode(',', $idsOfNews)
			));

			$tpl->parseCurrentBlock();
		}
/*
		require_once dirname(__FILE__) . '/../pildid/Pic.php';

		$images = Pic :: getImages();
		$pathToRoot = Support :: getPathToRootDir();

		foreach ($images as $idx => $img)
		{

			$picAddress = sprintf(
				'%1$s../originals/assets/images/gallery/%2$s/%3$s',
				$pathToRoot, // 1
				$img['nimi'], // 2
				$img['name'] // 3
			);

			if (is_readable($picAddress))
			{
				$info = getimagesize($picAddress);

				switch ($info[2])
				{

					case IMAGETYPE_GIF :
						{

							$pathToDerivative = sprintf(
								'%1$sgallery/%2$s/%3$s.120.gif',
								$this->pathToImages, // 1
$img['nimi'], // 2
$img['name'] // 3
);

							break;
						}

					case IMAGETYPE_JPEG :
					{

						$pathToDerivative = sprintf(
							'%1$sgallery/%2$s/%3$s.120.jpg',
							$this->pathToImages, // 1
							$img['nimi'], // 2
							$img['name'] // 3
						);

						break;
					}

					case IMAGETYPE_PNG :
					{

						$pathToDerivative = sprintf(
							'%1$sgallery/%2$s/%3$s.120.png',
							$this->pathToImages, // 1
							$img['nimi'], // 2
							$img['name'] // 3
						);

						break;
					}

					default :
					{
					}

				}

				$tpl->setCurrentBlock('image');

				$tpl->setVariable(array (
					'CAPTION-OF-IMAGE' => $img['caption'],
					'ID-OF-EVENT'      => $img['idEvent'],
					'IMAGE'            => $pathToDerivative,
					'INDEX-OF-IMAGE'   => $idx,
					'NAME-OF-EVENT'    => $img['nimi'],
					'WIDTH'            => $info[0],
					'HEIGHT'           => $info[1]
				));

				$tpl->parseCurrentBlock();
			}

		}
*/

		if ($parameters['width'] > 320)
		{
			$page = new Page;
			$pages = $page->getListOfTypePage(array (
				'forAutocompletion' => FALSE
			));
// echo ' 1519: <pre>';print_r($psages); echo '</pre>';
			require_once O_FOLDER . 'Support.php';
			$sortedPages = Support::multiSort($pages, array (
				'title' => TRUE,
				'id'    => TRUE
			));
			foreach ($sortedPages as $page)
			{
				$pageToHandle = new Page(NULL, $page['id']);
// echo ' 1528: <pre>';print_r(debug_print_backtrace()); echo '</pre>';
				if (is_object($parameters['user']) &&
						$parameters['user']->isAllowed('r', $pageToHandle) &&
						$pageToHandle->isCompetitionPage())
				{
					require_once 'puu/SystemMenuItem.php';
					$menuEl = new SystemMenuItem();

					require_once 'Slug.php';
					$slug = new Slug();
					$slug->setSlugOfSlug($pageToHandle->getSlug());
					$slug->setSlugAccordingToSlug();

					$menuEl->pageID = $slug->getIdOfSlug();
					$menuEl->setTypeOfBoundObject('page');

					$atLeastOneActive = $menuEl->setAttributes(
						FALSE,
						$page['id']
					);
				}

			}

			if (isset ($_GET['page']) && ($_GET['page'] == 1) &&
					!isset ($_GET['news']) && !OFFLINE)
			{
				$pathToRoot = Support :: getPathToRootDir();

				foreach ($images as $idx => $img)
				{

					$picAddress = sprintf(
						'%1$s../originals/assets/images/gallery/%2$s/%3$s',
						$pathToRoot,  // 1
						$img['nimi'], // 2
						$img['name']  // 3
					);

					if (is_readable($picAddress))
					{
						$info = getimagesize($picAddress);

						switch ($info[2])
						{
							case IMAGETYPE_GIF :
							{

								$pathToDerivative = sprintf(
									'%1$s%2$sgallery/%3$s/%4$s.367.gif',
									DOMAIN,        // 1
									IMAGES_FOLDER, // 2
									$img['nimi'],  // 3
									$img['name']   // 4
								);

								break;
							}
							case IMAGETYPE_JPEG :
							{

								$pathToDerivative = sprintf(
									'%1$s%2$sgallery/%3$s/%4$s.367.jpg',
									DOMAIN,        // 1
									IMAGES_FOLDER, // 2
									$img['nimi'],  // 3
									$img['name']   // 4
								);

								break;
							}
							case IMAGETYPE_PNG :
							{

								$pathToDerivative = sprintf(
									'%1$s%2$sgallery/%3$s/%4$s.367.png',
									DOMAIN,        // 1
									IMAGES_FOLDER, // 2
									$img['nimi'],  // 3
									$img['name']   // 4
								);

								break;
							}
							default :
							{
							}

						}

						$tpl->setCurrentBlock('image-in-gallery-in-news');
						$tpl->setVariable(array (
							'INDEX-OF-IMAGE-IN-GALLERY'   => $idx,
							'IMAGE-IN-GALLERY'            => $pathToDerivative,
							'ID-OF-EVENT-IN-GALLERY'      => $img['idEvent'],
							'NAME-OF-EVENT'               => $img['nimi'],
							'CAPTION-OF-IMAGE-IN-GALLERY' => $img['caption']
						));
						$tpl->parseCurrentBlock();
					}

				}

				$tpl->setCurrentBlock('gallery-in-news');
				$tpl->setVariable(array (
					'BEGINNING-OF-URL-FOR-GALLERY' => DOMAIN
				));
				$tpl->parseCurrentBlock();
			}

		}

		$bestPlayers = '';

		if (!isset($parameters['isError']) || !$parameters['isError'])
		{

			if ((($parameters['width'] > 899) && ($parameters[
				'width'
			] < 1301)) || ($parameters['width'] > 1799))
			{
				$bestPlayers = BodyView::buildBestPlayers(array (
					'suffix' => $parameters['suffix'],
					'width'  => $parameters['width']
				));
			}

		}

		require_once O_FOLDER . 'rekvisiidid/RequisitesView.php';

		$tpl->setCurrentBlock ('normal');
		$tpl->setVariable(array (
			'BADGE-IN-NORMAL'               => FB_BADGE,
			'BEST-PLAYERS-IN-NORMAL'        => $bestPlayers,
			'CURRENT-SUPPORTER-LOGOS'       => isset($parameters[
				'currentSupporterLogos'
			]) ? $parameters['currentSupporterLogos'] : '',
			'FACEBOOK-API-KEY'              => FB_API_KEY,
			'FIRST-OUTER-NEWS'              => (isset($parameters[
				'isError'
			]) && $parameters['isError'] ||
					!isset(
						$parameters['outerNews']['first']
					)) ? '' : $parameters['outerNews']['first'],
			'SECOND-OUTER-NEWS'             => (isset($parameters[
				'isError'
			]) && $parameters['isError']) ||
					!isset(
						$parameters['outerNews']['second']
					) ? '' : $parameters['outerNews']['second'],
			'REMAINING-OUTER-NEWS'          => isset($parameters[
				'isError'
			]) && $parameters['isError'] ? '' :
					(isset($parameters['outerNews']['remaining']) ?
					$parameters['outerNews']['remaining'] : $parameters['rss']),
			'ID-OF-NEWS'                    => isset($parameters[
				'idOfPageNews'
			]) ? $parameters['idOfPageNews'] : '',
			'LANGUAGES-IN-NORMAL'           => isset($parameters[
				'type'
			]) ? BodyView::buildLanguageMenu(
				array (
					'id'     => isset($parameters['id']) ?
							$parameters['id']: NULL,
					'type'   => $parameters['type'],
					'suffix' => $parameters['suffix'],
					'width'  => $parameters['width']
				)
			) : '',
			'LOGGED-IN'                     => $parameters['login'],
			'MENU-LOGGED-IN-NORMAL'         =>
					isset($menus['loggedIn']) ? $menus['loggedIn'] : '',
			'NEWS'                          =>
					isset($builtNews) ? $builtNews : '',
			'NEWS-LIST'                     =>
					isset($newsList) ? $newsList : '',
			'LOCATION-IN-NORMAL'            => DOMAIN,
			'MAIN-BUTTONS'                  =>
					SystemMenuItemView::buildWrapperForMainButtons(array (
						'menu'  => $parameters['menus']['mainButtons'],
						'width' => $parameters['width']
					)),
			'MENU-WITH-PRIORITY-LEVEL-2'    => isset($parameters[
				'menus'
			]['forMainAdministrator']) ? $parameters[
				'menus'
			]['forMainAdministrator'] : '',
			'MENU-WITH-PRIORITY-LEVEL-OPEN' => isset($parameters[
				'menus'
			]['forRegisteredUser']) ? $parameters[
				'menus'
			]['forRegisteredUser'] : '',
			'MENU-WITH-PRIORITY-PUBLIC'     => (isset($parameters[
				'menus'
			]['public']) ? $parameters['menus']['public'] : ''),
			'NESTED-SETS-IN-CURRENT-SUPPORTER-LOGOS' =>
					NESTED_SET_SUPPORTERS,
			'REQUISITES-IN-NORMAL'          =>
					\o\RequisitesView::buildRequisites(array (
						'user'  => $parameters['user'],
						'width' => $parameters['width']
					)),
			'USERNAME-IN-FACEBOOK-NORMAL'   => ALBUMS,
		));
		$tpl->parseCurrentBlock();
		return $tpl->get('normal');
	}

	/**
	 * This method builds a menu.
	 *
	 * @access private
	 * @author Kalmer Piiskop
	 * @param string  $parameters['id']      the ID of the object
	 * @param boolean $parameters['isError'] Are we in the error state?
	 * @param string  $parameters['type']    the type of the object
	 * @param string  $parameters['suffix']  the suffix
	 * @param integer $parameters['width']   the width of <code>body</code> in
	 * 		pixels
	 * @return string the parsed menu
	 * @uses ALIAS_HUMAN_LIST   for the translation of the list of humans
	 * @uses ALIAS_OF_LANGUAGES for the list of languages
	 * @uses ALT_LANGUAGE       for the alternative text of the update indicator
	 * @uses DOMAIN             for addressing
	 * @uses IMAGES_FOLDER      for displaying images
	 * @uses O_FOLDER           for the common files
	 * @uses LANGUAGE           for languages
	 * @uses TITLE_LANGUAGE     for the explanation of the change of the
	 * 		language
	*/
	private static function buildLanguageMenu($parameters)
	{

		if (!isset($parameters['isError']) || !$parameters['isError'])
		{
			require_once 'HTML/Template/IT.php';
			$tpl = new \HTML_Template_IT(sprintf(
				'%1$s/../assets/tpl/%2$u',
				dirname(__FILE__),   // 1
				$parameters['width'] // 2
			));
			$tpl->loadTemplatefile('languages.tpl');

			require_once O_FOLDER . '/keeled/Language.php';

			$language = new Language;

			if (isset($_SESSION['language']))
			{

				$language->setId($_SESSION['language']);

				$idOfLanguageToExclude = $_SESSION['language'];
			}
			else
			{

				$language->setId(DEFAULT_LANGUAGE);

				$idOfLanguageToExclude = DEFAULT_LANGUAGE;
			}

			$language->setLanguage();

			require_once O_FOLDER . 'errors/Error.php';
// echo ' 1658: ', $parameters['type'];
			$languagesInUse = Language::createLanguagesInUse(array (
				'classes'               => array (
					'SystemMenuItem',
					'Page',
					'PageNews',
					'SystemString'
				),
				'idOfLanguageToExclude' => $idOfLanguageToExclude,
				'object'                => isset($parameters['id']) ? Error::requireFile(array (
					'id'              => $parameters['id'],
					'type'            => $parameters['type'],
					'isInstance'      => TRUE,
					'isToBeCompleted' => TRUE,
					'isView'          => FALSE
				)) : NULL
			));
// echo ' 1675: <pre>';print_r($languageInUse); echo '</pre>';
			$numberOfLanguage = 0;

			foreach ($languagesInUse as $languageInUse)
			{
				$numberOfLanguage++;
				if ($numberOfLanguage < 3)
				{

					switch ($parameters['type'])
					{
						case 'Error':
						{
							require_once O_FOLDER . '/keeled/SystemString.php';
							$systemString = new SystemString();
							$systemString->setId('errors_Error_error');
							$systemString->setCompleteSystemString();

							$alias = $systemString->translate(array (
								'block' => 'title'
							));

							break;
						}
						case 'Feedback':
						{
							require_once O_FOLDER . '/keeled/SystemString.php';
							$systemString = new SystemString();
							$systemString->setId(
								'configuration_formOfFeedback'
							);
							$systemString->setCompleteSystemString();

							$alias = $systemString->translate(array (
								'block' => 'title'
							));

							break;
						}
						case 'Hierarchy':
						{
							require_once O_FOLDER . '/keeled/SystemString.php';
							$systemString = new SystemString();
							$systemString->setId('configuration_hierarchy');
							$systemString->setCompleteSystemString();

							$alias = $systemString->translate(array (
								'block' => 'title'
							));

							break;
						}
						case 'Humans':
						{
							require_once O_FOLDER . '/keeled/SystemString.php';
							$systemString = new SystemString();
							$systemString->setId(ALIAS_HUMAN_LIST);
							$systemString->setCompleteSystemString();

							$alias = $systemString->translate(array (
								'block' => 'title'
							));

							break;
						}
						case 'Pages':
						{
							require_once O_FOLDER . '/keeled/SystemString.php';
							$systemString = new SystemString();
							$systemString->setId('configuration_pages');
							$systemString->setCompleteSystemString();

							$alias = $systemString->translate(array (
								'block' => 'title'
							));

							break;
						}
						case 'SystemStrings':
						{
							require_once O_FOLDER . '/keeled/SystemString.php';
							$systemString = new SystemString();
							$systemString->setId   ('configuration_systemStrings');
							$systemString->setCompleteSystemString();

							$alias = $systemString->translate(array (
								'block' => 'title'
							));

							break;
						}
						default:
						{
							require_once O_FOLDER . '/errors/Error.php';

							$object = Error::requireFile(array (
								'id'              => $parameters['id'],
								'type'            => $parameters['type'],
								'isInstance'      => TRUE,
								'isToBeCompleted' => TRUE,
								'typeOfError'     => 'JSON',
								'isInstance'      => TRUE,
								'isView'          => FALSE
							));

							$object->setIdOfLanguage($languageInUse['id']);

							$title = $object->translate(array (
								'block' => 'title'
							));
// echo ' 1717: ', $title;
							require_once O_FOLDER . 'Slug.php';

							$alias = Slug::slugify(array (
								'original' => $title
							));

						}
					}

					$currentLanguage = new Language();
					$currentLanguage->setId($languageInUse['id']);
					$currentLanguage->setLanguage();

					$tpl->setCurrentBlock('language-in-menu');
					$tpl->setVariable(array (
						'ALIAS-OF-LANGUAGE'               => $alias,
						'DESIGNATION-OF-LANGUAGE-IN-MENU' =>
								$currentLanguage->getNaming(),
						'ID-OF-LANGUAGE-IN-MENU'          =>
								$languageInUse['id'],
						'LOCATION-OF-LANGUAGE'            => DOMAIN
					));
					$tpl->parseCurrentBlock();
				}

			}

			if (count($languagesInUse) > 2)
			{

				require_once O_FOLDER . 'FormRowView.php';

				$tpl->setCurrentBlock('box-for-languages');
				$tpl->setVariable    (array (
					'ALIAS-IN-RIGHT-SIDEBAR'            => $alias,
					'ALIAS-OF-LANGUAGES'                => ALIAS_OF_LANGUAGES,
					'ALT-LANGUAGE'                      => ALT_LANGUAGE,
					'BEGINNING-OF-URL-IN-RIGHT-SIDEBAR' => DOMAIN,
					'FIELD-OF-LANGUAGE'                 =>
							FormRowView::buildFormFieldWithMessageField(array (
								'class'               => ' Language',
								'dataFieldName'       => 'language',
								'isInfoAbove'         => FALSE,
								'mainTypeOfDataField' => 'Input',
								'typeOfBox'           => 'input',
								'suffix'              => $parameters['suffix'],
								'title'               => TITLE_LANGUAGE,
								'value'               => $language->getNaming()
							)),
					'ID-OF-LANGUAGE'                    => isset($_SESSION[
						'language'
					]) ? $_SESSION['language'] : DEFAULT_LANGUAGE,
					'PATH-TO-IMAGES-IN-RIGHT-SIDEBAR'   => IMAGES_FOLDER,
					'SUFFIX-IN-RIGHT-SIDEBAR'           =>
							$parameters['suffix']
				));
				$tpl->parseCurrentBlock();
			}
			$tpl->parse              ('languages');
			return $tpl->get('languages');
		}
		else
		{
			return '';
		}

	}

}