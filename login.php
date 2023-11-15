<?php
include 'publicheader.php';
?>


<?php

if(isset($_POST['login']))
{
	extract($_POST);
	$qr="SELECT * from login where username='$username' AND password='$password'";
	$res=select($qr);
	if(sizeof($res)>0)
	{
		$id=$res[0]['login_id'];
		$_SESSION['login_id']=$id;
		if($res[0]['user_type']=='admin')
		{
			return redirect('adminhome.php');
			
		}
	else if($res[0]['user_type']=='parents')
		{    
			$q1="select * from parents where login_id='$id'";
 			$res1=select($q1);
 			if(sizeof($res1)>0)
			{   
				$ids=$res1[0]['parent_id'];
				$_SESSION['parent_id']=$ids;
				return redirect('parenthome.php');
				
			}
		}
		else if($res[0]['user_type']=='student')
		{
			$q1="select * from student where login_id='$id'";
 			$res1=select($q1);
 			if(sizeof($res1)>0)
			{
				$ids=$res1[0]['student_id'];
				$_SESSION['student_id']=$ids;
				return redirect('studenthome.php');
					
		}
	}
	else if($res[0]['user_type']=='tutor')
		{
			$q1="select * from tutors where login_id='$id'";
 			$res1=select($q1);
 			if(sizeof($res1)>0)
			{
				$ids=$res1[0]['tutor_id'];
				$_SESSION['tutor_id']=$ids;
				return redirect('tutorhome.php');
					
		}
	}
		
	}	
	else
	{
		alert("Invalid Username and Password");
	}




  }

?>

  <!-- ##### Hero Area Start ##### -->
  <section class="hero-area">
        <div class="hero-slides owl-carousel">


            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b1.jpg);height :530px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">

								<center>
								<h1>LOGIN</h1>
								<form method="post">
								<table style="width: 400px;font-size : 20px;" class="table" >
									<tr>
										<td><b>Username</b></td>
										<td><input type="text" class="form-control" name="username" required></td>
									</tr>
									<tr>
										<td><b>Password</b></td>
										<td><input type="password" class="form-control" name="password" required></td>
									</tr>
									<tr>
										<td colspan="2" align="center"><input type="submit"  class="btn btn-success" name="login" value="Login"></td>
									</tr>
								</table>
								</form>
								</center>

								</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

<?php
include 'footer.php';
?>