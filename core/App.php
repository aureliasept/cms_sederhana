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
    
        echo "<pre style='color:orange'>DEBUG URL:\n";
        print_r($url);
        echo "</pre>";
    
        // Controller
        if (isset($url[0])) {
            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFile = __DIR__ . '/../app/controllers/' . $controllerName . '.php';
    
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $this->controller = new $controllerName;
                unset($url[0]);
            } else {
                echo "<h2 style='color:red;'>❌ Controller file not found: $controllerFile</h2>";
                return;
            }
        }
    
        // Method
        if (isset($url[1])) {
            $method = $url[1];
            if (method_exists($this->controller, $method)) {
                $this->method = $method;
                unset($url[1]);
            } else {
                echo "<h2 style='color:red;'>❌ Method not found: $method in " . get_class($this->controller) . "</h2>";
                return;
            }
        }
    
        $this->params = $url ? array_values($url) : [];
    
        echo "<pre style='color:green'>";
        echo "Controller: " . get_class($this->controller) . "\n";
        echo "Method: " . $this->method . "\n";
        echo "Params: "; print_r($this->params);
        echo "</pre>";
    
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