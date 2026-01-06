<?php
    session_start();
    if (isset($_GET['uid'])) {
        $_SESSION['uid']=$_GET['uid'];
    }
    else if(!isset($_SESSION['uid'])){
        $_SESSION['uid']="";
    }
?>

<!--header-->
            <div class="header">
                <div>
                    <div class="header-top" style="background: #05445E;">
                        <nav class="navbar navbar-default" style="background: transparent;">
                            <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                      </button>
                                    <div class="navbar-brand">
                                        <h1><a href="index.php">Electronic Service</a></h1>
                                    </div>
                                </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                                    <li><a href="service_productPage.php">Services & Product</a></li>
                                    <li><a href="aboutPage.php">Post</a></li>
                                    <li><a href="contactpage.php">Contact</a></li>
<?php
    if($_SESSION['uid']){
?>
                                    <li><a href="profile.php">Profile</a></li>
<?php
    }
    else{
?>
                                    <li><a href="loginform.php">Login</a></li>
<?php
    }
?>
                                </ul>
                              
                            </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
                        </nav>

                    </div>
                </div>
            </div>