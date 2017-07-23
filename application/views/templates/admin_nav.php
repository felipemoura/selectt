<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 

<div class="col-lg-2 col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Dash -->
            <li <?php if($this->uri->segment(2)=="dash"){   echo 'class="current"';}?> >
                <a href="<?= base_url('admin/dash'); ?>">
                    <i class="glyphicon glyphicon-home"></i>Dashboard
                </a>
            </li>

            <!-- Techniques Edit -->
            <li <?php if($this->uri->segment(2)=="techniques"){ echo 'class="current"';}?> >
                <a href="<?= base_url('admin/techniques'); ?>">
                    <i class="glyphicon glyphicon-hdd"></i>Techniques
                </a>
            </li>

            <!-- Tecchniques Weight -->
            <li <?php if($this->uri->segment(2)=="weights"){ echo 'class="current"';}?> >
                <a href="<?= base_url('admin/weights'); ?>">
                    <i class="glyphicon glyphicon-scale"></i>Weights
                </a>
            </li>

            <!-- Users Edit -->
            <li <?php if($this->uri->segment(2)=="users"){ echo 'class="current"';}?> >
                <a href="<?= base_url('admin/users'); ?>">
                    <i class="glyphicon glyphicon-user"></i>Users
                </a>
            </li>

            <!-- Edit Content -->
            <li <?php if($this->uri->segment(2)=="content"){ echo 'class="current"';}?> >
                <a href="<?= base_url('admin/content'); ?>">
                    <i class="glyphicon glyphicon-edit"></i>Content
                </a>
            </li>

        </ul>
    </div>
</div>