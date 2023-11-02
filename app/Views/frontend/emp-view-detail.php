<!DOCTYPE html>
<!--
Metro Info Tech
Each line should be prefixed with 
-->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;Raleway:400,500,600,700,800" rel="stylesheet">
<link rel="stylesheet" href="http://localhost/dummies/custom.css">
<div class="col-md-12 main-content align-self-center">
    <div class="iq-home about-us" >
        <div class="col-md-12" ><div class="clearfix padding-t-5"></div></div>
        <div class="col-md-3">
            <div class="boder-img border-danger">
                <?php
                
                $url = base_url()."assets/profile_pics/".$emp_item["photo"];
                $file_headers = @get_headers($url);
                $InvalidHeaders = array('404', '403', '500');
                foreach($InvalidHeaders as $HeaderVal)
                {
                        if(strstr($file_headers[0], $HeaderVal))
                        {
                                $url = "https://image.flaticon.com/icons/svg/783/783192.svg";
                        }
                }
//               
                ?>
                <img src=<?php echo $url ?> class="img-fluid" alt="#">
            </div>
        </div>
        <div class="col-md-9 content-deta padding-t-5">
            <div class="main-title">
                <h1 class="display-4 iq-tw-8 iq-font-darkblue"><?php echo $emp_item["firstname"] . ' ' . $emp_item["lastname"] ?></h1>
            </div>
            <p class="iq-tw-4 iq-mt-10 iq-mb-20"> Any Remarks: <?php echo $emp_item["remarks"]?></p>
            <h3 class="padding-t-5"> Employee Details <span><a class="iq-font-purple  iq-font-size" href="#">edit</a></span></h3>
            <ul class="contact-info">
                <li> <span class="iq-tw-5">Email :</span> <a href="#"><?php echo $emp_email["email"] ?></a></li>
                <li> <span class="iq-tw-5">Phone :</span> <?php echo $emp_phone["phone_no"] ?></li>
                <li> <span class="iq-tw-5">Address :</span> <br><?php echo $emp_add["address"] . ', <br> ' . $emp_add["city"].'-'.$emp_add["pincode"] ?></li>                
            </ul>
        </div>
        <div class="col-md-12 padding-t-5">
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Demography Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($emp_demo as $emp_demo1): ?>
                 <tr> <td> <span class="iq-tw-5"> <?php echo $emp_demo1["name"] ?></span> :</td><td> <?php echo $emp_demo1["description"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
            <div class="col-lg-5 padding-t-5">
                <h2 class="padding-t-5">Family Details</h2>
                <table class="table table-bordered padding-t-5">     <thead>       
                    <th>Name</th>   <th>Relationship</th>  <th>Age</th>  <th>Occupation</th>  <th>DOB</th> 
                        </thead><!-- tbody id="data">     </tbody--><tbody>
                             <?php foreach ($emp_family as $emp_family1): ?>
                   <tr> <td><?php echo $emp_family1["name"] ?> </td> 
                       <td><?php echo $emp_family1["relation"] ?></td>  
                       <td><?php echo $emp_family1["age"]==0?'-': $emp_family1["age"] ?>  </td> 
                       <td><?php echo $emp_family1["occup"]==0?'-': $emp_family1["occup"] ?></td> 
                   <td>  <?php echo $emp_family1["dob"]==0?'-':$emp_family1["dob"] ?></td> </tr>
                            
        <?php endforeach; ?>
                    </tbody>    </table>
            </div>
            <div class="col-lg-3 padding-t-5">
                <h2 class="padding-t-5">Health Demographics Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($emp_health as $emp_health1): ?>
                 <tr> <td> <span class="iq-tw-5"> <?php echo $emp_health1["name"] ?></span> :</td><td> <?php echo $emp_health1["value"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
        </div>        
        <div class="col-md-12">
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Education Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($emp_edu as $emp_edu1): ?>
                 <tr> <td> <span class="iq-tw-5"> <?php echo $emp_edu1["name"] ?></span> :</td><td> <?php echo $emp_edu1["value"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Experience Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($emp_exp as $emp_exp1): ?>
                 <tr> <td> <span class="iq-tw-5"> <?php echo $emp_exp1["name"] ?></span> :</td><td> <?php echo $emp_exp1["value"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Bank Details</h2>
                <table class="table table-bordered padding-t-5">   
        <?php foreach ($emp_bank as $emp_bank1): ?>
                 <tr> <td> <span class="iq-tw-5"> Account Name</span> :</td><td> <?php echo $emp_bank1["accname"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Account No</span> :</td><td> <?php echo $emp_bank1["accno"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Bank Name</span> :</td><td> <?php echo $emp_bank1["name"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Branch</span> :</td><td> <?php echo $emp_bank1["branch"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> IFS Code</span> :</td><td> <?php echo $emp_bank1["ifscode"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
        </div>
    </div>
</div>