<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angucomplete-alt/2.5.0/angucomplete-alt.min.js"></script>
<style>
   /* .top_widget {
        width: 100%;
    }
    .form-card {
        width: 100%;
    }
    .restable {
        overflow-x: auto;
        scrollbar-width: thin;
        /*background: #b22930 ;*//*
        padding: 0px;
    }
    .mustertable {
        background: white;
    }
    .angucomplete-holder {
        position:relative;
        font:15px Verdana;
    }
    .angucomplete-dropdown {
        font:inherit;
        border-color:#ececec;
        border-width:1px;
        border-style:solid;
        border-radius:2px;
        width:200%;
        padding:6px;
        cursor:pointer;
        position:absolute;
        z-index:9999;
        top:36px;
        left:0px;
        margin-top:-6px;
        background-color:#fff;
        overflow-y:auto;
        max-height:150px;
    }
    .angucomplete-searching {
        font:inherit;
        font-size:85%;
        color:#999;
        letter-spacing:1px;
    }
    .angucomplete-row {
        padding:5px;
        margin-bottom:4px;
        color:#000;
        clear:both;
    }
    .angucomplete-selected-row {
        background-color:#428bca;
        color:#fff;
    }
    .form-control {
        outline:0;
        border:0px;
        border-bottom: 1px solid #b22930;
        padding:6px;
        border-radius:2px;
        font:inherit;
        font-size:60%;
    }
    #form input[type="text"]{
        font-size: 12px;
        color:#dc143c;
        border:0px;
        border-bottom: 1px solid #b22930;
    }
    #musterform input[type="submit"]{
        font-size: 12px;
        color: white;
        background: #b22930;
        width: 100px;
        height: 25px;
        border-radius: 25px;
        border: 1px solid #b22930;
        margin-bottom: 7px;
    }
    #musterform input[type="date"]{
        font-size: 12px;
        color:#dc143c;
        border:0px;
        border-bottom: 1px solid #b22930;
    }
    #form .highlight-1 {
        font-weight:bold;
        color:#dc143c;
    }  
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ *//*
        color: #b22930;
        opacity: 1; /* Firefox *//*
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 *//*
        color: #b22930;
    }

    ::-ms-input-placeholder { /* Microsoft Edge *//*
        color: #b22930;
    }*/
</style>
<div class="content" ng-app="myApp">  
    <?php
    $arr = session()->getFlashdata('flash_message');
    if (!empty($arr)) {
        $html = '<div class="alert alert-dismissible alert-error">';
        $html .= $arr;
        $html .= '<button type="button" class="close" data-dismiss="alert">×</button></div>';
        echo $html;
    }
    ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><?php helper('form');
                            $attributes = array('id' => 'musterform', 'enctype' => 'multipart/form-data');
                            echo form_open('attendance', $attributes);
                            ?> 
                            <p angucomplete-alt id="Muster" class="angucomplete-holder" placeholder="Search Client" maxlength="50" pause="100" selected-object="selectedMuster" local-data="Musterlist" search-fields="MusterName" title-field="MusterName" minlength="1" input-class="form-control"  match-class="highlight-1" name="Muster" input-id="Muster" input-name="Muster"> </p> 
                             <!--<a class="small" href=""><span class="small-badge small padding-5"><i class="fa fa-plus-circle"></i> </span> </a>-->
                        </h4>

                        <?php form_close() ?>
                        <p class="card-category"> Muster Roll (Generated for the period from  <?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'from_date',
                                'id' => 'from_date'));
                            ?>  to   <?php
                            echo form_input(array(
                                'type' => 'date',
                                'name' => 'to_date',
                                'id' => 'to_date'));
                            ?>
                            <?php
