<?php
/*
 * basic controller
 * load models and views
 */

class Controller
{
    public function model($modelName)
    {
        require_once '../app/models/' . $modelName . '.php';
        return new $modelName;
    }

    public function view($viewName, $data = [])
    {
        if (file_exists('../app/views/' . $viewName . '.php')) {
            require_once '../app/views/' . $viewName . '.php';
        } else {
            die('view not found');
        }
    }
}