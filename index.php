<?php
session_start();
require './env.php';
loadenv('.env');
require './database/database.php';
// 1. Get the full request URI path
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];


// 2. Remove the base path (/core/project1-loginregister)
$basePath = '/core/project1-loginregister';
$route = str_replace($basePath, '', $url);

// 3. Handle routes with switch
switch ($route) {
    case '/':
        if(isset($_SESSION['id'])){
            echo 'welcome to dashboard';
            break;
        }
        else{
            echo 'hi';
            break;
        }
    case '/register':
        // require_once './middleware/authmiddleware.php';
        require 'views/auth/register_form.php';
        break;

    case '/login':
        require './views/auth/login_form.php';
        break;
    case '/po':
        // echo $_FILES['ff']['name'];
        if ($method == 'POST') {
            require './controller/Registercontroller.php';
            $register = new Register($pdo);
            $validation = $register->create($_POST);
            break;
        } else {
            echo json_encode('method not allowed');
            break;
        }
    case '/poo':
        if($method=='POST'){
        require './controller/Registercontroller.php';
        $register = new Register($pdo);
        $validation = $register->login($_POST);
        break;}
        else{
            echo 'method not allowed';
            break;
        }

    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}
