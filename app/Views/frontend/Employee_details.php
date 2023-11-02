<div class="content">
        <div class="container-fluid">
          <div class="row">
        <!-- Begin Image -->
        <?php
        $url = base_url() . "assets/profile_pics/" . $emp_item["photo"];
        $file_headers = @get_headers($url);
        $InvalidHeaders = array('404', '403', '500');
        foreach ($InvalidHeaders as $HeaderVal) {
            if (strstr($file_headers[0], $HeaderVal) || $emp_item["photo"] == 'No Image File') {
                $url = "assets/images/logo-app.svg";
            }
        }
//               
        ?>
        <img src="<?php echo $url ?>"  class="portrait"  alt="#">
        <!-- End Image -->
        <!-- Begin Personal Information -->  
        <div class="self">
            <h1 class="name"><?php echo $emp_item["firstname"] . ' ' . $emp_item["lastname"] ?> <br />
                <span>CEO</span></h1><ul>
                <li> <i class="fa fa-envelope"></i> Email : <a href="#"><?php echo $emp_email["email"] ?></a></li>
                <li> <i class="fa fa-phone"></i> Phone : <?php echo $emp_phone["phone_no"] ?></li>
                <li> <i class="fa fa-map-marker"></i> Address : <?php echo $emp_add["address"] . ', ' . $emp_add["city"] . '-' . $emp_add["pincode"] ?></li>                
                </ul>
        </div>
        <!-- End Personal Information -->   
        <!-- Begin Personal Information -->
        <div class="self">
            <ul>
                <li> <i class="material-icons">filter_frames</i> UAN : <a href="#"></a></li>
                <li> <i class="material-icons">fingerprint</i> Aadhaar :</li>
                <li> <i class="material-icons">assignment_ind</i> PAN : </li>                
                </ul>
        </div>
        <!-- End Personal Information -->   
        <!-- Begin Social -->
        <div class="social">
            <ul>
                <li><a class='north' href="#" title="Download .pdf"><i class="fa fa-floppy-o" aria-hidden="true"></i></a></li>
                <li><a class='north' href="javascript:window.print()" title="Print"><i class="fa fa-print" aria-hidden="true"></i></a></li>
                <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                <li><a class='north' href="#" title="Follow me on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a class='north' href="#" title="My Facebook Profile"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <!-- End Social -->
<div id="emp-details-main">
    <div class="emp-tab-wrap">
        <ul class="emp-tab-menu">
            <li class="active"><a href="#" data-tab="1"><i class="fa fa-user"></i><span class="menu-text">Personal</span></a></li>
            <li><a href="#" data-tab="3"><i class='fa fa-cogs'></i><span class="menu-text">Projects</span></a></li>
            <li><a href="#" data-tab="4"  data-pie="yes"><i class="fa fa-inr"></i><span class="menu-text">Payments</span></a></li>
            <li><a href="#" data-tab="5" data-pie="yes"><i class="fa fa-phone"></i><span class="menu-text">Messages</span></a></li>
        </ul>
        <div class="container">
            <div class="column-full content-emp-details">
                                
                    <div class="emp-tab-content active" data-content="1">
                        <div class="emp-content-inner text-center">
                            <div class="entry">
                                 <h2>About him</h2>
                                     <p>
                                        <?php echo $emp_item["remarks"] ?> 
                                    </p>
                            </div>
                            <div class="entry">
                                <h2>Demographic Information:</h2>
                                     <ul class="skills">
                                        <?php foreach ($emp_health as $emp_health1): ?> 
                                        <li> <?php echo $emp_health1["name"] ?> : <?php echo $emp_health1["value"] ?>  ,</li>
                                        <?php endforeach; ?>
                                        <?php foreach ($emp_demo as $emp_demo1): ?>
                                        <li><?php echo $emp_demo1["name"] ?>  : <?php echo $emp_demo1["description"] ?> ,</li>
                                        <?php endforeach; ?>
                                        <li> Date of Join  : <?php echo $emp_item["doj"] ?> ,</li>
                                        <li>Date Left : <?php echo $emp_item["dol"] ?>  ,</li>
                                    </ul>                           
                            </div>
                            <!-- Begin 1st Row -->
