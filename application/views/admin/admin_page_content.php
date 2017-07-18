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
                            <i class="glyphicon glyphicon-home"></i>Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/techniques'); ?>">
                            <i class="glyphicon glyphicon-hdd"></i>Techniques
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/users'); ?>">
                            <i class="glyphicon glyphicon-user"></i>Users
                        </a>
                    </li>


                    <li class="current">
                        <a href="<?= base_url('admin/content'); ?>">
                            <i class="glyphicon glyphicon-edit"></i>Content
                        </a>
                    </li>

                </ul>
             </div>
        </div>

        <div class="col-lg-10 col-md-10">
          <div class="content-box-large">

            <h2> Edit content </h2>
            
            <!-- Start Tab -->
            <ul class="nav nav-tabs nav-justified">
              <!-- HOME -->
              <li class="nav-item">
                <a class="nav-link active" href="#home" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">Home</a>
              </li>
              
              <!-- PEOPLE -->
              <li class="nav-item">
                <a class="nav-link" href="#people" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">People</a>
              </li>

              <!-- PUBLICATION -->
              <li class="nav-item">
                <a class="nav-link" href="#publication" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">Publication</a>
              </li>

              <!-- LOGADO -->
              <li class="nav-item">
                <a class="nav-link" href="#logado" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">Logado</a>
              </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content">

                <!-- HOME EDIT -->
                <div id="home" class="tab-pane fade in active">
                    <h4>Edit Home</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updateHome");?>">

                        <textarea name="contentHome" style="width:100%">
                            <? if (isset($home['TEXT'])): ?>
                                <?= $home['TEXT']; ?>
                            <? endif; ?>
                        </textarea>

                        <button class="btn btn-success pull-right" type="submit" id="btnUpdateHome" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update Home content</button>     
                    </form>
                </div>
                
                <!-- PEOPLE EDIT -->
                <div id="people" class="tab-pane fade">
                    <h4>Edit People</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updatePeople");?>">

                        <textarea name="contentPeople" style="width:100%">
                            <? if (isset($people['TEXT'])): ?>
                                <?= $people['TEXT']; ?>
                            <? endif; ?>
                        </textarea>

                        <button class="btn btn-success pull-right" type="submit" id="btnUpdatePeople" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update People content</button>     
                    </form>
                </div>

                <!-- PUBLICATION EDIT -->
                <div id="publication" class="tab-pane fade">
                    <h4>Edit Publication</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updatePublication");?>">

                        <textarea name="contentPublication" style="width:100%">
                            <? if (isset($publication['TEXT'])): ?>
                                <?= $publication['TEXT']; ?>
                            <? endif; ?>
                        </textarea>

                        <button class="btn btn-success pull-right" type="submit" id="btnUpdatePublication" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update Publication content</button>     

                    </form>
                </div>

                <!-- LOGADO EDIT -->
                <div id="logado" class="tab-pane fade">
                    <h4>Edit Logado</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updateLogado");?>">

                        <textarea name="contentLogado" style="width:100%">
                            <? if (isset($logado['TEXT'])): ?>
                                <?= $logado['TEXT']; ?>
                            <? endif; ?>
                        </textarea>

                        <button class="btn btn-success pull-right" type="submit" id="btnUpdateLogado" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update Logado content</button>     
                    </form>
                </div>

            </div>
            <!-- End Tab -->
            <br><br>
          <!-- End context -->
          </div>
        <!-- End cols -->
        </div>
      <!-- End row -->
      </div>
    <!-- End Page content -->
    </div>
</div>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer');?>
<script src="<?= base_url('assets/js/tinymce/tinymce.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/admin_content.js'); ?>" type="text/javascript"></script>


<!-- END OF IT -->
</body>
</html>