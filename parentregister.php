<?php
include 'publicheader.php';
?>


<?php

if(isset($_POST['register']))
{
    extract($_POST);
    $qt="SELECT * FROM `login` WHERE `username`='$email'";
    $rt=select($qt);
    if(sizeof($rt)>0){
        alert("Username Already Exist");
    }
    else{
	 $qr="insert into login values(null,'$email','$password','parents')";
	$id=insert($qr);
	  $qr="insert into parents values(null,'$id','$firstname','$lastname','$phone','$email','$place')";
	insert($qr);
	alert("Registered Successfully");
	return redirect('login.php');
}

}



?>

<section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">



<center>
    <h1 >Parent Register</h1><br>
        <form method="post" >


		<table align ="center" class="table" style="width: 400px;">
			
			<tr>
				<th> First Name </th>
				<td> <input type="text" class="form-control" name="firstname" required> </td> 
			</tr>


			<tr>
					<th> Last Name </th>
					<td> <input type="text" class="form-control" name="lastname" required> </td> 
			</tr>
			
			
			<tr>
					<th> Phone </th>
					<td> <input type="phone" class="form-control" name="phone" required> </td> 
			</tr>

			<tr>
					<th> Email </th>
					<td> <input type="email" class="form-control" name="email" required> </td> 
			</tr>
			<tr>
					<th> Place </th>
					<td> <textarea  name="place" class="form-control" required></textarea></td> 
			</tr>
			
			


			<tr>
					<th> Password </th>
					<td > <input type="password" class="form-control" name="password" required> </td> 
			</tr>

			<tr>

				<td colspan="2" align="center"> <input type="submit" name="register" value="Register" class="btn btn-primary"> </td>
			</tr>
			

		
		</table>
		</form>
                     

		</center>
		
		</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
         
        </div>
    </section>
<?php
include 'footer.php'
?>