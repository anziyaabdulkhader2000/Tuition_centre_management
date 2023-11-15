<?php include 'parentheader.php'; ?>
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
	<h2>View Tutors</h2>
<br>
<table  class="table" style="width:1000px">
		<tr>

			<th>Sl.no</th>

			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone</th>
			<th>Email</th>
		</tr> 
		<?php
		$i=1;
		$q="SELECT * FROM `tutors`";
		$result=select($q);
		foreach($result as $row){ ?>
			<tr>
				<td><?php echo $i++; ?></td>

				<td><?php echo $row['first_name']; ?></td>
				<td><?php echo $row['last_name']; ?></td>
				<td><?php echo $row['phone']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><a href="parentmessages.php?tlid=<?php echo $row['login_id']; ?>">Message</a></td>
				



			</tr>
		<?php } ?>
	</table>
</center>
</div>
</section>

<?php include 'footer.php' ?>
