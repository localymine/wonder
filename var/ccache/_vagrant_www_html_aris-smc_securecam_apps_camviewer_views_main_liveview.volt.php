<?= $this->tag->getDoctype() ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?= $this->partial('partials/stylesheets') ?>
<!--[if lt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/html5shiv.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/respond.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/excanvas.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-blue-light sidebar-collapse">

<div class="wrapper">

<div class="content-wrapper">

    <section class="content">
<?= $this->flash->output() ?>

      <div class="camview-root liveview">

        <div class="camview-body">
          <div class="video-wrapper">
            <div id="video-container">
              <div class="mjpg-placeholder">
                <img src="<?= $this->url->get('img/blank.png') ?>">
                <div class="ptnav">
                  <button type="button" class="btn btn-uc btn-white dir-tu"><i class="fa fa-arrow-up"></i></button>
                  <button type="button" class="btn btn-uc btn-white dir-pl"><i class="fa fa-arrow-left"></i></button>
                  <button type="button" class="btn btn-uc btn-white dir-pr"><i class="fa fa-arrow-right"></i></button>
                  <button type="button" class="btn btn-uc btn-white dir-td"><i class="fa fa-arrow-down"></i></button>
                </div>
                <div class="zoomnav">
                  <button type="button" class="btn btn-uc btn-white dir-zi fa fa-search-plus"></button>
                  <button type="button" class="btn btn-uc btn-white dir-zo fa fa-search-minus"></button>
                </div>
                <div class="expandnav">
                  <button type="button" class="btn btn-uc btn-white expandable fa fa-compress"></button>
                </div>
              </div>
            </div>

<?php $this->partial('partials/navigation', ['identity' => $identity]); ?>

            <div class="ptnav">
              <button type="button" class="btn btn-uc btn-white dir-tu"><i class="fa fa-arrow-up"></i></button>
              <button type="button" class="btn btn-uc btn-white dir-pl"><i class="fa fa-arrow-left"></i></button>
              <button type="button" class="btn btn-uc btn-white dir-pr"><i class="fa fa-arrow-right"></i></button>
              <button type="button" class="btn btn-uc btn-white dir-td"><i class="fa fa-arrow-down"></i></button>
            </div>
            <div class="zoomnav">
              <button type="button" class="btn btn-uc btn-white dir-zi fa fa-search-plus"></button>
              <button type="button" class="btn btn-uc btn-white dir-zo fa fa-search-minus"></button>
            </div>
            <div class="expandnav">
              <button type="button" class="btn btn-uc btn-white fa fa-plus" data-toggle="modal" data-target="#camchooser"></button>
              <button type="button" class="btn btn-uc btn-white expandable fa fa-expand"></button>
            </div>
            <div class="seal"><span>LIVE</span></div>
          </div>
        </div>

        <div class="camview-aside">
          <div class="aside-fnc clearfix">
            <div class="aside-fnc-left">
              <div class="ptnav">
                <button type="button" class="btn btn-uc btn-white dir-tu"><i class="fa fa-arrow-up"></i></button>
                <button type="button" class="btn btn-uc btn-white dir-pl"><i class="fa fa-arrow-left"></i></button>
                <button type="button" class="btn btn-uc btn-white dir-pr"><i class="fa fa-arrow-right"></i></button>
                <button type="button" class="btn btn-uc btn-white dir-td"><i class="fa fa-arrow-down"></i></button>
              </div>
            </div>
            <div class="aside-fnc-right">
              <div class="zoomnav">
                <button type="button" class="btn btn-uc btn-white dir-zi fa fa-search-plus"></button>
                <button type="button" class="btn btn-uc btn-white dir-zo fa fa-search-minus"></button>
              </div>
              <div class="expandnav">
                <button type="button" class="btn btn-uc btn-white fa fa-plus" data-toggle="modal" data-target="#camchooser"></button>
                <button type="button" class="btn btn-uc btn-white expandable fa fa-expand"></button>
              </div>
            </div>
          </div>
        </div>

        <div class="camview-footer">
          <button type="button" id="preset-open" class="btn btn-sm btn-white"><i class="fa fa-th-large"></i> <?= $this->l10n->_('Presets') ?></button>

          <div class="preset-modal">
            <div class="preset-form-control left">
              <label><?= $this->l10n->_('Create New Preset') ?></label>
              <input type="text" name="presetname" class="form-control input-sm" placeholder="<?= $this->l10n->_('Preset Name') ?>" value="">
              <button class="btn btn-sm btn-info" id="preset-add"><i class="fa fa-save"></i> <?= $this->l10n->_('Add Preset') ?></button>
            </div>
            <div class="preset-form-control right">
              <select id="preset-chooser" class="form-control selectpicker" data-style="btn-white input-sm" data-size="6">
                <option value=""><?= $this->l10n->_('Nothing selected') ?></option>
<?php if (isset($presets)) { ?>
<?php foreach ($presets as $preset) { ?>
                <option value="<?= $preset->id ?>" data-default="<?= $preset->default ?>"<?php if ((isset($selected_preset)) && ($selected_preset == $preset->id)) { ?> selected="selected"<?php } ?>><?php if ($preset->default == 1) { ?> <?= $this->l10n->_('(default)') ?><?php } ?><?= $preset->name ?></option>
<?php } ?>
<?php } ?>
              </select>
              <button class="btn btn-sm btn-default" id="preset-primal"><span class="text-primary"><i class="fa fa-heart"></i> <?= $this->l10n->_('Set Default') ?></span></button>
              <button class="btn btn-sm btn-default" id="preset-delete"><span class="text-danger"><i class="fa fa-trash"></i> <?= $this->l10n->_('Delete Preset') ?></span></button>
            </div>
          </div>

          <div class="footer-preview-center clearfix">
<?php if ((isset($selected_cameras)) && ($this->length($selected_cameras) > 0)) { ?>
<?php foreach ($selected_cameras as $i => $selectedcam) { ?>
<?php if ($selectedcam->live == 1) { ?>
            <div class="thumbs" data-camera-type="<?= $selectedcam->type ?>" data-camera-key="<?= $selectedcam->uniquekey ?>" data-camera-liveurl="<?= (!(empty($selectedcam->liveurl)) ? '1' : '0') ?>" data-ptz="<?= $selectedcam->ptz ?>" data-has-agentbox="<?= ($selectedcam->agentbox_id > 0 ? '1' : '0') ?>">
              <span class="thumb"><?= $this->tag->image(['img/cbar.gif']) ?></span>
              <span class="name"><?= $this->escaper->escapeHtml($selectedcam->name) ?></span>
            </div>
<?php } ?>
<?php } ?>
<?php } else { ?>
            <div class="empty">
              <span data-toggle="modal" data-target="#camchooser"><?= $this->l10n->_('To add camera, click here, or press [+] button.') ?></span>
            </div>
<?php } ?>
          </div>
        </div>
      </div>
    </section>

    <div class="modal" id="camchooser" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="filter-form">
            <div class="btn-group">
              <input type="text" id="searchfilter" name="searchfilter" class="form-control input-sm" placeholder="<?= $this->l10n->_('Display Filter') ?>" value="">
              <span id="clearfilter" class="fa fa-times-circle-o"></span>
            </div>
            <button class="btn btn-sm btn-default" id="do-filter"><i class="fa fa-search"></i> <?= $this->l10n->_('Search') ?></button>
          </div>

          <?= $this->tag->form(['camviewer/viewer/addcamera', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

          <?= $this->tag->hiddenField(['redirect_url', 'value' => 'liveview']) ?>

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?= $this->l10n->_('Add Camera') ?></h4>
          </div>
          <div class="modal-body lazyload" data-limit="10" data-offset="0">
            <ul>
<?php if (isset($cameras) && isset($modaloffset)) { ?>
<?php foreach ($cameras as $idx => $camera) { ?>
<?php if ($idx >= $modaloffset) { ?>
<?php break; ?>
<?php } ?>
              <li data-camera-type="<?= $camera->type ?>" data-camera-key="<?= $camera->uniquekey ?>" data-camera-live="<?= $camera->live ?>" data-camera-name="<?= $camera->name ?>" data-has-agentbox="<?= ($camera->agentbox_id > 0 ? '1' : '0') ?>">
<?php if ((isset($selected_camera_keys)) && ($this->isIncluded($camera->uniquekey, $selected_camera_keys))) { ?>
                <?= $this->tag->checkField(['cam-select-' . $camera->uniquekey, 'name' => 'cam-select[]', 'value' => $camera->uniquekey, 'checked' => true]) ?>

<?php } else { ?>
                <?= $this->tag->checkField(['cam-select-' . $camera->uniquekey, 'name' => 'cam-select[]', 'value' => $camera->uniquekey]) ?>

<?php } ?>
                <span class="thumb"><?= $this->tag->image(['img/cbar.gif']) ?></span>
                <span class="name"><?= $camera->name ?></span>
                <span class="option"><?php if ($camera->live == 1) { ?><?= $this->l10n->_('Live usage') ?><?php if ($camera->ptz == 1) { ?><?= ' / ' . $this->l10n->_('PTZ usage(Pan, Tilt, and Zoom)') ?><?php } ?><?php } ?></span>
                <span class="delimiter" role="delimiter"></span></li>
<?php } ?>
<?php } ?>
            </ul>
          </div>
          <div class="modal-footer">
            <?= $this->tag->submitButton([$this->l10n->_('Add'), 'class' => 'btn btn-info']) ?>

            <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->l10n->_('Close') ?></button>
          </div>
          <?= $this->tag->endForm() ?>

        </div>
      </div>
    </div>

</div>

</div>

<?= $this->partial('partials/javascripts') ?>

<script>
  ABC_MEDIA_SERVER = '<?= $ABC_MEDIA_SERVER ?>';
<?php if (isset($using_cameras)) { ?>
  usingCameras = [<?= $using_cameras ?>];
<?php } else { ?>
  usingCameras = [];
<?php } ?>
  $(function(){
    $('input[type=checkbox]').iCheck({
      checkboxClass:'icheckbox_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked',true);
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked');
    }).iCheck('update');
    $('.modal-body ul li').on('click', function(evt) {
      $('input[type=checkbox]', this).iCheck('toggle');
    });
    $('#do-filter').on('click', function(evt) {
      var _filter = $('#searchfilter').val();
      var list   = $('.modal-body');
      list.attr('data-offset', 0);
      var _limit  = 10;
      var _offset = 0;
      $.ajax({
        type:'GET',
        url :'/camviewer/viewer/getchildren',
        data:{
          filter:_filter,
          limit :_limit,
          offset:_offset,
          live  :1
        },
        dataType:'json',
        cache:false
      }).done(function(data/*, textStatus, jqXHR*/) {
        if (data.success == 1) {
          if (data.recent.length > 0) {
            $('ul', list).empty();
            for (var i = 0; i < data.recent.length; i++) {
              var addel = $(data.recent[i]).hide();
              $('input[type=checkbox]', addel).iCheck({
                checkboxClass:'icheckbox_minimal-blue'
              }).on('ifChecked', function() {
                $(this).attr('checked',true);
              }).on('ifUnchecked', function() {
                $(this).removeAttr('checked');
              }).iCheck('update');
              addel.click(function() {
                $('input[type=checkbox]', this).iCheck('toggle');
              });
              $('ul', list).append(addel);
              addel.fadeIn();
            }
            list.attr('data-limit' , data.limit)
                .attr('data-offset', data.offset);
          }
        }
      });
    });
    $('#clearfilter').on('click', function(evt) {
      $('#searchfilter').val('');
      $('#do-filter').click();
    });
  });
</script>
<?= $this->tag->javascriptInclude('js/liveviewer.js') ?>
<?= $this->tag->javascriptInclude('js/presets.js') ?>

</body>
</html>
