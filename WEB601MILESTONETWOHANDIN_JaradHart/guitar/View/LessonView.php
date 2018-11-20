<html>
    <head>
        <title> <?=$this->title?> </title>
        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/nav.css">        
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
        <div class="main">
            <div>
                <?php
                require_once ("LoginView.php");
                ?>            
                <h1><?=$this->title?> </h1>           
            </div>
            <div style="clear:both">
                <?php
                 require_once("NavView.php");
                ?>
            </div>
            <?php
                if( isset($this->lessonModel->currentLesson))
                {
                    // currentLesson is set
                    include("LessonDetails\\Less".$this->lessonModel->currentLesson.".php");
                }
                else 
                {
                   // We do not have a currentLesson value
                   ?>

                    <!-- HTML Here so this an HTML comment -->
                    Sorry there is a problem, I do not know what the current lesson is, </br>
                    This notice is likely here because the code for Previous in the LessonModel needs to be completed.

                   <?php
               }

               // This displays the alternative lesson "selection mechanisms"

               if(
                   ($this->lessonModel->currentLesson < $this->lessonModel->max) 
                       &&
                   ($this->lessonModel->currentLesson > 1)
                 )
               {?> 

                    <!-- Next and Prev Lesson selection -->
                     <a href="?ctr=LessonController&cmd=prev"> << Prev Lesson</a>
                     <a href="?ctr=LessonController&cmd=next"> Next Lesson >></a>

               <?php 
               }
               else if ($this->lessonModel->currentLesson == $this->lessonModel->max) 
                    { ?>
                      <!-- Prev Lesson selection -->
                      <a href="?ctr=LessonController&cmd=prev"> << Prev Lesson</a>

                      <!-- Last Lesson display -->
                      Last Lesson >|
              <?php } 
              else if ($this->lessonModel->currentLesson == 1)
                   {?>
                      <!-- First Lesson display -->
                      |< First Lesson

                      <!-- Next Lesson selection -->
                      <a href="?ctr=LessonController&cmd=next"> Next Lesson >></a>   

              <?php } // end of alternatives
            ?> 
            <!-- Back in to HTML -->
        </div>
    </body>
</html>