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
            $sql="INSERT into user_details VALUES('$name','$email','$password','$dept','$year','')";
            $result=mysqli_query($conn,$sql);
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            header('location: index.php');
        }
    }

    //login
    if(isset($_POST['login']))
    {
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        if($email=='admin' && $password=='admin'){
            $_SESSION['name']='Admin';
            header('location: index.php');
        }
        if($email!='admin')
        $password=md5($password);

        $sql="SELECT * from user_details WHERE email='$email' AND 
              password='$password'";
              $result=mysqli_query($conn,$sql);
              $values=mysqli_fetch_assoc($result);

              if(mysqli_num_rows($result)==1){
                $_SESSION['name']=$values['username'];
                $_SESSION['email']=$values['email'];
                
                header('location: index.php');
              }
              else{
                array_push($error,"Invalid Email or Password");
              }
    }

    //user viewing
    if(isset($_GET['user'])){
        echo "GET works";
        $email=$_SESSION['email'];
        $sql="SELECT * from user_details WHERE email='$email'; ";
        $query=mysqli_query($conn,$sql);
        $res=mysqli_fetch_assoc($query);
        print_r($res);
    }

    //admin viewing
    if(isset($_GET['admin'])){
        echo "GET Works";
        $sql="SELECT * from user_details";
        $query=mysqli_query($conn,$sql);
        $result=mysqli_fetch_all($query,MYSQLI_ASSOC);
        echo print_r($result);
    }

    //Profile Edit
    if(isset($_GET['edit'])){
        echo "GET Works";
        $email=$_SESSION['email'];
        $name=$_SESSION['name'];
        $sql="SELECT * from user_details WHERE email='$email';";
        $query=mysqli_query($conn,$sql);
        $res=mysqli_fetch_assoc($query);
        print_r($res);
        $emailo=$res['email'];
        $file_name_n=$res['img'];
        if(isset($_POST['edit'])){
            if($_FILES['profile']['error']==0){
                $file_name=$_FILES['profile']['name'];
                $file_ext=pathinfo($file_name,PATHINFO_EXTENSION);
                $file_name_n=uniqid("IMG-",TRUE). "." . $file_ext;
                move_uploaded_file($_FILES['profile']['tmp_name'],'Uploads/' . $file_name_n);
            }
            $email=$_POST['email'];
            $name=$_POST['name'];
            $dept=$_POST['dept'];
            $year=$_POST['year'];
            $sql="UPDATE user_details SET username='$name', email='$email', dept='$dept', `year`='$year', img='$file_name_n' WHERE email='$emailo' ";
            $query=mysqli_query($conn,$sql);
            $_SESSION['email']=$email;
            $_SESSION['name']=$name;
            header('location: index.php');
        }
    }
?>