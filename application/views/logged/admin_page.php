<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeInDown">

  <h1>Admin Section</h1>

  <h5>Here you can manage many things.</h5>

  <br><br>

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
		<button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
	    	<span class="glyphicon glyphicon-trash"></span> - Delete technique from database
		</button>
		
		<!-- Approve button -->
		<button type="button" class="btn btn-xs btn-success">
			<span class="glyphicon glyphicon-ok"></span> - Approve technique
		</button>	
	   </div>

	  
	<div class="panel-body" style="padding:0px">
		<table class="table table-striped table-bordered" style="margin:0px">
		    <thead>
		    	<tr>
		    	<th>ID</th>
		        <th>Technique name</th>
		        <th>Title</th>
		        <th>Year</th>
		        <th style="width:130px">Actions</th>
		        </tr>
			</thead>

			<tbody>
			<? if (isset($info)): ?>
				<?php foreach($info as $temp) { ?>
					<tr>
						<td><?php echo $temp['id']; ?></td>
						<td><?php echo $temp['name']; ?></td>
						<td><?php echo $temp['title']; ?></td>
						<td><?php echo $temp['year']; ?></td>
						<td>
						 	
						 	<!-- View button -->
						 	<a href="admin/showInfo/<?php echo $temp['id']; ?>">
							    <button type="button" class="btn btn-xs btn-primary">
							    	<span class="glyphicon glyphicon-eye-open"></span>
								</button>
							</a>

						 	<!-- Edit button -->
						 	<a href="admin/showEditInfo/<?php echo $temp['id']; ?>">
							    <button type="button" class="btn btn-xs btn-default">
							    	<span class="glyphicon glyphicon-pencil"></span>
								</button>
							</a>

							<!-- Delete button -->
							<a href="admin/deleteRecord/<?php echo $temp['id']; ?>">
								<button onclick="return confirm('Are you sure you want to delete?');" type="button" data-bind="click: $parent.remove" class="remove-news btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
							    	<span class="glyphicon glyphicon-trash"></span>
								</button>
							</a>

							
							<?php if($temp['approval'] == 1) : ?>
								<!-- Approve button -->
								<a href="admin/approveRecord/<?php echo $temp['id']; ?>">
									<button onclick="return confirm('Are you sure you want to approve this technique ?');" type="button" class="enabledisable-news btn btn-xs btn-success">
										<span class="glyphicon glyphicon-ok"></span>
									</button>
								</a>
							<?php endif; ?>
						</td>   
					</tr>
				<?php } ?>
			<? endif; ?>
			</tbody> 
	    </table>
	</div>
	  
  	<div class="panel-footer" style="min-height: 70px;">
		<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
			<div class="dataTables_info" id="example_info" style="padding: 12px;">
				Showing <?php echo $count." of ".$count ?> total results
			</div>
		</div>

	    <div class="col-md-offset-2 col-md-4 col-lg-4 col-lg-offset-2 col-sm-4 col-sm-offset-2 col-xs-4 col-xs-offset-2">
			<div class="dataTables_paginate paging_bootstrap" style="padding: 7px;">
				<ul class="pagination pagination-sm" style="margin:0 !important">
					<li class="prev disabled">
						<a href="#">← Previous</a>
					</li>

					<li class="active">
						<a href="#">1</a>
					</li>
					
					<!-- <li>	
						<a href="#">2</a>
					</li>

					<li>
						<a href="#">3</a>
					</li> -->

					<li class="next disabled">
						<a href="#">Next → </a>
					</li>
				</ul>
			</div>
		</div>
		
	  	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		  <div class="btn-group pull-right" style="margin: auto; text-align:center;">
		    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
		    Items per page <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu" role="menu">
		      	<li><a href="#">5 </a></li>
			    <li class="active"><a href="#">10</a></li>
			    <li><a href="#">15 </a></li>
			    <li><a href="#">20 </a></li>
		    </ul>
		  </div>
		</div>
	</div>
