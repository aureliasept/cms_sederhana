<?php
/**
 * Simple MVC Framework - App Class
 * 
 * Handles routing with URL format: controller/method/parameter
 * Example: /user/profile/123 -> UserController->profile(123)
 */

// Include the base Controller class
require_once APP_ROOT . '/core/Controller.php';

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        
        // Set controller
        if (isset($url[0]) && !empty($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFile = APP_ROOT . '/app/controllers/' . $controllerName . '.php';
            
            if (file_exists($controllerFile)) {
                $this->controller = $controllerName;
                unset($url[0]);
            } else {
                $this->controller = 'ErrorController';
            }
        }
        
        // Include and instantiate controller
        require_once APP_ROOT . '/app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        // Set method
        if (isset($url[1]) && !empty($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            } else {
                $this->method = 'index';
            }
        }
        
        // Set parameters
        $this->params = $url ? array_values($url) : [];
        
        // Call the controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    
    /**
     * Parse the URL into an array
     * 
     * @return array
     */
    protected function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
    
    /**
     * Get current controller name
     * 
     * @return string
     */
    public function getController() {
        return $this->controller;
    }
    
    /**
     * Get current method name
     * 
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }
    
    /**
     * Get current parameters
     * 
     * @return array
     */
    public function getParams() {
        return $this->params;
    }
    
    /**
     * Redirect to another URL
     * 
     * @param string $url
     * @return void
     */
    public static function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
    
    /**
     * Get base URL
     * 
     * @return string
     */
    public static function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $basePath = dirname($scriptName);
        
        return $protocol . '://' . $host . $basePath;
    }
}
?> 