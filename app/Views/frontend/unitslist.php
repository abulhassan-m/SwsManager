
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
            <?php echo count($unit)==0?"No records Found":""; foreach ($unit as $unit_item): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="iq-team2 iq-mall-10">
                        <div class="team-blog mb-30">
                            <div class="team-images"> 
                                <?php
                            /* $filename = "images/img10" . $unit_item["id"] . ".jpg";
                                if (file_exists($filename)) {
                                    $url = "images/img0" . $unit_item["id"] . ".jpg";
                                } else {
                                    $url = "https://image.flaticon.com/icons/svg/1181/1181088.svg";
                                }*/
                                ?>
                                <img class="img-fluid" src=<?php // echo $url ?> alt=""> 
                            </div>
                            <div class="team-description">
                                <div class="line"></div>
                                <h4 class="iq-tw-6 iq-mt-10"></h4>
                                <p> </p>
                                <div class="team-social">
                                    <ul>
                                        <li> <a href="#"> <i class="ion-ios-telephone-outline"></i> </a> </li>
                                        <li> <a href="#"> <i class="ion-ios-chatboxes-outline"></i> </a> </li>
                                        <li> <a href="#"> <i class="ion-ios-email-outline"></i> </a> </li>
                                        <li> <a href="#"> <i class="ion-thumbsup"></i> </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="col-lg-6">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>