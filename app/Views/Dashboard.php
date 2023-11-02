<style>
    .dashboard {
        background: #f9f9f9;
    }
    .panels h2 {
        margin-bottom: 15px;
        font-family: Montserrat;
        font-weight: 700;
        color: #80808b;
    }
    .panel-span {
        float: right; font-size: 14px; font-weight: lighter;
    }
    .inner-panel {
        border:1px solid #f1f1f1; margin: 10px; padding: 5px; border-left:10px solid; border-radius: 3px; 
        font-family: Montserrat;
    }
    .inner-panel-gross {
        border:1px solid #fff; margin-top:15px; margin-bottom: 30px; border-left:7px solid #fff;
    }
    .inner-panel h3 {
         font-size: 18px;
    }
    .inner-panel p {
        color: #afb4c0; font-size: 15px; padding: 2px;
    }
    .border-left-5bc0de {
        border-left-color: #5bc0de;
    }
    .border-left-5cb85c {
        border-left-color: #5cb85c;
    }
    .border-left-f0ad4e {
        border-left-color: #f0ad4e;
    }
    .border-left-d9534f {
        border-left-color: #d9534f;
    }
    .cb-balance table {
        margin: 13px; padding: 20px; width: 100%;
    }
    .cb-balance table tr{
        /*background-color: #f7f6f3;*/
        opacity: 0.7;
    }
    .cb-balance table tr:nth-child(even) {
        /*background-color: #e2e4e7;*/
        opacity: 1;
    }
    .cb-balance table tr td{
        width: 40%;
        padding: 6px;
    }
    .panels table tr td:nth-child(even) {
        width: 60%;
        text-align: right;        
    }
    #top_x_div svg > g >rect {  /*#salesChart is ID of your google chart*/
        fill: transparent;
    }
    #top_x_div svg > g >path {  /*#salesChart is ID of your google chart*/
        fill: green;
    }
    #piechart_3d svg > rect {
        fill:transparent;
    }
    
</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon"><i  class="material-icons">request_page</i></div>
                  <p class="card-category">INVOICES</p>
                  <h3 class="card-title">&#x20B9;.-<small></small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">send</i>
                    <a href="javascript:;">See all the bills for the current month...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">markunread_mailbox</i>
                  </div>
                  <p class="card-category">Outstandings</p>
                  <h3 class="card-title">&#x20B9;.-</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">                    
                    <i class="material-icons">send</i>paid and outstanding Invoices
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">chrome_reader_mode</i>
                  </div>
                  <p class="card-category">Expense Bills</p>
                  <h3 class="card-title">&#x20B9;.-</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> get more details
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_balance_wallet</i>
                  </div>
                  <p class="card-category">Gross Profit</p>
                  <h3 class="card-title">&#x20B9;.-</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                      <script type="text/javascript">
                        google.charts.load("current", {packages:["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['Details', 'Expense'],
                            ['Salary',    234900],
                            ['Electricty',      500],
                            ['Transporation',  13500],
                            ['Printing', 300],
                            ['Rent',    6500],
                            ['Telephone',    700]
                          ]);

                          var options = {
                            title: 'Expense',
                            is3D: true,
                          };

                          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                          chart.draw(data, options);
                        }
                      </script>
                  <!-- <div class="ct-chart" id="piechart_3d"></div> -->
                </div>
                  <div class="card-body">
                      <h4 class="card-title">Expense <span class="panel-span"> Last 30 days <i class="fa fa-arrow-down"></i></span></h4>
                    <!--   <p class="card-category">
                          <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>   -->                   
                  </div>
                <div class="card-footer">
                  <div class="stats">
                  <!--  <i class="material-icons">access_time</i> updated 4 minutes ago -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning"><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                  <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawStuff);

                    function drawStuff() {
                      var data = new google.visualization.arrayToDataTable([
                        ['Months', 'Turnover'],
                        ["July", 300815],
                        ["June", 300000],
                        ["May", 275000],
                        ["April", 305000],
                        ['March', 450000],
                        ['February', 457800]
                      ]);

                      var options = {
                        title: '',
                        legend: { position: 'none' },
                        chart: { title: '',
                                 subtitle: '' },
                        bars: 'vertical', // Required for Material Bar Charts.
                        axes: {
                          x: {
                            0: { side: 'top', label: ''} // Top x-axis.
                          }
                        },
                        bar: { groupWidth: "90%" , fill: "green"},
                      };

                      var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                      chart.draw(data, options);
                    };
                  </script>
                  <!-- <div class="ct-chart" id="top_x_div"></div> -->
                </div>
                <div class="card-body">
                  <h4 class="card-title">Monthly Turn Over <span class="panel-span"> Last 6 months <i class="fa fa-arrow-down"></i></span></h4>
                  <p class="card-category">Last Campaign Performance</p>                  
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <!-- <i class="material-icons">access_time</i> campaign sent 2 days ago -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="cb-balance">
                  <table>
                      <tr>
                          <td>HDFC</td>
                          <td>&#x20B9 -</td>
                      </tr>
                      <tr>
                          <td>TMB</td>
                          <td>&#x20B9 -</td>
                      </tr>
                      <tr>
                          <td>Karnataka</td>
                          <td>&#x20B9 -</td>
                      </tr>
                      <tr>
                          <td>KVB</td>
                          <td>&#x20B9 -</td>
                      </tr>        
                      <tr>
                          <td>Cash A/c</td>
                          <td>&#x20B9 -</td>
                      </tr>
                      <tr>
                          <td>Suspense A/c</td>
                          <td>&#x20B9 -</td>
                      </tr>
                  </table>
                  </div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Cash/ Bank Balance</h4>
                  <p class="card-category">Last Campaign Performance</p>                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Tasks:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">bug_report</i> Bugs
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">code</i> Website
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> Server
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
                                  <input class="form-check-input" type="checkbox" value="">
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
                            <td>Create 4 Invisible User Experiences you Never Knew About</td>
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
            </div> -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Employees List</h4>
                  <p class="card-category">New employees from August, 2023</p>
                </div>
                <div class="card-body table-responsive">
                  <?= $emp ?>
                <!-- <table class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Salary</th>
                      <th>Country</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Dakota Rice</td>
                        <td>$36,738</td>
                        <td>Niger</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Minerva Hooper</td>
                        <td>$23,789</td>
                        <td>Curaçao</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Sage Rodriguez</td>
                        <td>$56,142</td>
                        <td>Netherlands</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Philip Chaney</td>
                        <td>$38,735</td>
                        <td>Korea, South</td>
                      </tr>
                    </tbody>
                  </table> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>