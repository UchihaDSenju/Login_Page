<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','login');
    $name="";
    $email="";
    $password="";
    $dept="";
    $year="";
    $error=array();
    //signup
    if(isset($_POST['register']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $dept=$_POST['dept'];
        $year=$_POST['year'];
        //email check
        $sql="SELECT * from user_details WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>=1)
        {
            array_push($error,"Email already exists");
        }
        if($_POST['pass1']!=$_POST['pass2'])
        {
            array_push($error,"Password Do Not Match");
        }
        else{
            $password=$_POST['pass1'];
        }
        if(empty($error))
        {
            $password=md5($password);
            $sql="INSERT into user_details VALUES('$name','$email','$password','$dept','$year')";
            $result=mysqli_query($conn,$sql);
            $_SESSION['name']=$name;
            header('location: index.php');
        }
    }

    //login
    if(isset($_POST['login']))
    {
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        if($email!='admin')
        $password=md5($password);

        $sql="SELECT * from user_details WHERE email='$email' AND 
              password='$password'";
              $result=mysqli_query($conn,$sql);
              $values=mysqli_fetch_assoc($result);

              if(mysqli_num_rows($result)==1){
                $_SESSION['name']=$values['username'];
                header('location: index.php');
              }
              else{
                array_push($error,"Invalid Email or Password");
              }
    }
?>