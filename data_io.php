<?php
  @session_start();
  include 'db_conf.php';
  if (isset($_SESSION['teacher_id'])) {

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Examination System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src="signup.js"></script>
        <script type="text/javascript" src="teacher_home.js"></script>

    </head>
    <body onload="start()">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Examination System</a>


        </div>
        <div id="navbar" class="navbar-collapse collapse" style="color:white;float:right;padding:20px;">
          <?php
              $id = $_SESSION['teacher_id'];
              $res = mysqli_query($connnection,"SELECT * FROM user_teacher WHERE teacher_id='$id'");
              $ress = mysqli_fetch_array($res);
              $fname = $ress['teacher_fname'];

              echo"Hello $fname";
           ?>
           <form method="post">
             <button type="submit" class="btn btn-success" name="logout" >Log Out</button>
           </form>
        </div>
      </div>
    </nav>



    <div class="container">
      <!-- Example row of columns -->

            <div class="row" style="text-align:center;margin-top:25%;">
                Select Subject
            </div><br><br>

            <form action="" method="post">
                <select class="form-control" name="subject">
                      <option value="0">Select</option>
                      <?php
                      if (isset($_POST['submit'])) {
                        $subject_id = $_POST['subject'];
                        $user_student_id =$_POST['student'];
                        $internal_marks = $_POST['internal'];
                        $mid_marks = $_POST['mid'];
                        $end_marks = $_POST['end'];
                        $insert_marks = "INSERT INTO marks (marks_internal,marks_mid,marks_end,sub_id,student_id) VALUES ('$internal_marks','$mid_marks','$end_marks','$subject_id','$user_student_id')";
                        mysqli_query($connnection,$insert_marks);
                        $res = mysqli_affected_rows($connnection);
                        if($res==0){
                          echo"<script>alert('Unsuccessful Insertion !')</script>";
                          echo"<script>window.location='enter_marks.php'</script>";
                        }

                        else{
                          echo"<script>alert('Successful Insertion !')</script>";
                          echo"<script>window.location='enter_marks.php'</script>";
                        }
                    }
                    ?>
                </select>
                <br><br>
                <div class="" style="text-align:center;">
                  <button type="submit" class="btn btn-success" name="submit">Enter</button>
                </div>
          </form>

      <hr>

      <footer>
        <p>&copy; Assam University ,Silchar</p>
      </footer>
    </div>
    <!-- /container -->

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>


    </body>
</html>

<?php

  }

  else{
    echo "<script>window.location='http://127.0.0.1/examSystem/'</script>";
  }
 ?>


<?php
  if (isset($_POST['logout'])) {
    @session_destroy();
    echo "<script>window.location='http://127.0.0.1/examSystem/'</script>";
  }

 ?>
