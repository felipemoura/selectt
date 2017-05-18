<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


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
		<table class="table table-striped table-bordered" style="margin:0px">
		    <thead>
		    	<tr>
		    	<th>Technique name</th>
		        <th>Title</th>
		        <th>Technique</th>
		        <th>Language</th>
		        <th style="width: 80px">Actions</th>
		        </tr>
			</thead>

			<tbody>
			<? if (isset($info)): ?>
				<?php foreach($info as $temp) { ?>
					<tr>
						<td><?php echo $temp['approach']; ?></td>
						<td><?php echo $temp['title']; ?></td>
						<td><?php echo $temp['technique']; ?></td>
						<td><?php echo $temp['language']; ?></td>
						<td>
						 	
						 	<!-- View button -->
						 	<a href="available-techniques/showInfo/<?php echo $temp['id']; ?>">
							    <button type="button" class="btn btn-xs btn-primary">
							    	<span class="glyphicon glyphicon-eye-open"></span>
								</button>
							</a>

						</td>   
					</tr>
				<?php } ?>
			<? endif; ?>
			</tbody> 
	    </table>
	  </div>  
	</div>
</div>




<? if (isset($modal)): ?>
<!-- Modal -->
<div class="animated fadeInDown modal fade in" data-backdrop="static" data-keyboard="false" id="myInfo" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">View technique information</h2>

        <a href="<?php echo site_url('available-techniques') ?>">
        	<button type="button" class="close" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
        </a>
      </div>
      
      <!-- Modal Content  -->
      <div class="modal-body">  
		  <?php foreach ($result as $key => $item): ?>
		    <div class="row">
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
		     </div>
		  <?php endforeach; ?>
      </div>
      

      <!-- Close view information -->
      <div class="modal-footer">
         <a href="<?php echo site_url('available-techniques') ?>">
         	<button type="button" class="btn btn-block btn-danger">Close</button>
         </a>
      </div>
      <!-- End modal contet -->
    </div>
    <!-- End modal dialog -->
  </div>
    <!-- End modal -->
</div>

<? endif; ?>
</div>
