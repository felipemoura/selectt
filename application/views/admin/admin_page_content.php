<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
                        <a href="<?= base_url('admin'); ?>">
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
              <li class="nav-item">
                <a class="nav-link active" href="#home" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#people" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">People</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#publication" data-toggle="tab" style="color: #555; font-weight: 900; font-size: 14px;">Publication</a>
              </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h4>Edit Home</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updateHome");?>">

                        <textarea name="contentHome" style="width:100%">
                            <?= $home['TEXT']; ?>
                        </textarea>


                        <button class="btn btn-success pull-right" type="submit" id="btnUpdateHome" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update Home content</button>     

                    </form>

                </div>
                
                <div id="people" class="tab-pane fade">
                    <h4>Edit People</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updatePeople");?>">

                        <textarea name="contentPeople" style="width:100%">
                            <?= $people['TEXT']; ?>
                        </textarea>


                        <button class="btn btn-success pull-right" type="submit" id="btnUpdatePeople" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update People content</button>     

                    </form>
                </div>

                <div id="publication" class="tab-pane fade">
                    <h4>Edit Publication</h4>
                    
                    <form method="post" action="<? echo base_url("admin/updatePublication");?>">

                        <textarea name="contentPublication" style="width:100%">
                            <?= $publication['TEXT']; ?>
                        </textarea>


                        <button class="btn btn-success pull-right" type="submit" id="btnUpdatePublication" style="margin-top: 0.5em; margin-left: 1px; border-style: ">Update Publication content</button>     

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