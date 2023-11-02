<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .toolbar {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    
    .btn-info {
        color: #fff;
        background-color: #b22930;
        border-color: #46b8da;
    }
    #invoice{  padding: 10px;   }
    .invoice {        position: relative;        background-color: #FFF;        min-height: 680px;        padding: 35px    }
    .invoice header {        padding: 10px 0;        margin-bottom: 20px;           }
    .divheader { padding:0; border-bottom: 1px solid #3989c6; }
    .invoice .company-details {        text-align: right; float: right;   }
    .invoice .company-details .name {        margin-top: 0;        margin-bottom: 0    }
    .invoice .contacts {        margin-bottom: 20px    }
    .invoice .invoice-to {        text-align: left    }
    .invoice .invoice-to .to {   margin-top: 0;    margin-bottom: 0;    }
    .invoice .invoice-details {        text-align: right;    float:right;    margin-top: 2px;  margin-bottom: 2px;   }
    .invoice .invoice-details .invoice-id {        margin-top: 0;        color: #3989c6    }
    .invoice main {        padding-bottom: 50px    }
    .invoice main .thanks {        margin-top: -100px;        font-size: 2em;        margin-bottom: 50px    }
    .invoice main .notices {        padding-left: 6px;        border-left: 6px solid #3989c6    }
    .invoice main .notices .notice {        font-size: 1.2em    }
    .invoice table {        width: 100%;        border-collapse: collapse;        border-spacing: 0;        margin-bottom: 20px    }
    .invoice table td,.invoice table th {        padding: 15px;        background: #eee;        border-bottom: 1px solid #fff    }
    .invoice table th {
        /* white-space: nowrap;*/
        font-weight: 400;
        font-size: 13px;
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 13px;
    }
    .invoice table td {
        border-right: 1px;
        margin: 0;
        color: #3989c6;
        font-size: 13px;
        white-space: nowrap;
    }

    .invoice table .qty,.invoice table .total,.invoice table .unit {
        text-align: right;
        font-size: 13px;
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .unit {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 15px 20px;
        font-size: .8em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }
    .invoice table tfoot tr:last-child td {        
        font-size: 1.2em;
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px!important;
            overflow: hidden!important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }

    @media print {
        .inv {        position: relative;        background-color: #FFF;        min-height: 680px;        padding: 35px    }
        .inv header {        padding: 10px 0;        margin-bottom: 20px;           }
        .divheader { border-bottom: 1px solid #3989c6; }
        .inv .company-details {        text-align: right;    }
        .inv .company-details .name {        margin-top: 0;        margin-bottom: 0    }
        .inv main .thanks {        margin-top: -100px;        font-size: 2em;        margin-bottom: 50px    }
        .inv main .notices {        padding-left: 6px;        border-left: 6px solid #3989c6    }
        .inv main .notices .notice {        font-size: 1.2em    }
        .inv table {        width: 100%;        border-collapse: collapse;        border-spacing: 0;        margin-bottom: 20px    }
        .inv table td,.invoice table th {        padding: 15px;        background: #eee;        border-bottom: 1px solid #fff    }
        table td {
            border-right: 1px;
            margin: 0;
            color: #3989c6;
            font-size: 13px;
            white-space: nowrap;
        }

        .inv table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 13px;
        }

        .inv table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .inv table .unit {
            background: #ddd
        }

        .inv table .total {
            background: #3989c6;
            color: #fff
        }
        .inv1>div:last-child {
            page-break-before: always
        }


    }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angucomplete-alt/2.5.0/angucomplete-alt.min.js"></script>
<style>
    .top_widget {
        width: 100%;
    }
    .form-card {
        width: 100%;
    }
    .restable {
        overflow-x: auto;
        scrollbar-width: thin;
        /*background: #b22930 ;*/
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
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #b22930;
        opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #b22930;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
        color: #b22930;
    }
</style>
<?php
            $arr = $this->session->flashdata('flash_message');
            if (!empty($arr)) {
                $html = '<div class="alert alert-dismissible alert-error">';
                $html .= $arr;
                $html .= '<button type="button" class="close" data-dismiss="alert">×</button></div>';
                echo $html;
            }
            ?>
<div class="column-full">
    <div class="row">
        <div  ng-app="myApp">             
            <?php
            $attributes = array('id' => 'form');
            echo form_open('bill/generate', $attributes);
            ?>  

            <div class="column-full padding-t-5 top_widget">    

                <div class="form-card"  >
                    <div class="column-quad bg-white top_widget_contents">   
                        <div class="group" ng-controller="clientController">  
                            <p angucomplete-alt id="client" class="angucomplete-holder" placeholder="Search Client" maxlength="50" pause="100" selected-object="selectedclient" local-data="clientlist" search-fields="clientName" title-field="clientName" minlength="1" input-class="form-control"  match-class="highlight-1" name="client" input-name="client" input-id="client"> </p>           
                        </div>      
                        <?= form_submit(array('name' => 'finish', 'id' => 'finish', 'class' => 'submit action-button', 'value' => 'Generate')); ?> 
                    </div>
                </div>


                <div class="clearfix"> </div>
            </div>
            <?php echo form_close(); ?>    
        </div>
        <script>
            var myApp = angular.module('myApp', ['angucomplete-alt']);

            myApp.controller('clientController',
                    function ($scope, $http) {

                        var arr = new Array();
                        $http.get("http://limrasnetwork.com/sw3s/attendance/fetchallclientdata/1").success(function (data) {
                            angular.forEach(data, function (item) {
                                arr.push({clientName: item.name});
                            });
                            $scope.clientlist = arr;
                        }).error(function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(textStatus);
                        });
                    });
        </script>
    </div>    
</div>

<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <script> $('#printInvoice').click(function () {
                    var mywindow = window.open('', '', 'height=29cm,width=21cm');
                    mywindow.document.write('<html><head><link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><style>');
                    mywindow.document.write(' h1{font-size:35px;text-decoration:none;} .divheader { border-bottom: 1px solid #3989c6;} .inv .company-details {text-align: right;white-space: nowrap;} .inv .company-details .name { margin-top: 0; margin-bottom: 0 }');
                    mywindow.document.write(' .thanks { text-align:center; font-size: 2em;margin-bottom: 50px;}  .notices {        padding-left: 6px;        border-left: 6px solid #3989c6    }');
                    mywindow.document.write(' .notices, .notice {font-size: 1.2em} .inv2 table {width: 100%; border-collapse: collapse;border-spacing: 0;margin-bottom: 20px    }');
                    mywindow.document.write(' .inv2 table td, .inv2 table th {padding: 15px;background: #eee;border-bottom: 1px solid #fff;} .inv2 table td {border-right: 1px;margin: 0; color: #3989c6;font-size: 14px; white-space: nowrap;}');
                    mywindow.document.write(' .inv2 table .qty, .inv2 table .total,.inv2 table .unit {  text-align: right; font-size: 15px;  }');
                    mywindow.document.write(' .inv2 table .no { color: #fff;  font-size: 1.6em; background: #3989c6 } .inv2 table .unit { background: #ddd }');
                    mywindow.document.write(' .inv2 table .total { background: #3989c6; color: #fff } .inv2 table tbody tr:last-child td {  background: #3989c633; border: 1px }');
                    mywindow.document.write(' .inv2 table tfoot td { background: 0 0; border-bottom: none; white-space: nowrap; text-align: right; padding: 15px 20px; font-size: 1.2em; border-top: 1px solid #aaa; }');
                    mywindow.document.write(' .inv2 table tfoot tr:first-child td { border-top: none; } .inv2 table tfoot tr:last-child td { color: #3989c6; font-size: 2.4em; border-top: 1px solid #3989c6 }');
                    mywindow.document.write(' .inv2 table tfoot tr td:first-child { border: none } .inv2>div:last-child { page-break-before: always } </style>');
                    mywindow.document.write('</head><body><table><tr><td>');
                    mywindow.document.write(document.getElementById('inv_logo').innerHTML);
                    mywindow.document.write('</td><td class="h5" width="55%" align="right">');
                    mywindow.document.write(document.getElementById('inv_head').innerHTML);
                    mywindow.document.write('</td></tr><tr><td colspan="2" height="50px"></td></tr><tr><td colspan="2">');
                    mywindow.document.write(document.getElementById('inv_line').innerHTML);
                    mywindow.document.write('</td></tr><tr><td colspan="2" height="50px"></td></tr><tr><td>');
                    mywindow.document.write(document.getElementById('inv_cli').innerHTML);
                    mywindow.document.write('</td><td align="right">');
                    mywindow.document.write(document.getElementById('inv_det').innerHTML);
                    mywindow.document.write('</td></tr><tr><td colspan="2" height="50px"></td></tr><tr><td colspan="2">');
                    mywindow.document.write(document.getElementById('inv_tbl').innerHTML);
                    mywindow.document.write('</td></tr><tr><td colspan="2" height="50px"></td></tr><tr><td colspan="2">');
                    mywindow.document.write('</td>');
                    mywindow.document.write('</tr></table><div style="position: absolute; bottom:0px; left:8px;";>');
                    mywindow.document.write(document.getElementById('inv_tnx').innerHTML);
                    mywindow.document.write(document.getElementById('inv_note').innerHTML);
                    mywindow.document.write('</div></body></html>');
                    mywindow.document.close(); // necessary for IE >= 10
                    mywindow.focus(); // necessary for IE >= 10*/

                    mywindow.print();
                    mywindow.close();
                    return true;
                });</script>
                            <button id="printPreview" class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> 
        </div>
        <hr>
        <script>

            $('#printPreview').click(function () {

                var mywindow = window.open('', '_blank', 'width=21cm,height=29cm,location=no,left=100px');

                mywindow.document.open();
                mywindow.document.write('<html><head><link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"><style>');
                mywindow.document.write(' h1{font-size:30px;text-decoration:none;} .divheader { border-bottom: 1px solid #3989c6;}  .company-details {text-align: right;}  .company-details.name { margin-top: 0; margin-bottom: 0 }');
                mywindow.document.write(' .thanks {margin-top: -100px; font-size: 2em; margin-bottom: 50px;}  .notices {        padding-left: 6px;        border-left: 6px solid #3989c6    }');
                mywindow.document.write(' .notices, .notice {font-size: 1.2em} .inv2 table {width: 100%; border-collapse: collapse;border-spacing: 0;margin-bottom: 20px    }');
                mywindow.document.write(' .inv2 table td, .inv2 table th {padding: 15px;background: #eee;border-bottom: 1px solid #fff;} .inv2  table td {border-right: 1px;margin: 0; color: #3989c6;font-size: 13px; white-space: nowrap;}');
                mywindow.document.write(' .inv2 table .qty, .inv2 table .total,.inv2 table .unit {  text-align: right; font-size: 13px;  }');
                mywindow.document.write(' .inv2 table .no { color: #fff;  font-size: 1.6em; background: #3989c6 } .inv2 table .unit { background: #ddd }');
                mywindow.document.write(' .inv2 table .total { background: #3989c6; color: #fff } .inv2 table tbody tr:last-child td { border: 1px }');
                mywindow.document.write(' .inv2 table tfoot td { background: 0 0; border-bottom: none; white-space: nowrap; text-align: right; padding: 15px 20px; font-size: 1.2em; border-top: 1px solid #aaa; }');
                mywindow.document.write(' .inv2 table tfoot tr:first-child td { border-top: none; } .inv2 table tfoot tr:last-child td { color: #3989c6; font-size: 1.4em; border-top: 1px solid #3989c6 }');
                mywindow.document.write(' .inv2 table tfoot tr td:first-child { border: none } .inv2>div:last-child { page-break-before: always } </style>');
                mywindow.document.write('</head><body><table><tr><td>');
                mywindow.document.write(document.getElementById('inv_logo').innerHTML);
                mywindow.document.write('</td><td class="h5" align="right">');
                mywindow.document.write(document.getElementById('inv_head').innerHTML);
                mywindow.document.write('</td></tr><tr><td colspan="2">');
                mywindow.document.write(document.getElementById('inv_line').innerHTML);
                mywindow.document.write('</td></tr><tr><td colspan="2" height="30px"></td></tr><tr><td>');
                mywindow.document.write(document.getElementById('inv_cli').innerHTML);
                mywindow.document.write('</td><td align="right">');
                mywindow.document.write(document.getElementById('inv_det').innerHTML);
                mywindow.document.write('</td></tr><tr><td colspan="2">');
                mywindow.document.write(document.getElementById('inv_tbl').innerHTML);
                mywindow.document.write('</td></tr><tr><td colspan="2">');
                mywindow.document.write(document.getElementById('inv_tnx').innerHTML);
                mywindow.document.write('</td></tr><tr><td colspan="2">');
                mywindow.document.write(document.getElementById('inv_note').innerHTML);
                mywindow.document.write('</td>');
                mywindow.document.write('</tr></table></body></html>');

                mywindow.document.close();
                

                return true;
            });
        </script>
    </div>
    <div class="invoice overflow-auto">
        <div id="inv1" style="min-width: 600px">
            <?php foreach ($generate_bill as $key => $generate_bill): ?>
                <header>
                    <div id="inv_logo" class="column-33">
                        <img src="http://hawkeyeforce.com/assets/images/hawkeye-touch-icon.png" data-holder-rendered="true" width="90" />
                    </div>
                    <div id="inv_head" class="column-66 company-details">
                        <h2 class="name">                  
                            HAWKEYE Security Force & Allied Forces
                        </h2>
                        <div>#10, Trustpuram 5th street, Kodambakkam, Chennai 600101, TN</div>
                        <div>(+91) 44 2484 6220  | info@hawkeyeindia.com</div>

                    </div>
                    <div id="inv_line" >
                        <div class="column-full divheader"></div>  
                    </div>
                </header>
                <main>
                    <div class="contacts">
                        <div id="inv_cli" class="column-66 invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to"><?= $generate_bill['name'] ?></h2>
                            <div class="h5">
                                <div class="address">
                                    <p class="mb-1"><?= $generate_bill['address'] ?><br><?= $generate_bill['city'] ?>, <?= $generate_bill['state'] ?>, <?= $generate_bill['country'] ?> - <?= $generate_bill['pincode'] ?></p>
                                </div>
                                <div class="email"><a href="<?= $generate_bill['email'] ?>"><?= $generate_bill['email'] ?></a></div>
                                <p class="mb-1"><span class="text-muted">GST: <?= $generate_bill['gst_no'] ?></span> -</p>
                                <p class="mb-1"><span class="text-muted">PAN: <?= $generate_bill['pan'] ?></span> -</p>
                            </div>
                        </div>
                        <div id="inv_det" class="column-33 invoice-details">
                            <h1 class="invoice-id">INVOICE <span class="small"> <?= $generate_bill['invoice_no'] ?></span></h1>
                            <div class="date">Date of Invoice: <?= $generate_bill['date'] ?></div>                        
                            <p class="mb-1">Billing Period:<?= $generate_bill['fromdate'] ?> to <?= $generate_bill['todate'] ?></p>
                            <div class="date">Due Date: <?= $generate_bill['duedate'] ?></div>
                        </div>
                    </div>
                    <div id="inv_tbl">
                        <div  class="inv2">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SAC Code</th>
                                        <th>Description</th>
                                        <th>No of Guards</th>
                                        <th>Man Days</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($generate_bill['itemizedbill'] as $key => $itemizedbill): ?>
                                        <tr>
                                            <td class="no" width="5%">1</td>
                                            <td width="7%">852152</td>
                                            <td class="text-left" width="37%"><?= $itemizedbill['product'] ?></td>
                                            <td width="5%"><?= $itemizedbill['quantity'] ?></td>
                                            <td width="5%"><?= $itemizedbill['total'] ?></td>
                                            <td class="qty" width="5%">&#x20B9 <?= $itemizedbill['rate'] ?></td>
                                            <td class="qty" width="6%">&#x20B9 <?= $itemizedbill['amount'] ?></td>
                                        </tr>

                                    <?php endforeach; ?>
                                    <tr class="info h3">
                                        <td >#</td>
                                        <td >-</td>
                                        <td >Total</td>
                                        <td ><?= $generate_bill['quantity'] ?></td>
                                        <td ><?= $generate_bill['mandays'] ?></td>
                                        <td class="qty">-</td>
                                        <td class="qty">&#x20B9 <?= $generate_bill['subtotal'] ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>                        
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">Amount Before Tax</td>
                                        <td colspan="2">&#x20B9 <?= $generate_bill['subtotal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">GST</td>
                                        <td colspan="2">
                                            <div class="font-weight-light">CGST(9%):&#x20B9  <?= $generate_bill['cgst'] ?></div>
                                            <div class="font-weight-light">SGST(9%): &#x20B9 <?= $generate_bill['sgst'] ?></div>
                                            <div class="font-weight-light">Total GST(18%): &#x20B9 <?= $generate_bill['gst'] ?></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border:0;"></td>
                                        <td colspan="2">TOTAL AMOUNT</td>
                                        <td colspan="2">&#x20B9 <?= $generate_bill['totalamount'] ?></td>
                                    </tr>
                                </tfoot>
                            </table></div>
                    </div>
                    <div id="inv_tnx"> <div class="thanks" > Thank you! </div></div>
                    <div id="inv_note" ><div class="notices">
                            <div>NOTICE:</div>
                            <div class="notice">A finance charge of 1.5% with additional penality charges of GST and EPF will be made on unpaid balances after 30 days.</div>
                        </div></div>
                </main>
            <?php endforeach; ?>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div> </div>
    </div>
</div>