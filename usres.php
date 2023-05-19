<?php

session_start();
if(!isset($_SESSION['unique_id'])){
    header("location : http://localhost/Chat%20Aplication/Login.php");
}

?>



<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php

                    include_once "PHP/config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }

                ?>
                <div class="content">
                    <img src="PHP/image/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']." ". $row['lname'] ?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
               
                <a href="./PHP/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div style="border-bottom: 1px solid #e6e6e6;"></div>
            <div class="list-users" style="margin-top: 25px;">
                


            </div>
        </section>
    </div>
    <script src="JavaScript/users.js"></script>
</body>
</html>