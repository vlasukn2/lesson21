<?php

use lib\Lang;
use lib\LangFiles;
use lib\Session;

function __($phrase, $default = '') {

//    $lang = Lang::getInstance();
    $lang = LangFiles::getInstance();

    return $lang->translate($phrase, $default);
}

function getFlash() {

    $ses = Session::getInstance();

    return $ses->get('flash', true);
}