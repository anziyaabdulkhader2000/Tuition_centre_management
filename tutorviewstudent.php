<?php
include 'tutorheader.php';
extract($_GET);


if(isset($_GET['pt_id'])){
    extract($_GET);

    $q="INSERT INTO `studentattendance` VALUES(NULL,'$clss_id','$std_id',curdate(),'Present')";
    insert($q);
    alert("Present");
    return redirect("tutorviewstudent.php?ba_id=$ba_id&clss_id=$clss_id");
}
if(isset($_GET['at_id'])){
    extract($_GET);

    $q="INSERT INTO `studentattendance` VALUES(NULL,'$clss_id','$std_id',curdate(),'Absent')";
    insert($q);
    alert("Absent");
    return redirect("tutorviewstudent.php?ba_id=$ba_id&clss_id=$clss_id");
}

?>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b2.jpg);height : 300px;">
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

<table class="table" style="width : 1100px;">

		<h3><B>View Students</B></h3>


<tr>
	<th> Student Name</th>
    <th> Parnte Name </th>
    <th>Batch</th>
    <th>Standard Studying</th>
    <th> Phone</th>
    <th> Email</th>
    
</tr>	
	<?php

    $qq="SELECT *,student.login_id as slid,parents.login_id as plid,CONCAT(`student`.`first_name`,' ',`student`.`last_name`)AS stname,CONCAT(`parents`.`first_name`,' ',`parents`.`last_name`) AS pname,`student`.`phone` AS sphone,`student`.`email` AS semail FROM `student` INNER JOIN `parents` USING(`parent_id`) INNER JOIN `batch` USING(`batch_id`) WHERE `batch_id`='$ba_id'";
    $result=select($qq);
	foreach($result as $rows)
	{
		?>
		<tr>
		 
			<td> <?php echo $rows['stname'];?></td>  		
            <td> <?php echo $rows['pname'];?> </td> 
            <td> <?php echo $rows['batch'];?> </td>
            <td> <?php echo $rows['standard_studying'];?> </td>
			<td> <?php echo $rows['sphone'];?></td>  		
            <td> <?php echo $rows['semail'];?> </td>
            <?php 
                $qw="SELECT * FROM `studentattendance` WHERE `class_id`='$clss_id' AND `student_id`=".$rows['student_id'];
                $rs=select($qw);
                if(sizeof($rs)==0){ ?>
                 <td><a class="btn btn-primary btn-sm" href="?pt_id=<?php echo $clss_id; ?>&std_id=<?php echo $rows['student_id']; ?>&clss_id=<?php echo $clss_id; ?>&ba_id=<?php echo $ba_id; ?>">Present</a></td>
                 <td><a class="btn btn-danger btn-sm" href="?at_id=<?php echo $clss_id; ?>&std_id=<?php echo $rows['student_id']; ?>&clss_id=<?php echo $clss_id; ?>&ba_id=<?php echo $ba_id; ?>">Absent</a></td>

             <?php   }
            ?>
           
            
				
							
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