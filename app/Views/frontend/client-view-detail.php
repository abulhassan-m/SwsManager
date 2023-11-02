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
                
                $url = base_url()."clients_logos/".$client_item["logo"];
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
                <h1 class="display-4 iq-tw-8 iq-font-darkblue"><?php echo $client_item["name"] ?></h1>
            </div>
            <p class="iq-tw-4 iq-mt-10 iq-mb-20"> Any Remarks: </p>
            <h3 class="padding-t-5"> Client Details <span><a class="iq-font-purple  iq-font-size" href="#">edit</a></span></h3>
            <ul class="contact-info">
                <li> <span class="iq-tw-5">GST :</span> <?php echo $client_item["gst_no"] ?></li>
                <li> <span class="iq-tw-5">PAN :</span> <?php echo $client_item["pan_no"] ?></li>
                <li> <span class="iq-tw-5">Phone :</span> <?php echo $client_item["phone_no"] ?></li>
                <li> <span class="iq-tw-5">Email :</span> <a href="#"><?php echo $client_item["email"] ?></a></li>
                <li> <span class="iq-tw-5">Website :</span> <a href="#"><?php echo $client_item["www"] ?></a></li>
                <li> <span class="iq-tw-5">Address :</span> <br><?php echo $client_item["address"] .', <br> '. $client_item["city_name"] .','. $client_item["state_name"] .',' . $client_item["country_name"]; ?></li>         
            </ul>
        </div>
        <div class="col-md-12 padding-t-5">
            <div class="col-lg-6 padding-t-5">
                <h2 class="padding-t-7">Service Offered</h2>
            <table class="table table-bordered padding-t-5"> <th>S.No </th>  <th>Particulars</th>   <th>Working Hrs</th>  <th>No of Persons</th>  <th>Rate Fixed</th>  <th>Salary</th> 
                        </thead><!-- tbody id="data">     </tbody--><tbody>
                             <?php $sno=1; foreach ($client_lsp as $client_lsp): ?>
                   <tr> <td><?php echo $sno; ?> </td> 
                       <td><?php echo $client_lsp["name"] ?> </td> 
                       <td><?php echo $client_lsp["work_hrs"] ?></td>  
                       <td><?php echo $client_lsp["quantity"]==0?'-': $client_lsp["quantity"] ?>  </td> 
                       <td><?php echo $client_lsp["rate"]==0?'-': $client_lsp["rate"] ?></td> 
                   <td>  <?php echo $client_lsp["salary"]==0?'-':$client_lsp["salary"] ?></td> </tr>
                           
        <?php $sno++; endforeach; ?> 
        
             </table>
            </div>
            <div class="col-lg-5 padding-t-5">
                <h2 class="padding-t-5">Contact Persons Details</h2>
                <table class="table table-bordered padding-t-5">     <thead>       
                    <th>S.No</th>   <th>Name</th>  <th>Designation</th>  <th>Phone</th>  <th>Email</th> 
                        </thead><!-- tbody id="data">     </tbody--><tbody>
                             <?php  $sno=1; foreach ($client_clct as $client_clct): ?>
                   <tr> <td><?php echo $sno; ?> </td> 
                       <td><?php echo $client_clct["ct_name"] ?></td>  
                       <td><?php echo $client_clct["design_name"] ?>  </td> 
                       <td><?php echo $client_clct["phone"] ?></td> 
                   <td>  <?php echo $client_clct["email"] ?></td> </tr>
                            
        <?php $sno++; endforeach; ?>
                    </tbody>    </table>
            </div>
        </div>        
        <div class="col-md-12">
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Deployment Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($client_depl as $client_depl): ?>
                 <tr> <td> <span class="iq-tw-5"> Deployment Date</span> :</td><td> <?php echo $client_depl["deploy_dt"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Deployment Address</span> :</td><td> <?php echo $client_depl["address"] ?> <br><?php echo $client_depl["city_name"] ?>,<?php echo $client_depl["state_name"] ?>,
                     <?php echo $client_depl["country_name"] ?></td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Billing Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($client_demo as $client_demo): ?>
                 <tr> <td> <span class="iq-tw-5"> Billing Start Date</span> :</td><td> <?php echo $client_demo["bill_st_day"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Billing Address</span> :</td><td> <?php echo $client_demo["address"] ?> <br><?php echo $client_demo["city_name"] ?>,<?php echo $client_demo["state_name"] ?> ,<?php echo $client_demo["country_name"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
            <div class="col-lg-4 padding-t-5">
                <h2 class="padding-t-5">Bank Details</h2>
                <table class="table table-bordered padding-t-5">   
        <?php foreach ($client_bank as $client_bank): ?>
                 <tr> <td> <span class="iq-tw-5"> Account Name</span> :</td><td> <?php echo $client_bank["accname"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Account No</span> :</td><td> <?php echo $client_bank["accno"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Bank Name</span> :</td><td> <?php echo $client_bank["name"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Branch</span> :</td><td> <?php echo $client_bank["branch"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> IFS Code</span> :</td><td> <?php echo $client_bank["ifscode"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
            </div>
        </div>
    </div>
</div>