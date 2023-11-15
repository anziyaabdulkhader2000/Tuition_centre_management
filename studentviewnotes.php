<?php
include 'studentheader.php';
extract($_GET);
?>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b2.jpg);height :300px;">
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



     
    <table class="table" style="width : 600px;">
        <h2> Class Notes</h2>
        <tr>
            <th> Name</th>
            <th>File</th>
        </tr>
        <?php 
            $q="SELECT * FROM `notes` WHERE `class_id`='$cls_id'";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><a download href="<?php echo $row['file_path']; ?>"><img style="width : 150px;height : 150px;" src="<?php echo $row['file_path']; ?>"></a></td>
                    
                </tr>
         <?php   }
        ?>
    </table>

</form>


</center>
    </div>
    </section>

<?php
include 'footer.php';
?>