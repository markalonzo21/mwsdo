<?php include'header.php'; ?>
<div class="content-heading">
    <h1 class="title">Dashboard</h1>
    <?php include 'content_heading.php'; ?>
</div>
            <div id="dashz">   
                <ul id="dash">
                    
                    <h1 style="margin-left:10px;"></h1>
                    <li>
                        <div class="card donation-card">
                            <div><h4 class="card-title donation-title">No. of Donations</h4></div>
                            <div><h1 class="card-title donation-title"><?php echo number_format($dn_c); ?></h1></div>
                        </div>
                    </li>
                    <li>
                        <div class="card request-card">
                            <div><h4 class="card-title request-title">No. of Requests</h4></div>
                            <div><h1 class="card-title request-title"><?php echo number_format($r_c); ?></h1></div>
                        </div>
                    </li> 
                    <li>
                        <div class="card donors-card">
                            <div><h4 class="card-title donors-title">No. of Donors</h4></div>
                            <div><h1 class="card-title donors-title"><?php echo number_format($d_c); ?></h1></div>
                        </div>
                    </li> 
                    <li>
                        <div class="card bene-card">
                            <div><h4 class="card-title bene-title">No. of Beneficiaries</h4></div>
                            <div><h1 class="card-title bene-title"><?php echo number_format($b_c); ?></h1></div>
                        </div>
                    </li> 
                </ul>
                <hr>
                <h1 style="margin-left:10px;">Print Reports</h1>
                <ul id="print">
                    <a href='#' data-target='#dateRangeModal' data-toggle='modal' data-print='d'> <li><i class='fa fa-print'></i> Print List Of Donation</li></a>
                    <a href='#' data-target='#dateRangeModal' data-toggle='modal' data-print='r'> <li><i class='fa fa-print'></i> Print List Of Request</li></a>
                    <a href='#' data-target='#filterModal' data-toggle='modal'><li><i class='fa fa-print'></i> Print List Of Beneficiaries</li></a>
                </ul>
            </div> 

            <!-- <div id="graph">
                <h1>Graphs</h1>
                <ul class="graph"> 
                    <li>
                        <div class="headz head_" style="background-color:green;">Donations</div>
                        <div style="height:47px;background-color:greenyellow;" id="don"></div>
                    </li>
                     <li>
                        <div class="headz head_" style="background-color:gold;" >Requests</div>
                        <div style="height:47px;background-color:orange;" id="req"></div>
                    </li>
                    <li>
                        <div class="headz head_" style="background-color:dodgerblue;">Donors  </div>
                        <div style="height:47px;background-color:lightblue;" id="donox"></div>
                    </li> <li>
                        <div class="headz head_" style="background-color:firebrick;">Benefeciaries</div>
                        <div style="height:47px;background-color:crimson;"  id="bene"></div>
                    </li>
                </ul>
            </div> -->
        <button id="menux"> 
            Menu
        </button>

<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Print List Of Beneficiaries</h4>
    </div>
    <div class="modal-body">

          <form class="form-donation" id="update_userz" action="user.php" method="post">
              <div class="row">
                      <div class="form-group col-md-12 ">
                        <label for="brgy">Select Barangay</label>
                        <select name="brgy" id="brgy" class="form-control">
                            <option value="all">All Barangay</option>
                            <option value="angatel">Angatel</option>
                            <option value="balangay">Balangay</option>
                            <option value="baug">Baug</option>
                            <option value="bayaoas">Bayaoas</option>
                            <option value="bituag">Bituag</option>
                            <option value="camambugan">Camambugan</option>
                            <option value="dalanguiring">Dalanguiring</option>
                            <option value="duplac">Duplac</option>
                            <option value="galarin">Galarin</option>
                            <option value="gueteb">Gueteb</option>
                            <option value="malaca">Malaca</option>
                            <option value="malayo">Malayo</option>
                            <option value="malibong">Malibong</option>
                            <option value="pasibi east">Pasibi East</option>
                            <option value="pasibi west">Pasibi West</option>
                            <option value="pisuac">Pisuac</option>
                            <option value="poblacion">Poblacion</option>
                            <option value="real">real</option>
                            <option value="salavante">Salavante</option>
                            <option value="sawat">Sawat</option>
                        </select>
                      </div>
              </div>
                  <div class="row">
                      <div class="form-group col-md-12">
                            <a onclick='printBene()' target="blank" href="#" class="btn btn-success pull-right"><i class='fa fa-print'></i> Generate Report</a>
                      </div>

                  </div> 
          </form>

    </div>
  </div>
</div> 
</div> <!-- /.modal -->

<div class="modal fade" id="dateRangeModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Select Date Range</h4>
    </div>
    <div class="modal-body">

          <form class="form-donation" id="update_userz" action="user.php" method="post">
              <div class="row">
                      <div class="form-group col-md-12 "> 
                        <label for="dateRange">Select Date</label>
                        <input type="text" class="form-control" name="dateRange" id="dateRange" required>
                      </div>
              </div>
                  <div class="row">
                      <div class="form-group col-md-12">
                            <a onclick='print()' href="#" class="btn btn-success pull-right"><i class='fa fa-print'></i> Generate Report</a>
                      </div>

                  </div> 
          </form>

    </div>
  </div> 
</div> <!-- /.modal -->
</div>
</div>
    </body>
        </html>
<script>
    let startDate = '';
    let endDate = '';
    let printType = ''
    $('#dateRangeModal').on('show.bs.modal', function (e) {
        let btn = $(e.relatedTarget);
        printType = btn.data('print');

        let modal = $(this);
        modal.find('.modal-title').text(printType === 'd' ? 'Print List Of Donation' : 'Print List Of Request');
    })

    $('input[name="dateRange"]').daterangepicker({
        locale: {format: 'll'}
    }, function(start, end, label) {
        startDate = start.format('YYYY-MM-DD');
        endDate = end.format('YYYY-MM-DD');
        console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

    function print(){
        console.log('startDate: ', startDate);
        console.log('endDate: ', endDate);
        console.log('print: ', printType);
        window.open("print.php?print="+printType+"&start="+startDate+"&end="+endDate);
    }

    function printBene(){
        window.open("print.php?print=b&brgy="+ brgy.value, '_blank');
    }
    
    // function sizez(){ 
    //     contx.style.width=(window.innerWidth-260)+"px";
    //     if(document.querySelector('body').offsetWidth>1200){
    //     graph.style.width=(dash.getElementsByTagName('li')[0].offsetWidth*4+10)+"px";
    //     }else{
    //         graph.style.width="90%";
    //     }
    // }
    
    // window.onload=()=>{
    //     sizez();
    //     don.style.width="<?php echo ($d_c/$max)*100; ?>%";
    //     bene.style.width="<?php echo ($b_c/$max)*100; ?>%";
    //     req.style.width="<?php echo ($r_c/$max)*100; ?>%";
    //     donox.style.width="<?php echo ($dn_c /$max)*100; ?>%";
    // }
</script>