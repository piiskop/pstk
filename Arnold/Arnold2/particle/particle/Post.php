<?php
namespace particle;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class deals with the data of posts.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace particle
 */
class Post extends Model
{

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[int] the raw data of posts
	 */
	private static $rawPosts = array(
		1 => array(
			'idPost' => 1,
			'date' => '2015-11-10 9:8:7',
			'translations' => array(
				'heading' => array(
					'en_GB' => '10
									fantastic photography tips',
					'et_EE' => 'Kümme fantastilist pildistamise nõuannet'
				),
				'lead' => array(
					'en_GB' => 'For those reasons, presentational markup has been removed
								from HTML in this version. This change should not come as a
								surprise; HTML4 deprecated presentational markup many years ago
								and provided a mode (HTML4 Transitional) to help authors move
								away from presentational markup; later, XHTML 1.1 went further
								and obsoleted those features altogether.',
					'et_EE' => '1 Teen “_ago”-st või “ago”-st koopia (ago.php).
2 Kirjutan valitud talitluse ümber enda stiili.
3 Muudan, et talitlus võimaldaks väljastada 
3.1 täpset ajalist erinevust ja
3.2 et oskaks seda teha ka eesti keeles.
4 Lisan kommentaari.
5 Kirjutan selle talitluslikkuse JS-i.'
				)
			)
		),
		2 => array(
			'idPost' => 2,
			'date' => '2015-10-17 9:8:7',
			'translations' => array(
				'heading' => array(
					'en_GB' => 'top 10 tips for new bloggers',
					'et_EE' => 'Kümme tippnõuannet alustavale blogijale'
				),
				'lead' => array(
					'en_GB' => 'For those reasons, presentational markup has been removed
								from HTML in this version. This change should not come as a
								surprise; HTML4 deprecated presentational markup many years ago
								and provided a mode (HTML4 Transitional) to help authors move
								away from presentational markup; later, XHTML 1.1 went further
								and obsoleted those features altogether.',
					'et_EE' => 'maist 1995: brendan eich, Mocha,
septembrist 1995: LiveScript,
detsembrist 1995: JavaScript,
1996-1997: ECMAScript,
1998: ECMAScript 2,
1999: ECMAScript 3,
2000-2003: ES4 / JS2,
2005: E4X / ActionScript 3, Ajax, Prototype, jQuery, Mootools, Dojo'
				)
			)
		)
	);

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $date the date
	 */
	private $date;

	/**
	 * the getter for the date
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the date
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $src the heading
	 */
	private $heading;

	/**
	 * the getter for the heading
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the heading
	 */
	public function getHeading()
	{
		return $this->heading;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var int[int] $comments the comments
	 */
	private $comments;

	/**
	 * the getter for comments
	 * 
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return @see Comment::getListOfTypeComment() while
	 *         <code>forAutoCompletion => false</code>
	 */
	public function getComments()
	{
		return $this->comments;
	}

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var string $lead the lead text
	 */
	private $lead;

	/**
	 * the getter for the lead
	 *
	 * @access public
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @return string the lead
	 */
	public function getLead()
	{
		return $this->lead;
	}

	/**
	 * This function sets the complete service.
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @uses Comment for comments
	 */
	private function setCompletePost()
	{
		$id = $this->getId();
		if (isset(Post::$rawPosts[$id]['translations'])) {
			$this->setTranslations(
				Post::$rawPosts[$this->getId()]['translations']);
		}
		$this->date = Post::$rawPosts[$id]['date'];
		require_once dirname(__FILE__) . '/Comment.php';
		$comments = Comment::getListOfTypeComment(
			array(
				'idParent' => $id
			));
	}

	/**
	 * This function queries all the posts and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author kalmer
	 * @param boolean $parameters['forAutocompletion']
	 *        	Do we prepare the array
	 *        	for the autocompletion mechanism?
	 * @param integer $parameters['idOfParent']
	 *        	the ID of the page the
	 *        	list of page news we want
	 * @return int[] <code>NULL</code>, if there are no order person available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
	public static function getListOfTypePost($parameters)
	{
		$structuredKeys = array();
		foreach (Post::$rawPosts as $id => $array) {
			$object = new Post();
			$object->setId($id);
			$object->setCompletePost();
			$keys[] = $id;
			$title = $object->translate(array(
				'property' => 'heading'
			));
			$structuredKeys[$id] = array(
				'id' => $id,
				'object' => $object,
				'title' => $title
			);
			$values[] = $title;
		}
		if (isset($parameters['forAutocompletion']) &&
			 $parameters['forAutocompletion']) {
			$a[] = $values;
			$a[] = $keys;
			return $a;
		}
		else {
			return $structuredKeys;
		}
	}
}