        <!-- Since the Login information is on every page then it feels like it is part of the Navigator -->
        <?/*php
            require_once "LoginView.php";*/
        ?>

 <!--       <div class="nav">
             
            <ul>
                <li class="home"><a href="?cmd=home">Home</a></li>
                <li class="find"><a href="?cmd=find">Finding</a></li>
                <li class="lessons"><a href="?cmd=lessons&less=<?//=$this->lessonModel->currentLesson?>">Lessons</a></li>
                <li class="songs"><a href="?cmd=songs">Songs</a></li>
                <li class="care"><a href="?cmd=care">Care</a></li>
            </ul>
          
        </div>-->
        <nav class="navbar navbar-expand-lg nav"><!--bar-light bg-light">-->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav nav">
                <ul>
                  <li class="home"> <a href="?cmd=home">Home <span class="sr-only">(current)</span></a> </li> 
                  <li class="find"> <a href="?cmd=find">Finding</a> </li>
                  <li class="lessons"> <a href="?cmd=lessons&less<?=$this->lessonModel->currentLesson?>">Lessons</a> </li>
                  <li class="songs"> <a href="?cmd=songs">Songs</a> </li>
                  <li class="care"> <a href="?cmd=care">Care</a> </li>
                  <li class="comp color:red"> <a href="?cmd=comp">Competition</a> </li>
                </ul>
            </div>
          </div>
        </nav>