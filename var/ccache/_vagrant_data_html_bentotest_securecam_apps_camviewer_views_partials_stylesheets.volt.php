<?php echo $this->tag->stylesheetLink('css/bootstrap.min.css'); ?>
<?php echo $this->tag->stylesheetLink('css/bootstrap-datetimepicker.min.css'); ?>
<?php echo $this->tag->stylesheetLink('css/bootstrap-select.min.css'); ?>
<?php echo $this->tag->stylesheetLink('css/font-awesome.min.css'); ?>
<?php echo $this->tag->stylesheetLink('css/AdminLTE.min.css'); ?>
<?php echo $this->tag->stylesheetLink('plugins/iCheck/minimal/blue.css'); ?>
<?php echo $this->tag->stylesheetLink('css/jquery-ui.min.css'); ?>
<?php echo $this->tag->stylesheetLink('css/jquery-ui-theme.min.css'); ?>
<?php echo $this->tag->stylesheetLink('plugins/jquery-treeview/jquery.treeview.css'); ?>
<?php if (isset($identity['role_id'])) { ?>
<?php echo $this->tag->stylesheetLink('css/video/video-js.css'); ?>
<?php echo $this->tag->stylesheetLink('css/video/video-includes.css'); ?>
<?php } ?>
<?php echo $this->tag->stylesheetLink('css/include-after.css'); ?>
<?php if (isset($theme) && $theme != '') { ?>
<?php echo $this->tag->stylesheetLink('css/' . $theme); ?>
<?php } ?>
<?php echo $this->tag->stylesheetLink('css/cviewer.css'); ?>