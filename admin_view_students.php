<?php
include 'adminheader.php';


?>
<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b3.jpg);height : 300px;">
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

		<h3><B>View Studets</B></h3>


<tr>
	<th> Student Name</th>
    <th> Parnte Name </th>
    <th>Batch</th>
    <th>Standard Studying</th>
    <th> Phone</th>
    <th> Email</th>
    
</tr>	
	<?php

    $qq="SELECT *,CONCAT(`student`.`first_name`,' ',`student`.`last_name`)AS stname,CONCAT(`parents`.`first_name`,' ',`parents`.`last_name`) AS pname,`student`.`phone` AS sphone,`student`.`email` AS semail FROM `student` INNER JOIN `parents` USING(`parent_id`) INNER JOIN `batch` USING(`batch_id`)";
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