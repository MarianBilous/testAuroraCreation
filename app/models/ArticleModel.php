<?php

namespace Models;

use System\Model;

class ArticleModel extends Model
{
    public function __construct()
    {
        $this->table = 'articles';
    }
}