//                    $currentMonth = date('F');
//                    $month = Date('F-Y', strtotime($currentMonth . " last month"));
//                    echo $month;
                            ?>)  <?= form_submit(array('name' => 'populate', 'id' => 'populate', 'class' => 'submit action-button', 'value' => 'populate')); ?> 
                        </p>
                    </div>
                    <div class="card-body responsive-table">
                        <h4><?= $details['client'] ?> Muster Roll (Generated for the period from <?= $details['from_date'] ?>  to <?= $details['to_date'] ?>) </h4>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <?php helper('date');
                                     $interval = new DateInterval('P1D');      
                                     $realEnd = new DateTime($details['to_date']);
                                     $realEnd->add($interval);
                                     $range = new DatePeriod(new DateTime($details['from_date']), $interval, $realEnd);
                                     foreach ($range as $date) {
                                        echo '<th> ' . $date->format('d m') . '</th>';
                                    }
                                    ?>
                                    <th>Duties</th
                                    <th>OTs Dues</th>
                                    <th>OFF</th>
                                    <th>Total Duties</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody> 

                                <?php
                                foreach ($muster_roll as $key => $muster_roll): $countduties = 0;
                                    $countot = 0;
                                    $countoff = 0;
                                    ?>
                                    <tr class="active">
                                        <th scope="row"><?= $key + 1; ?></th>

                                        <td><?= $muster_roll['firstname'] . $muster_roll['lastname'] ?> </td>
                                        <?php
                                        foreach ($range as $date) {
                                            $i = $date->format('d');
                                            echo '<td> ' . $muster_roll['day' . $i] . '</td>';
                                            if ($muster_roll['day' . $i] == 'P' || $muster_roll['day' . $i] == 'P,P' || $muster_roll['day' . $i] == 'P,P,P' || $muster_roll['day' . $i] == 'A' || $muster_roll['day' . $i] == 'B' || $muster_roll['day' . $i] == 'C' || $muster_roll['day' . $i] == 'A,B,C' || $muster_roll['day' . $i] == 'A,B' || $muster_roll['day' . $i] == 'B,C' || $muster_roll['day' . $i] == 'C,A' || $muster_roll['day' . $i] == 'N' || $muster_roll['day' . $i] == 'D' || $muster_roll['day' . $i] == 'D,N' || $muster_roll['day' . $i] == 'N,D') {
                                                $countduties++;
                                            }
                                            if ($muster_roll['day' . $i] == 'P,P' || $muster_roll['day' . $i] == 'P,P,P' || $muster_roll['day' . $i] == 'A,B,C' || $muster_roll['day' . $i] == 'A,B' || $muster_roll['day' . $i] == 'B,C' || $muster_roll['day' . $i] == 'C,A' || $muster_roll['day' . $i] == 'D,N' || $muster_roll['day' . $i] == 'N,D') {
                                                $countot++;
                                            }
                                            if ($muster_roll['day' . $i] == 'P,P,P' || $muster_roll['day' . $i] == 'A,B,C') {
                                                $countot++;
                                            }
                                            if ($muster_roll['day' . $i] == 'W') {
                                                $countoff++;
                                            }
                                        }
                                        ?>

                                        <td> <?= $countduties ?></td>
                                        <td> <?= $countot ?></td>
                                        <td> <?= $countoff ?> </td>
                                        <td> <?= $countduties + $countot + $countoff ?> </td>

                                    </tr> 

<?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Attendance Entry</h4>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body ">
                        <?php
                        $attributes = array('id' => 'form');
                        echo form_open('attendance', $attributes);
                        ?>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="group" ng-controller="clientController">  
                                        <p angucomplete-alt id="client" class="angucomplete-holder" placeholder="Search Client" maxlength="50" pause="100" selected-object="selectedclient" local-data="clientlist" search-fields="clientName" title-field="clientName" minlength="1" input-class="form-control"  match-class="highlight-1" name="client" input-name="client" input-id="client"> </p>           
                                    </div>  
                                </div></div></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="group" ng-controller="myController">  
                                        <p angucomplete-alt id="emp" class="angucomplete-holder" placeholder="Search Employee" maxlength="50" pause="100" selected-object="selectedEmp" local-data="emplist" search-fields="empName" title-field="empName" minlength="1" input-class="form-control"  match-class="highlight-1" name="emp" input-name="emp" input-id="emp"> </p>                                </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"> 
                                    <?php
                                    echo form_input(array(
                                        'type' => 'date',
                                        'name' => 'date', 'class'=>'form-control',
                                        'id' => 'date'));
                                    ?>
                                    <span class="bar"></span>
                                    <label>Date of Attendance</label>
                                    <span class="signup-error"><?php echo validation_show_error('date'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php
                                    echo form_dropdown(array('name' => 'shift', 'class'=>'form-control', 'id' => 'shift', 'required' => ''), array(' ' => '', 'D' => 'D', 'N' => 'N', 'A' => 'A', 'B' => 'B', 'C' => 'C'));
                                    ?>
                                    <label for="shift">Shift</label>
                                    <span class="signup-error"><?php echo validation_show_error('shift'); ?></span>
                                </div>
                            </div>
                        </div>
                            <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Add')); ?>    
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var myApp = angular.module('myApp', ['angucomplete-alt']);
    myApp.controller('myController',
            function ($scope, $http) {

            var arr = new Array();
            $http.get("http://localhost/sw3s/attendance/fetchallempdata/1").success(function (data) {
            angular.forEach(data, function (item) {
            arr.push({ empName: item.name });
            });
            $scope.emplist = arr;
            }).error(function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
            });
            });
    myApp.controller('clientController',
            function ($scope, $http) {

            var arr = new Array();
            $http.get("http://localhost/sw3s/attendance/fetchallclientdata/1").success(function (data) {
            angular.forEach(data, function (item) {
            arr.push({ clientName: item.name });
            });
            $scope.clientlist = arr;
            }).error(function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
            });
            });
    myApp.controller('MusterController',
            function ($scope, $http) {
            var arr = new Array();
            $http.get("http://localhost/sw3s/attendance/fetchallclientdata/1").success(function (data) {
            angular.forEach(data, function (item) {
            arr.push({ MusterName: item.name });
            });
            $scope.Musterlist = arr;
            }).error(function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
            });
            });
</script>