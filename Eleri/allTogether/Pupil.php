<?php

/**
 * @file Program to find existing students and add/remove programming skill and change name
 * @author Eleri Apsolon<eleri.apsolon@gmail.com>
 */

namespace pupilsearch;

use Exception;

/**
 * class Pupils contains student names, id-s and coding skills
 * class Pupil extends from model2
 */
class Pupil extends Model
{

    /**
     *
     * @var array
     */
    private static $pupils = [
        [
            "firstName" => "kaire",
            "lastName" => "ojastu",
            "canCode" => false
        ],
        [
            "firstName" => "raiko",
            "lastName" => "ojaste",
            "canCode" => false
        ],
        [
            "firstName" => "eleri",
            "lastName" => "apsolon",
            "canCode" => false
        ],
        [
            "firstName" => "sander",
            "lastName" => "mets",
            "canCode" => false
        ],
        [
            "firstName" => "maarika",
            "lastName" => "erika",
            "canCode" => false
        ],
        [
            "firstName" => "kristen",
            "lastName" => "aeg",
            "canCode" => true
        ],
        [
            "firstName" => "keijo",
            "lastName" => "palts",
            "canCode" => false
        ],
        [
            "firstName" => "ingmar",
            "lastName" => "nurmiste",
            "canCode" => false
        ],
        [
            "firstName" => "ženja",
            "lastName" => "fokin",
            "canCode" => false
        ]
    ];

    /**
     * Contains list of Pupil objects
     * @var array
     */
    public static $pupilsList = [];

    /**
     * 
     * @param string $key
     */
    private static function sortUTF8($key = 'firstName')
    {
        setlocale(LC_COLLATE, 'et_EE.UTF-8');
        usort(self::$pupils, function ($a, $b) use($key) {
//it they are equal returns 0, if $a<$b returns -1; if $a>$b returns 1; Estonian alphapet
            return strcoll($a[$key], $b[$key]);
        });
    }

    /**
     * sets id, firstname, lastname, cancode
     */
    private static function setPupilObjects()
    {
        self::sortUTF8();
        self::$pupilsList = [];
        foreach (self::$pupils as $key => $value) {
            $pupil = new self;
            $pupil->setId(((int) $key) + 1);
            $pupil->setFirstName($value['firstName']);
            $pupil->setLastName($value['lastName']);
            $pupil->setCanCode($value['canCode']);
            self::$pupilsList[] = $pupil;
        };
    }

    /**
     * i have firstname and lastname
     * firstname optional; if Pupil::sortPupilObjects('lastName') then print_r($attribute) returns lastName
     * @param string $attribute
     */
    private static function sortPupilObjects($attribute = 'firstName')
    {
        self::setPupilObjects();
        setlocale(LC_COLLATE, 'et_EE.UTF-8');
        $property = 'get' . ucfirst($attribute);
        usort(self::$pupilsList, function ($a, $b) use($property) {
            return strcoll($a->$property(), $b->$property());
        });
    }

    /**
     * Searching pupils using binary search
     * @param string $s
     * @param string $attribute
     * @return array
     */
    private static function binaryPupilObjects($s, $attribute = 'firstName')
    {
        self::sortPupilObjects($attribute);
        $property = 'get' . ucfirst($attribute);
        $start = 0;
        $end = count(self::$pupilsList);

        $step = 0;
        $id = 0;

        do {
            $mid = floor(($start + $end) / 2);
            $step++;
            $pupil = self::$pupilsList[$mid];
            $name = $pupil->$property();
            if (strcoll($s, $name) === 0) {
                $id = $pupil->getId();
                break;
            } else if ($end - $start <= 1) {
                break;
            } else if (strcoll($s, $name) < 0) {
                $end = $mid;
            } else if (strcoll($s, $name) > 0) {
                $start = $mid;
            }
        } while ($end - $start > 0);

        self::sortPupilObjects('firstName');
        return ['steps' => $step, 'id' => $id,];
    }

    /**
     * Sets up data. Sorts and creates collection
     */
    public static function init()
    {
        Pupil::sortUTF8();
        Pupil::setPupilObjects();
    }

    /**
     * Search by firstname or surname
     * @param string $name
     * @return array
     */
    public static function searchByName($name)
    {
        $steps = 0;
        $id = -1;
        $foundByName = -1;
        
        $names = explode(' ', mb_strtolower(trim($name), 'UTF-8')); //Eleri Apsolon Lillemägi ['Eleri', 'Apsolon', 'Lillemägi']

        if (count($names) > 1) {//many names
            $lastName = $names[count($names) - 1];
            array_pop($names);
            $firstName = join(' ', $names);
            $r = self::binaryPupilObjects($firstName, 'firstName');
            $steps += $r['steps'];

            if ($r['id']) { //found
                $id = $r['id'];
                $foundByName = 1;
                
            } else {//not found try now with lastName
                $r = self::binaryPupilObjects($lastName, 'lastName');
                $steps += $r['steps'];
                if ($r['id']) { //found
                    $id = $r['id'];
                    $foundByName = 2;
                }
            }
        } else {//by one name
            $r = self::binaryPupilObjects($names[0], 'firstName');
            $steps += $r['steps'];

            if ($r['id']) { //found
                $id = $r['id'];
                $foundByName = 1;
            } else {//not found try now with lastName
                $r = self::binaryPupilObjects($names[0], 'lastName');
                $steps += $r['steps'];
                if ($r['id']) { //found
                    $id = $r['id'];
                    $foundByName = 2;
                }
            }
        }

        return ['steps' => $steps, 'id' => $id, 'foundByName' => $foundByName];
    }

    /**
     * TESTING
     * @throws Exception
     */
    public static function TEST()
    {
        foreach (self::$pupils as $value) {
            $r = Pupil::binaryPupilObjects($value['firstName'], 'firstName');
            if (!$r['id']) {
                throw new Exception('FAIL');
            }
            $p = self::$pupilsList[$r['id'] - 1];
            if ($value['firstName'] !== $p->getFirstName()) {
                throw new Exception('FAIL');
            }
        }

        foreach (self::$pupils as $value) {
            $r = Pupil::binaryPupilObjects($value['lastName'], 'lastName');

            if (!$r['id']) {
                throw new Exception('FAIL');
            }
            $p = self::$pupilsList[$r['id'] - 1];
            if ($value['lastName'] !== $p->getLastName()) {
                throw new Exception('FAIL');
            }
        }

        $r = Pupil::binaryPupilObjects('koka', 'lastName');
        if ($r['id']) {
            throw new Exception('FAIL');
        }

        $name = 'eleri tere';
        $r = Pupil::searchByName($name);
        if (!$r['id']) {
            throw new Exception('FAIL');
        } else {
            $p = self::$pupilsList[$r['id'] - 1];
            if (!('eleri' !== $p->getFirstName() || 'tere' !== $p->getLastName())) {
                throw new Exception('FAIL');
            }
        }


        echo '<hr>OK tests<hr>';
    }

}
