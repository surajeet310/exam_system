<?php
include 'db_conf.php';
@session_start();

if (isset($_POST['Login'])) {


      $username = $_POST['username'];
      $password = $_POST['pass'];
      $designation = $_POST['desig'];

      if($designation == 2){
        $query_check = "SELECT * FROM user_student WHERE student_email='".$username."' AND student_pass='".$password."' ";
        $res=mysqli_query($connnection,$query_check);
        //print_r($res);
         $vars=mysqli_fetch_array($res);

         $id=$vars['student_id'];
        $num=mysqli_num_rows($res);

        if($num > 0){
           $_SESSION['student_id']=$id;
          echo "
          <script>alert('You are Logged In')</script>
          <script>window.location='student_home.php'</script>
          ";

        }
        else {
             echo "
            <script>alert('Invalid Details Entered !')</script>
            <script>window.location='http://127.0.0.1/examSystem/'</script>
            ";
        }

      }
      elseif ($designation == 1) {
        $query_check = "SELECT * FROM user_teacher WHERE teacher_email='".$username."' AND teacher_pass='".$password."' ";
        $res=mysqli_query($connnection,$query_check);
        //print_r($res);
         $vars=mysqli_fetch_array($res);

        $id=$vars['teacher_id'];
        $num=mysqli_num_rows($res);

        if($num > 0){
           $_SESSION['teacher_id']=$id;
          echo "
          <script>alert('You are Logged In')</script>
          <script>window.location='teacher_home.php'</script>
          ";

        }
        else {
             echo "
            <script>alert('Invalid Details Entered !')</script>
            <script>window.location='http://127.0.0.1/examSystem/'</script>
            ";
        }
      }




}
 ?>
