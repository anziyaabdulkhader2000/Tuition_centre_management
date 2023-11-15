<?php
include 'adminheader.php';


?>
<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img"  style="background-image: url(uploads/b3.jpg);height : 300px;">
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

<table class="table" style="width : 900px;">

		<h3><B>View Parents</B></h3>


<tr>
	<th> First Name</th>
	<th> Last Name </th>
    <th> Phone</th>
    <th> Email</th>
    <th>Place</th>
    
</tr>	
	<?php

    $qq="SELECT * FROM `parents`";
    $result=select($qq);
	foreach($result as $rows)
	{
		?>
		<tr>
		 
			<td> <?php echo $rows['first_name'];?></td>  		
			<td> <?php echo $rows['last_name'];?> </td> 
			<td> <?php echo $rows['phone'];?></td>  		
            <td> <?php echo $rows['email'];?> </td>
            <td> <?php echo $rows['place'];?> </td>
				
							
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