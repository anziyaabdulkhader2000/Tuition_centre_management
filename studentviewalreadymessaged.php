<?php 
include 'studentheader.php';
?>
 <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b3.jpg);height :300px;">
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
	
 
 <br>
 <br>
 <h1>View Chatted</h1>
 <br>
<table align="center" style="width:400px;" class="table">

<tr>
	<th> Tutors </th>
	<!-- <th> Status </th> -->
	

</tr>	
	<?php
	
	$q="SELECT *,concat(first_name,' ',last_name) as names FROM tutors WHERE login_id IN (SELECT DISTINCT(IF(sender_id='$lid',receiver_id,sender_id)) AS sel FROM message WHERE sender_id='$lid' OR receiver_id='$lid' order by message_id desc)";
	$result=select($q);
	foreach($result as $row)
	{
		?>
		<tr>
		 
			<td> <?php echo $row['names'];?></td> 

			<td><a href="studentmessages.php?tlid=<?php echo $row['login_id']; ?>">Message</a></td>
					
				
			</td>
			</tr>
					
							
	</tr>

	<?php
     }

	?>

</table>


</center>
</div>
</section>
<?php 
include 'footer.php';

?>