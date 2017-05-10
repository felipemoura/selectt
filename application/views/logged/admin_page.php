<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container animated fadeInDown">

  <h1>Admin Section</h1>

  <h5>Here you can manage many things.</h5>

  <br><br>

  <div class="panel panel-default">
	<div style="margin:7px; padding: 15px;">
        <div class="col-xs-6">
        	<div class="btn-group">
		        <a class="btn btn-primary"><span>New</span></a>
		        <a class="btn btn-warning"><span>Edit</span></a>
		        <a class="btn btn-danger"><span>Delete</span></a>
        	</div>
      	</div>
        	
    	<div class="col-xs-6 pull-right form-group">
            <input type="text" class="form-control" style="border-radius:0px" placeholder="Search">
        </div>
	    
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
						<?php foreach ($temp as $var) { ?>
							<td><?php echo $var; ?></td>
						<?php } ?>

						<td>
						 	<!-- Edit button -->
						    <button type="button" class="btn btn-xs btn-default">
						    	<span class="glyphicon glyphicon-pencil"></span>
							</button>

							<!-- Delete button -->
							<button type="button" data-bind="click: $parent.remove" class="remove-news btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
							    <span class="glyphicon glyphicon-trash"></span>
							</button>

							<!-- Approve button -->
							<button type="button" class="enabledisable-news btn btn-xs btn-success">
								<span class="glyphicon glyphicon-ok"></span>
							</button>
						</td>   
					</tr>
				<?php } ?>
			<? endif; ?>


			</tbody> 
	    </table>
	</div>
	  
  	<div class="panel-footer">
		<div class="col-xs-3">
			<div class="dataTables_info" id="example_info">Showing <?php echo $count." of ".$count ?> total results</div>
		</div>

	    <div class="col-xs-6">
			<div class="dataTables_paginate paging_bootstrap">
				<ul class="pagination pagination-sm" style="margin:0 !important">
					<li class="prev disabled">
						<a href="#">← Previous</a>
					</li>

					<li class="active">
						<a href="#">1</a>
					</li>
					
					<li>	
						<a href="#">2</a>
					</li>

					<li>
						<a href="#">3</a>
					</li>

					<li class="next disabled">
						<a href="#">Next → </a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="btn-group">
			<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
			    10 <span class="caret"></span>
			</button>

			<ul class="dropdown-menu" role="menu" style="min-width: 10px ">

			    <li><a href="#">5 </a></li>
			    <li class="active"><a href="#">10</a></li>
			    <li><a href="#">15 </a></li>
			    <li><a href="#">15 </a></li>

			</ul>
			<span>  items per page </span>
		</div>
	</div>
  </div>


</div>
