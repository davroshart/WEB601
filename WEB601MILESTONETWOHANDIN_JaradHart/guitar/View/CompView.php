<html>
    <head>
        <title> <?=$this->title?> </title>
        <!-- bootstrap link -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/nav.css">        
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <form method="post" action="?ctr=CompController" onsubmit="returnHere">
        <div class="main">
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
                if($this->compModel->Question == "")
                {
                    //get new question and answers from DB
                    $this->compModel->setQuestion();                
                }?>
                   
        <legend>Competition Question</legend>
        <br>
        <div>            
             <?php $lcResult = $this->compModel->get("question"); 
            echo $lcResult."<br>";?>
                            
            <input type="hidden" id="" name="questionid" value="<?= $this->compModel->get("questionid") ?>">
        </div>
    
        <br>
        <fieldset>
            <legend>Answer Options</legend>
            <p>
                <label for="answer1">
                    <input type="radio" id="answer1" name="answer" value= "<?= $this->compModel->get("answer1id") ?>" CHECKED/>
                    <?php $lcResult = $this->compModel->get("answer1"); 
                    echo $lcResult;?>
                </label>
            </p>      
            <p>
                <label for="answer2">
                    <input type="radio" id="answer2" name="answer" value="<?= $this->compModel->get('answer2id') ?>">
                    <?php $lcResult = $this->compModel->get("answer2"); 
                    echo $lcResult;?>
                </label>
            </p>
            <p>
                <label for="answer3">
                    <input type="radio" id="answer3" name="answer" value="<?= $this->compModel->get('answer3id') ?>">
                    <?php $lcResult = $this->compModel->get("answer3");                 
                    echo $lcResult;?>
                </label>
            </p>
        </fieldset>
        <br>
        <div>
            <div>
                <label for="clasroom">
                    Class name: 
                    <input type="text" id="classroom" name="classroom_name" placeholder="enter your class name" required>
                </label>
            </div>
            <div>
                <label for="school">
                    School name:
                    <input type="text" id="school" name="school_name" placeholder="enter school name" required>
                </label>
            </div>
            <div>
                <label for="email">
                    Email address:
                    <input type="text" id="emal" name="pupil_email" placeholder="enter your email" required>
                </label>
            </div>
            <div>
                <label for="phone">
                    School phone number:
                    <input type="text" id="phone" name="school_phone" placeholder="enter school phone" required>
                </label>
            </div>
            <input type="submit" value="Enter" name="Win">
            
        </div>
    </form>
</html>