<?php
namespace particle;
require_once dirname(__FILE__) . '/Model.php';

/**
 * This class deals with the data of comments.
 *
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @namespace particle
 */
class Comment extends Model
{

	/**
	 * the raw data of comments
	 *
	 * @access private
	 * @author kalmer:piiskop <pandeero@gmail.com>
	 * @var array[int] the raw data of comments
	 */
	private static $rawComments = array(
		1 => array(
			'idComment' => 1,
			'idPost' => 1
		),
		2 => array(
			'idComment' => 2,
			'idPost' => 1
		),
		3 => array(
			'idComment' => 3,
			'idPost' => 1
		),
		4 => array(
			'idComment' => 4,
			'idPost' => 2
		),
		5 => array(
			'idComment' => 5,
			'idPost' => 2
		),
		6 => array(
			'idComment' => 6,
			'idPost' => 2
		),
		7 => array(
			'idComment' => 7,
			'idPost' => 2
		)
	);

	/**
	 *
	 * @access private
	 * @author kalmer:piiskop
	 * @var int the ID of the post the comment belongs to
	 */
	private $idPost;

	/**
	 * This function sets the complete comment.
	 *
	 * @access private
	 * @author kalmer:piiskop
	 */
	private function setCompleteComment()
	{
		$id = $this->getId();
		$this->idPost = Comment::$rawComments[$id]['idPost'];
	}

	/**
	 * This function queries all the comments and returns them in an
	 * autocomplete
	 * array if needed.
	 *
	 * @access public
	 * @author kalmer
	 * @param boolean $parameters['forAutocompletion']
	 *        	Do we prepare the array
	 *        	for the autocompletion mechanism?
	 * @param integer $parameters['idParent']
	 *        	the ID of the page the
	 *        	list of page news we want
	 * @return int[] <code>NULL</code>, if there are no order person available
	 *         or
	 *         the query is erroneous or the array with keys
	 */
	public static function getListOfTypeComment($parameters)
	{
		$structuredKeys = array();
		$keys = array();
		$values = array();
		foreach (Comment::$rawComments as $id => $array) {
			if (isset($parameters['idParent']) &&
				 $array['idPost'] === $parameters['idParent']) {
				$object = new Comment();
				$object->setId($id);
				$object->setCompleteComment();
				$keys[] = $id;
				$title = $id;
				$structuredKeys[$id] = array(
					'id' => $id,
					'object' => $object,
					'title' => $title
				);
				$values[] = $title;
			}
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