<!---<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    #invoice{  padding: 10px;   }
    .invoice {        position: relative;        background-color: #FFF;        min-height: 680px;        padding: 35px    }
    .invoice header {        padding: 10px 0;        margin-bottom: 20px;           }
    .divheader { border-bottom: 1px solid #3989c6; }
    .invoice .company-details {        text-align: right;    }
    .invoice .company-details .name {        margin-top: 0;        margin-bottom: 0    }
    .invoice .contacts {        margin-bottom: 20px    }
    .invoice .invoice-to {        text-align: left    }
    .invoice .invoice-to .to {   margin-top: 0;    margin-bottom: 0;    }
    .invoice .invoice-details {        text-align: right;        margin-top: 52px;  margin-bottom: 20px;   }
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
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
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

<!--Author      : @arboshiki-->
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
            }); </script>
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
            <header>
                <div id="inv_logo" class="col-md-4">
                        <img src="http://localhost/hawki/hawkeye-w3-img/hawkeye-logo.png" data-holder-rendered="true" />
                </div>
                <div id="inv_head" class="col-md-8 company-details">
                    <h2 class="name">                  
                            <h1>HAWKEYE Security Force & Allied Forces</h1>
                    </h2>
                    <div>#10, Trustpuram 5th street, Kodambakkam, Chennai 600101, TN</div>
                    <div>(+91) 44 2484 6220  | info@hawkeyeindia.com</div>
                    <p class="font-weight-bold mb-1"><span class="text-muted">Bank Name: </span> HDFC <span class="text-muted">  IFSC: </span> 0001528</p> 
                    <p class="font-weight-bold mb-1"><span class="text-muted">Account No: </span> 152845215232 </p>
                    <p class="font-weight-bold mb-1"><span class="text-muted">GST IN: </span> 1425782 <span class="text-muted">PAN No</span> 10253642</p>
                </div><div id="inv_line" >
                    <div class="col-md-12 divheader"></div></div>
            </header>
            <main>
                <div class="contacts">
                    <div id="inv_cli" class="col-md-7 invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">Shri Sathya Sai Medical College & Research Institude</h2>
                        <div class="h5">
                        <div class="address">
                            <p class="mb-1">Thiruporur-Guduvancherry Main Road, Ammapettai, Nellikuppam Taluk, Kancheepuram Dt, TN</p>
                        </div>
                        <div class="email"><a href="mailto:john@example.com">hrd.sssmcri@gmail.com</a></div>
                        <p class="mb-1"><span class="text-muted">GST IN: </span> -</p>
                        <p class="mb-1"><span class="text-muted">PAN No</span> -</p>
                    </div>
                    </div>
                    <div id="inv_det" class="col-md-5 invoice-details">
                        <h1 class="invoice-id">INVOICE <span class="small"> 32-H/Nov/2018</span></h1>
                        <div class="date">Date of Invoice: 01/10/2018</div>                        
                        <p class="mb-1">Billing Period: 1 Sept to 31 Sept, 2018</p>
                        <div class="date">Due Date: 30/10/2018</div>
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
                            <th>Taxable Value</th>
                            <th>CGST Rate</th>
                            <th>CGST Amount</th>
                            <th>SGST Rate</th>
                            <th>SGST Amount</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no" width="10%">1</td>
                            <td width="10%">852152</td>
                            <td class="text-left" width="10%">Security Officer</td>
                            <td width="10%">2</td>
                            <td class="qty" width="10%">60</td>
                            <td width="10%">&#x20B9 17,000</td>
                            <td width="10%">&#x20B9 34,000</td>
                            <td width="10%">&#x20B9 34,000</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">&#x20B9 3060</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">&#x20B9 3060</td>
                            <td class="total" width="10%">&#x20B9 37,060</td>
                        </tr>
                        <tr>
                            <td class="no" width="10%">2</td>
                            <td width="10%">852152</td>
                            <td style="white-space:nowrap;" class="text-left" width="10%">Assistant Security Officer</td>
                            <td width="10%">4</td>
                            <td class="qty" width="10%">120</td>
                            <td width="10%">&#x20B9 15,000</td>
                            <td width="10%">&#x20B9 6012,000</td>
                            <td width="10%">&#x20B9 60,000</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">5400</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">5400</td>
                            <td class="total" width="10%">&#x20B9 70,800</td>
                        </tr>
                        <tr>
                            <td class="no" width="10%">3</td>
                            <td width="10%">852152</td>
                            <td class="text-left" width="10%">Security Guard</td>
                            <td width="10%">41</td>
                            <td class="qty" width="10%">1230</td>
                            <td width="10%">&#x20B9 12,500</td>
                            <td width="10%">&#x20B9 512,500</td>
                            <td width="10%">&#x20B9 512,500</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">46125</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">46125</td>
                            <td class="total" width="10%">&#x20B9 604,750</td>
                        </tr>
                        <tr>
                            <td class="no" width="10%">4</td>
                            <td width="10%">852152</td>
                            <td class="text-left" width="10%">Lady Guard</td>
                            <td width="10%">3</td>
                            <td class="qty" width="10%">90</td>
                            <td width="10%">&#x20B9 12,500</td>
                            <td width="10%">&#x20B9 37,500</td>
                            <td width="10%">&#x20B9 37,500</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">3375</td>
                            <td class="unit" width="10%">9%</td>
                            <td width="10%">3375</td>
                            <td class="total" width="10%">&#x20B9 44,250</td>
                        </tr><tr class="info h3">
                            <td >#</td>
                            <td >-</td>
                            <td >Total</td>
                            <td >50</td>
                            <td >1500</td>
                            <td >&#x20B9 -</td>
                            <td>&#x20B9 644,000</td>
                            <td >&#x20B9 644,000</td>
                            <td >9%</td>
                            <td width="10%">&#x20B9  57,960</td>
                            <td >9%</td>
                            <td width="10%">&#x20B9  57,960</td>
                            <td>&#x20B9  759,920</td>
                        </tr>
                    </tbody>
                    <tfoot>                        
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="3">Amount Before Tax</td>
                            <td colspan="3">&#x20B9 644,000</td>
                        </tr>
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="3">GST</td>
                            <td colspan="3">
                                <div class="font-weight-light">CGST(9%):&#x20B9  57,960</div>
                                <div class="font-weight-light">SGST(9%): &#x20B9 57,960</div>
                                <div class="font-weight-light">Total GST(18%): &#x20B9 115,920</div></td>
                        </tr>
                        <tr>
                            <td colspan="7"></td>
                            <td colspan="3">TOTAL AMOUNT</td>
                            <td colspan="3">&#x20B9 759,920</td>
                        </tr>
                    </tfoot>
                </table></div></div>
                <div id="inv_tnx"> <div class="thanks" > Thank you! </div></div>
                <div id="inv_note" ><div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% with additional penality charges of GST and EPF will be made on unpaid balances after 30 days.</div>
                    </div></div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div> </div>
    </div>
</div>