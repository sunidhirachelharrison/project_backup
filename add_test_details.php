<?php
	//include('DB_Connect.php');
?>
<?php


    //starting the session
    session_start();
    
    //getting the qid and counter value passed from ajax call
    //$q = intval($_GET['x']);
    //$counter = @$_GET['c'];
    //$marked_answer=@$_GET['marked_value'];
    
    //for database connection
    include("DB_connect.php");


	if(isset($_REQUEST['t_submit']))
	{
		if(($_REQUEST['t_title'] == "") || ($_REQUEST['t_date'] == "") || ($_REQUEST['t_time_shiftA'] == "") && ($_REQUEST['t_time_shiftB'] == "") && ($_REQUEST['t_time_shiftC'] == "")||($_REQUEST['t_marks'] == ""))
		{
			echo "Enter Test Fields..";
		}
		else
		{
			$title = $_REQUEST['t_title'];
			$date = $_REQUEST['t_date'];
			$time_shiftA = $_REQUEST['t_time_shiftA'];
			if($time_shiftA=="")
			{
				$time_shiftA="null";
			}
			$time_shiftB = $_REQUEST['t_time_shiftB'];
            if($time_shiftB=="")
			{
				$time_shiftB="null";
			}
			$time_shiftC = $_REQUEST['t_time_shiftC'];
            if($time_shiftC=="")
			{
				$time_shiftC="null";
			}
            $t_marks= $_REQUEST['t_marks'];
			
			$sql = "INSERT INTO `test` (`T_Name`,`T_Date`,`T_Time_ShiftA`,`T_Time_ShiftB`,`T_Time_ShiftC`,`T_Marks`,`T_Flag`) VALUES ('$title','$date','$time_shiftA','$time_shiftB','$time_shiftC','$t_marks',null)";
			if(mysqli_query($con,$sql))
			{
				echo "<script>alert('New Test Details Inserted Successfully!');</script>";
			}
			else
			{
                echo "<script>alert('Unable to insert test details!');</script>";
				
			}
		}
	}
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <title>| Admin Panel (CTLD) |</title>
    <style>
        .bg-dark1 {
            background: #ea5e0d
        }

    </style>
</head>

<body>
    <!--
   <div class="jumbotron text-left" style="margin-bottom:0; padding: 1rem 1rem;">
       <img src="image/logo_uni.png" class="img-fluid" width="300" alt="tmu logo" />
   </div>
-->

    <!--
    <nav class="navbar navbar-expand-sm bg-dark1 navbar-dark">
        <a class="navbar-brand" href="index.php">Admin Panel</a>
        
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Logout</a>
        </li>    
      </ul>
    </div>
</nav>
-->

    <!--/  <div class="wrapper">-->
    <!--        <nav id="sidebar">-->
    <!--
            <div class="sidebar-header">
                <h2>Dashboard</h2>
            </div>
-->

    <!--
            <ul class="list-unstyled components">
                <li>
                    <a href="Update_profile_form.php">Edit Details</a>
                </li>
                <li>
                    <a href="#">Update Instructions</a>
                </li>
                <li>
                    <a href="#">Update Questions</a>
                </li>
                <li>
                    <a href="add_passage_type_questions.php">Add Passage Type Questions</a>
                </li>
                <li>
                    <a href="add_subquestions.php">Add Sub Questions to a Passage</a>
                </li>
                <li>
                    <a href="view_attendance.php">Attendance</a>
                </li>
                <li>
                    <a href="#">View Result</a>
                </li>
-->
    <!--
			<li>
   				<a href="#">Change Result</a>
   		   </li>
-->
    <!--
                <li>
                    <a href="#">Change Profile Image</a>
                </li>
                <li>
                    <a href="searching.php">Searching</a>
                </li>
                <li>
                    <a href="#">Import Instructions</a>
                </li>
                <li>
                    <a href="upload_questions.php">Import Questions</a>
                </li>
                <li>
                    <a href="#">Import Student Details</a>
                </li>
                <li>
                    <a href="change_password.php">Change Password</a>
                </li>
                <li>
                    <a href=".php">Add New Program</a>
                </li>
                <li class="active">
                    <a href=".php" class="active">Add Test Details</a>
                </li>
                <li>
                    <a href=".php">Update Test Details</a>
                </li>
                <li>
                    <a href="select_test.php">Select Test/Exam</a>
                </li>
                <li>
                    <a href=".php">Select Questions for a Test</a>
                </li>
            </ul>

        </nav>
-->

    <div class="container">
        <!--
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-justify"></i>
                        <span>Check</span>
                    </button>
                    <h4>&nbsp;&nbsp;Add Test Details</h4>
                </nav>
-->
        <!-- Page Coding Start -->
        <div class="" id="">
            <div class="modal-dialog modal-lg">
                <form method="post" id="exam_form">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal_title">Add Test Details</h4>

                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4 text-right">Test Title <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="t_title" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4 text-right">Test Date<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="date" name="t_date" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4 text-right">Test Time (Shift A)<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="time" name="t_time_shiftA" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4 text-right">Test Time (Shift B)
                                        <!--                                    <span class="text-danger">*</span>-->
                                    </label>
                                    <div class="col-md-8">
                                        <input type="time" name="t_time_shiftB" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4 text-right">Test Time (Shift C)
                                        <!--                                    <span class="text-danger">*</span>-->
                                    </label>
                                    <div class="col-md-8">
                                        <input type="time" name="t_time_shiftC" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4 text-right">Total Marks <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="number" name="t_marks" class="form-control" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" name="t_submit" class="btn btn-success" value="Add" />
                        </div>
                    </div>
                </form>
            </div>
        </div>




    </div>

    <!--    </div>-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

    </script>

</body>

</html>
