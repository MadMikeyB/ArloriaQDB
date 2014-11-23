<?php

use Whoops\Run as WhoopsRun;
use Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * The application class.
 *
 * Handles the request for each call to the application
 * and calls the chosen controller and method after splitting the URL.
 *
 */
class App
{
    /**
     * Stores the controller from the split URL
     *
     * @var string
     */
    protected $controller = 'quote';

    /**
     * Stores the method from the split URL
     * @var string
     */
    protected $method = 'index';

    /**
     * Stores the parameters from the split URL
     * @var array
     */
    protected $params = array();

    public function __construct()
    {
        $url = $this->router();

        if ( file_exists( '../app/controllers/' . ucfirst( $url[0]) . '.php' ) ) 
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . ucfirst($this->controller) . '.php';

        $this->controller = new $this->controller();

        if ( isset( $url[1] ) ) 
        {
            if ( method_exists( $this->controller, $url[1] ) ) 
            {
                $this->method = $url[1];

                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse the URL for the current request. Effectivly splits it, stores the controller
     * and the method for that controller.
     *
     * @return void
     */
    public function router()
    {
        if ( isset( $_GET['url'] ) ) 
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}