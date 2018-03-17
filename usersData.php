<?php
	
	$username=$_POST['username'];
	//echo $username;
	$password=$_POST['password'];
	$selectimg=$_FILES['img']['tmp_name'];
	$name=$_FILES['img']['name'];
	echo $selectimg;
	echo "\n\r";
	$size=getimagesize($_FILES['img']['tmp_name']);
	echo "*******".$name ."***********";
	//print_r($size);
	
	//connecte with database
	$con=mysql_connect("localhost","root","");
	
	
	//for select which database we want
	
	mysql_select_db("login");
	
	//for select query
	$result=mysql_query("select * from usersdata where username='$username' and password='$password'")
		or die("faild to query database".mysql_error());//this for massage if  failer is happen
		
	
	//echo $result;
	//print_r($result);

	$row=mysql_fetch_array($result);
	//print_r($row[3]);
	//echo $row;
	
	
	if(($row['username']==$username)&& ($row['password']==$password ))
	{
		echo "success";
		
	}
	else{
		echo "faild";
	}
	
	
	//while($row=mysql_fetch_array($result)){
		
		$r=base64_encode($row[3]);
		
		echo '<img height="300" width="300" src="data:image;base64,'.$r.'">';
		
	//}
	
	
	
	/*********************for img***********************/
	//$img=$_POST['img'];
	$image=addslashes(file_get_contents($_FILES['img']['tmp_name']));
	//echo "*******".$image."$$$$$$$$$$$$$";
	$insert=mysql_query("INSERT INTO img (image) VALUES ('$image')");
	
	
	
	//$image=base64_encode($image);
	
	//echo "&&&&&&&&&&&".$image."*********";
	
	
	
	
	//echo $_POST['img'];
	//echo $insert."********";
	if(isset($insert)){
		echo "bravooo";
	}
	
	
	//$display=mysql_query("select * from img")
	
	
	//echo '<img height="300" width="300" src=$image>';
	
	//msql_close($con);
	/************************************************************************************
	
	/**************** start signup(insert) user in db *********
        
       
        $formerrors[]="";
        
        
        /*
        ** start validation
        
        if(isset($_POST['username']))
        {
            $filteruser = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
            if(strlen($filteruser) < 4)
            {
                $formerrors[] = 'UserName must be larger than <strong>4</strong> charachter';
            }
        }
        
        if(isset($_POST['password']) && isset($_POST['cpassword']))
        {
            if(empty($_POST['password']))
            {
                $formerrors[] = "password can not be empty";
            }
            $pass1 = sha1($_POST['password']);
            $pass2 = sha1($_POST['cpassword']);
            if($pass1 !== $pass2)
            {
               $formerrors[] = 'sorry password is not match'; 
            }
        }
        
        
        
        /*
        ** end validation
        
        
        /************ start add user into db ************
        if(empty($formerrors))
        {
            $check = checkitem('username','users',$username);
            
            if($check == 1)
            {
                $formerrors[] = "this user is exist";
            } else {
                
                $statment = $con->prepare("INSERT INTO users (username,password) VALUES(:zuser,:zpass)");
                $statment->execute(array(
                     ':zuser'  => $user,
                     ':zpass'  => $hpass
                     
                ));
                $successmes = 'congrats you are now regester';
            }
            
            
        }
        /************ end add user into db ************
        
        /**************** end signup(insert) user in db *********
        
    }
    

 if(!(empty($formerrors)))
            {
                foreach($formerrors as $error)
                {
                    echo '<div class="errors">' . $error . '</div>';
                }
            }
          if(isset($successmes))
          {
              echo '<div class="success">' . $successmes . '</div>';
          }



*/