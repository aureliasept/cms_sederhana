<?php
/**
 * Error Controller
 * 
 * Handles error pages and 404 errors
 */

class ErrorController extends Controller {
    
    /**
     * Display 404 error page
     * 
     * @return void
     */
    public function index() {
        http_response_code(404);
        
        $data = [
            'title' => '404 - Page Not Found',
            'message' => 'The page you are looking for could not be found.',
            'code' => '404'
        ];
        
        $this->view('error/404', $data);
    }
    
    /**
     * Display general error page
     * 
     * @return void
     */
    public function error($message = 'An error occurred') {
        http_response_code(500);
        
        $data = [
            'title' => 'Error',
            'message' => $message,
            'code' => '500'
        ];
        
        $this->view('error/500', $data);
    }
}
?> 