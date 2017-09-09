<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header'); ?>

<div class="container animated fadeIn">
    <h1>Admin Section</h1>
    <h5>Manage many things and get some information</h5>

    <div class="page-content">
      <div class="row">
    	
        <? $this->load->view('templates/admin_nav'); ?>

        <div class="col-lg-10 col-md-10">
          <?php echo $this->session->flashdata('msg'); ?>
          <div class="content-box-large">
            <div class="panel panel-default">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin:7px; padding: 15px;">
                    <h4>Legend</h4>

                    <!-- View button -->
                    <button type="button" class="btn btn-xs btn-primary">
                        <span class="glyphicon glyphicon-eye-open"></span> - View technique information
                    </button>

                    <!-- Edit button -->
                    <button type="button" class="btn btn-xs btn-default">
                        <span class="glyphicon glyphicon-pencil"></span> - Edit technique information
                    </button>

                    <!-- Delete button -->
                    <button type="button" class="btn btn-xs btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> - Delete technique from database
                    </button>
                    
                    <!-- Approve button -->
                    <button type="button" class="btn btn-xs btn-success">
                        <span class="glyphicon glyphicon-ok"></span> - Approve technique
                    </button>   
                </div>

                  
                <div class="panel-body" style="padding:0px; font-size: 8pt;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="techniquesTable">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Technique Title</th>
                            <th>Year</th>
                            <th>Inserted By</th>
                            <th>Inserted On</th>
                            <th style="width: 120px;">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <? if (isset($info)): ?>
                            <?php foreach($info as $temp) : ?>
                                <tr>
                                    <td><?php echo $temp['id']; ?></td>
                                    <td><?php echo $temp['title']; ?></td>
                                    <td><?php echo $temp['year']; ?></td>
                                    <td><?php echo $temp['insertedBy']; ?></td>
                                    <td><?php echo $temp['insertedOn']; ?></td>
                                   
                                    <td>
                                        <!-- View button -->
                                        <button type="button" class="btn btn-xs btn-primary" id="<?php echo $temp['id']; ?>" onclick="openModal(this.id)">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                        <!-- </a> -->

                                        <!-- Edit button -->
                                        <a href="<?php echo base_url('admin/editTechnique/'. $temp['id']); ?>">
                                        <button type="button" class="btn btn-xs btn-default" id="<?php echo $temp['id']; ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        </a>

                                        <!-- Delete button -->
                                        <a href="<?php echo base_url('admin/deleteTechnique/'. $temp['id']); ?>">
                                            <button onclick="return confirm('Are you sure you want to delete <?php echo $temp['title']; ?>?');" type="button" data-bind="click: $parent.remove" class="remove-news btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </a>

                                        <?php if($temp['needApproval'] == 1) : ?>
                                            <!-- Approve button -->
                                            <a href="<?php echo base_url('admin/approveTechnique/'. $temp['id']); ?>">
                                                <button onclick="return confirm('Are you sure you want to approve <?php echo $temp['title']; ?> technique ?');" type="button" class="enabledisable-news btn btn-xs btn-success">
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                    </td>   

                                </tr>
                            <?php endforeach; ?>
                            <? endif; ?>
                        </tbody> 
                    </table>
                <!-- End panel body-->
                </div>
            
            <!-- End Panel -->
            </div>
          <!-- End context -->
          </div>
        <!-- End cols -->
        </div>
      <!-- End row -->
	  </div>
    <!-- End Page content -->
    </div>
</div>


<!-- Modal -->
<div class="modal fade in" data-backdrop="static" id="myInfo" data-keyboard="true" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title"> Information</h2>

        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- Modal Content  -->
      <div class="modal-body">  
        <div class="row">
        </div>
      </div>

      <!-- Close view information -->
      <div class="modal-footer">
         <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Close</button>
      </div>
      <!-- End modal contet -->
    </div>
    <!-- End modal dialog -->
  </div>
    <!-- End modal -->
</div>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer');?>

<script src="<?= base_url('assets/media/datatables/js/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/media/datatables/js/dataTables.bootstrap.min.js'); ?>" type="text/javascript"></script>


<!-- JAVA SCRIPT -->
<script type="text/javascript">

    $(document).ready(function() {
        $('#techniquesTable').DataTable(     {
            "order": [[ 0, "asc" ]],
            "pagingType": "full_numbers",
            "dom" : '<"col-lg-12 col-md-12 col-sm-12 col-xs-12"f>rt<"#footerTable.row"<"col-lg-3 col-md-3 col-sm-3 col-xs-3"i><"col-lg-3 col-md-3 col-sm-3 col-xs-3"l><"col-lg-6 col-md-6 col-sm-6 col-xs-6" <"pull-right">p>><"clear">',

            initComplete: function () {
                var count = 0;
                this.api().columns([2,3,4]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Show all</option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );

                } );
            }
        });
    } );

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }


    function openModal(el) {
        let id = el;
        let data;
        let httpRequest;

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
          httpRequest = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE 8 and older
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }

        httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState === 4) {
                if (httpRequest.status === 200) {
                    let modalHTML = "";

                    let data = JSON.parse(httpRequest.responseText);
                    $.each(data, function(index, value) {
                        modalHTML += '<div class="form-group"><label>' + capitalizeFirstLetter(index) + '</label><p class="form-control-static">' + value + '</p></div>';
                    });

                    $('#myInfo .modal-body').empty().append(modalHTML);

                } else {
                    let errorHTML = '<div class="alert alert-danger" style="text-align: center;">' +  httpRequest.responseText +'</div>';
                    $('#myInfo .modal-body').empty().append(errorHTML);
                }
            }
        };

        httpRequest.open('GET', window.location.origin + '/selectt/api/technique/id/' + id, false);
        httpRequest.send(null);
        $("#myInfo").modal('show');
    }

</script>

<!-- END OF IT -->

</body>
</html>