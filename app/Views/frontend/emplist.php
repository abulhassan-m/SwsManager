
<h2><?php echo $title; ?> <a class="small" href="applnentry"><span class="small-badge small padding-5">Add </span> </a></h2>

<div class="container-fluid">
    <div class="row mt-30 no-gutter">
        <?php foreach ($emp as $emp_item): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="iq-team2 iq-mall-10">
                    <div class="team-blog mb-30">
                        <div class="team-images"> 
                            <?php
                            $filename = "./profile_pics/".$emp_item["photo"];
                            if (file_exists($filename)) {
                                $url = $filename ;
                            } else {
                                $url = 'https://image.flaticon.com/icons/svg/783/783192.svg';
                            }
                            ?>
                            <img class="img-fluid" src=<?php echo $url ?> alt=""> 
                        </div>
                        <div class="team-description">
                            <div class="line"></div>
                            <h4 class="iq-tw-6 iq-mt-10"><a href="empdetails/<?php echo $emp_item["empid"]?>" ><?php echo $emp_item["firstname"] . ' ' . $emp_item["lastname"] ?></a></h4>
                            <!--p>CEO | HAWKEYE |Remarks</p-->
                            <div class="team-social">
                                <ul>
                                    <li> <a href="#"> <i class="ion-ios-telephone-outline"></i> <?php echo $emp_item["phone_no"]?></a> </li>
                                    <!--li> <a href="#"> <i class="ion-ios-chatboxes-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-ios-email-outline"></i> </a> </li>
                                    <li> <a href="#"> <i class="ion-thumbsup"></i> </a> </li-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>