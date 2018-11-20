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
            <h2>Tuning Guitar Strings</h2>
            <div>
                <br><br>    
            </div>

            <h2>Changing Guitar Strings</h2>
            <div>
                <br><br>    
            </div>
            
            <h2>Cleaning a Guitar Body and Strings</h2>
            <div>
                <br><br>    
            </div>
        </div>
    </body>
</html>