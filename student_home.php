
<?php
  @session_start();
  include 'db_conf.php';
  if (isset($_SESSION['student_id'])) {

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
        <link rel="stylesheet" href="teacher_home.css">

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src="signup.js"></script>

    </head>
    <body onload="startpage()">

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
              $id = $_SESSION['student_id'];
              $res = mysqli_query($connnection,"SELECT * FROM user_student WHERE student_id='$id'");
              $ress = mysqli_fetch_array($res);
              $fname = $ress['student_fname'];

              echo"Hello $fname";
           ?>
           <form method="post">
             <button type="submit" class="btn btn-success" name="logout">Log Out</button>
           </form>
        </div>
      </div>
    </nav>



    <div class="container">
      <!-- Example row of columns -->

            <div class="row" style="text-align:center;margin-top:15%;">
              <?php
                  $id = $_SESSION['student_id'];
                  $student_details_query = mysqli_query($connnection,"SELECT student_sem_id FROM user_student WHERE student_id='$id'");
                  $res = mysqli_fetch_array($student_details_query);
                  $sem_s = $res['student_sem_id'];
                  $student_sub = mysqli_query($connnection,"SELECT * FROM subjects WHERE sem_id='$sem_s'");
                  $marks = mysqli_query($connnection,"SELECT * FROM marks WHERE student_id='$id'");
                  $marks2 = mysqli_query($connnection,"SELECT * FROM marks WHERE student_id='$id'");
                  $marks3 = mysqli_query($connnection,"SELECT * FROM marks WHERE student_id='$id'");
                  echo "<h1>Marks</h1>";
                  echo'<table class="mark_table">';
                    echo "<tr>";
                    echo "<th>Exam</th>";
                      while ($out = mysqli_fetch_array($student_sub)) {
                          ?>
                            <th><?php echo $out['sub_name']?></th>
                          <?php
                      }
                    echo"</tr>";

                    echo"<tr>";
                    echo"<td>Internal</td>";
                    while ($out1 = mysqli_fetch_array($marks)) {
                      ?>
                      <td><?php echo $out1['marks_internal']?></td>
                      <?php
                    }
                    echo"</tr>";


                    echo"<tr>";
                    echo "<td>Mid Sem</td>";
                    while ($out2 = mysqli_fetch_array($marks2)) {
                      ?>

                      <td><?php echo $out2['marks_mid']?></td>
                      <?php
                    }
                    echo"</tr>";


                    echo"<tr>";
                    echo "<td>End Sem</td>";
                    while ($out3 = mysqli_fetch_array($marks3)) {
                      ?>

                      <td><?php echo $out3['marks_end']?></td>
                      <?php
                    }
                    echo"</tr>";

                  echo"</table>";

               ?>
            </div>

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

  else {
    echo "<script>window.location='http://127.0.0.1/examSystem/'</script>";
  }
 ?>

 <?php
    if (isset($_POST['logout'])) {
      @session_destroy();
      echo "<script>window.location='http://127.0.0.1/examSystem/'</script>";
    }
  ?>
