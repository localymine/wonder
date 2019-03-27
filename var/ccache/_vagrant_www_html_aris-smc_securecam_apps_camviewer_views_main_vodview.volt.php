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

      <div class="camview-root vodview">
        <div class="camview-body">
          <div class="video-wrapper">
            <div id="video-container">
              <video id="native-video" class="video-js vjs-default-skin" poster="<?= (($identity['mainimage'] != '') ? $this->url->get('/main/image/' . $user_id . '/2') : $this->url->get('img/blank.png')) ?>" webkit-playsinline>
                <source src="<?= $this->url->get('img/blank.m3u8') ?>" type="application/x-mpegURL">
              </video>
            </div>

<?php $this->partial('partials/navigation', ['identity' => $identity]); ?>

            <div class="expandnav">
              <button type="button" id="camadd-btn" class="btn btn-uc btn-white fa fa-plus" data-toggle="modal" data-target="#camchooser"></button>
              <button type="button" id="vjc-fs" class="btn btn-uc btn-white expandable fa fa-expand"></button>
            </div>
          </div>
          <div class="seal"><span>VOD</span></div>
        </div>

        <div class="camview-aside">
          <div class="aside-fnc clearfix">
            <div class="aside-fnc-left">
              <button type="button" id="camdtc-btn" class="btn btn-lg btn-white" title="<?= $this->l10n->_('Fetch data') ?>"><i class="fa fa-calendar"></i></button>
<?php if ($identity['downloadable'] == 1) { ?>
              <button type="button" id="camddl-btn" class="btn btn-lg btn-white" title="<?= $this->l10n->_('Download') ?>"><i class="fa fa-cloud-download"></i></button>
<?php } ?>
            </div>
            <div class="aside-fnc-right">
              <div id="vjc-dur">00:00</div>
              <div class="speed-wrapper">
              <?= $this->tag->select(['speed-factor', $speedfactors, 'name' => 'speed-factor', 'class' => 'form-control selectpicker', 'data-style' => 'btn-white input-lg']) ?>

              </div>
              <button id="vjc-vol" class="btn btn-lg btn-white"><i class="fa"></i></button>
              <div id="vol-wrapper">
                <div id="vol-slider"></div>
                <div class="vjc-aria-vol">100</div>
              </div>

            </div>
            <div class="aside-fnc-center">
              <button type="button" id="vjc-fbw" class="btn btn-lg btn-white"><i class="fa fa-fast-backward"></i></button>
              <button type="button" id="vjc-bw" class="btn btn-lg btn-white"><i class="fa fa-backward"></i></button>
              <button type="button" id="vjc-playstop" class="btn btn-lg btn-white stop"><i class="fa"></i></button>
              <button type="button" id="vjc-fw" class="btn btn-lg btn-white"><i class="fa fa-forward"></i></button>
              <button type="button" id="vjc-ffw" class="btn btn-lg btn-white"><i class="fa fa-fast-forward"></i></button>
            </div>

            <div class="aside-fnc-modal">
              <div class="fnc-modal-body">
                <label for="camdate-from"><?= $this->l10n->_('Fetch start date') ?></label>
                <div class="input-group date camdate-chooser-grp">
                  <?= $this->tag->textField(['camdate-from', 'name' => 'camdate-from', 'class' => 'form-control input-sm', 'value' => date('Y-m-d H:00')]) ?>

                  <span class="input-group-addon btn btn-white" id="open-camdate-from"><i class="fa fa-calendar"></i></span>
                </div>
                <label for="camdate-to"><?= $this->l10n->_('Fetch length') ?></label>
                <?= $this->tag->selectStatic(['camdate-to', $hourfactors, 'name' => 'camdate-to', 'class' => 'form-control selectpicker', 'data-style' => 'btn-white input-sm']) ?>

              </div>
              <div class="fnc-modal-foot">
                <button type="button" id="cam-fetch" class="btn btn-info"><i class="fa fa-youtube-play"></i> <?= $this->l10n->_('Fetch data') ?></button>
              </div>
            </div>

<?php if ($identity['downloadable'] == 1) { ?>
            <div class="aside-dl-modal">
              <div class="fnc-modal-body">
                <label for="camdl-camera"><?= $this->l10n->_('Camera for download') ?></label>
                <select id="camdl-camera" class="form-control selectpicker" data-style="btn-white input-sm">
<?php if (isset($selected_cameras)) { ?>
<?php foreach ($selected_cameras as $i => $selectedcam) { ?>
                  <option value="<?= $selectedcam->uniquekey ?>"><?= $selectedcam->name ?></option>
<?php } ?>
<?php } else { ?>
                  <option value="" disabled="disabled"><?= $this->l10n->_('Nothing selected') ?></option>
<?php } ?>
                </select>
                <label for="camdl-from"><?= $this->l10n->_('Download start date') ?></label>
                <div class="input-group date camdate-chooser-grp">
                  <?= $this->tag->textField(['camdl-from', 'name' => 'camdl-from', 'class' => 'form-control input-sm', 'value' => date('Y-m-d H:00', strtotime('-1 hour'))]) ?>

                  <span class="input-group-addon btn btn-sm btn-white" id="open-camdl-from"><i class="fa fa-calendar"></i></span>
                </div>
                <label for="camdl-to"><?= $this->l10n->_('Download end date') ?></label>
                <div class="input-group date camdate-chooser-grp">
                  <?= $this->tag->textField(['camdl-to', 'name' => 'camdl-to', 'class' => 'form-control input-sm', 'value' => date('Y-m-d H:10', strtotime('-1 hour'))]) ?>

                  <span class="input-group-addon btn btn-sm btn-white" id="open-camdl-to"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
              <div class="fnc-modal-foot">
                <button type="button" id="cam-exec-dl" class="btn btn-info"><i class="fa fa-cloud-download"></i> <?= $this->l10n->_('Download') ?></button>
              </div>
            </div>
<?php } ?>

          </div>
        </div>

        <div class="camview-footer">
          <div class="zoom-factor-wrapper">
          <?= $this->tag->select(['zoom-factor', $zoomfactors, 'name' => 'zoom-factor', 'class' => 'form-control selectpicker', 'data-style' => 'btn-white input-sm']) ?>

          </div>
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

          <div class="tsheads">
