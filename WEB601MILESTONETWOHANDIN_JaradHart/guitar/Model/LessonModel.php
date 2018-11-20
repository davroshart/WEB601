<?php

class LessonModel
{
    private $myController;
    
    public $max = 3;
    public $currentLesson = 1;
    
    private function getCurrentLesson()
    {
    // Returns current the current lesson number.
    // if we have request containing "less", 
    //  then return the value from "less".
        
         $lcResult = $this->currentLesson; 
        
         // REPLACE the next line, with the following line
         // if( isset($_REQUEST["tut"])){  // <-- CAN YOU FIND A BETTER WAY TO CHECK THAT WE HAVE A "tut" in our request?
         if(isset($_SESSION["less"]))
         {
             $lcResult = intval($_SESSION["less"]);    
         }
        return $lcResult;
    }
    
    private function saveCurrentLesson($prLessNumber)
    {
        // saves the current lesson in to SESSION
        $_SESSION["less"] = $prLessNumber;
        
        // updates currentLesson to match
        $this->currentLesson =  $prLessNumber;
        
    }


    function next()
    {
    // Next Logic  - 
        
        // Get the current lesson as proposedLess        
        $proposedLess  = $this->getCurrentLesson();

        // Check and set the proposedLess
        if( ($proposedLess + 1) <= $this->max)
            $proposedLess = $proposedLess + 1;

       // $this->currentLesson =  $proposedLess;
        $this->saveCurrentLesson( $proposedLess);
    }
    
    function previous()
    {
    // Previous Logic - 
        
        // Get the current lesson as proposedLess
        $proposedLess  = $this->getCurrentLesson();
        
        // Check and set the proposedLess
        if( ($proposedLess - 1) >= 1)
        {
            $proposedLess = $proposedLess -1;
        }
        // else
        //     No change
        
        // $this->currentLesson = $proposedLess;
        $this->saveCurrentLesson( $proposedLess);
    }

    // Runs when an instance is created
    function __construct($prMyController)
    {
        $this->myController = $prMyController;
        $this->currentLesson = $this->getCurrentLesson();
    }

}

// This one does not start immediately, we get a Model when we need it.

?>
    