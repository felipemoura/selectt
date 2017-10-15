<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header'); ?>
	

<div class="container animated fadeIn">

  <h1>Available Techniques</h1>

  <h5>Here you can view the available techniques.</h5>
  <br>
  <br>

  <div class="panel panel-default">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin:7px; padding: 15px;">
	  	<h4>Legend</h4>
	  	<!-- View button -->
	  	<button type="button" class="btn btn-xs btn-primary">
	    	<span class="glyphicon glyphicon-eye-open"></span> - View technique information
		</button>
	</div>

	  
	<div class="panel-body" style="padding:0px">
		<table id="techniquesTable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="margin:0px">
		    
		    <thead>
		    	<tr>
			        <th>Testing Technique</th>
			        <th>Title</th>
			    	<th>Testing Approach</th>
			        <th>Language</th>
			        <th>Actions</th>
		        </tr>
			</thead>
	
			<tbody>

			<? if (isset($info)): ?>
				<?php foreach($info as $var) { ?>
					<tr>
						<td><?php echo $var['Technique']; ?></td>
						<td><?php echo $var['Title']; ?></td>
						<td><?php echo $var['Approach']; ?></td>
						<td><?php echo $var['Language']; ?></td>
						<td>
					 	<!-- View button -->
						    <button type="button" id="<?php echo $var['ID']; ?>" class="btn btn-xs btn-primary" onclick="openModal(this.id)">
						    	<span class="glyphicon glyphicon-eye-open"></span>
							</button>
						</td>   
					</tr>
				<?php } ?>
			<? endif; ?>
			</tbody> 
			
	    </table>
	  </div>  
	</div>
</div>

<?php foreach ($info as $var) { ?>
<!-- Modal -->
<div class="modal fade in" data-backdrop="static" id="<?php echo $var['ID']; ?>myInfo" data-keyboard="true" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title"><?php echo $var['Approach']; ?> Information</h2>

    	<button type="button" class="close" aria-label="Close" data-dismiss="modal">
      		<span aria-hidden="true">&times;</span>
    	</button>
      </div>
      
      <!-- Modal Content  -->
      <div class="modal-body">  
	    <div class="row">
	    <?php foreach ($var as $key => $item): ?>
			<? if ($key == "ID") { continue; } ?>

			<div class="col-lg-12 col-md-12 cold-sm-12 cold-xs-12">
				<!-- <?= $item; ?> -->
				<div class="form-group">
				  <label><?= $key; ?>:</label>

				  <? if ($key == "Reference"): ?>
					  <p><a href="http://<?= $item; ?>" target="_blank" ><?= $item; ?></a></p>
				  <? else: ?>
					  <p><?= $item; ?></p>
				  <? endif; ?>
				</div>
			</div>
	  	<?php endforeach; ?>
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
<?php } ?>

<!-- START OF FOOTER -->
<?	$this->load->view('templates/footer'); ?>

<script src="<?= base_url('assets/media/datatables/js/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/media/datatables/js/dataTables.bootstrap.min.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#techniquesTable').DataTable( {
			"order": [[ 0, "asc" ]],
			"pagingType": "full_numbers",

			"dom" : '<"col-lg-12 col-md-12 col-sm-12 col-xs-12"f>rt<"#footerTable.row"<"col-lg-3 col-md-3 col-sm-3 col-xs-3"i><"col-lg-3 col-md-3 col-sm-3 col-xs-3"l><"col-lg-6 col-md-6 col-sm-6 col-xs-6" <"pull-right">p>><"clear">',

			

			initComplete: function () {
				var count = 0;
				this.api().columns([0,2,3]).every( function () {
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

	function openModal(el) {
		$("#" + el + "myInfo").modal('show');
	}

</script>


<!-- END OF IT  -->
</body>
</html>