<?php if (isset($selected_cameras)) { ?>
<?php foreach ($selected_cameras as $i => $selectedcam) { ?>
            <div class="tshead" data-cam-key="<?= $this->escaper->escapeHtml($selectedcam->uniquekey) ?>"><?= $this->escaper->escapeHtml($selectedcam->name) ?></div>
<?php } ?>
<?php } ?>
          </div>
          <div class="timescale">
            <div class="tsbars">
<?php if (isset($selected_cameras)) { ?>
<?php foreach ($selected_cameras as $j => $selectedcam) { ?>
              <div class="tsbar" data-cam-key="<?= $this->escaper->escapeHtml($selectedcam->uniquekey) ?>"></div>
<?php } ?>
<?php } ?>
            <div class="seeker" id="vjc-seeker"></div>
            <div class="vjc-aria-seeker"></div>
            </div>
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
              <li data-camera-type="<?= $camera->type ?>" data-camera-key="<?= $camera->uniquekey ?>" data-camera-live="<?= $camera->live ?>" data-camera-name="<?= $camera->name ?>">
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
    var hideTimer = null;
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
    if ($.smcsupport.PC == 1) {
      $('[name=camdate-from],[name=camdl-from],[name=camdl-to]').datetimepicker({
        format:'Y-MM-DD HH:mm',
        locale:'ja',
        focusOnShow:false,
        useCurrent:true,
        dayViewHeaderFormat:'<?= $this->l10n->_('MMM YYYY') ?>',
        tooltips: {
          today: '<?= $this->l10n->_('Select Today') ?>',
          clear: '<?= $this->l10n->_('Deselect') ?>',
          close: '<?= $this->l10n->_('Close') ?>',
          selectMonth: '<?= $this->l10n->_('Select Month') ?>',
          prevMonth: '<?= $this->l10n->_('Previous Month') ?>',
          nextMonth: '<?= $this->l10n->_('Next Month') ?>',
          selectYear: '<?= $this->l10n->_('Select Year') ?>',
          prevYear: '<?= $this->l10n->_('Previous Year') ?>',
          nextYear: '<?= $this->l10n->_('Next Year') ?>',
          selectTime: '<?= $this->l10n->_('Select Time') ?>'
        }
      }).on('dp.show', function(evt) {
        var par = $(this);
        var win = $('.bootstrap-datetimepicker-widget');
        $(win).on('mouseleave', function() {
          var self = $(this);
          self.on('mouseenter', function() {
            clearTimeout(hideTimer);
            hideTimer = null;
            self.off('mouseenter');
          });
          hideTimer = setTimeout(function() {
            self.hide();
            par.blur();
          }, 600);
        });
      });
      $('#open-camdate-from').click(function() {
        $('[name=camdate-from]').data('DateTimePicker').toggle();
      });
      $('#open-camdl-from').click(function() {
        $('[name=camdl-from]').data('DateTimePicker').toggle();
      });
      $('#open-camdl-to').click(function() {
        $('[name=camdl-to]').data('DateTimePicker').toggle();
      });
    } else {
      var _d = $('[name=camdate-from]').val();
      var _t = _d.replace(/ /, 'T');
      $('[name=camdate-from]').val(_t).attr('type', 'datetime-local');
      _d = $('[name=camdl-from]').val();
      _t = _d.replace(/ /, 'T');
      $('[name=camdl-from]').val(_t).attr('type', 'datetime-local');
      _d = $('[name=camdl-to]').val();
      _t = _d.replace(/ /, 'T');
      $('[name=camdl-to]').val(_t).attr('type', 'datetime-local');
    }
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
          offset:_offset
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
<?= $this->tag->javascriptInclude('js/camviewer.js') ?>
<?= $this->tag->javascriptInclude('js/zoomify.js') ?>
<?= $this->tag->javascriptInclude('js/presets.js') ?>
<script>
$.zoomify({
  ovideo:'#video-container',
  clickup:'#dzoom-up',
  clickdown:'#dzoom-down',
  clickreset:'#dzoom-reset',
  factor:0.1
});
</script>

</body>
</html>
