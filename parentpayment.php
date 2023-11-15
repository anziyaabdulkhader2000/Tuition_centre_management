<?php 
include "parentheader.php";

extract($_GET);

 ?>

  <?php 
if(isset($_POST['pay']))
{
    extract($_POST); 
    $qg="SELECT * FROM `payment` WHERE `batch_id`='$bt_id' AND `student_id`=(SELECT `student_id` FROM `student` WHERE `parent_id`='$idp')";
    $rt=select($qg);
    if(sizeof($rt)>0){
        alert("Already Booked");
        return redirect("parentviewclass.php");
    }
    else{
         echo $q="INSERT INTO `payment` VALUES(NULL,(SELECT `student_id` FROM `student` WHERE `parent_id`='$idp'),'$bt_id','$amount',NOW())";
    $id=insert($q);
   alert("Payment Sucessfull");
   return redirect("parentviewclass.php");
    }
   
}

?>

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg-2.jpg);height :300px;">
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
    <br><br>
    <center>


        <style type="text/css">
        td{background-color: transparent;font-weight: 2px;color: black}
        hr{border-color: orange}
        #b {
            border: 1px solid grey; 
            padding: 10px;
        }
    </style>


    <div align="center">

        <form method="post">
        <h1>Payment</h1>
            <table style="width: 400px;" class="table table-borderless" id="b"> 
                <tr> 
                    <td>PAYMENT DETAILS</td> 
                    <td><img src="uploads/ccard.jpg" style="width:100%"/></td>

                </tr>
                <tr> 
                    <td colspan="2"> <small>CARD NUMBER</small><br> 
                        <input type="text" placeholder="Enter a valid card number"  class="form-control"  pattern="[0-9]{16}" title="Enter 16 digit Card number">
                    </td> 
                </tr>
                <tr> 

                    <td > <small>CVV</small><br> 
                        <input type="password" placeholder="CVV"  class="form-control"  pattern="[0-9]{3}" title="Enter 3 digit CV number">
                    </td> 
                    <td> <small>EXPIRATION DATE</small><br> 
                        <input type="text" placeholder="MM/YY"  class="form-control"  pattern="[0-9,/]{5}" title="Enter 3 digit CV number"> 
                    </td>


                </tr>
                <tr> 
                    <td colspan="2"> <small>CARD HOLDER</small><br> 
                        <input type="text" placeholder="Name on card"  class="form-control" data-valid='only-text'  > </td>
                    </tr>
                    
                    
                    
                            <tr><td colspan="2"> <small>AMOUNT</small><br>
                            <input type="text" name="t_amount" placeholder="Amount"  readonly="" value="<?php echo $amount;?>"></td></tr>
                            <tr> 
                            <td colspan="2"> 
                                <input type="submit" value="PAY"  class="btn btn-success" style="width: 100%" name="pay"> </td>
                            </tr>
                      
                          
                 
                 
                   
                        <!-- <tr><td><input type="radio" name="type" value="online" required="">Pay Online<br></td></tr> -->

                        

                        </table>


                    </div>
                    <div>
                   
                    </div>
                </form>
                <hr> 
            </center>

            <?php 
include "footer.php";
 ?>