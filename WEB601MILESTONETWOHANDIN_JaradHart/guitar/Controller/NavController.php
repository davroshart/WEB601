<?php
require_once "Model/LessonModel.php";
require_once "Model/LoginModel.php";
require_once "Model/SongModel.php";
require_once "Model/NavModel.php";
require_once "Model/CompModel.php";

class NavController
{
    private $navModel;
    
    private $title = "The Basics of Playing Guitar";
    
    
    // Add public attributes for Different models to hold different models.
    // 
    public $lessonModel;
    public $songModel;
    public $loginModel;
    public $compModel;
    
    function __construct()
    {        
        $this->lessonModel = new LessonModel($this);
        $this->loginModel = new LoginModel($this);
        $this->songModel = new SongModel($this);
        $this->navModel = new NavModel();
        $this->compModel = new CompModel($this);
        // Make a local copy of the currentView
        $lcView = "HomeView.php";
        
 
        if(isset($_REQUEST["cmd"]))
        {                
            
            switch($_REQUEST["cmd"])
            {
            case "home": 
                 $lcView = "HomeView.php";
                 break;
            case"find":
                $this->title ="Finding a Guitar to Use";
                $lcView = "FindView.php";
                break;
            case "lessons":
                $this->title ="Guitar Lessons";
                $lcView = "LessonView.php";
                
                 // Do we have a tut number?? should be in a Model
                             
                break;
            case "songs":
                $this->title ="Songs For Guitar";
                $this->songModel->setCurrentSong(0);
                $lcView = "SongView.php";
                
                 // Do we have a somg number?? should be in a Model
                             
                break;
            case"care":
                $this->title ="Guitar Care";
                $lcView = "CareView.php";
                break;
            case"comp":                              
                $this->title ="Computer Competition";
                $lcView = "CompView.php";
                break;
            default: 
                 $lcView = "HomeView.php";
            }
        }
        
        // up date the saved view with the local copy
        $this->navModel->saveCurrentView($lcView);
        require_once("View//".$lcView);
    }
    
}

$NavController = new NavController();
?>