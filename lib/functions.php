<?php

use lib\Lang;
use lib\LangFiles;

function __($phrase, $default = '') {

//    $lang = Lang::getInstance();
    $lang = LangFiles::getInstance();

    return $lang->translate($phrase, $default);
}