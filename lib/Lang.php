<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 06.03.2018
 * Time: 20:58
 */

namespace lib;


class Lang
{
    private $langs = [];
    private $lang;

    public function load($lang)
    {
        $this->lang = $lang;
        $this->langs = include "../lang/lang.php";
    }

    public function translate($phrase, $default = '')
    {
        $result = @$this->langs["{$this->lang}.$phrase"];
        if (!$result) {
            return $default;
        }

        return $result;
    }
}

