<?php
    include '../db/db.php';

                $dest_name = mysqli_real_escape_string($connection, $_GET['dest_name']);
                $dest_city = mysqli_real_escape_string($connection, $_GET['dest_city']);
                $dest_street = mysqli_real_escape_string($connection, $_GET['dest_street']);
                $dest_number = mysqli_real_escape_string($connection, $_GET['dest_number']);
                if(isset($_GET['dest_home_or_work'])){
                    $dest_home_or_work = mysqli_real_escape_string($connection, $_GET['dest_home_or_work']);
                    if($dest_home_or_work == "home"){
                        $dest_home = 1;
                        $dest_work = 0;
                    }
                    elseif($dest_home_or_work == "work"){
                        $dest_work = 1;
                        $dest_home = 0;
                    }
                }
                else{
                    $dest_work = 0;
                    $dest_home = 0;
                }
                $user_id = 6;       // ADD DYNAMIC USER ID #########################################

                $query  = "INSERT INTO dbShnkr22studWeb1.tbl_destinations_202 
                (name, city, street, house_number, is_work, is_home, user_id)
                VALUES ('$dest_name', '$dest_city', '$dest_street', '$dest_number', '$dest_work', '$dest_home', 6);";  // ADD DYNAMIC USER ID #########################################
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die("DB query failed");
                }
                mysqli_close($connection);
                header('Location:' . URL . '/noas-page.php');
?>