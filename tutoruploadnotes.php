
<?php
include 'tutorheader.php';
extract($_GET);

if(isset($_POST['add']))
{
    extract($_POST);

    $path="uploads/".$_FILES['image']['name'];
    $nam=uniqid();
    $filetype=strtolower(pathinfo($path,PATHINFO_EXTENSION));
    $eqp="uploads/".$nam.".".$filetype;
    move_uploaded_file($_FILES['image']['tmp_name'], $eqp);
    $qw="INSERT INTO `notes` VALUES(NULL,'$clss_id','$name','$eqp')";
    insert($qw);
       
		
	
}

if (isset($_GET['id'])) {
	extract($_GET);
   $qd="DELETE FROM `notes` WHERE `note_id`='$id'";
   delete($qd);
  
	alert('Deleted Successfully');
	return redirect("tutoruploadnotes.php?clss_id=$clss_id");
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

    <h3 >Upload Files </h3>
    <br>
    <br>
    
    <form method="post" enctype="multipart/form-data">
        <table style="width: 400px;" class="table" >
     
			<tr>
				<th>Name </th>
				<td> <input type="text" class="form-control" name="name" required></td> 
			</tr>
			
			<tr>
				<th>Files </th>
				<td> <input type="file" class="form-control" name="image" required></td> 
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" name="add" value="ADD" class="btn btn-primary"></td>

            </tr>
			
                   


    </table>

    
<table class="table" style="width : 900px;">

<h3><B>File Details</B></h3>


<tr>
<th>  Name</th>
<th>  Files </th>


</tr>	
<?php

$qq="SELECT * FROM `notes` WHERE `class_id`='$clss_id'";
$result=select($qq);
foreach($result as $rows)
{
?>
<tr>
 
    <td> <?php echo $rows['name'];?></td>  		
    <td><a download href="<?php echo $rows['file_path'];?>"><img style="width : 150px;height : 150px;" src="<?php echo $rows['file_path'];?>" alt=""></a> </td> 
    
    <td><a class="btn btn-danger" href="?id=<?php echo $rows['note_id']; ?>&clss_id=<?php echo $clss_id; ?>">Delete</a></td>
            
                    
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