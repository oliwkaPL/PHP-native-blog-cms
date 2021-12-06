<?php

namespace App\Model;

use Model\BaseEntity;

class Post extends BaseEntity {

    private $id;
    private $date;
    private $title;
    private $content;
    private $authorId;
  
    public function getId()
    {
      return $this->id;
    }
  
    public function getDate(): \DateTime
    {
      return new \DateTime($this->date);
    }
  }