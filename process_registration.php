<?php
   // session_start();
    include('includes/config.php');
    if(!empty($_POST['name']  && $_POST['email'] && $_POST['phone'] && $_POST['age']))
    {
         extract($_POST);
        $role = "user";

      //   $data['name'] = $name;
      //   $data['role'] = $role;
      //   $data['email'] = $email;
      //   $data['phone'] = $phone;
      //   $data['age'] = $age;
      //   $data['gender'] = "male";
      //   $data['password'] = $password;

      //   echo "<pre>";
      //   print_r($data);

      //   $sql = "insert into user (name, role, email, phone, age, gender, password) VALUES(:name, :role, :email, :phone, ':age', :gender, :password)";
      //   echo $sql;
      //   query($sql, $data);
 
     
      // die;
        $qur = mysqli_query($con,"insert into  user values(NULL,'$name','$role','$email','$phone','$age','gender','$password')");
      
        if($qur);
        {
            header('location:index.php');
        }

        
    }
  else{
    echo "fill all the field";die;
  }
   // $_SESSION['user']=$id;
   
?>