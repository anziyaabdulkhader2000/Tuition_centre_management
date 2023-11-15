<?php
include 'adminheader.php';
if(isset($_POST['add']))
{
	extract($_POST);

	    echo $qr="insert into login values(null,'$email','$password','tutor')";
	    $id=insert($qr);
	echo $query="insert into tutors values(null,'$id','$firstname','$lastname','$phone','$email')";
		insert($query);
		alert("Added Successfull");
		return redirect('admin_manage_tutor.php');

}

if(isset($_GET['id'])){
    extract($_GET);
    $q1="DELETE FROM `tutors` WHERE `login_id`='$id'";
    delete($q1);
    $q2="DELETE FROM `login` WHERE `login_id`='$id'";
    delete($q2);
    return redirect('admin_manage_tutor.php');

}


if(isset($_GET['idt'])){
    extract($_GET);
    $q="SELECT * FROM `tutors` WHERE `login_id`='$idt'";
    $res1=select($q);
}

if(isset($_POST['ututor'])){
    extract($_POST);
    $qt="UPDATE `tutors` SET `first_name`='$firstname',`last_name`='$lastname',`phone`='$phone',`email`='$email' WHERE `login_id`='$idt'";
    update($qt);
    return redirect('admin_manage_tutor.php');

}



?>



<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">


							
<center>

        <h3>Add Tutor</h3>
        <br>
        <br>
        <form method="post">
            <table style="width: 400px;" class="table" >

			<tr>
				<th>First name </th>
				<td> <input type="text" class="form-control" name="firstname" value="<?php if (isset($_GET['idt'])) { echo $res1[0]['first_name']; } ?>" required></td> 
			</tr>
			
			<tr>
				<th>Last name </th>
				<td> <input type="text" class="form-control" name="lastname" value="<?php if (isset($_GET['idt'])) { echo $res1[0]['last_name']; } ?>"required></td> 
			</tr>
			<tr>
				<th>Phone </th>
				<td> <input type="text" class="form-control" name="phone" value="<?php if (isset($_GET['idt'])) { echo $res1[0]['phone']; } ?>" required></td> 
			</tr>
            <tr>
				<th>Email </th>
				<td> <input type="email" class="form-control" name="email" value="<?php if (isset($_GET['idt'])) { echo $res1[0]['email']; } ?>" required></td> 
            </tr>
            <?php 
                if(isset($_GET['idt'])){ ?>
                    <tr>
              	<td colspan="2" align="center">
              		
						<input type="submit" name="ututor"  value="UPDATE" class="btn btn-warning">
              	</td>
              </tr>

          <?php      }

          else{ ?>
          <tr>
					<th> Password </th>
					<td > <input type="password" class="form-control" name="password" required> </td> 
			</tr>
              <tr>
              	<td colspan="2" align="center">
              		
						<input type="submit" name="add" value="ADD" class="btn btn-success">
              	</td>
              </tr>


        <?php  }
            
            ?>
			
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

    <section class="service_part section_padding">
        <div class="container">
<center>

<table align="center" class="table" style="width : 900px;font-size : 20px; color : #000;">

		<h3><B>View Tutors</B></h3>
	<form method="post">

<tr>
	<th> First Name</th>
	<th> Last Name </th>
    <th> Phone</th>
	<th> Email</th>
    
</tr>	
	<?php

    $qq="SELECT * FROM `tutors`";
    $result=select($qq);
	foreach($result as $rows)
	{
		?>
		<tr>
		 
			<td> <?php echo $rows['first_name'];?></td>  		
			<td> <?php echo $rows['last_name'];?> </td> 
			<td> <?php echo $rows['phone'];?></td>  		
			<td> <?php echo $rows['email'];?> </td>
			
			<td><a class="btn btn-danger btn-sm" href="?id=<?php echo $rows['login_id']; ?>">Delete</a></td>
			<td><a class="btn btn-warning btn-sm" href="?idt=<?php echo $rows['login_id']; ?>">Update</a></td>
					
							
	</tr>

	<?php
     }

	?>


</table>

     </form>
	 </center>
    </div>
    </section>
<?php 
include 'footer.php';

?>