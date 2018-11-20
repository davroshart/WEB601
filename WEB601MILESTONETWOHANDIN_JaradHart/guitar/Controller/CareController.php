<?php
class CareController
{
    /*care view having little interaction only requires */
    private $view =  "CareView.php";
    private $title = "Care for Guitars";
    
    function __construct()
    {
        if(isset($_REQUEST["cmd"]))
        {    
            switch($_REQUEST["cmd"])
            {
            case "home": 
                 $this->view = "HomeView.php";
                 break;
            default: 
                 $this->view = "CareView.php";
            }
        }
        require_once( "View//".$this->view);
    }
    
}

$CaretController = new CareController();
?>