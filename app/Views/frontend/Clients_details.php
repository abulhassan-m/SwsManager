<div id="emp-details-main">
    <div class="emp-tab-wrap">
        <ul class="emp-tab-menu">
            <li class="active"><a href="#" data-tab="1"><i class="fa fa-user"></i><span class="menu-text">Company Details</span></a></li>
            <li><a href="#" data-tab="2"><i class="fa fa-users"></i><span class="menu-text">Services</span></a></li>
            <li><a href="#" data-tab="3"><i class='fa fa-cogs'></i><span class="menu-text">Contact List</span></a></li>
            <li><a href="#" data-tab="4"  data-pie="yes"><i class="fa fa-inr"></i><span class="menu-text">Bank Details</span></a></li>
            <li><a href="#" data-tab="5" data-pie="yes"><i class="fa fa-phone"></i><span class="menu-text">Billing & Deployment</span></a></li>
        </ul>
        <div class="container">
            <div class="column-full content-emp-details">
                <div class="column-33">
                        <div class="emp-content-inner text-center">
                    <figure>
                        <?php
                        $url = base_url() . "assets/clients_logos/" . $client_item["logo"];
                        $file_headers = @get_headers($url);
                        $InvalidHeaders = array('404', '403', '500');
                        foreach ($InvalidHeaders as $HeaderVal) {
                            if (strstr($file_headers[0], $HeaderVal) || $client_item["logo"] == 'No Image File') {
                                $url = "https://image.flaticon.com/icons/svg/783/783192.svg";
                            }
                        }
//               
                        ?>
                        <img src="<?php echo $url ?>"  alt="#">
                    </figure>
                    <h1 > <?php echo $client_item["name"] ?></h1>
                        </div>
                </div>
                <div class="column-66">
                    <div class="emp-tab-content active" data-content="1">
                        <div class="emp-content-inner text-center">
                            <div class="row row-bottom-padded-sm">
                                <div class="column-full">                        
                                    <p>
                                        <!-- Remarks Column -->
                                    </p>
                                </div>
                            </div>
                            <div class="row">                                
                                    <div class="column-full padding-t-5">
                                        <ul class="contact-info">
                <li> <span class="iq-tw-5">GST :</span> <?php echo $client_item["gst_no"] ?></li>
                <li> <span class="iq-tw-5">PAN :</span> <?php echo $client_item["pan_no"] ?></li>
                <li> <span class="iq-tw-5">Phone :</span> <?php echo $client_item["phone_no"] ?></li>
                <li> <span class="iq-tw-5">Email :</span> <a href="#"><?php echo $client_item["email"] ?></a></li>
                <li> <span class="iq-tw-5">Website :</span> <a href="#"><?php echo $client_item["www"] ?></a></li>
                <li> <span class="iq-tw-5">Address :</span> <br><?php echo $client_item["address"] .', <br> '. $client_item["city_name"] .','. $client_item["state_name"] .',' . $client_item["country_name"]; ?></li>         
            </ul>
                                        <div class="column-full padding-t-5"></div>
                                    </div>
                                    <div class="column-full padding-t-5">
                                        
                                        <div class="column-full padding-t-5"></div>
                                    </div>
                                <div class="column-full padding-t-5">
                                    
                                    <div class="column-full padding-t-5"></div>
                                </div>
                                <div class="column-full padding-t-5">
                                    <div class="column-full padding-t-5"></div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="emp-tab-content" data-content="2">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">
                                    <h2 class="padding-t-7">Service Offered</h2>
                                    <table class="table table-bordered padding-t-5"> <thead> <th>S.No </th>  <th>Particulars</th>   <th>Working Hrs</th>  <th>No of Persons</th>  <th>Rate Fixed</th>  <th>Salary</th> 
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
                            </div>
                        </div>
                    </div>
                    <div class="emp-tab-content" data-content="3">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">
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
                        </div>
                    </div>
                    <div class="emp-tab-content" data-content="4">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">
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
                    <div class="emp-tab-content" data-content="5">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">
                                    <div class="column-half">
                                        <h2 class="padding-t-5">Deployment Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($client_depl as $client_depl): ?>
                 <tr> <td> <span class="iq-tw-5"> Deployment Date</span> :</td><td> <?php echo $client_depl["deploy_dt"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Deployment Address</span> :</td><td> <?php echo $client_depl["address"] ?> <br><?php echo $client_depl["city_name"] ?>,<?php echo $client_depl["state_name"] ?>,
                     <?php echo $client_depl["country_name"] ?></td>  </tr>
        <?php endforeach; ?>
             </table>
                                    </div>
                                    
                                    <div class="column-half">
                                        <h2 class="padding-t-5">Billing Details</h2>
            <table class="table table-bordered padding-t-5">   
        <?php foreach ($client_demo as $client_demo): ?>
                 <tr> <td> <span class="iq-tw-5"> Billing Start Date</span> :</td><td> <?php echo $client_demo["bill_st_day"] ?>  </td>  </tr>
                 <tr> <td> <span class="iq-tw-5"> Billing Address</span> :</td><td> <?php echo $client_demo["address"] ?> <br><?php echo $client_demo["city_name"] ?>,<?php echo $client_demo["state_name"] ?> ,<?php echo $client_demo["country_name"] ?>  </td>  </tr>
        <?php endforeach; ?>
             </table>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div></div>
            </div>
        </div>
    </div>

</div>
