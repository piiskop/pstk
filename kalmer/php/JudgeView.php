<?php
/**
 * This class describes the visual part of judges.
 * 
 * @author kalmer
 */
class JudgeView
{

	/**
	 * @author kalmer
	 * @var int <code>1</code> if even or <code>0</code> otherwise
	 */
	private static $even = 1;

	/**
	 * This function alternates between <code>0</code>-s and <code>1</code>-s
	 * for the suffix of the class name for coloring odd and even row
	 * differently.
	 *
	 * @access private
	 * @author kalmer
	 * @return int
	 */
	private static function makeOddEven() {

		if (JudgeView::$even > 0)
		{
			JudgeView::$even = 0;
			return 0;
		}
		else
		{
			JudgeView::$even = 1;
			return 1;
		}

	}

	/**
	 * This function builds the list of judges.
	 *
	 * @access public
	 * @author kalmer
	 * @param multitype:Judge[string] $parameters['judges'] the judges
	 * @return string
	 */
	public static function buildJudges($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('judges.html');

		$row = 0;
		$rows = '';

		foreach ($parameters['judges'] as $indexOfJudge => $judge)
		{
			$tpl->setCurrentBlock('row');
			$tpl->setVariable(array (
				'FIRST-NAME' => $judge->getFirstName(),
				'LAST-NAME' => $judge->getLastName(),
				'INDEX' => $indexOfJudge,
				'ODD-OR-EVEN' => JudgeView::makeOddEven()
			));
			$tpl->parse('row');
		}

		$tpl->setCurrentBlock('body');
		$tpl->setVariable(array (
			'ROWS' => $tpl->get('row')
		));
		$tpl->parse('body');
		return $tpl->get('body');
	}

	/**
	 * This function builds a judge.
	 * 
	 * @access public
	 * @author kalmer
	 * @param multitype:Judge[string] $parameters['judge'] the judges
	 * @return string
	 */
	public static function buildJudge($parameters)
	{
		require_once 'HTML/Template/IT.php';
		$tpl = new \HTML_Template_IT(dirname(__FILE__) . '/../html');
		$tpl->loadTemplatefile('judges.html');

		require_once dirname(__FILE__) . '/JudgeView.php';
		$image = $parameters['judge']->makeImage();

		$tpl->setCurrentBlock('judge');
		$tpl->setVariable    (array (
			'EMAIL-ADDRESS' => $parameters['judge']->getEmailAddress(),
			'FIRST-NAME'    => $parameters['judge']->getFirstName(),
			'LAST-NAME'     => $parameters['judge']->getLastName(),
			'PHONE-NUMBER'  => $parameters['judge']->getPhoneNumber(),
			'IMAGE' => $image['src'],
			'WIDTH' => $image['width'],
			'HEIGHT' => $image['height']
		));
		$tpl->parse          ('judge');
		return $tpl->get('judge');
	}

}
