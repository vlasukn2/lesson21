<?php
use lib\Config;

Config::set('routes', [
    'default' => '',
    'admin'   => 'admin_',
]);

Config::set('default_lang', 'en');

Config::set('langs', ['en', 'ru']);
Config::set('site_name', 'MVC First Framework!');