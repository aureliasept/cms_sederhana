<?php
/**
 * Simple MVC Framework - Base Controller Class
 * 
 * Provides base functionality for all controllers including
 * model loading and view rendering.
 */

class Controller {
    protected $model;
    protected $view;
    
    /**
     * Load a model
     * 
     * @param string $modelName
     * @return object
     */
    protected function model($modelName) {
        $modelFile = APP_ROOT . '/app/models/' . $modelName . '.php';
        
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $modelName();
        } else {
            throw new Exception("Model '$modelName' not found");
        }
    }
    
    /**
     * Load and render a view
     * 
     * @param string $viewName
     * @param array $data
     * @return void
     */
    protected function view($viewName, $data = []) {
        $viewFile = APP_ROOT . '/app/views/' . $viewName . '.php';
        
        if (file_exists($viewFile)) {
            // Extract data to make variables available in view
            extract($data);
            
            // Start output buffering
            ob_start();
            
            // Include the view file
            require_once $viewFile;
            
            // Get the contents and clean the buffer
            $content = ob_get_clean();
            
            // Output the content
            echo $content;
        } else {
            throw new Exception("View '$viewName' not found");
        }
    }
    
    /**
     * Load a view without rendering (for partial views)
     * 
     * @param string $viewName
     * @param array $data
     * @return string
     */
    protected function partial($viewName, $data = []) {
        $viewFile = APP_ROOT . '/app/views/' . $viewName . '.php';
        
        if (file_exists($viewFile)) {
            // Extract data to make variables available in view
            extract($data);
            
            // Start output buffering
            ob_start();
            
            // Include the view file
            require_once $viewFile;
            
            // Get the contents and clean the buffer
            $content = ob_get_clean();
            
            return $content;
        } else {
            throw new Exception("Partial view '$viewName' not found");
        }
    }
    
    /**
     * Redirect to another URL
     * 
     * @param string $url
     * @return void
     */
    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
    
    /**
     * Redirect back to previous page
     * 
     * @return void
     */
    protected function redirectBack() {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        $this->redirect($referer);
    }
    
    /**
     * Get POST data
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function post($key = null, $default = null) {
        if ($key === null) {
            return $_POST;
        }
        
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
    
    /**
     * Get GET data
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function get($key = null, $default = null) {
        if ($key === null) {
            return $_GET;
        }
        
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
    
    /**
     * Check if request is POST
     * 
     * @return bool
     */
    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    /**
     * Check if request is GET
     * 
     * @return bool
     */
    protected function isGet() {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    
    /**
     * Send JSON response
     * 
     * @param mixed $data
     * @param int $statusCode
     * @return void
     */
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
    
    /**
     * Validate required fields
     * 
     * @param array $data
     * @param array $required
     * @return array
     */
    protected function validate($data, $required) {
        $errors = [];
        
        foreach ($required as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }
        
        return $errors;
    }
}
?> 