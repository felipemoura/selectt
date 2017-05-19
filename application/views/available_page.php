<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeInDown">

  <h1>Available Techniques</h1>

  <h6>Here you can view the available techniques.</h6>

  <br><br>

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
			    	<th>Technique name</th>
			        <th>Title</th>
			        <th>Technique</th>
			        <th>Language</th>
			        <th style="width: 80px">Actions</th>
		        </tr>
			</thead>
<!-- 		  	<tfoot>
	            <tr>
	                <th></th>
			        <th></th>
			        <th>Technique</th>
			        <th>Language</th>
			        <th></th>
	            </tr>
	        </tfoot> -->

			<tbody>

			<? if (isset($info)): ?>
				<?php foreach($info as $var) { ?>
					<tr>
						<td><?php echo $var['Approach']; ?></td>
						<td><?php echo $var['Title']; ?></td>
						<td><?php echo $var['Technique']; ?></td>
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
<div class="modal fade in" data-backdrop="static" id="<?php echo $var['ID']; ?>myInfo" tabindex="-1" role="dialog" aria-hidden="true">

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