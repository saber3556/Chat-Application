<?php

session_start();
if(isset($_SESSION['unique_id'])){
    header("location: usres.php");
}

?>


<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat App</header>
            <form action="#">
                <div class="error-text"></div>


                    <div class="fieled input">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter your email" name="email">
                    </div>
                    <div class="fieled input">
                        <label>Password</label>
                        <input type="password" placeholder="Enter your Password" name="password">
                        <i class="fa fa-eye"></i>  
                    </div>
                   
                    <div class="fieled button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                </form>
            <div class="link">Not yet singed up? <a href="chatAPP.php">Signup now</a></div>
        </section>
    </div>
    <script src="JavaScript/pass-show-hide.js"></script>
    <script src="JavaScript/login.js"></script>
</body>
</html>