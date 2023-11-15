<?php 
include 'tutorheader.php';
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
 <h1>View Messaged</h1>
 <br>
 <br>
<table align="center" style="width:400px;" class="table">

<tr>
	<th> Users </th>
	<!-- <th> Status </th> -->
	

</tr>	
	<?php
	
	$q="
SELECT login_id AS lid ,CONCAT(first_name,' ',last_name) AS NAMES FROM parents WHERE login_id IN (SELECT DISTINCT(IF(sender_id='$lid',receiver_id,sender_id)) AS sel FROM message WHERE sender_id='$lid' OR receiver_id='$lid' ORDER BY message_id DESC)
UNION
SELECT login_id AS lid,CONCAT(first_name,' ',last_name) AS NAMES FROM student WHERE login_id IN (SELECT DISTINCT(IF(sender_id='$lid',receiver_id,sender_id)) AS sel FROM message WHERE sender_id='$lid' OR receiver_id='$lid' ORDER BY message_id DESC)";
	$result=select($q);
	foreach($result as $row)
	{
		?>
		<tr>
		 
			<td> <?php echo $row['NAMES'];?></td> 

			<td><a href="teachermessages.php?selectedid=<?php echo $row['lid']; ?>">Message</a></td>
					
				
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