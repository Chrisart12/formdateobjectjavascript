<?php

namespace App\Repositories;

use App\Image;

interface ImageInterface 
{
    public function getAll();
    public function getById($id);
    public function save(Image $post, Array $inputs);
    public function update($id, Array $inputs);
    public function store(Array $inputs);
}

