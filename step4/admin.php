<?php 
    require_once 'func.php';
    if(!isset($_SESSION)) session_start(); 
    // if (checkUser($_SESSION['login'], $_SESSION['password'])) {
    //     echo "Hello".$_SESSION['login'];
    // }
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        My blog
    </title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name = "keywords" content = "blog, travel, cooking, beauty" />
    <meta name = "description" content = "Test site" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel = "stylesheet" type="text/css" />
    <link href="css/contact.css" rel = "stylesheet" type="text/css" />
    <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" >
    <!-- <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script> -->
    <script src="js/jquery-2.1.4.min.js"></script>

</head>
<body>
    <header>
         <a href = "index.html"><h1>MY BLOG</h1></a>
    </header>
    <div class="wrapper">
        <ul class = "menu">
            <li><a href = "index.html" >HOME</a></li>
            <li><a href = "beauty.html" >BEAUTY</a></li>
            <li><a href = "cooking.html" >COOKING</a></li>
            <li><a href = "travel.html" >TRAVEL</a></li>
            <li><a href = "contact.html" >CONTACT</a></li>
            <li><a href = "about.html" >ABOUT ME</a></li>
        </ul>
        <div class="content">
            <div class="left">
                <form method="post" action="admin_main.php">
                    <label for="Login">Login</label>
                    <input type = "text" class = "field" placeholder = "Login" name = "Login" id = "Login"/>
                    <label for="Password">Password</label>
                    <input type = "Password" class = "field" placeholder = "Password" name = "Password" id = "Password" />
                    <input type = "submit" value = "Send" id = "send" name = "send" />
                </form>
        		<?php
        		    if (isset($_SESSION['error_auth']) && $_SESSION['error_auth'] == 1) {
            			echo '<p>The username and password that you entered did not match. Try again. </p>';
            			unset ($_SESSION['error_auth']);
        		    }
        		?>
            </div>
        </div>
    </div>
    <footer>My blog &copy; 2016</footer>
</body>
</html>


