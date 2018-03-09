<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 06.03.2018
 * Time: 20:19
 */

namespace lib;


class View
{
    private $data = [];
    private $path;

    public function __construct($controller = '', $action = '')
    {
        if ($controller and $action) {
            $this->path = "../view/$controller/$action.php";
        }
    }

    public function render($data, $path = null)
    {
        if ($path) {
            $this->path = $path;
        }

        if (!file_exists($this->path)) {
            throw new \Exception("View {$this->path} not found");
        }

        ob_start();
        include $this->path;
        return ob_get_clean();
    }

}
