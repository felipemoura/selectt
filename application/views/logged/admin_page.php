<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeInDown">

  <h1>Admin Section</h1>

  <h5>Here you can manage many things.</h5>

  <br><br>

  <div class="panel panel-default">
	  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin:7px; padding: 15px;">
	  	<h4>Legend</h4>

	  	<!-- Edit button -->
	    <button type="button" class="btn btn-xs btn-default">
	    	<span class="glyphicon glyphicon-pencil"></span> - Edit technique
		</button>

		<!-- Delete button -->
		<button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
	    	<span class="glyphicon glyphicon-trash"></span> - Delete technique
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
		        <th style="width:100px">Actions</th>
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
						 	<!-- Edit button -->
						    <button type="button" class="btn btn-xs btn-default">
						    	<span class="glyphicon glyphicon-pencil"></span>
							</button>

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
			<!-- <div class="btn-group"> -->
			  <div class="btn-group pull-right" style="margin: auto; text-align:center;">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Items per page <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      	<li><a href="#">5 </a></li>
				    <li class="active"><a href="#">10</a></li>
				    <li><a href="#">15 </a></li>
				    <li><a href="#">20 </a></li>
			    </ul>
			  <!-- </div> -->
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
