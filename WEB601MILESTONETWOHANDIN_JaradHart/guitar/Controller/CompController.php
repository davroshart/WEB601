<?php
require_once "Model/CompModel.php";
require_once("Model/NavModel.php");
class CompController
{
    public $navModel;
    public $compModel;
    private $title = "";
    private $error = "";
    
    function submit()
    {
        //retrieve submitted input and do fixstring to perform escaping for potential typed sql intrusions
        $lcQuestion_id = htmlspecialchars($_POST["questionid"]);
        
        $lcOldSchool = $_REQUEST["school_name"];
        $lcNewSchool = $this->compModel->fixString($lcOldSchool);

        $lcOldClass = $_REQUEST["classroom_name"];
        $lcNewClass = $this->compModel->fixString($lcOldClass);
        
        $lcOldEmail = $_REQUEST["pupil_email"];
        $lcNewEmail = $this->compModel->fixString($lcOldEmail);
        
        $lcOldPhone = $_REQUEST["school_phone"];
        $lcNewPhone = $this->compModel->fixString($lcOldPhone);
        
        $lcAnswer = htmlspecialchars($_POST["answer"]);
        //differ from Old if empty

        //check similarity between old and fixed vars
        if (($lcOldSchool == $lcNewSchool) && ($lcOldClass == $lcNewClass) && ($lcOldEmail == $lcNewEmail) 
            && ($lcOldPhone == $lcNewPhone))
        // no potential intrusions so request Model for submission with parameters
        {
            $this->compModel->submit($lcNewClass, $lcNewSchool, $lcNewEmail, $lcNewPhone, intval($lcQuestion_id), intval($lcAnswer));
            $this->error = false;
        }
        else
        // an intrusion found, reload competition view with echoed error message
        {
            
            $this->navModel->saveCurrentView("CompView.php");
            echo "Error found in a field. Please try again";
            $this->error = true;
        }
    }
    
    function __construct()
    {
        $this->navModel = new NavModel();
        $this->compModel = new CompModel($this);
                    
        $this->title ="Computer Competition";
        
        /*check if submission is made*/
        if(isset($_POST["Win"]) && ($_POST["Win"] == "Enter"))
        {
            // submit entry and open thanks form           
            $this->submit();
            if ($this->error == false)
            //no error - load thanks form
                $lcView = "CompThankView.php";
            else
            //error - reload entry form
                $lcView = "CompView.php";
        }
        else
            //open competition form
            $lcView = "CompView.php";
        $this->navModel->saveCurrentView($lcView);
        
        require_once( "View//".$lcView);
    }
    
}

$CompController = new CompController();
?>