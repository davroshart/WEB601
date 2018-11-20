<?php 

require_once "Model/LoginModel.php";

class LoginController
{
    public $loginModel;    
    
    function __construct()
    {    
        $this->loginModel = new LoginModel($this);
        
        if(isset($_POST['user']))
        {
            $user = $_POST['user']);
            $pass = htmlspecialchars($_POST['pass']);
            $this->loginModel->attemptLogin($user, $pass);
            echo "here";
        }
 
    }
    
}

$LoginController = new LoginController();
?>