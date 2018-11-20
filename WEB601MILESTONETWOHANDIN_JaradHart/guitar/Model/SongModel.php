<?php

class SongModel
{
    private $myController;
    
    public $max = 3;
    public $currentSong = 0;
    
    function getCurrentSong()
    {
    // Returns current the current song number.
    // if we have request containing "song", 
    //  then return the value from "song".
        
        $lcResult = $this->currentSong; 
        
        if(isset($_SESSION["song"]))
        {
            $lcResult = intval($_SESSION["song"]);             
        }
        return $lcResult;
    }
    
    function setCurrentSong($prSongNumber)
    {
        // saves the current song in to SESSION
        $_SESSION["song"] = $prSongNumber;
        
        // updates currentLesson to match
        $this->currentSong =  $prSongNumber;
    }

    // Runs when an instance is created
    function __construct($prMyController)
    {
        $this->myController = $prMyController;
        $this->currentSong = $this->getCurrentSong();
    }

}

// This one does not start immediately, we get a Model when we need it.

?>