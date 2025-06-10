<?php
/**
 * Home Controller
 * 
 * Handles home page and related functionality
 */

class HomeController extends Controller {
    
    /**
     * Display the home page
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
     */
    public function about() {
        echo "<h1 style='color:green;'>🔍 Masuk method about()</h1>";

        $data = [
            'title' => 'About Us',
            'content' => 'This is a simple MVC framework built for learning and development purposes.'
        ];
        
        $this->view('home/about', $data);
    }

    /**
     * Display contact page
     */
    public function contact() {
        echo "<h1 style='color:blue;'>📞 Masuk method contact()</h1>";

        $data = [
            'title' => 'Contact Us',
            'email' => 'contact@example.com',
            'phone' => '+1234567890'
        ];
        
        $this->view('home/contact', $data);
    }

    /**
     * Display login page
     */
    public function login() {
        echo "<h1 style='color:purple;'>🔐 Masuk method login()</h1>";

        $this->view('home/login');
    }
}
?>