<?php

namespace MVC\Model;

use MVC\Model\Pupil;
use Exception;

/**
 * Holds collection of Pupil models.
 * Sorting and searching algorithms are here
 * 
 * might be singelton instead?
 *
 * @author sander
 */
class Pupils extends Pupil
{

    /**
     *
     * @var array
     */
    public static $Pupils = [];

    /**
     * 
     * @param string $attribute
     * @return string
     */
    private static function _attributeToProperty($attribute)
    {
        return 'get' . ucfirst($attribute); //prepare name to became getName
    }

    /**
     * Raw data
     * 
     * @return array
     */
    public static function DATA()
    {
        return [
            ['name' => 'ženja', 'coder' => true,],
            ['name' => 'teearu', 'coder' => false,],
            ['name' => 'kaire', 'coder' => false,],
            ['name' => 'raiko', 'coder' => false,],
            ['name' => 'eleri', 'coder' => false,],
            ['name' => 'sander', 'coder' => false,],
            ['name' => 'erika', 'coder' => false,],
            ['name' => 'kristen', 'coder' => true,],
            ['name' => 'keijo', 'coder' => false,],
            ['name' => 'vaike', 'coder' => false,],
            ['name' => 'ingmar', 'coder' => false,],
            ['name' => 'ralf', 'coder' => false,],
        ];
    }

    /**
     * 
     * @param type $arr
     * @param type $key
     * @return type
     */
    public static function SortAssociativeArray($arr, $key = 'name')
    {
//        setlocale(LC_COLLATE, 'et_EE.UTF-8'); //TODO confirm it works from settings?
        $length = count($arr);
        if ($length < 2) {
            return $arr;
        }

        for ($i = ($length - 1); $i >= 0; $i--) {

            for ($j = $i; $j >= 0; $j--) {

                if (strcoll($arr[$i][$key], $arr[$j][$key]) < 0) {//strcoll - locale aware compare
                    $buf = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $buf;
                }
            }
        }
        return $arr;
    }

    /**
     * 
     * @param string $attribute
     * @return array
     */
    public static function SortCollectionOfModels($attribute = 'name')
    {
//        setlocale(LC_COLLATE, 'et_EE.UTF-8');//should work from settings

        $length = count(self::$Pupils);

        if ($length < 2) {
            return self::$Pupils;
        }

        $property = self::_attributeToProperty($attribute);

        for ($i = ($length - 1); $i >= 0; $i--) {
            for ($j = $i; $j >= 0; $j--) {
                if (
                        strcoll(self::$Pupils[$i]->$property(), self::$Pupils[$j]->$property()) < 0
                ) {
                    $buf = self::$Pupils[$j];
                    self::$Pupils[$j] = self::$Pupils[$i];
                    self::$Pupils[$i] = $buf;
                }
            }
        }

        return self::$Pupils;
    }

    /**
     * 
     * @param type $str
     * @param type $attribute
     * @return array
     * @throws Exception
     */
    public static function SearchBinaryByProperty($str, $attribute = 'name')
    {
        $search = trim($str);
        $result = (object) [
                    'steps' => 0,
                    'id' => 0
        ];
        if (strlen($search) < 1) {
            return $result;
        }

        $collectionLength = count(self::$Pupils);

        if ($collectionLength < 1) {
            throw new Exception('Pupils has not been initialized');
        }

        self::SortCollectionOfModels($attribute);
        $args = (object) [
                    'start' => 0,
                    'end' => $collectionLength,
                    'mid' => floor((0 + $collectionLength) / 2),
        ];

        $property = self::_attributeToProperty($attribute);

        $l = function($pupils, $search, $args, $result, $property) use (&$l) {
            ++$result->steps;
            if (strcoll($search, $pupils[$args->mid]->$property()) === 0) {
                $result->id = $args->mid + 1;
                return $result;
            }
            if (((int) ($args->end - $args->start)) === 1) {
                return $result;
            }
            if (strcoll($search, $pupils[$args->mid]->$property()) < 0) {
                $args->end = $args->mid;
            } else if (strcoll($search, $pupils[$args->mid]->$property()) > 0) {
                $args->start = $args->mid;
            }
            $args->mid = floor(($args->start + $args->end) / 2);
            return $l($pupils, $search, $args, $result, $property);
        };

        return $l(self::$Pupils, $search, $args, $result, $property);
    }

    /**
     * Creates collection of Pupil objects
     */
    public static function InitPupilsObjects()
    {
        $array = self::SortAssociativeArray(self::DATA());

        foreach ($array as $k => $v) {

            self::$Pupils[] = (new self)
                    ->setId(($k + 1))
                    ->setName($v['name'])
                    ->setCoder($v['coder']);
        }
    }

    /**
     * Before actual work we have to sort collection of Pupils
     */
    public static function init()
    {
        self::InitPupilsObjects(self::DATA());
    }

    /**
     * 
     * @return stdClass
     */
    public static function runTESTS()
    {
        self::init();
        $fails = 0;
        $asserts = 0;

        //test finding
        foreach (self::DATA() as $v) {
            $asserts++;
            $r = self::SearchBinaryByProperty($v['name']);

            if ($r->id < 1) {
                $fails++;
            } else {
                $asserts++;
                if ($v['name'] !== self::$Pupils[$r->id - 1]->getName()) {
                    $fails++;
                }
            }
        }

        //test empty string, steps should be 0
        $r = self::SearchBinaryByProperty('  ');
        if ($r->id > 0) {
            $fails++;
        }
        $asserts++;
        if ($r->steps > 0) {
            $fails++;
        }
        $asserts++;

        //test not included test
        $r1 = self::SearchBinaryByProperty('sander9');
        if ($r1->id > 0) {
            $fails++;
        }
        $asserts++;
        
        $response = (object) [
                    'success' => !$fails,
                    'assertions' => $asserts,
                    'failures' => $fails,
        ];
        return $response;
    }

}
