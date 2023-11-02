<style>
    
    #profile ul li{
        float: left;
    }
    .card-profile .card-avatar a img {
        height: 130px;
    }
    .portrait {
        width: 130px;
        min-height: 165px;
    }
    .modal {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #fff;
        opacity: 100%;
        z-index: 12;
        overflow: hidden;
        opacity: 1.8;
    }
    .signupbtn {
        width: 16%;
        float:right;
        border-end-end-radius: 45%;
        border-start-end-radius: 45%;
        height: 50px;
        background-color: #b22930;
        color: white;
    }
    .modal-content {
        padding: 30px;        
    }
    .column-50{
        width: 50%;
    }
    .column-50 input {
        border: 0;
        border-bottom: 1px solid #bbb;
        padding: 3px;
        font-size: 14px;
        background-color: white;
    }
    .column-50 textArea {
        border: 0;
        border-bottom: 1px solid #bbb;
        padding: 3px;
        font-size: 14px;
        background-color: white;
    }
    .column-50 input:focus{
        height: 40px;       
        background-color: white;
    }
    .column-50 label {
        width: auto;
        height: auto;
        margin-bottom: 0px;
        clear: both;
        color: #b22930;
    }
    .self {
        text-align: left;
    }
    .social ul li {
        float: left;
        padding: 5px;
    }
</style>
<!-- Begin Image -->

      <div class="content">
        <div class="container-fluid">
          <div class="row">
              
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                    <a href="javascript:;">
                        <?php
                        $url = base_url() . "assets/profile_pics/" . $emp_item["photo"];
                        $file_headers = @get_headers($url);
                        $InvalidHeaders = array('404', '403', '500');
                        foreach ($InvalidHeaders as $HeaderVal) {
                            if (strstr($file_headers[0], $HeaderVal) || $emp_item["photo"] == 'No Image File' || $emp_item["photo"] == '') {
                                $url = base_url() . "assets/images/logo-app.svg";
                            }
                        }
