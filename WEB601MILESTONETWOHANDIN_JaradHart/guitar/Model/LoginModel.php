<?php
// This keeps track of the current View for controllers that dont know it
class LoginModel
{
    private $myController;
    
    public $currentUser = "";
    public $active = 'N';
      
    public function attemptLogin($prUser, $prPass)
    {
    //  try to login
        
        
        
    }
    
    function currentUser()
    {
        return $currentUser;
    }
    
    function active()
    {
        return $active;
    }
    
    function __construct($prMyController)
    {
        $this->myController = $prMyController;
    }
}

// This one does not start immediately, we get a Model when we need it.

?>