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
            if($this->songModel->getcurrentSong() > 0)
            {
            //song selected
                //echo "Debug 0".$this->songModel->getcurrentSong();
                include("SongDetails\\Song".$this->songModel->getCurrentSong().".php");?>
                <a href="?ctl=SongController&cmd=home">Home Page</a>
            <?php
            }
            else
            // no currentSong value, display song list
            {?>
                <h2>Choose a Song</h2>
                <a href="?ctr=SongController&cmd=baa">Baa Baa Black Sheep</a> <br>
                <a href="?ctr=SongController&cmd=mary">Mary's lamb</a> <br>
                <a href="?ctr=SongController&cmd=star">Twinkle star</a> <br>
            <?php
            }?>
        </div>
    </body>
</html> 