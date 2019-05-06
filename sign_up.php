<?php
    include 'db_conf.php';
    @session_start();
    if (isset($_POST['Signup'])) {
      $first_name = $_POST['fname'];
      $last_name = $_POST['lname'];
      $designation_s = $_POST['designation'];
      $email = $_POST['email'];
      $roll = $_POST['roll'];
      $number = $_POST['number'];
      $semester = $_POST['sem'];
      $passw = $_POST['password'];



      if ($designation_s == 1) {
        $insert_query_faculty = "INSERT INTO user_teacher (teacher_fname,teacher_lname,teacher_email,teacher_pass)
        VALUES ('$first_name','$last_name','$email','$passw')";
        $res = mysqli_query($connnection,$insert_query_faculty);
      }

      elseif ($designation_s == 2) {
        $insert_query_student = "INSERT INTO user_student (student_fname,student_lname,student_email,student_pass,student_sem_id,student_roll,student_number)
        VALUES ('$first_name','$last_name','$email','$passw','$semester','$roll','$number')";
        $res = mysqli_query($connnection,$insert_query_student);
      }

      $result = mysqli_affected_rows($connnection);
      if ($result == 0) {
        echo "<script>alert('Error Insertion')</script>";
      }
      else {
        echo "<script>alert('Succesfull Insertion')</script>";
        echo "
          <script>window.location='http://127.0.0.1/examSystem/'</script>
        ";
      }



    }


 ?>
