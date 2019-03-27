<?php echo $this->tag->javascriptInclude('js/jquery.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/jquery-ui.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/jquery.slimscroll.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/jquery.simulate.js'); ?>
<?php echo $this->tag->javascriptInclude('js/cookie.js'); ?>
<?php echo $this->tag->javascriptInclude('js/moment.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/moment/ja.js'); ?>
<?php echo $this->tag->javascriptInclude('plugins/jquery-treeview/jquery.treeview.js'); ?>
<?php echo $this->tag->javascriptInclude('plugins/iCheck/icheck.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/bootstrap.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/bootstrap-select.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/bootstrap-datetimepicker.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/application.js'); ?>
<?php if (isset($identity['role_id'])) { ?>
<?php echo $this->tag->javascriptInclude('js/video/sha256.js'); ?>
<?php echo $this->tag->javascriptInclude('js/video/video.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/video/videojs-contrib-hls.min.js'); ?>
<?php } ?>