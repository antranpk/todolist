<?php

namespace App\Model;

class Task
{
    protected $oDb;

    public function __construct()
    {
        $this->oDb = new \App\Engine\Db;
    }

    public function get($offset, $limit)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Tasks LIMIT :offset, :limit');
        $oStmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $oStmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $oStmt = $this->oDb->query('SELECT * FROM Tasks ORDER BY id DESC');
        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $datas)
    {
        $oStmt = $this->oDb->prepare('INSERT INTO Tasks (name, start_date, end_date, status) VALUES(:name, :start_date, :end_date, :status)');
        return $oStmt->execute($datas);
    }

    public function getById($id)
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Tasks WHERE id = :postId LIMIT 1');
        $oStmt->bindParam(':postId', $id, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $datas)
    {
        $oStmt = $this->oDb->prepare('UPDATE Tasks SET name = :name, start_date = :startDate, end_date = :endDate, status = :status WHERE id = :taskId LIMIT 1');
        $oStmt->bindValue(':name', $datas['name'], \PDO::PARAM_STR);
        $oStmt->bindValue(':startDate', $datas['start_date'], \PDO::PARAM_STR);
        $oStmt->bindValue(':endDate', $datas['end_date'], \PDO::PARAM_STR);
        $oStmt->bindValue(':status', $datas['status'], \PDO::PARAM_STR);
        $oStmt->bindValue(':taskId', $datas['task_id'], \PDO::PARAM_INT);
        return $oStmt->execute();
    }

    public function delete($id)
    {
        $oStmt = $this->oDb->prepare('DELETE FROM Tasks WHERE id = :taskId LIMIT 1');
        $oStmt->bindParam(':taskId', $id, \PDO::PARAM_INT);
        return $oStmt->execute();
    }

    public function getDuplicateTask($name)
    {
        $oStmt = $this->oDb->prepare('SELECT name FROM Tasks WHERE name = :name LIMIT 1');
        $oStmt->bindParam(':name', $name, \PDO::PARAM_INT);
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function getRandomTask()
    {
        $oStmt = $this->oDb->prepare('SELECT * FROM Tasks ORDER BY RAND() LIMIT 1');
        $oStmt->execute();
        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }
}
