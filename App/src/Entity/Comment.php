<?php
namespace App\Model;

use Model\BaseEntity;

class Comment extends BaseEntity{
    private $id;
    private $date;
    private $content;
    private $authorId;
}