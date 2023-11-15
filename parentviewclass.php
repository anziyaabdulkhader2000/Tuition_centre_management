<?php
include 'parentheader.php';
extract($_GET);
?>

<!-- ##### Hero Area Start ##### -->
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


<form method="post">
 

    
<?php 
    if(isset($_GET['bt_dt'])){ ?>

        
    <table>
    <h2>Subjects</h2>
    <tr>
        <th>Subject</th>
        <th>Description</th>
        
        
    </tr>
    <?php 
        $q="SELECT * FROM `subjects` WHERE `batch_id`='$bt_dt'";
        $res=select($q);
        foreach($res as $row){ ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                
                
            </tr>
     <?php   }
    ?>
</table>




        
 <?php   }
 else{ ?>

 

<table class="table" style="width : 900px;">
        <h2>View Batch and Classes</h2>
        <tr>
            <th>Batch Name</th>
            <th>Amount</th>
            
            
        </tr>
        <?php 
            $q="SELECT * FROM `batch`";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><a href="?bt_dt=<?php echo $row['batch_id']; ?>"><?php echo $row['batch']; ?></a></td>
                    <td><?php echo $row['amount']; ?></td>
                    
                    <td><a class="btn btn-primary" href="parentpayment.php?bt_id=<?php echo $row['batch_id']; ?>&amount=<?php echo $row['amount']; ?>">Book & Pay</a></td>
                </tr>
         <?php   }
        ?>
    </table>


 <?php }

?>




</form>



</center>
    </div>
    </section>

<?php
include 'footer.php';
?>