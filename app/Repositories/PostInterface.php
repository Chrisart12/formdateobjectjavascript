<?php

namespace App\Repositories;

use App\Post;

interface PostInterface 
{
    public function getAll();
    public function getById($id);
    public function save(Post $post, Array $inputs);
    public function update($id, Array $inputs);
    public function store(Array $inputs);
}

