<?php

require_once __DIR__ . '/../models/User.php';

class Register
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function create($data)
    {
        $name = trim($data['name']) ?? '';
        $email = trim($data['email']) ?? '';
        $password = trim($data['password']) ?? '';
        $password_confirmation = trim($data['password_confirmation']) ?? '';
        $datavalidation = $this->validation($data);
        if (count($datavalidation) > 0) {
            http_response_code(422);
            echo json_encode($datavalidation);
            return;
            // return ;
        }
        if($password!=$password_confirmation){
                http_response_code(422);
                echo json_encode([
                    'password_confirmation'=>'password not match'
                ]);
                return;
            }
        $user = User::fetchUser($this->pdo, $email);
        if (!$user === false) {
            http_response_code(400);
            $data=[
                'email'=>'email already taken'
            ];
            echo json_encode($data);
            return;
        }
        $sql = 'INSERT into users(name,email,password)values(?,?,?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $email, $password]);
        http_response_code(200);
        echo json_encode([
            'success'=>'user inserted successfully',
            // 'id'=>$user['id']
        ]);
        $_SESSION['msg']='success';
        // header('location:/login');
        // $_SESSION['id']=$user['id'];
        return;
    }
    public function validation($data)
    {
        $empty = [];
        foreach ($data as $key => $value) {
             if (trim($key) == "password") {
                if (strlen($value)<8) {
                    $empty[$key] = $key.' not less than 8 characters';
                }
            }
            if (trim($key) == "email") {
                if (!filter_var(trim($value), FILTER_VALIDATE_EMAIL)) {
                    $empty[$key] = $key . ' is not correct format';
                }
            }
            if (empty(trim($value))) {
                $empty[$key] = $key . ' is required';
            }
        }
        return $empty;
    }

    public function fetchuser($email)
    {
        $sql = "SELECT * FROM users where email=?";
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function login($data){
        $datavalidation=$this->validation($data);
        if(count($datavalidation)>0){
            http_response_code(422);
            echo json_encode($datavalidation);
            return;
        }
        try{
        $user=User::fetchuser($this->pdo,trim($data['email']));
        // echo json_encode($user);
        if($user===null){
            http_response_code(400);
            $data=[
                'email'=>'user not found'
            ];
            echo json_encode($data);
            return;
        }
        // echo $user['password'];
        //   var_dump($user);
        if(trim($data['password'])!=trim($user['password'])){
            http_response_code(422);
            echo json_encode([
                'passwords'=>'password not match'
            ]);
            return;
        }
        $_SESSION['id']=$user['id'];
        echo json_encode([
            'success'=>'user found'
        ]);
        // if(!)
        // print_r($user);
        return;}
        catch(Exception $e){
            echo $e->getMessage();
            return;
        }

    }
}
// $register=new Register();
