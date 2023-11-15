<?php
include 'adminheader.php';


if(isset($_POST['batch'])){
    extract($_POST);
    $q1="INSERT INTO `batch` VALUES(NULL,'$btname','$amount')";
    insert($q1);
    alert("Batch Added Successfully");
}

if(isset($_GET['did'])){
    extract($_GET);
    $q2="DELETE FROM `batch` WHERE `batch_id`='$did'";
    delete($q2);
    alert("Successfully Deleted");
    return redirect("admin_manage_batch.php");
}
?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b3.jpg);height :530px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">


                            <form method="post">
                            <center>
                                <h2  style="color: #000;">Manage Batch</h2>
                                <table style="color: #000;width: 400px;" class="table" >
                                    <tr>
                                        <th>Batch Name</th>
                                        <td><input type="text" class="form-control" name="btname"></td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td><input type="text"  class="form-control" name="amount"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="batch" value="ADD"></td>
                                    </tr>
                                </table>
                                </center>
                            </form>

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
<table align="center" class="table" style="width : 900px;font-size : 20px; color : #000;">

        <h2>Batch Details</h2>
        <tr>
            <th>Batch Name</th>
            <th>Amount</th>
        </tr>
        <?php 
            $q="SELECT * FROM `batch`";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><a class="btn btn-danger btn-sm" href="?did=<?php echo $row['batch_id']; ?>">Delete</a></td>
                </tr>
         <?php   }
        ?>
    </table>
    </center>
    </div>
    </section>




<?php
include 'footer.php'
?>
