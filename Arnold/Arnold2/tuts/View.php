<?php
namespace tuts;

/**
 * This is the common view class.
 *
 * @author arnold:tserepov <tserepov@gmail.com>
 * @namespace tuts
 */
class View
{

	/**
	 * This function creates a human-readable string with the time value and
	 * unit.
	 *
	 * @access private
	 * @author arnold:tserepov<tserepov@gmail.com>
	 * @param int $parameters['time']
	 *        	the time value
	 * @param string $parameters['unitInSingular']
	 *        	the unit in singular
	 * @param string $parameters['unitInPlural']
	 *        	the unit in plural
	 * @return string the human-readable string
	 */
	private static function generatePartialString($parameters)
	{
		// echo ' <br/>101: ', $parameters['time'];
		// @formatter:off
		if ($parameters['time'] > 1) {
			return sprintf(
				'%1$u&#160%2$s',
				$parameters['time'], // 1
				$parameters['unitInPlural'] // 2
				);
		}
		else {
			return sprintf(
				'%1$u&#160%2$s',
				$parameters['time'], // 1
				$parameters['unitInSingular'] // 2
				);
		}
		// @formatter:on
	}

	/**
	 * This function finds the difference between two timestamps and constructs
	 * a
	 * human-readable string for it.
	 *
	 * @access private
	 * @author arnold:tserepov <tserepov@gmail.com.
	 * @param string $parameters['timestampInPast']
	 *        	the timestamp in the past in the format
	 *        	<code>/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u</code>
	 * @param string $parameters['timestampInFuture']
	 *        	the timestamp in the future in the format
	 *        	<code>/\d{4}-\d{1,2}-\d{1,2}\s\d{1,2}:\d{1,2}:\d{1,2}/u</code>
	 * @return string the human-readable string
	 */
	private static function findDifference($parameters)
	{
		if (isset($parameters['timestampInPast'])) {
			try {
				$timestampInPast = new \DateTime($parameters['timestampInPast']);
			}
			catch (\Exception $e) {
				// @formatter:off
				die(
					sprintf(
						'Varasem ajatempel ei ole sobivas vormingus. Veateade: %1$s Teekond vea olukorrani: %2$s', 
						$e->getMessage(), // 1
						$e->getTraceAsString() // 2
					));
				// @formatter:on
			}
		}
		else {
			$timestampInPast = new \DateTime();
		}
		if (isset($parameters['timestampInFuture'])) {
			try {
				$timestampInFuture = new \DateTime(
					$parameters['timestampInFuture']);
			}
			catch (Exception $e) {
				// @formatter:off
				die(
					\sprintf(
						'Hilisem ajatempel ei ole sobivas vormingus. Veateade: %1$s Teekond vea olukorrani: %2$s', 
						$e->getMessage(), // 1
						$e->getTraceAsString() // 2
					));
				// @formatter:on
			}
		}
		else {
			$timestampInFuture = new \DateTime();
		}
		if ($timestampInFuture->getTimestamp() > $timestampInPast->getTimestamp()) {
			$difference = $timestampInPast->diff($timestampInFuture);
		}
		else {
			$difference = $timestampInFuture->diff($timestampInPast);
		}
		$partsOfTime = array();
		if ($difference->y > 0) {
			$partsOfTime[] = \tuts\View::generatePartialString(
				array(
					'time' => $difference->y,
					'unitInSingular' => \pstk\String::translate('year'),
					'unitInPlural' => \pstk\String::translate('years')
				));
		}
		if ($difference->m > 0) {
			$partsOfTime[] = \tuts\View::generatePartialString(
				array(
					'time' => $difference->m,
					'unitInSingular' => \pstk\String::translate('month'),
					'unitInPlural' => \pstk\String::translate('months')
				));
		}
		if ($difference->d > 0) {
			$partsOfTime[] = \tuts\View::generatePartialString(
				array(
					'time' => $difference->d,
					'unitInSingular' => \pstk\String::translate('day'),
					'unitInPlural' => \pstk\String::translate('days')
				));
		}
		if ($difference->h > 0) {
			$partsOfTime[] = \tuts\View::generatePartialString(
				array(
					'time' => $difference->h,
					'unitInSingular' => \pstk\String::translate('hour'),
					'unitInPlural' => \pstk\String::translate('hours')
				));
		}
		if ($difference->i > 0) {
			$partsOfTime[] = \tuts\View::generatePartialString(
				array(
					'time' => $difference->i,
					'unitInSingular' => \pstk\String::translate('minute'),
					'unitInPlural' => \pstk\String::translate('minutes')
				));
		}
		if ($difference->s > 0) {
			$partsOfTime[] = \tuts\View::generatePartialString(
				array(
					'time' => $difference->s,
					'unitInSingular' => \pstk\String::translate('second'),
					'unitInPlural' => \pstk\String::translate('seconds')
				));
		}
		$humanReadableString = implode(" ", $partsOfTime);
		// echo ' <br/>201: ', $humanReadableString;
		return $humanReadableString;
	}

