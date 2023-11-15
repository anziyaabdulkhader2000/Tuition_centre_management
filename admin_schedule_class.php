<?php
include 'adminheader.php';


if(isset($_POST['class'])){
    extract($_POST);

    $timestamp = strtotime($tm) + 60*60;

              $tm=date('h:i a',strtotime($tm));
             $time = date('h:i a', $timestamp);
           

             $time;//11:09
             
             $sh="SELECT * FROM `class_schedule` INNER JOIN `tutors` USING(`tutor_id`) INNER JOIN `subjects` USING(`subject_id`) INNER JOIN `batch` USING(`batch_id`) WHERE ( `tutor_id`='$tutor' AND `date`='$date' AND CAST(s_time AS TIME) >= '$tm' AND CAST(s_time AS TIME) < '$time') OR (  `tutor_id`='$tutor' AND `date`='$date'  AND CAST(e_time AS TIME) >= '$tm'  AND CAST(e_time AS TIME) < '$time')";

             $s=select($sh);
       
        if(sizeof($s)==0)
        {

                $q1="INSERT INTO `class_schedule` VALUES(NULL,'$tutor','$sub','$date','$tm','$time','NA')";
                insert($q1);
                alert("Class Scheduled Successfully");
        }
        else{
            alert("Time Or Tutor Already Alloted");
        }

    }

// if(isset($_GET['did'])){
//     extract($_GET);
//     $q2="DELETE FROM `subjects` WHERE `subject_id`='$did'";
//     delete($q2);
//     alert("Successfully Deleted");
//     return redirect("admin_manage_subject.php");
// }
?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img"  style="background-image: url(uploads/b2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">


<form method="post">
    <center>
        <h2>Schedule Class</h2>
        <table style="width: 400px;" class="table" >

            <tr>
                <th>Subject</th>
                <td><select name="sub" class="form-control">
                    <option>Select Subject</option>
                    <?php 
                        $q="SELECT * FROM `subjects` INNER JOIN `batch` USING(`batch_id`)";
                        $res=select($q);
                        foreach($res as $row){ ?>
                            <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['batch']; ?> : <?php echo $row['title']; ?> </option>
                    <?php    }
                    ?>
                </select></td>
            </tr>

            <tr>
                <th>Tutor</th>
                <td><select name="tutor" class="form-control">
                    <option>Select Tutor</option>
                    <?php 
                        $q="SELECT * FROM `tutors`";
                        $res=select($q);
                        foreach($res as $row){ ?>
                            <option value="<?php echo $row['tutor_id']; ?>"><?php echo $row['first_name']; ?>  <?php echo $row['last_name']; ?></option>
                    <?php    }
                    ?>
                </select></td>
            </tr>

            <tr>
                <th>Date</th>
                <td><input type="date" class="form-control" name="date" id=""></td>
            </tr>
            <tr>
                <th>Starting Time</th>
                <td><input type="time" class="form-control" name="tm" id=""></td>
            </tr>
            <!-- <tr>
                <th>Ending Time</th>
                <td><input type="text" name="etime" id=""></td>
            </tr> -->
            <tr>
                <td colspan="2" align="center"><input type="submit" class="btn btn-primary" value="Add" name="class"></td>
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

<table align="center" class="table" style="width : 1100px; color : #000;">
        <h2>Schedule Class Details</h2>
        <tr>
            <th>Batch Name</th>
            <th>Subject Name</th>
            <th>Tutor Name</th>
            <th>Date</th>
            <th> Time</th>
            <th>Status</th>
        </tr>
        <?php 
            $q="SELECT * FROM `class_schedule` INNER JOIN `tutors` USING(`tutor_id`) INNER JOIN `subjects` USING(`subject_id`) INNER JOIN `batch` USING(`batch_id`)";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['s_time']; ?> - <?php echo $row['e_time']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><a class="btn btn-danger btn-sm" href="?did=<?php echo $row['subject_id']; ?>">Delete</a></td>
                </tr>
         <?php   }
        ?>
    </table>


    </center>
    </div>
    </section>



<?php
include 'footer.php';
?>