<!-- 
		<div class="btn-group pull-right">
			<span>  items per page </span>

			<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
			    10 <span class="caret"></span>
			</button>

			<ul class="dropdown-menu" role="menu" style="min-width: 100px ">

			    <li><a href="#">5 </a></li>
			    <li class="active"><a href="#">10</a></li>
			    <li><a href="#">15 </a></li>
			    <li><a href="#">20 </a></li>

			</ul>
		</div> -->

  </div>
</div>



<!-- Modal -->
<? if (isset($modal)): ?>
	<!-- Show information -->
	<? if($this->uri->segment(2)=="showInfo"): ?>
	<div class="animated fadeInDown modal fade in" data-backdrop="static" data-keyboard="false" id="myInfo" tabindex="-1" role="dialog" aria-hidden="true">

	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title">View technique information</h2>

	        <a href="<?php echo site_url('admin') ?>">
	        	<button type="button" class="close" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	        </a>
	      </div>
	      
	      <div class="modal-body">
	        
	          <!-- Technique name -->
			  <div class="form-group">
			    <label for="inputApproach">Technique name:</label>
			    <input type="text" class="form-control" id="inputApproach" name="inputApproach" aria-describedby="titleHelp" placeholder="Enter Technique name" disabled>
			    <span class="text-danger"><?php echo form_error('inputApproach'); ?></span>
			  </div>
			  
			  <!-- Title -->
			  <div class="form-group">
			    <label for="inputTitle">Title:</label>
			    <input type="text" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="titleHelp" placeholder="Enter project Title" disabled>
			    <span class="text-danger"><?php echo form_error('inputTitle'); ?></span>
			  </div>

			  <div class="row">
		        <div class="col-lg-6 col-md-4 cold-sm-12 cold-xs-12">
		          <!-- Year -->
		          <div class="form-group">
		            <label for="inputYear">Select year of publication:</label>
		            <select class="form-control" id="inputYear" name="inputYear" disabled></select>
		            <span class="text-danger"><?php echo form_error('inputYear'); ?></span>
		          </div>
		        </div>

		        <div class="col-lg-6 col-md-3 cold-sm-12 cold-xs-12">
		            <!-- PDF file -->
		            <div class="form-group">
		              <label for="inputArticlePDF">Paper PDF file</label>
		              <input type="file" class="form-control-file" id="inputArticlePDF" name="inputArticlePDF" aria-describedby="fileHelp" disabled>

		              <small id="fileHelp" class="form-text text-muted">Max file size, 2 MB</small>
		              <span class="text-danger"><?php echo form_error('inputArticlePDF'); ?></span>
		            </div>
		        </div>
			  </div>

			  <?php foreach ($id as $key => $item): ?>
			    <div class="row">
			      <div class="col-lg-12 col-md-12 cold-sm-12 cold-xs-12">
			        <!-- <?= $item; ?> -->
			        <div class="form-group">
			          <label for="<?= $item; ?>"><?= $name[$key]; ?>:</label>
			          <textarea class="form-control" id="<?= $item; ?>" name="<?= $item; ?>" placeholder="Enter <?= $name[$key]; ?>" rows="5" disabled></textarea>
			          <span class="text-danger"><?php echo form_error($item); ?></span>
			        </div>
			      </div>
			     </div>
			  <?php endforeach; ?>
	      </div>
	      
	      <!-- Close view information -->
	      <div class="modal-footer">
		         <a href="<?php echo site_url('admin') ?>">
		         	<button type="button" class="btn btn-block btn-success">Close</button>
		         </a>
	      </div>
	      <!-- End modal contet -->
	    </div>
	    <!-- End modal dialog -->
	  </div>
	    <!-- End modal -->
	</div>

	<? endif; ?>

	<!-- Show Edit info -->
	<? if($this->uri->segment(2)=="showEditInfo"): ?>

  	

	<div class="animated fadeInDown modal fade in" data-backdrop="static" data-keyboard="false" id="myInfo" tabindex="-1" role="dialog" aria-hidden="true">

	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title">Edit technique information</h2>

	        <a href="<?php echo site_url('admin') ?>">
	        	<button type="button" class="close" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	        </a>
	      </div>
	      
	      <div class="modal-body">
	         <?php echo form_open_multipart('admin/updateRecord/'.$modal);?>
	         
	          <!-- Technique name -->
			  <div class="form-group">
			    <label for="inputApproach">Technique name:</label>
			    <input type="text" class="form-control" id="inputApproach" name="inputApproach" aria-describedby="titleHelp" placeholder="Enter Technique name" required focus>
			    <span class="text-danger"><?php echo form_error('inputApproach'); ?></span>
			  </div>
			  
			  <!-- Title -->
			  <div class="form-group">
			    <label for="inputTitle">Title:</label>
			    <input type="text" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="titleHelp" placeholder="Enter project Title" required focus>
			    <span class="text-danger"><?php echo form_error('inputTitle'); ?></span>
			  </div>

			  <div class="row">
			        <div class="col-lg-4 col-md-4 cold-sm-12 cold-xs-12">
			          <!-- Year -->
			          <div class="form-group">
			            <label for="inputYear">Select year of publication:</label>
			            <select class="form-control" id="inputYear" name="inputYear"></select>
			            <span class="text-danger"><?php echo form_error('inputYear'); ?></span>
			          </div>
			        </div>

			        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			          <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
			            <label class="form-check-label">
			              <input type="checkbox" name="checkinputYear" id="checkinputYear" class="form-check-input" onchange="toggleCheckbox(this)" value="1">
			              No information
			            </label>
			          </div>
			        </div>

			        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 cold-sm-12 cold-xs-12">
			            <!-- PDF file -->
			            <div class="form-group">
			              <label for="inputArticlePDF">Paper PDF file</label>
			              <input type="file" class="form-control-file" id="inputArticlePDF" name="inputArticlePDF" aria-describedby="fileHelp">

			              <small id="fileHelp" class="form-text text-muted">Max file size, 2 MB</small>
			              <span class="text-danger"><?php echo form_error('inputArticlePDF'); ?></span>
			            </div>
			        </div>

			        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
			          <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
			            <label class="form-check-label">
			              <input type="checkbox" name="checkinputArticlePDF" id="checkinputArticlePDF" class="form-check-input" onchange="toggleCheckbox(this)" value="1">
			              No information
			            </label>
			          </div>
			        </div>
			  </div>

			  <?php foreach ($id as $key => $item): ?>
			    <div class="row">
			      <div class="col-lg-9 col-md-8 cold-sm-12 cold-xs-12">
			        <!-- <?= $item; ?> -->
			        <div class="form-group">
			          <label for="<?= $item; ?>"><?= $name[$key]; ?>:</label>
			          <textarea class="form-control" id="<?= $item; ?>" name="<?= $item; ?>" placeholder="Enter <?= $name[$key]; ?>" rows="5"></textarea>
			          <span class="text-danger"><?php echo form_error($item); ?></span>
			        </div>
			      </div>

			      <!--  <?= $item; ?> checkbox  -->
			      <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
			          <div class="form-check pull-right" style="margin: auto;  padding: 30px 0; text-align: center;">
			            <label class="form-check-label">
			              <input type="checkbox" name="check<?= $item; ?>" id="check<?= $item; ?>" class="form-check-input" onchange="toggleCheckbox(this)" value="1"> No information
			            </label>
			          </div>
			      </div>
			    </div>
			  <?php endforeach; ?>

	      </div>
	      
	      <!-- Save or close edit -->
	      <div class="modal-footer">
	           	<button type="submit" class="btn btn-danger">Save changes</button>

		         <a href="<?php echo site_url('admin') ?>">
		         	<button type="button" class="btn btn-success">Close</button>
		         </a>
	      </div>

	      <!-- End modal contet -->
	    </div>
	    <!-- End modal dialog -->
	  </div>
	    <!-- End modal -->
	</div>

 	<? endif; ?>
<? endif; ?>

<script type="text/javascript">
    function toggleCheckbox(el) {
      var theId = el.id.replace("check","");

      if( el.checked ){
         $("#" + theId).prop('disabled', true);
      }else{
         $("#" + theId).prop('disabled', false);
      }
    }
</script>

