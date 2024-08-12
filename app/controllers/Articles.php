<?php

class Articles
{
    public function __construct()
    {

    }

    public function index()
    {
        echo 'article controller loaded';
    }

    public function edit($id)
    {
        echo $id;
    }
}