<?= $this->tag->javascriptInclude('js/jquery.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery-ui.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery.slimscroll.min.js') ?>
<?= $this->tag->javascriptInclude('js/jquery.simulate.js') ?>
<?= $this->tag->javascriptInclude('js/cookie.js') ?>
<?= $this->tag->javascriptInclude('js/moment.min.js') ?>
<?= $this->tag->javascriptInclude('js/moment/ja.js') ?>
<?= $this->tag->javascriptInclude('plugins/jquery-treeview/jquery.treeview.js') ?>
<?= $this->tag->javascriptInclude('plugins/iCheck/icheck.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap-select.min.js') ?>
<?= $this->tag->javascriptInclude('js/bootstrap-datetimepicker.min.js') ?>
<?= $this->tag->javascriptInclude('js/application.js') ?>
<?php if (isset($identity['role_id'])) { ?>
<?= $this->tag->javascriptInclude('js/video/sha256.js') ?>
<?= $this->tag->javascriptInclude('js/video/video.min.js') ?>
<?= $this->tag->javascriptInclude('js/video/videojs-contrib-hls.min.js') ?>
<?php } ?>