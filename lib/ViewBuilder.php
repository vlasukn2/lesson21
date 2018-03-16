<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 16.03.2018
 * Time: 20:25
 */

namespace lib;


class ViewBuilder
{
    private $router;


    /**
     * @param mixed $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
        return $this;
    }



    public function getView()
    {
        if ($this->router) {
            $router = $this->router;
            return new View( $router->getController(), $router->getPrefix() . $router->getAction() );
        } else {
            return new View();
        }


    }
}