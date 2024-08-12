<?php
/*
 * App Core Class
 * Reaching the controller via URL
 * URL Format => controller/method/param
 */

class Core
{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        //find controller(if exists)
        if (!empty($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->currentController . '.php';

        //init the controller
        $this->currentController = new $this->currentController;

        //check second part of url
        if (isset($url[1])) {
            //check exists method in the controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //get parameters from url(if exists)
        $this->params = $url ? array_values($url) : [];

        //send parameters to method(call a callback with array of parameters)
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return [];
        }
    }
}