//               
                        ?>

                        <img  class="img bg-dark" src="<?php echo $url ?>" alt="#">
                    </a>
                </div>
                  <div class="card-body">
                      <h6 class="card-category text-gray"><?php $this->emp->get_emp_rank($emp_item['id']) ?></h6>
                      <h4 class="card-title"><?php echo $emp_item["firstname"] . ' ' . $emp_item["lastname"] ?></h4>
                      <p class="card-description">  </p>
                      <div class="self">
                          <ul>
                              <li> <i class="fa fa-envelope"></i> <button onclick="document.getElementById('id01').style.display = 'block'" style="width:auto;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>Email : <a href="#"><?php echo $emp_email["email"] ?></a></li>
                              <li> <i class="fa fa-phone"></i> Phone : <?php echo $emp_phone["phone_no"] ?></li>
                              <li> <i class="fa fa-map-marker"></i> Address : <?php echo $emp_add["address"] . ', ' . $emp_add["city"] . '-' . $emp_add["pincode"] ?></li>                
                          </ul>
                         
                      </div>
                      <div class="social">
                          <ul> 
                              <li><button onclick="document.getElementById('id01').style.display = 'block';document.getElementById('myReset').name = 'photo';" style="width:auto;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></li>
                              <li><a class='north' href="#" title="Download .pdf"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li>
                              <li><a class='north' href="javascript:window.print()" title="Print"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                              <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                              <li><a class='north' href="#" title="Follow me on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a class='north' href="#" title="My Facebook Profile"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                          </ul>
                      </div>
                      <!--<a href="javascript:;" class="btn btn-primary btn-round">Follow</a>-->
                  </div>
              </div>
            </div>
          
              
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Details:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">bug_report</i> Personal
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Projects
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> Payments
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> Messages
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                      <table class="table responsive">
                        <tbody>
                            <tr>
                                <td> <h5> ABOUT </h5> </td>
                                <td> <?php echo $emp_item["remarks"] ?> </td>
                                <td class="td-actions text-right"> <h2></h2> </td>
                            </tr>
                            <tr>
                                <td> <h5>DEMOGRAPHICS </h5> </td>
                                <td>
                                    <ul class="skills">
                                        <?php foreach ($emp_health as $emp_health1): ?> 
                                            <li> <?php echo $emp_health1["name"] ?> : <?php echo $emp_health1["value"] ?>  ,</li>
                                        <?php endforeach; ?>
                                        <?php foreach ($emp_demo as $emp_demo): ?>
                                            <li><?php echo $emp_demo["name"] ?>  : <?php echo $emp_demo["description"] ?> ,</li>
                                        <?php endforeach; ?>
                                        <li> Date of Join  : <?php echo $emp_item["doj"] ?> ,</li>
                                        <li>Date Left : <?php echo $emp_item["dol"] ?>  ,</li>
                                    </ul>     
                                </td>
                                <td class="td-actions text-right"></td>
                            </tr>
                            <tr>
                                <td> <h5> EDUCATION </h5> </td>
                                <td>
                                    <?php foreach ($emp_edu as $emp_edu1): ?>
                                        <div class="content">
                                            <h3><?php echo $emp_edu1["name"] ?></h3>
                                            <p> <?php echo $emp_edu1["value"] ?>  <br />
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </td>
                                <td class="td-actions text-right"> <h2></h2> </td>
                            </tr>
                            <tr>
                                <td> <h5> EXPERIENCE </h5> </td>
                                <td>
                                    <?php foreach ($emp_exp as $emp_exp1): ?>                                        
                                        <div class="content">
                                            <h3><?php echo $emp_exp1["name"] ?></h3>
                                            <p><?php echo $emp_exp1["value"] ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </td>
                                <td class="td-actions text-right">
                                    <h2></h2> 
                                </td>
                            </tr>
                            <tr>
                                <td> <h5> BANK INFORMATION </h5> </td>
                                <td>
                                    <?php foreach ($emp_bank as $emp_bank1): ?>
                                        <div class="content">
                                            <h3>Account Name: </h3>
                                            <p><?php echo $emp_bank1["accname"] ?></p>
                                        </div>
                                        <div class="content">
                                            <h3>Account No:  </h3>
                                            <p><?php echo $emp_bank1["accno"] ?></p>
                                        </div>
                                        <div class="content">
                                            <h3>Bank Name: </h3>
                                            <p><?php echo $emp_bank1["name"] ?></p>
                                        </div>
                                        <div class="content">
                                            <h3>Branch: </h3>
                                            <p><?php echo $emp_bank1["branch"] ?></p>
                                        </div>
                                        <div class="content">
                                            <h3>IFS Code: </h3>
                                            <p><?php echo $emp_bank1["ifscode"] ?> </p>
                                        </div>
                                    <?php endforeach; ?>                                
                                </td>
                                <td class="td-actions text-right"><h2></h2></td>
                            </tr>
                            <tr>
                                <td> <h5>FAMILY DETAILS</h5> </td>
                                <td>
                                    <table>     <thead>       
                                        <th>Name</th>   <th>Relationship</th>  <th>Age</th>  <th>Occupation</th>  <th>DOB</th> <th>Contact No</th> 
                                        </thead><!-- tbody id="data">     </tbody--><tbody>
                                            <?php foreach ($emp_family as $emp_family1): ?>
                                                <tr> 
                                                    <td><?php echo $emp_family1["name"] ?> </td> 
                                                    <td><?php echo $emp_family1["relation"] ?></td>  
                                                    <td><?php echo $emp_family1["age"] == 0 ? '-' : $emp_family1["age"] ?>  </td> 
                                                    <td><?php echo $emp_family1["occup"] == 0 ? '-' : $emp_family1["occup"] ?></td> 
                                                    <td>  <?php echo $emp_family1["dob"] == 0 ? '-' : date_format(new DateTime($emp_family1["dob"]), "d-m-Y"); ?></td>
                                                    <td>  <?php echo $emp_family1["dob"] == 0 ? '-' : date_format(new DateTime($emp_family1["dob"]), "d-m-Y"); ?></td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>    </table>
                                </td>
                                <td class="td-actions text-right"> <h2></h2> </td>
                            </tr>                        
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="messages">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="settings">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  