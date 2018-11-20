<?php
require_once "Model/CompModel.php";
require_once("Model/NavModel.php");
class CompThankController
{
    public $navModel;
    public $compModel;
    private $title = "";
    
    function __construct()
    {
        $this->navModel = new NavModel();
        $this->compModel = new CompModel($this);
                    
        $this->title ="Computer Competition";
        
        /*check if submission is made*/
        if(isset($_REQUEST["Win"]) && ($_POST["Win"] == "Enter"))
        {
            // submit entry submission           
            $this->submit();
            $lcView = "CompThankView.php";
        }
        else
            $lcView = "CompThankView.php";
               
        require_once( "View//".$lcView);
    }
    
}

$CompController = new CompController();
?>