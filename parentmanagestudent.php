
<?php
include 'parentheader.php';

if(isset($_POST['add']))
{
	extract($_POST);

	     $qr="insert into login values(null,'$email','$password','student')";
        $id=insert($qr);
	 $query="insert into student values(null,'$id','$idp','$batch','$firstname','$lastname','$std','$phone','$email')";
		insert($query);
		alert("Added Successfull");
		return redirect('parentmanagestudent.php');

		
	
}
if (isset($_GET['ids'])) {
	extract($_GET);

	$sql = "select * from student where login_id = ".$_GET['ids'];
	$res1 = select($sql);
}
if(isset($_POST['upst'])){
    extract($_POST);
    $qq="UPDATE `student` SET `first_name`='$firstname',`last_name`='$lastname',`standard_studying`='$std',`phone`='$phone',`email`='$email' WHERE login_id='$ids'";
    update($qq);
    return redirect('parentmanagestudent.php');
}
if (isset($_GET['id'])) {
	extract($_GET);
   $qd="delete from login where login_id='$id'";
   delete($qd);
   $q = "delete from student where login_id = ".$_GET['id'];
	delete($q);
	alert('Deleted Successfully');
	return redirect('parentmanagestudent.php');
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


    <h3 style="color : #fff;">Add Student</h3>
    <br>
    <br>
    
    <form method="post">
        <table style="width: 400px;color : #fff;" class="table" >
        <tr>
                <th>Batch & fee</th>
                <td><select name="batch" class="form-control">
                    <option>Select Batch</option>
                    <?php 
                        $q="SELECT * FROM `batch`";
                        $res=select($q);
                        foreach($res as $row){ ?>
                            <option value="<?php echo $row['batch_id']; ?>"><?php echo $row['batch']; ?> : <?php echo $row['amount']; ?></option>
                    <?php    }
                    ?>
                </select></td>
            </tr>
			<tr>
				<th>First name </th>
				<td> <input type="text" class="form-control" name="firstname" value="<?php if (isset($_GET['ids'])) { echo $res1[0]['first_name']; } ?>" required></td> 
			</tr>
			
			<tr>
				<th>Last name </th>
				<td> <input type="text" name="lastname" class="form-control" value="<?php if (isset($_GET['ids'])) { echo $res1[0]['last_name']; } ?>"required></td> 
			</tr>
			<tr>
				<th>Standard Studying </th>
				<td> <input type="text" name="std" class="form-control" value="<?php if (isset($_GET['ids'])) { echo $res1[0]['standard_studying']; } ?>" required></td> 
			</tr>
            <tr>
				<th>Phone </th>
				<td> <input type="text" name="phone" class="form-control" value="<?php if (isset($_GET['ids'])) { echo $res1[0]['phone']; } ?>" required></td> 
			</tr>
			<tr>
				<th>Email </th>
				<td> <input type="email" name="email" class="form-control" value="<?php if (isset($_GET['ids'])) { echo $res1[0]['email']; } ?>" required></td> 
			</tr>
			
			
			

		<?php
					if(isset($_GET['ids']))
						{
							?>
							<tr>

			<td colspan="2" align="center">
							<input type="submit" name="upst" value="UPDATE" class="btn btn-warning">
						</td>

							<?php
						}
						else
						{
							?>
							<tr>
				


			<tr>
					<th> Password </th>
					<td > <input type="password" class="form-control" name="password" required> </td> 
			</tr>

			<tr>
               <td colspan="2" align="center">

							<input type="submit" name="add" value="ADD" class="btn btn-primary">

							</td>
						</tr>
							<?php

						}
						?>

	</table>
	
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

    
<table class="table" style="width : 1100px;">

<h3  style="color : #fff;"><B>Student Details</B></h3>


<tr>
<th> First Name</th>
<th> Last Name </th>
<th>Standard Studying</th>
<th> Phone</th>
<th> Email</th>

</tr>	
<?php

$qq="SELECT * FROM `student`";
$result=select($qq);
foreach($result as $rows)
{
?>
<tr>
 
    <td> <?php echo $rows['first_name'];?></td>  		
    <td> <?php echo $rows['last_name'];?> </td> 
    <td> <?php echo $rows['standard_studying'];?> </td> 
    <td> <?php echo $rows['phone'];?></td>  		
    <td> <?php echo $rows['email'];?> </td>
    
    <td><a class="btn btn-danger" href="?id=<?php echo $rows['login_id']; ?>">Delete</a></td>
    <td><a class="btn btn-warning" href="?ids=<?php echo $rows['login_id']; ?>">Update</a></td>
            
                    
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
include "footer.php";
 ?>