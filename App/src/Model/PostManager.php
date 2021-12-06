<?php

namespace App\Model;

use App\Model\BaseManager;

class PostManager extends BaseManager
{
    /**
     * @param int|null $number
     * @return array
     * 
     */
    public function getPosts(int $number = null): array
    {
        // if ($number) {
        //     $query = $this->db->prepare('SELECT * FROM post ORDER BY id DESC LIMIT :limit');
        //     $query->bindValue(':limit', $number, \PDO::PARAM_INT);
        //     $query->execute();
        // } else {
        //     $query = $this->db->query('SELECT * FROM post ORDER BY id DESC');
        // }
        // $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');

        // return $query->fetchAll();
        return [];
    }

    /**
     * @param int $id
     * @return Post|bool
     */

    public function getPostById(int $id)
    {
        $query = $this->db->prepare('SELECT * FROM post WHERE id = :id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');
        return $query->fetch();
    }
}
