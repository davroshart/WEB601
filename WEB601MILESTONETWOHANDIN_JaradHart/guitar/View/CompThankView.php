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
    
            $lcThanksRecord = $this->compModel->getSubmission();
   /*         $lcResult = lcThanksRecord['user'];
            echo "Hi ";.$lcResult.'<br>';*/
            echo "Hi<br>";
            $lcResult = $lcThanksRecord['class'];
            echo "You're in room ".$lcResult.'<br>';
            $lcResult = $lcThanksRecord['school_name'];
            echo "at ".$lcResult.' school<br>';
            $lcResult = $lcThanksRecord['phone'];
            echo "We can phone you on ".$lcResult.' and email you at ';
            $lcResult = $lcThanksRecord['email'];
            echo $lcResult;
            ?>            
            Thanks for your entry and good luck!<br>
            Your answer to the question : 
             <?php $lcResult = $lcThanksRecord['question_text']; 
                echo $lcResult;?>
            <br>was
             <?php $lcResult = $lcThanksRecord['answer_text']; 
                echo " ".$lcResult;?>
            
        </div>
    </body>
</html>