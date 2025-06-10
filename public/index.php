<?php
/**
 * Simple MVC Framework - Entry Point
 * 
 * This file serves as the main entry point for all requests
 * and handles routing to the appropriate controller and action.
 */

// Define the application root path
define('APP_ROOT', dirname(__DIR__));

// Include the core framework files
require_once APP_ROOT . '/core/App.php';

// Start the application
try {
    // Initialize the application
    $app = new App();
    
} catch (Exception $e) {
    // Handle errors
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}
?> 