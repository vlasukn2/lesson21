<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 13.03.2018
 * Time: 19:23
 */

namespace model;


use lib\Model;

class Message extends Model
{
    public function addMessage(array $data)
    {
        $sql = "insert into messages (name, email, message) values (?,?,?)";

        $this->db->exec($sql, $data);
    }
}