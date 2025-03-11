<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    <div> 

        <?php

      if(isset($_SESSION["uid"]))
      {
          ?><a href="logout.php"> Logout (<?php echo $data["studname"]; ?>)</a><?php
      }
      else
      {
           ?><a href="register.php"> Register </a>
            <a href="login.php"> Login </a><?php
      }
      ?>

        
         
    </div>
  </div>
</nav>