<?php
include 'adminheader.php';


if(isset($_POST['subject'])){
    extract($_POST);
    $q1="INSERT INTO `subjects` VALUES(NULL,'$batch','$title','$des')";
    insert($q1);
    alert("Subject Added Successfully");
}

if(isset($_GET['did'])){
    extract($_GET);
    $q2="DELETE FROM `subjects` WHERE `subject_id`='$did'";
    delete($q2);
    alert("Successfully Deleted");
    return redirect("admin_manage_subject.php");
}
?>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(uploads/b2.jpg);height :530px;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">



<form method="post">
    <center>
        <h2>Manage Subject</h2>
        <table style="color: #fff;width: 400px;" class="table" >
            <tr>
                <th>Batch</th>
                <td><select name="batch" class="form-control">
                    <option>Select Batch</option>
                    <?php 
                        $q="SELECT * FROM `batch`";
                        $res=select($q);
                        foreach($res as $row){ ?>
                            <option value="<?php echo $row['batch_id']; ?>"><?php echo $row['batch']; ?> : <?php echo $row['amount']; ?></option>
                    <?php    }
                    ?>
                </select></td>
            </tr>
            <tr>
                <th>Title</th>
                <td><input type="text" class="form-control" name="title" id=""></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><textarea name="des"class="form-control" ></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" class="btn btn-success" value="Add" name="subject"></td>
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
        <h2>Subject Details</h2>
        <tr>
            <th>Batch Name</th>
            <th>Subjetc</th>
            <th>Description</th>
        </tr>
        <?php 
            $q="SELECT * FROM `subjects` INNER JOIN `batch` USING(`batch_id`)";
            $res=select($q);
            foreach($res as $row){ ?>
                <tr>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><a class="btn btn-danger btn-sm" href="?did=<?php echo $row['subject_id']; ?>">Delete</a></td>
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
