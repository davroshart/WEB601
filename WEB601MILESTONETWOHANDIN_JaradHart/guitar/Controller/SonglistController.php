<?php

require_once "Model/SonglistModel.php";
require_once("Model/NavModel.php");

class SonglistController
{
    //private $view =  "SonglistView.php";
    private $title = "Playing";
    private $song = "none";
    
    public $songlistModel;
    
    function __construct(){
        $this->songlistModel = new SonglistModel($this);
        $this->title = "Guitar Songs";
        $lcView = "SonglistView.php";
        $this->navModel = new NavModel();
        
        if(isset($_REQUEST["cmd"]))
        switch($_REQUEST["cmd"]){
            case "baa":                 
                 $this->view = "Song1.php";        
                 $this->song = "baa";
    //             $this->songlistModel->setCurrentSong(1);
                 break;
            case "mary": 
                 $this->view = "Song2.php";
                 break;
            case "star": 
                 $this->view = "Song3.php";
                 break;
            case "home": 
                 $this->view = "HomeView.php";
                 break;
            default: 
                 $this->view = "SonglistView.php";
                
        }
        
        if($this->songlistModel->getCurrentSong()!=0)
        //don't require song view
        {
            echo "DEBUG 1:";
            $this->view = "SonglistView.php";
        }
        else
        {
            // up date the saved view with the local copy
            $this->navModel->saveCurrentView($lcView);

            require_once( "View//".$this->view);
        } 
    }
    
}

$SonglistController = new SonglistController();
?>