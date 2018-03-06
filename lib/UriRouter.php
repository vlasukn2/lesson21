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
        $uri = $this->cutBasePath($uri);
        $uri = trim($uri, '/');

        $parts = explode('/', $uri);

        $route = $parts[0];

        $allowedRoutes = Config::get('routes');
        $allowedRoutes = array_keys($allowedRoutes);

        if (in_array($route, $allowedRoutes)) {
            $this->route = $route;
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


}