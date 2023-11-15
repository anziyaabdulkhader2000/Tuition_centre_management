<?php
include 'tutorheader.php';
extract($_GET);
?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b6.jpg);height :300px;">
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
  


<table class="table" style="width : 700px;">
        <h2>Attendance Details</h2>
       
        <tr>
         
            <th>Date</th>
            <th> Status</th>
        </tr>
        <?php 
            $q="SELECT * FROM `teacherattendance` WHERE `teacher_id`='$tt_id'";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['date_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                   
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