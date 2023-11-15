<?php
include 'tutorheader.php';
extract($_GET);
?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b5.jpg);height : 300px;">
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
        if(isset($_GET['clss_id'])){ ?>

<table class="table" style="width : 900px;">
        <h2>Attendance Details</h2>
        
        <tr>
            <th>Student Name</th>
            <th>Date</th>
            <th> Status</th>
        </tr>
        <?php 
            $q="SELECT * FROM `studentattendance` inner join student using(student_id) WHERE `class_id`='$clss_id'";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                   
                </tr>
         <?php   }
        ?>
    </table>



     <?php   }

     else{ ?>



<table class="table" style="width : 1100px;">
        <h2>Schedule Class Details</h2>
        <tr>
            <th>Batch Name</th>
            <th>Subject Name</th>
            <th>Date</th>
            <th> Time</th>
        </tr>
        <?php 
            $q="SELECT * FROM `class_schedule` INNER JOIN `subjects` USING(`subject_id`) INNER JOIN `batch` USING(`batch_id`) WHERE `tutor_id`='$tt_id'";
            $res=select($q);
            foreach($res as $row){ 
                    $c_date=date('Y-m-d');
                    
                ?>
                <tr>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['s_time']; ?> - <?php echo $row['e_time']; ?></td>
                    <?php 
                        if($row['date']==$c_date){ ?>
                            <td><a class="btn btn-primary btn-sm" href="tutorviewstudent.php?ba_id=<?php echo $row['batch_id']; ?>&clss_id=<?php echo $row['class_id']; ?>">Mark Attendance</a></td>
                    <?php    }
                    
                     ?>
                    
                    <td><a class="btn btn-primary btn-sm" href="?clss_id=<?php echo $row['class_id']; ?>">View Attendance</a></td>
                    <td><a class="btn btn-primary btn-sm" href="tutoruploadnotes.php?clss_id=<?php echo $row['class_id']; ?>">Upload Notes</a></td>
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