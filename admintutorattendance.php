<?php
include 'adminheader.php';
extract($_GET);


if(isset($_GET['id'])){
    extract($_GET);
    $q2="INSERT INTO `teacherattendance` VALUES(NULL,'$id',CURDATE(),'Present')";
    insert($q2);
    return redirect('admintutorattendance.php');

}


if(isset($_GET['idt'])){
    extract($_GET);
    $q2="INSERT INTO `teacherattendance` VALUES(NULL,'$id',CURDATE(),'Absent')";
    insert($q2);
    return redirect('admintutorattendance.php');
}

?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img"  style="background-image: url(uploads/b1.jpg);height :300px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
    <br><br><br><br>

<section class="service_part section_padding">
        <div class="container">
<center>


<form method="post">

<?php 
    if(isset($_GET['idts'])){ ?>



<table class="table"  style="width : 600px;">

		<h3><B>View Attendance</B></h3>


<tr>
	<th> Date</th>
	<th> Status</th>
    
</tr>	
	<?php

    $qq="SELECT * FROM `teacherattendance` WHERE `teacher_id`='$idts'";
    $result=select($qq);
	foreach($result as $rows)
	{
        
		?>
		<tr>
		 
			<td align="center"> <?php echo $rows['date_time'];?></td>  		  		
			<td align="center"> <?php echo $rows['status'];?> </td>
					
	    </tr>

	<?php
     }

	?>


</table>
       
   <?php }
   else{

?>


<table class="table" style="width : 900px;">

		<h3><B>View Tutors</B></h3>


<tr>
	<th> Tutor Name</th>
	<th> Email</th>
    
</tr>	
	<?php

    $qq="SELECT * FROM `tutors`";
    $result=select($qq);
	foreach($result as $rows)
	{
        $c_date=date('Y-m-d');
		?>
		<tr>
		 
			<td> <?php echo $rows['first_name'];?> <?php echo $rows['last_name'];?></td>  		  		
			<td> <?php echo $rows['email'];?> </td>
            <?php 
                $qy="SELECT * FROM `teacherattendance` WHERE `date_time`='$c_date' AND `teacher_id`=".$rows['tutor_id'];
                $rd=select($qy);
                if(sizeof($rd)==0){ ?>

                    <td><a class="btn btn-primary" href="?id=<?php echo $rows['tutor_id']; ?>">Present</a></td>
			        <td><a class="btn btn-warning" href="?idt=<?php echo $rows['tutor_id']; ?>">Absent</a></td>

            <?php    }

             ?>
             <td><a class="btn btn-info" href="?idts=<?php echo $rows['tutor_id']; ?>">View Attendance</a></td>
			
					
							
	</tr>

	<?php
     }

	?>


</table>

 <?php   }
    ?>


     </form>
        
	 </center>
    </div>
    </section>

<?php 
include 'footer.php';

?>