<?php

/**
 * @author Eleri<eleri.apsolon@gmail.com>
 */

namespace pupilsearch;

use HTML_Template_IT;

//require_once dirname(__FILE__) . '/Settings/configuration.php';
//require_once dirname(__FILE__) . '/Model.php';

/**
 * Deals with visual part
 * @author Eleri<eleri.apsolon@gmail.com>
 * @namespace pstk
 */
class PupilView
{

    /**
     * Get  css
     * @return string
     */
    private static function prepCss()
    {
        $tpl = new HTML_Template_IT('templates');
        $tpl->loadTemplatefile('pupil.css');
        $tpl->setCurrentBlock('css');
        $tpl->setVariable([
            'AUTHOR' => '@author Eleri <eleri.apsolon@gmail.com>'
        ]);
        $tpl->parse('css');
        return $tpl->get('css');
    }

    private static function prepJs($params)
    {
        $parameters = ['steps' => 0, 'id' => -1, 'foundByName' => -1];
        if($params !== null) {
            $parameters = $params;
        }
        $tpl = new HTML_Template_IT('templates');
        $tpl->loadTemplatefile('pupil.js');
        $tpl->setCurrentBlock('js');

        $tpl->setVariable([
            'AUTHOR' => '@author Eleri <eleri.apsolon@gmail.com>',
            'STEPS' => $parameters['steps'],
            'ID' => $parameters['id'],
            'FOUNDBYNAME' => $parameters['foundByName'],
            
        ]);
        $tpl->parse('js');
        return $tpl->get('js');

    }
/**
 * 
 * @param stdClass $params
 * @param sdtClass $name
 * @return string
 */
    public static function buildView($params = null, $name = '')
    {
        require_once 'HTML/Template/IT.php';

        $tpl = new HTML_Template_IT('templates');
        $tpl->loadTemplatefile('pupil.html');
        $tpl->setCurrentBlock('html');
        $tpl->setVariable([
            'TITLE' => 'Students',
            'STYLE' => self::prepCss(),
            'SCRIPT' => self::prepJs($params),
            'NAME' => $params['name'],
        ]);
        $tpl->parse('html');
        return $tpl->get();
    }

}
