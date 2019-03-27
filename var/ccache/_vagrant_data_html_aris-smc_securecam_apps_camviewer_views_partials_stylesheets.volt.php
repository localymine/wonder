<?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
<?= $this->tag->stylesheetLink('css/bootstrap-datetimepicker.min.css') ?>
<?= $this->tag->stylesheetLink('css/bootstrap-select.min.css') ?>
<?= $this->tag->stylesheetLink('css/font-awesome.min.css') ?>
<?= $this->tag->stylesheetLink('css/AdminLTE.min.css') ?>
<?= $this->tag->stylesheetLink('plugins/iCheck/minimal/blue.css') ?>
<?= $this->tag->stylesheetLink('css/jquery-ui.min.css') ?>
<?= $this->tag->stylesheetLink('css/jquery-ui-theme.min.css') ?>
<?= $this->tag->stylesheetLink('plugins/jquery-treeview/jquery.treeview.css') ?>
<?php if (isset($identity['role_id'])) { ?>
<?= $this->tag->stylesheetLink('css/video/video-js.css') ?>
<?= $this->tag->stylesheetLink('css/video/video-includes.css') ?>
<?php } ?>
<?= $this->tag->stylesheetLink('css/include-after.css') ?>
<?php if (isset($theme) && $theme != '') { ?>
<?= $this->tag->stylesheetLink('css/' . $theme) ?>
<?php } ?>