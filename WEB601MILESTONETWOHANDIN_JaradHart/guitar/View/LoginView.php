<span id="Login">

            <!-- THIS MARK UP WILL PRESENT THE LOGIN AND ITS STATUS  align="right"-->
<!--            Login view display (probably best on the right - should use BootStrap to layout website)-->
    <div class="btn-group-vertical float-right">
        <?php
;
        if (!isset($this->loginModel)||($this->loginModel->currentUser == ""))
        {  ?>            
        <!--no login active -->
            <label for="user"></label>
                Username
            <input type="text" id="user" value=""  name="user" class="loginbtns">
            <label for="Pass"></label>
                Password
            <input type="password" id="Pass" value="" name="pass" class="loginbtns">
            <label for="btnLogin"></label>
            <input type="submit" id="btnLogin" value="Login" name="login" class="loginbtns">
        <?php
        }
        else 
        {
            echo 'Hi '.$this->loginModel->currentUser;
        ?>
            <label for="btnLogout"></label>
            <input type="submit" id="btnLogout" value="Log out" class="loginbtns">
        <?php } ?>
        
    </div>
</span>
