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
            <h2>Choosing a Guitar to Start Playing</h2>
            <div>
                Display details relating to choosing a guitar to buy
                <br><br>
            </div>
            <h2>Where and How to Find a Guitar</h2>
            <div>
                <br><br>
            </div>
            <h2>Accessories</h2>
            <div>
                <br>
            </div>
        </div>
    </body>
</html>