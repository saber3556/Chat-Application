<?php

session_start();
if(isset($_SESSION['unique_id'])){
    header("location: usres.php");
}

?>


<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chat App</header>
            <form action="#" method="$_POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="fieled input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="fieled input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>

                    <div class="fieled input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email"required>
                    </div>
                    <div class="fieled input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your Password" required>
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="fieled image">
                        <label>Select Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="fieled button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                </form>
            <div class="link">Already singed up? <a href="Login.php">Login now</a></div>
        </section>
    </div>

    <script src="./JavaScript/pass-show-hide.js"></script>
    <script src="./JavaScript/signup.js"></script>
</body>
</html>