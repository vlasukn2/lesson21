<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 09.03.2018
 * Time: 20:25
 */

namespace model;


use lib\Model;

class Page extends Model
{
//    public function __construct()
//    {
//
//    }

    public function getAllPages()
    {
        $pages = $this->db->getAllTable('pages');

        return $pages;
    }

    public function getPageByAlias($alias)
    {
        $sql = 'select * from pages where alias = ? limit 1';

        $pages = $this->db->exec($sql, [$alias]);
        if (!$page = @$pages[0]) {
            $alias = htmlspecialchars($alias);
            http_response_code(404);
            throw new \Exception("Page {$alias} not found!");
        }

        return $page;
    }

}