<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if(!empty($fname) && !empty($lname) &&!empty($email) && !empty($password) ){
     //let's check  user email is valid or not
     if(filter_var($email,FILTER_VALIDATE_EMAIL)){//if email is it valid
        //let's check that email already exist in the database or not
        $sql = mysqli_query($conn, "SELECT email FROM  users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql)>0){//if email already exist
            echo "$email - this email is already exist!";
        }else{
            //les's check user upload file or not
            if(isset($_FILES['image'])){//if file is uploaded
                $img_name = $_FILES['image']['name']; //getting user uploaded image name
                $img_type = $_FILES['image']['type']; //getting user uploaded image type
                $tmp_name = $_FILES['image']['tmp_name']; //thise temporary name is used to save /move file in our folder

                //let's explode image and get the last extention like jpeg, png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); //here we get the extention of an user uploaded img file 
                $extention = ['png', 'jpg', 'jpeg'];
                if(in_array($img_ext,$extention) === true){
                    $time = time(); //this will return us current time...
                                    //we nee this time beacause when tou uploading  user img to in our folder we rename user file with current time 
                                    //so all the img file will have a unique name
                        //let's move the user uploaded img to our particular folder
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "image/".$new_img_name)){//if user upload img move to our folder successfully
                            $status = "Active now"; //once user signed up then this status willbe active now
                            $random_id = rand(time(), 10000000); //creating random id for user


                            //let's insert all user data inside table 
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2){ //if these data insert
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used unique_id i other php files
                                    echo "success";
                                }
                            }else{
                                echo "Something went wrong!";
                            }
                        }
                }else{
                    echo "please select an image file - JPEG, PNG, JPG!";
                }
            }else{
                echo "please select an image file!";
            }
        }
     }else{
        echo "$email - this is not a valid email";
     }
}else{
    echo "All input field are required!";
}

?>