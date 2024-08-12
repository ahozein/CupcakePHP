<?php

class Pages extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
//        $data = [
//            'article' => 'mvc',
//            'author' => 'amir'
//        ];
//        $this->view('pages/index', $data);
    }

    public function edit($id)
    {
        echo $id;
    }
}