<?php
use lib\Config;

Config::set('routes', [
    'default' => '',
    'admin'   => 'admin_',
]);

Config::set('default_lang', 'en');

Config::set('langs', ['en', 'ru']);
Config::set('site_name', 'MVC First Framework!');

Config::set('db', [
    'host' => '127.0.0.1',
    'user' => 'root',
    'pass' => '',
    'db'   => 'mvc',
]);