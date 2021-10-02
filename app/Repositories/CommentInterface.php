<?php

namespace App\Repositories;

use App\Comment;

interface CommentInterface 
{
    public function getAll();
    public function getById($id);
    public function save(Comment $post, Array $inputs);
    public function update($id, Array $inputs);
    public function store(Array $inputs);
}

