<?php
    
    include("DB_Connect.php");


//******************************************

    if(isset($_POST['submit']))
    {
        
        $enrollment_no=$_POST['enrollment_no'];
        $name=$_POST['name'];
        $program=$_POST['program'];
        $year=$_POST['year'];
        $branch=$_POST['branch'];
        $section=$_POST['section'];
        //$session_beg=$_POST['session_beg'];
        //$session_end=$_POST['session_end'];
        //$session=$session_beg."-".$session_end;
        $mobile_no=$_POST['mobile_no'];
        $email_id=$_POST['email_id'];
        //$image=$_POST['imageUpload'];
        $image=basename($_FILES['imageUpload']['name']);
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        $hashed_pwd=password_hash($password, PASSWORD_ARGON2I); 
        $reg_date=$_POST['reg_date'];
        $reg_time=$_POST['reg_time'];
        
        $target_dir="uploads/";
        $target_file=$target_dir.basename($_FILES['imageUpload']['name']);
        $uploadOk=1;
        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
        if(move_uploaded_file($_FILES['imageUpload']['tmp_name'],$target_file))
        {
            //echo "the file ". basename($_FILES["imageUpload"]["name"]). " has been uploaded.";
        }
            
//        $id=$_POST['id'];
        
        //$image=basename($_FILES['imageUpload']['name']);
        $query="INSERT into user(U_ID,U_User_Type,U_Enrollment_No,U_Name,U_Program,U_Year,U_Section,U_Branch,U_Mobile_No,U_Email_ID,U_Image,U_Password,U_Registration_Date,U_Registration_Time) VALUES(null,'student','".$enrollment_no."','".$name."','".$program."','".$year."','".$section."','".$branch."','".$mobile_no."','".$email_id."','".$image."','".$hashed_pwd."','".$reg_date."','".$reg_time."')";
        
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//to upload image to server
//   if(isset($_POST['uploadbtn']))
//    {
//        $target_dir="uploads/";
//        $target_file=$target_dir.basename($_FILES['imageUpload']['name']);
//        $uploadOk=1;
//        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
//        if(move_uploaded_file($_FILES['imageUpload']['tmp_name'],$target_file))
//        {
//            echo "the file ". basename($_FILES["imageUpload"]["name"]). " has been uploaded.";
//        }
//        else
//        {
//            echo "Sorry! uploading of image failed!";
//        }
//    }
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

        
            
        $r=mysqli_query($con,$query);
        if($r)
        {
            echo '<script type="text/javascript">alert("User Registration Successful!");</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("User Registration Failed!");</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New User Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .aa{
            background: #ea5e0d;
            color: white;
        }
        .aa:hover{
            background: #e9ecef;
            color: #ea5e0d;
        }
    </style>
</head>
<body>
   <div class="jumbotron text-left" style="margin-bottom:0; padding: 1rem 1rem;">
  		<img src="image/logo_uni.png" class="img-fluid" width="300" alt="tmu logo" />
	</div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Center for Teaching, Learning & Development</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
          
    </nav>
    
<!--
    <div class="containter">
		<div class="d-flex justify-content-center">
			<br /><br/>
			<div class="card" style="margin-top:50px;margin-bottom: 100px;">
-->
    
    
    
    
    
    <form action="#" method="post" enctype="multipart/form-data">
<!--
        <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-xl-12 col-12">
-->
        <div class="containter">
		<!--<div class="d-flex justify-content-center">-->
			<div class="row">
			<div class="col-4"></div>
			
			<div class="col-4">
			<div class="card" style="margin-top:50px;margin-bottom: 100px;">
        		<div class="card-header"><h4>User Registration</h4></div>
        		<div class="card-body">
<!--                    <h1>Registration</h1><br/>-->
<!--
                    <label for="id"><b>ID:</b></label>
                    <input type="text" class="form-control" name="id" disabled/><br/>
-->
                    <label for="enrollmentno"><b>Enrollment No.:</b></label>
                    <input type="text" class="form-control" name="enrollment_no" id="" required /><br/>
                    <label for="name"><b>Full Name:</b></label>
                    <input type="text" class="form-control" name="name" required/><br/>
                    
                    <label for="program"><b>Program:</b></label>
                    <select name="program" id="" class="form-control">
                      <option value="none">None</option>
                       
                       <?php 
                    
                        $q="SELECT * FROM program";
                        $x=mysqli_query($con,$q);
                        while($row=mysqli_fetch_assoc($x))
                        {
                            
                        
                    
                    ?>
                       
                        <option value="<?php echo $row['Prog_Name']; ?>"><?php echo $row['Prog_Name']; ?></option>
                       
                         <?php
                        } 
                        ?>
                    </select><br/>
                    
                    <label for="year"><b>Year:</b></label>
                    <select name="year" id="" class="form-control">
                        <option value="none">None</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                    </select><br/>
                    
                    <label for="section"><b>Section:</b></label>
                    <select name="section" id="" class="form-control">
                        <option value="none">None</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select><br/>
                    
                    <label for="branch"><b>Branch:</b></label>
                    <select name="branch" id="" class="form-control">
                        <option value="none">None</option>
                        <option value="CS">CS</option>
                        <option value="Animation">Animation</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="Civil">Civil</option>
                        <option value="EE">EE</option>
                        <option value="EC">EC</option>
                        <option value="AI">AI</option>
                        <option value="IBM">IBM - </option>
                        <option value="iNurture">iNurture - Cloud</option>
                    </select><br/>
                    
<!--
                    <label for="session_beg"><b>Session:</b></label><br/>
                   From:<select name="session_beg" id="session_beg" class="form-control col-sm-4">
                        <option value="none">None</option>
-->
<!--                        <option value="2020">2020</option>-->
<!--
                    </select> 
                    To:<select name="session_end" id="session_end" class="form-control col-sm-4">
                        <option value="none">None</option>
-->
<!--                        <option value="2023">2023</option>-->
<!--                    </select><br/>                -->
                    
                    <!--   //to show session begin years from current year                 -->
<!--
                    <script type="text/javascript">
                        $(function () {
                            //Reference the DropDownList.
                            var ddlYears = $("#session_beg");

                            //Determine the Current Year.
                            var currentYear = (new Date()).getFullYear();

                            //Loop and add the Year values to DropDownList.
                            for (var i = (currentYear-6); i <= currentYear; i++) {
                                var option = $("<option />");
                                option.html(i);
                                option.val(i);
                                ddlYears.append(option);
                            }
                        });
                    </script>
-->
            <!--   //to show session end years from current year                 -->
<!--
                    <script type="text/javascript">
                        $(function () {
                            //Reference the DropDownList.
                            var ddlYears = $("#session_end");

                            //Determine the Current Year.
                            var currentYear = (new Date()).getFullYear();

                            //Loop and add the Year values to DropDownList.
                            for (var i = currentYear; i <= (currentYear+6); i++) {
                                var option = $("<option />");
                                option.html(i);
                                option.val(i);
                                ddlYears.append(option);
                            }
                        });
                    </script>
-->
                    
                    <label for="mobile_no"><b>Mobile_No.:</b></label>
                    <input type="number" class="form-control" placeholder="" name="mobile_no" required/><br/>
                    <label for="email_id"><b>Email ID:</b></label>
                    <input type="email" placeholder="" class="form-control" name="email_id" required/><br/>
                
                  <label for="imageUpload"><b>Image:</b></label>
                   <input type="file" name="imageUpload" id="imageUpload" class="form-control" />
<!--                   <button name="uploadbtn">UPLOAD IMAGE</button><br/>-->
                   
                    <label for="password"><b>Password:</b></label>
                    <input type="password" class="form-control" name="password" required/><br/>
                                     
                    <label for="confirm_password"><b>Confirm Password:</b></label>
                    <input type="password" class="form-control" name="confirm_password" required/><br/>
                    
                    
<!--                    <label for="reg_date"><b>Registration Date:</b></label>-->
                    <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="reg_date" hidden/><br/>
                          
                           
<!--                      <label for="reg_time"><b>Registration Time:</b></label>-->
                 <?php  
                        date_default_timezone_set('Asia/Kolkata');             $dt2=date("H:i:s"); ?>
                    <input type="text" class="form-control" id="reg_date" name="reg_time" value="<?php echo $dt2; ?>" hidden/><br/>                 
                            
                    <input type="submit" class="btn aa" name="submit" value="REGISTER"/>
                    
                    <button type="button" class="btn aa" name="log_in" onClick="window.location = 'Log_in.php'" >LOG IN</button>
                  
                  
<!--
                  <script>
                    $(document).ready(function() { 
                         $("#s1").change(function(){ if($("#s1").val()=="faculty"){
                             $("#f1").prop("disabled",false);
                             $("#f2").prop("disabled",true);
                             $("#f3").prop("disabled",true);
                         }
                        else if($("#s1").val()=="participant")
                            {
                                $("#f1").prop("disabled",true);
                                 $("#f2").prop("disabled",false);
                                 $("#f3").prop("disabled",false);
                            }
                        else if($("#s1").val()=="volunteer")
                            {
                                $("#f1").prop("disabled",true);
                                 $("#f2").prop("disabled",false);
                                 $("#f3").prop("disabled",false);
                            }
                        else
                            {
                                $("#f1").prop("disabled",true);
                                 $("#f2").prop("disabled",true);
                                 $("#f3").prop("disabled",true);
                            }
                        });

                    });
                </script>
-->
                  
                </div>               
            </div>
			<div class="col-4"></div>
                       </div></div>     
<!--
                    <script type="text/javascript">
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1; //January is 0!

                        var yyyy = today.getFullYear();
                        if (dd < 10) {
                          dd = '0' + dd;
                        } 
                        if (mm < 10) {
                          mm = '0' + mm;
                        } 
                        var today = dd + '/' + mm + '/' + yyyy;
                        //createCookie("d",window.today);
                        //document.getElementById("reg_date").value=today;
                        //alert(today);
                    </script>                   
-->
    
	
	</form>
</body>
</html>
