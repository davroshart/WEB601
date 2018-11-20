<?php
class FindController
{
    private $view =  "FindView.php";
    private $title = "Finding a Guitar to Use";
    
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
                 $this->view = "FindView.php";
            }
        }
        require_once( "View//".$this->view);
    }
    
}

$FindController = new FindController();
?>