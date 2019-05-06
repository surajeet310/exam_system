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
        <script type="text/javascript" src="marks.js"></script>

    </head>
    <body onload="onstart()">

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

            </div><br><br>

            <form action="data_io.php" method="post">
                <select class="form-control" name="subject" onchange="student_disp()">
                      <option value="0">Select Subject</option>
                      <?php
                      if (isset($_POST['submit'])) {
                        $sem = $_POST['sem'];
                        $subject_query = mysqli_query($connnection,"SELECT * FROM subjects WHERE sem_id='$sem'");

                      while($out = mysqli_fetch_array($subject_query)){
                        ?>
                          <option value="<?php echo $out['sub_id'] ?>"><?php echo $out['sub_name'] ?></option>
                          <?php
                      }

                    }
                    ?>
                </select>
                <br><br>
                <select class="form-control" name="student" id="student" onchange="marksheet()">
                  <option value="0">Select Student</option>
                    <?php
                      if (isset($_POST['submit'])) {
                        $sem1 = $_POST['sem'];
                        //echo"<script>console.log($sem1)</script>";
                        $student_query = mysqli_query($connnection,"SELECT * FROM user_student WHERE student_sem_id='$sem1'");
                        while ($out1 = mysqli_fetch_array($student_query)) {
                           ?>
                           <option value="<?php echo $out1['student_id']?>"><?php echo $out1['student_fname']?><?php echo " "?><?php echo $out1['student_lname']?></option>
                           <?php
                        }
                      }
                     ?>
                </select>
                <br><br>
                <div class="marksheet" id="marksheet">
                  <div class="form-group">
                    <input type="number" class="form-control" name="internal" placeholder="Enter Internal Marks"><br><br>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="mid" placeholder="Enter Mid Sem Marks"><br><br>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="end" placeholder="Enter End Sem Marks"><br><br>
                  </div>
                </div>
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
