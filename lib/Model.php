<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 09.03.2018
 * Time: 20:26
 */

namespace lib;


class Model
{
    /** @var DB */
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }


}