	/**
	 * This function builds the CSS-part.
	 *
	 * @access private
	 * @author arnold:tserepov<tserepov@gmail.com>
	 * @return string the CSS-part
	 * @uses BEGINNING_OF_URL for image paths
	 * @uses ROOT_FOLDER for the path to the CSS-template folder
	 */
	private static function buildCss()
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'tutscss');
		$tpl->loadTemplatefile('burnstudio2-template.css');
		$tpl->setCurrentBlock('css');
		$tpl->setVariable(array(
			'BEGINNING-OF-URL' => BEGINNING_OF_URL
		));
		$tpl->parse('tutscss');
		return $tpl->get('tutscss');
	}

	/**
	 * This function builds the main structure in HTML.
	 *
	 * @access public
	 * @author arnold<tserepov@gmail.com>
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
	 * @uses MENU_COMMON for the common menu
	 * @uses MENU_OUTER for the menu of outer links
	 * @uses MENU_INNER for the menu of inner links
	 */
	public static function buildView($parameters)
	{
		require_once 'HTML/Template/IT.php';
		require_once dirname(__FILE__) . '/ErrorView.php'; ///////////////////////
		\PEAR::setErrorHandling(PEAR_ERROR_CALLBACK,
				array(
						new ErrorView(),
						'raiseError'
				));
		$tpl = new \HTML_Template_IT(ROOT_FOLDER . 'tutshtml');
		$tpl->loadTemplatefile('burnstudio2-template.html');
		// echo ' 182: <pre>';var_dump($parameters); echo '</pre>';
		if (isset($parameters['logos'])) {
			$tpl->setCurrentBlock('logos');
			$tpl->setVariable(array(
				'LOGO' => $parameters['logos']
			));
			$tpl->parse('logos');
		}
		if (isset($parameters['menus'])) {
			if (isset($parameters['menus'][MENU_COMMON])) {
				$tpl->setCurrentBlock('menu-items');
				$tpl->setVariable(
					array(
						'MENU-ITEMS' => $parameters['menus'][MENU_COMMON]
					));
				$tpl->parse('menu-items');
				// echo ' 190: ', $tpl->get('menu-items');
			}
			if (isset($parameters['menus'][MENU_OUTER])) {
				$tpl->setCurrentBlock('outer-links');
				$tpl->setVariable(
					array(
						'OTHER' => \pstk\String::translate('other'),
						'LINKS' => \pstk\String::translate('links'),
						'OUTER-LINKS' => $parameters['menus'][MENU_OUTER]
					));
				$tpl->parse('outer-links');
			}
			if (isset($parameters['menus'][MENU_INNER])) {
				$tpl->setCurrentBlock('inner-links');
				$tpl->setVariable(
					array(
						'INNER-LINK' => $parameters['menus'][MENU_INNER]
					));
				$tpl->parse('inner-links');
			}
		}
		if (isset($parameters['services'])) {
			$tpl->setCurrentBlock('services');
			$tpl->setVariable(
				array(
					'SERVICES' => $parameters['services']
				));
			$tpl->parse('services');
		}
		$tpl->setCurrentBlock('html');
		$tpl->setVariable(
			array(
				'ACTION' => '',
				'ADDRESS' => $parameters['address'],
				'BEGINNING-OF-URL' => BEGINNING_OF_URL,
				'BLOG-DATE' => date('m.d.Y', strtotime($parameters['blogDate'])),
				'BLOG-ENTRY' => $parameters['blogEntry'],
				'LATEST' => \pstk\String::translate('latest'),
				'BLOG' => \pstk\String::translate('blog'),
				'HREF-OF-BLOG' => BLOG,
				'CALL-US' => \pstk\String::translate('callUs'),
				'NOW' => \pstk\String::translate('now'),
				'EMAIL-OF-DESIGNER' => $parameters['designer']->getEmail(),
				'HREF-OF-DESIGNER' => $parameters['designer']->getHref(),
				'LABEL-OF-DESIGNER' => $parameters['designer']->getLabel(),
				'NAME-OF-DESIGNER' => \str_replace(' ', '&#160', 
					$parameters['designer']->getName()),
				'HREF-OF-VIDEOS' => VIDEOS,
				'PHONE-NUMBER' => $parameters['phoneNumber'],
				'QUICK' => \pstk\String::translate('quick'),
				'VIDEOS' => \pstk\String::translate('videos'),
				'HEADING-TO-VIDEOS' => \pstk\String::translate(
					'headingToVideos'),
				'SEARCH' => \pstk\String::translate('search'),
				'STYLE' => \tuts\View::buildCss(),
				'TIME' => \tuts\View::findDifference(
					array(
						'timestampInPast' => $parameters['twitter']
					)),
				'TITLE' => $parameters['title'],
				'TWITTER' => \pstk\String::translate('twitter'),
				'FEED' => \pstk\String::translate('feed'),
				'LIKE' => \pstk\String::translate('like'),
				'OUR' => \pstk\String::translate('our'),
				'LOCATION' => \pstk\String::translate('location'),
				'DESIGNED-BY' => \pstk\String::translate('designedBy'),
			));
		$tpl->parse('html');
		return $tpl->get('html');
	}
}