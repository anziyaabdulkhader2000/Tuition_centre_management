<?php 
include 'parentheader.php';

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
	

	<?php


	if(isset($_POST['message']))
	{
		extract($_POST);
		
	    $q="insert into message values(null,'$lid','$tlid','$messages',curdate())";
		insert($q);
		alert("Message Send");
		
		return redirect("parentmessages.php?tlid=$tlid");
	}
	?>

	<br><br>
<h1>Messages</h1>
<br>
 <form method="post">
 	<div style="height: 400px;width:500px; overflow-y: scroll" id="message"  >
<table align="center" style="width:380px;" class="table">
	
	<?php
	
	$q="SELECT * FROM message WHERE (`sender_id`='$lid' AND receiver_id='$tlid') OR(`sender_id`='$tlid' AND receiver_id='$lid') ";
	$result=select($q);
	foreach($result as $row)
	{
		?>
		<tr>
			<?php
				if($row['sender_id']==$lid)
				{
			?>
				<td><input type="text" disabled></td>
				<td><input type="text" value="<?php echo $row['message'];?>" readonly></td>
		 		 
			<?php
			}
			else
			{ ?>

				<td><input type="text" value="<?php echo $row['message'];?>" readonly></td>
				<td><input type="text" disabled></td>
			<?php
			}
			?>

		</tr>
					
							
	</tr>

	<?php
     }

	?>


</table>
</div>
<table>
	<tr>
		<td colspan="2" align="center"><input type="text" name="messages"><input type="submit" name="message" value="Send"></td>
	</tr>
	</table>



</form>
</center>
</div>
</section>
<?php 
include 'footer.php';

?>