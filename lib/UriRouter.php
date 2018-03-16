<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 02.03.2018
 * Time: 20:34
 */

namespace lib;


class UriRouter extends Router
{
    const BASE_PATH = '/21/web';

    protected $route;
    protected $lang;

    public function parseUrl($uri)
    {
        $this->setUpDefaults();


        $uri = $this->cutBasePath($uri);
        $uri = trim($uri, '/');

        $parts = explode('/', $uri);

        $uriPart = array_shift($parts);

        $allowedRoutes = Config::get('routes');
        $allowedRoutes = array_keys($allowedRoutes);

        $allowedLangs = Config::get('langs');


        if (in_array($uriPart, $allowedRoutes)) {
            $this->route = $uriPart;
            $uriPart = @array_shift($parts);
        }

        if (in_array($uriPart, $allowedLangs)) {
            $this->lang = $uriPart;
            $uriPart = @array_shift($parts);
        }

        if ($uriPart) {
            $this->controller = $uriPart;
            $uriPart = @array_shift($parts);
        }

        if ($uriPart) {
            $this->action = $uriPart;
        }

        if ($parts) {
            $this->params = $parts;
        }

    }

    private function cutBasePath($path)
    {
        if (strpos($path, self::BASE_PATH) === 0) {
            $path = substr($path, strlen(self::BASE_PATH));
        }

        return $path;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    private function setUpDefaults()
    {
        $this->route      = 'default';
        $this->lang       = Config::get('default_lang');
        $this->controller = 'page';
        $this->action     = 'index';
    }

    public function getPrefix()
    {
        $allowedRoutes = Config::get('routes');

        return $allowedRoutes[ $this->route ];
    }

}