<?php
include 'studentheader.php';
extract($_GET);
?>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b7.png);height :300px;">
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
        if(isset($_GET['st_id'])){ ?>

<table class="table" style="width : 600px;">
        <h2>Attendance Details</h2>
   
        <tr>
         
            <th>Date</th>
            <th> Status</th>
        </tr>
        <?php 
            $q="SELECT * FROM `studentattendance` WHERE `class_id`='$cl_id' AND `student_id`='$st_id' and date_time='$cl_date'";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['date_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                   
                </tr>
         <?php   }
        ?>
    </table>



     <?php   }

     else{ ?>

     
    <table class="table" style="width : 1000px;">
        <h2>Schedule Class Details</h2>
        <tr>
            <th>Batch Name</th>
            <th>Subject Name</th>
            <th>Tutor Name</th>
            <th>Date</th>
            <th> Time</th>
        </tr>
        <?php 
            $q="SELECT *,concat(student.first_name,' ',student.last_name) as stname,concat(tutors.first_name,' ',tutors.last_name) as tname FROM `class_schedule` INNER JOIN `tutors` USING(`tutor_id`) INNER JOIN `subjects` USING(`subject_id`) INNER JOIN `batch` USING(`batch_id`) INNER JOIN `payment` USING(`batch_id`) INNER JOIN `student` USING(`student_id`) WHERE student_id='$stid'";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['tname']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['s_time']; ?> - <?php echo $row['e_time']; ?></td>
                    
                    <td><a class="btn btn-primary btn-sm" href="?st_id=<?php echo $row['student_id']; ?>&cl_id=<?php echo $row['class_id']; ?>&cl_date=<?php echo $row['date']; ?>">View Attendance</a></td>
                    <td><a class="btn btn-info btn-sm" href="studentviewnotes.php?cls_id=<?php echo $row['class_id']; ?>">Notes</a></td>
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