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
     */
    protected function model($modelName) {
        $modelFile = __DIR__ . '/../app/models/' . $modelName . '.php';

        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $modelName();
        } else {
            throw new Exception("Model '$modelName' not found");
        }
    }

    /**
     * Load and render a view
     */
    protected function view($viewName, $data = []) {
        $viewFile = realpath(__DIR__ . '/../app/views/' . $viewName . '.php');
    
        echo "<pre style='color:red;'>VIEW PATH CHECK: $viewFile</pre>";
    
        if ($viewFile && file_exists($viewFile)) {
            extract($data);
            require $viewFile;
        } else {
            echo "<h2 style='color:red;'>❌ View file NOT FOUND: $viewFile</h2>";
        }
    }     

    /**
     * Load a partial view
     */
    protected function partial($viewName, $data = []) {
        $viewFile = __DIR__ . '/../app/views/' . $viewName . '.php';

        if (file_exists($viewFile)) {
            extract($data);
            ob_start();
            require_once $viewFile;
            return ob_get_clean();
        } else {
            throw new Exception("Partial view '$viewName' not found");
        }
    }

    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }

    protected function redirectBack() {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        $this->redirect($referer);
    }

    protected function post($key = null, $default = null) {
        return $key === null ? $_POST : ($_POST[$key] ?? $default);
    }

    protected function get($key = null, $default = null) {
        return $key === null ? $_GET : ($_GET[$key] ?? $default);
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function isGet() {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    protected function validate($data, $required) {
        $errors = [];

        foreach ($required as $field) {
            if (empty($data[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        return $errors;
    }
}
?>
