<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>

<div class="container animated fadeIn">
    <h1>Admin Section</h1>
    <h5>Manage many things and get some information</h5>

    <div class="page-content">
      <div class="row">
    	  <div class="col-lg-2 col-md-2">
    	  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li>
                    	<a href="<?= base_url('admin/dash'); ?>">
                            <i class="glyphicon glyphicon-home"></i> Dashboard
                        </a>
                    </li>

                    <li class="current">
                    	<a href="<?= base_url('admin/techniques'); ?>">
                    		<i class="glyphicon glyphicon-hdd"></i>Techniques
                    	</a>
                   	</li>

                    <li>
                    	<a href="<?= base_url('admin/users'); ?>">
                    		<i class="glyphicon glyphicon-user"></i>Users
                    	</a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/content'); ?>">
                            <i class="glyphicon glyphicon-edit"></i>Content
                        </a>
                    </li>
               
                </ul>
             </div>
    	</div>

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

                  
                <div class="panel-body" style="padding:0px">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="techniquesTable">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Technique name</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th style="width: 120px;">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <? if (isset($info)): ?>
                            <?php foreach($info as $temp) : ?>
                                <tr>
                                    <td><?php echo $temp['ID']; ?></td>
                                    <td><?php echo $temp['Approach']; ?></td>
                                    <td><?php echo $temp['Title']; ?></td>
                                    <td><?php echo $temp['Year']; ?></td>
                                    <td>
                                        
                                        <!-- View button -->
                                        <button type="button" class="btn btn-xs btn-primary" id="<?php echo $temp['ID']; ?>" onclick="openModal(this.id)">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </button>
                                        <!-- </a> -->

                                        <!-- Edit button -->
                                        <a href="<?php echo base_url('admin/editInfo/'. $temp["ID"]); ?>">
                                        <button type="button" class="btn btn-xs btn-default" id="<?php echo $temp['ID']; ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        </a>

                                        <!-- Delete button -->
                                        <a href="<?php echo base_url('admin/deleteRecord/'. $temp["ID"]); ?>">
                                            <button onclick="return confirm('Are you sure you want to delete <?php echo $temp['Approach']; ?>?');" type="button" data-bind="click: $parent.remove" class="remove-news btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </a>

                                        
                                        <?php if($temp['Approval'] == 1) : ?>
                                            <!-- Approve button -->
                                            <a href="<?php echo base_url('admin/approveRecord/'. $temp["ID"]); ?>">
                                                <button onclick="return confirm('Are you sure you want to approve <?php echo $temp['Approach']; ?> technique ?');" type="button" class="enabledisable-news btn btn-xs btn-success">
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


<?php foreach ($info as $temp) : ?>
<!-- Modal <?php echo $temp['ID']; ?> -->
<div class="modal fade in" data-backdrop="static" id="<?php echo $temp['ID']; ?>myInfo" data-keyboard="true" tabindex="-1" role="dialog" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title"><?php echo $temp['Approach']; ?> Information</h2>

        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- Modal Content  -->
      <div class="modal-body">  
        <div class="row">
        <?php foreach ($temp as $key => $item): ?>
            <? if (($key == "ID") || ($key == "Approval")) { continue; } ?>

            <div class="col-lg-12 col-md-12 cold-sm-12 cold-xs-12">
                <!-- <?= $item; ?> -->
                <div class="form-group">
                  <label><?= $key; ?>:</label>
                  <p align="justify"><?= $item; ?></p>
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
<?php endforeach; ?>

<!-- START OF FOOTER -->
<? $this->load->view('templates/footer');?>

<script src="<?= base_url('assets/media/js/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/media/js/dataTables.bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/admin_records.js'); ?>" type="text/javascript"></script>
<!-- END OF IT -->

</body>
</html>