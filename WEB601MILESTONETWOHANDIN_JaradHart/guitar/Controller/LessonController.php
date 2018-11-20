<?php 

require_once "Model/LessonModel.php";
require_once("Model/NavModel.php");

class LessController
{
    public $navModel;
    public $lessonModel;
    private $title = "Lessons Example";
    
    function __construct()
    {    
        $this->lessonModel = new LessonModel($this);
        $this->title = "Guitar Lessons";
        $lcView = "LessonView.php";
        $this->navModel = new NavModel();
        
        if(isset($_REQUEST["cmd"]))
        {
            switch($_REQUEST["cmd"])
            {            
                case "next":  
                    // Next Logic  - should this be in a Model? Yes!
                    $this->lessonModel->next();              
                    break;

                case "prev":
                    // Previous Logic  - should this be in a Model? Yes!
                    $this->lessonModel->previous();

                    break;     
                default: 
                    $lcView = "LessonView.php";
            }
        }
        // up date the saved view with the local copy
        $this->navModel->saveCurrentView($lcView);
        require_once("View//".$lcView);
    }
    
}

$LessController = new LessController();
?>