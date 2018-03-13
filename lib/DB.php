<?php
namespace lib;

class DB
{
    private $pdo;

    public function __construct(array $params)
    {
        $dsn = "mysql:dbname={$params['db']};host={$params['host']}";
        $user = $params['user'];
        $password = $params['pass'];

        try {
            $this->pdo = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
            exit;
        }

        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
//        $this->pdo->setAttribute(3, 2);

    }

    public function exec($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute($params);
        } catch (\Exception $e) {
            echo "Ошибка запроса к БД: " . $e->getMessage();
            exit;
        }

        foreach (['insert', 'update', 'delete'] as $word) {
            $str = strtolower($sql);
            if (strpos($str, $word) === 0) {
                return true;
            }
        }

        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $res;
    }


//    public function getCategories()
//    {
//        $sql = "select * from category";
//        $res = $this->exec($sql);
//
//        return $res;
//    }

    public function getAllTable($tableName)
    {
        if (!$tableName) {
            throw new \Exception("Пустое имя таблицы!!!");
        }

//        $tableName = addslashes($tableName);

        $sql = "select * from $tableName";
        return $this->exec($sql);
    }
}