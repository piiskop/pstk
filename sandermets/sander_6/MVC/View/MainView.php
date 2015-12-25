<?php

namespace MVC\View;

use HTML_Template_IT;
use stdClass;

/**
 * Description of MainView
 *
 * @author sander
 */
class MainView
{

    /**
     * Gets CSS to add to 
     * 
     * @return string
     */
    private static function prepareCss()
    {
        $tpl = new HTML_Template_IT(ROOT_FOLDER . 'templates');
        $tpl->loadTemplatefile('style.css');
        $tpl->setCurrentBlock('css');
        //Stupid hack to make this engine work. Apparently HTML_Template_IT can't render/parse/get without a variable provided
        $tpl->setVariable([
            'AUTHOR' => '@author Sander <sandermets0@gmail.com>'
        ]);
        $tpl->parse('css');
        return $tpl->get('css');
    }

    /**
     * 
     * @param stdClass $params
     * @return string
     */
    private static function prepareJs(stdClass $params)
    {
        $tpl = new HTML_Template_IT(ROOT_FOLDER . 'templates');
        $tpl->loadTemplatefile('app.js');
        $tpl->setCurrentBlock('js');
        //Stupid hack to make this engine work. Apparently HTML_Template_IT can't render/parse/get without a variable provided
        $tpl->setVariable([
            'AUTHOR' => ' @author Sander <sandermets0@gmail.com> ',
            'STEPS' => $params->steps,
            'ID' => $params->id,
            'BASE_URL' => BASE_URL,
        ]);
        $tpl->parse('js');
        return $tpl->get('js');
    }

    /**
     * 
     * @param stdClass $params
     * @return string
     */
    public static function buildHTMLView(stdClass $params = null, $hidePHPsearch = '', $name = '')
    {
        require_once 'HTML/Template/IT.php';
        $tpl = new HTML_Template_IT(ROOT_FOLDER . 'templates/');
        $tpl->loadTemplatefile('index.html');
        $tpl->setCurrentBlock('html');

        $tpl->setVariable([
            'TITLE' => 'Students',
            'CSS' => self::prepareCss(),
            'NAME' => $name,
            'HIDE' => $hidePHPsearch,
            'JS' => self::prepareJs($params),
        ]);
        $tpl->parse('html');
        return $tpl->get();
    }

}
