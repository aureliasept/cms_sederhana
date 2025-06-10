<?php
/**
 * Home Controller
 * 
 * Handles home page and related functionality
 */

class HomeController extends Controller {
    
    /**
     * Display the home page
     * 
     * @return void
     */
    public function index() {
        $data = [
            'title' => 'Welcome to Our CMS',
            'description' => 'A simple and powerful content management system',
            'features' => [
                'Easy to use',
                'Fast and lightweight',
                'Customizable',
                'Secure'
            ]
        ];
        
        $this->view('home/index', $data);
    }
    
    /**
     * Display about page
     * 
     * @return void
     */
    public function about() {
        $data = [
            'title' => 'About Us',
            'content' => 'This is a simple MVC framework built for learning and development purposes.'
        ];
        
        $this->view('home/about', $data);
    }
    
    /**
     * Display contact page
     * 
     * @return void
     */
    public function contact() {
        $data = [
            'title' => 'Contact Us',
            'email' => 'contact@example.com',
            'phone' => '+1234567890'
        ];
        
        $this->view('home/contact', $data);
    }
}
?> 