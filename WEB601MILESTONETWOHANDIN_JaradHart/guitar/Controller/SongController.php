<?php
require_once "Model/SongModel.php";
require_once("Model/NavModel.php");
class SongController
{
    public $navModel;
    public $songModel;
    private $title = "Playing";
    
    function __construct()
    {
        $this->navModel = new NavModel();
        $this->songModel = new SongModel($this);
        $this->title ="Songs For Guitar";
        $lcView = "SongView.php";
        
        if(isset($_REQUEST["cmd"]))
            switch($_REQUEST["cmd"]){
                case "baa": 
                    // echo "debug baa";
                     $this->songModel->setCurrentSong(1);
                     break;
                case "mary": 
                     $this->songModel->setCurrentSong(2);
                     break;
                case "star": 
                     $this->songModel->setCurrentSong(3);
                     break;
                default: 
                     $lcView = "SongView.php";
                     $this->songModel->setCurrentSong(0);
            }

        $this->navModel->saveCurrentView($lcView);
        require_once( "View//".$lcView);
    }
    
}

$SongController = new SongController();
?>