<!--                            <div class="entry">
                                <h2>OBJECTIVE</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim viverra nibh sed varius. Proin bibendum nunc in sem ultrices posuere. Aliquam ut aliquam lacus.</p>
                            </div>-->
                            <!-- End 1st Row -->
                            <!-- Begin 2nd Row -->
                            <div class="entry">
                                <h2>EDUCATION</h2>
                                 <?php foreach ($emp_edu as $emp_edu1): ?>
                                <div class="content">
                                    <h3><?php echo $emp_edu1["name"] ?></h3>
                                    <p> <?php echo $emp_edu1["value"] ?>  <br />
                                        </p>
                                </div>
<!--                                <div class="content">
                                    <h3>Sep 2001 - Jun 2005</h3>
                                    <p>University of Art &amp; Design, New York <br />
                                        <em>Bachelor of Science in Graphic Design</em></p>
                                </div>-->
                                        <?php endforeach; ?>
                            </div>
                            <!-- End 2nd Row -->
                            <!-- Begin 3rd Row -->
                            <div class="entry">
                                <h2>EXPERIENCE</h2> 
                                    <?php foreach ($emp_exp as $emp_exp1): ?>                                        
                                <div class="content">
                                    <h3><?php echo $emp_exp1["name"] ?></h3>
                                    <p><?php echo $emp_exp1["value"] ?></p>
                                </div>
                                            <?php endforeach; ?>
<!--                                <div class="content">
                                    <h3>Jun 2007 - May 2009</h3>
                                    <p>Junior Web Designer <br />
                                        <em>Bachelor of Science in Graphic Design</em></p>
                                    <ul class="info">
                                        <li>Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. </li>
                                        <li>Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
                                    </ul>
                                </div>-->
                            </div>
                            <!-- End 3rd Row -->
                            <!-- Begin 4th Row -->
                            <div class="entry">
                                <h2>Bank Information</h2>
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
                            </div> 
                            <div class="entry">
                                 <h2>Family Details</h2>
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
                            </div>
<!--                            <div class="entry">
                                <h2>SKILLS</h2>
                                <div class="content">
                                    <h3>Software Knowledge</h3>
                                    <ul class="skills">
                                        <li>Photoshop</li>
                                        <li>Illustrator</li>
                                        <li>InDesign</li>
                                        <li>Flash</li>
                                        <li>Fireworks</li>
                                        <li>Dreamweaver</li>
                                        <li>After Effects</li>
                                        <li>Cinema 4D</li>
                                        <li>Maya</li>
                                    </ul>
                                </div>
                                <div class="content">
                                    <h3>Languages</h3>
                                    <ul class="skills">
                                        <li>CSS/XHTML</li>
                                        <li>PHP</li>
                                        <li>JavaScript</li>
                                        <li>Ruby on Rails</li>
                                        <li>ActionScript</li>
                                        <li>C++</li>
                                    </ul>
                                </div>
                            </div>-->
                            <!-- End 4th Row -->
                            <!-- Begin 5th Row -->
<!--                            <div class="entry">
                                <h2>WORKS</h2>
                                <ul class="works">
                                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                    <li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
                                </ul>
                            </div>-->
                            <!-- Begin 5th Row -->
                                                    
                        </div>
                    </div>           
                    <div class="emp-tab-content" data-content="2">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="emp-tab-content" data-content="3">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">
                                    
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="emp-tab-content" data-content="4">
                        <div class="emp-content-inner">
                            <div class="row">
                                <div class="column-full">

                                </div>                                
                            </div>
                        </div>
                    </div></div>
            </div>
        </div>
    </div>
          </div>
        </div>
</div>