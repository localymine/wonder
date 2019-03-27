<?php $this->_macros['customized_img'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
<img src="<?php echo $this->url->get('main/image/' . $uid . '/' . $type); ?>"><?php } else { ?>
<img src="<?php echo $this->url->get('img/blank.png'); ?>"><?php } ?><?php }; $this->_macros['customized_img'] = \Closure::bind($this->_macros['customized_img'], $this); ?><?php $this->_macros['customized_path'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
<?php echo $this->url->get('main/image/' . $uid . '/' . $type); ?><?php } else { ?>
<?php echo $this->url->get('img/blank.png'); ?><?php } ?><?php }; $this->_macros['customized_path'] = \Closure::bind($this->_macros['customized_path'], $this); ?>
<?php echo $this->tag->getDoctype(); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?php echo $this->partial('partials/stylesheets'); ?>
<!--[if lt IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/html5shiv.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/respond.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/excanvas.js'); ?>
<![endif]-->
<?php echo $this->tag->getTitle(); ?>
</head>
<body class="hold-transition skin-blue-light sidebar-collapse">

<div class="wrapper">

<div class="content-wrapper">

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="camview-root liveview">

        <div class="camview-body">
          <div class="video-wrapper">
            <div id="video-container">
              <div class="mjpg-placeholder">

                <img src="<?php echo $this->callMacro('customized_path', array('ident' => $identity, 'uid' => $user_id, 'type' => 2)); ?>" class="poster">

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
                <div class="volnav">
                  <button type="button" class="btn btn-uc btn-white livevol"><i class="fa"></i></button>
                  <div class="livevolwrapper">
                    <div class="livevolslider"></div>
                    <div class="vjc-aria-vol">100</div>
                  </div>
                </div>
              </div>
            </div>

<?php $this->partial('partials/navigation', array('identity' => $identity)); ?>

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
            <div class="volnav">
              <button type="button" class="btn btn-uc btn-white livevol"><i class="fa"></i></button>
              <div class="livevolwrapper">
                <div class="livevolslider"></div>
                <div class="vjc-aria-vol">100</div>
              </div>
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
            <div class="volnav">
              <button type="button" class="btn btn-uc btn-white livevol"><i class="fa"></i></button>
              <div class="livevolwrapper">
                <div class="livevolslider"></div>
                <div class="vjc-aria-vol">100</div>
              </div>
            </div>
          </div>
        </div>

        <div class="camview-footer">
          <button type="button" id="preset-open" class="btn btn-sm btn-white"><i class="fa fa-th-large"></i> <?php echo $this->l10n->_('Presets'); ?></button>

          <div class="preset-modal">
            <div class="preset-form-control left">
              <label><?php echo $this->l10n->_('Create New Preset'); ?></label>
              <input type="text" name="presetname" class="form-control input-sm" placeholder="<?php echo $this->l10n->_('Preset Name'); ?>" value="">
              <button class="btn btn-sm btn-info" id="preset-add"><i class="fa fa-save"></i> <?php echo $this->l10n->_('Add Preset'); ?></button>
            </div>
            <div class="preset-form-control right">
              <select id="preset-chooser" class="form-control selectpicker" data-style="btn-white input-sm" data-size="6">
                <option value=""><?php echo $this->l10n->_('Nothing selected'); ?></option>
<?php if (isset($presets)) { ?>
<?php foreach ($presets as $preset) { ?>
                <option value="<?php echo $preset->id; ?>" data-default="<?php echo $preset->default; ?>"<?php if ((isset($selected_preset)) && ($selected_preset == $preset->id)) { ?> selected="selected"<?php } ?>><?php if ($preset->default == 1) { ?> <?php echo $this->l10n->_('(default)'); ?><?php } ?><?php echo $preset->name; ?></option>
<?php } ?>
<?php } ?>
              </select>
              <button class="btn btn-sm btn-default" id="preset-primal"><span class="text-primary"><i class="fa fa-heart"></i> <?php echo $this->l10n->_('Set Default'); ?></span></button>
              <button class="btn btn-sm btn-default" id="preset-delete"><span class="text-danger"><i class="fa fa-trash"></i> <?php echo $this->l10n->_('Delete Preset'); ?></span></button>
            </div>
          </div>

          <div class="footer-preview-center clearfix">
<?php if ((isset($selected_cameras)) && ($this->length($selected_cameras) > 0)) { ?>
<?php foreach ($selected_cameras as $i => $selectedcam) { ?>
<?php if ($selectedcam->live == 1) { ?>
            <div class="thumbs" data-camera-type="<?php echo $selectedcam->type; ?>" data-camera-key="<?php echo $selectedcam->uniquekey; ?>" data-camera-liveurl="<?php echo (!(empty($selectedcam->liveurl)) ? '1' : '0'); ?>" data-ptz="<?php echo $selectedcam->ptz; ?>" data-has-agentbox="<?php echo ($selectedcam->agentbox_id > 0 ? '1' : '0'); ?>" data-rtsp="<?php echo ($selectedcam->type == 4 ? '1' : '0'); ?>">
              <span class="thumb"><?php echo $this->tag->image(array('img/cbar.gif')); ?></span>
              <span class="name"><?php echo $this->escaper->escapeHtml($selectedcam->name); ?></span>
            </div>
<?php } ?>
<?php } ?>
<?php } else { ?>
            <div class="empty">
              <span data-toggle="modal" data-target="#camchooser"><?php echo $this->l10n->_('To add camera, click here, or press [+] button.'); ?></span>
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
              <input type="text" id="searchfilter" name="searchfilter" class="form-control input-sm" placeholder="<?php echo $this->l10n->_('Display Filter'); ?>" value="">
              <span id="clearfilter" class="fa fa-times-circle-o"></span>
            </div>
            <button class="btn btn-sm btn-default" id="do-filter"><i class="fa fa-search"></i> <?php echo $this->l10n->_('Search'); ?></button>
          </div>

          <?php echo $this->tag->form(array('camviewer/viewer/addcamera', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

          <?php echo $this->tag->hiddenField(array('redirect_url', 'value' => 'liveview')); ?>

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo $this->l10n->_('Add Camera'); ?></h4>
          </div>
          <div class="modal-body lazyload" data-limit="10" data-offset="0">
            <ul>
<?php if (isset($cameras) && isset($modaloffset)) { ?>
<?php foreach ($cameras as $idx => $camera) { ?>
<?php if ($idx >= $modaloffset) { ?>
<?php break; ?>
<?php } ?>
              <li data-camera-type="<?php echo $camera->type; ?>" data-camera-key="<?php echo $camera->uniquekey; ?>" data-camera-live="<?php echo $camera->live; ?>" data-camera-name="<?php echo $camera->name; ?>" data-has-agentbox="<?php echo ($camera->agentbox_id > 0 ? '1' : '0'); ?>" data-rtsp="<?php echo ($camera->type == 4 ? '1' : '0'); ?>">
<?php if ((isset($selected_camera_keys)) && ($this->isIncluded($camera->uniquekey, $selected_camera_keys))) { ?>
                <?php echo $this->tag->checkField(array('cam-select-' . $camera->uniquekey, 'name' => 'cam-select[]', 'value' => $camera->uniquekey, 'checked' => true)); ?>

<?php } else { ?>
                <?php echo $this->tag->checkField(array('cam-select-' . $camera->uniquekey, 'name' => 'cam-select[]', 'value' => $camera->uniquekey)); ?>

<?php } ?>
                <span class="thumb"><?php echo $this->tag->image(array('img/cbar.gif')); ?></span>
                <span class="name"><?php echo $camera->name; ?></span>
                <span class="option"><?php if ($camera->live == 1) { ?><?php echo $this->l10n->_('Live usage'); ?><?php if ($camera->ptz == 1) { ?><?php echo ' / ' . $this->l10n->_('PTZ usage(Pan, Tilt, and Zoom)'); ?><?php } ?><?php } ?></span>
                <span class="delimiter" role="delimiter"></span></li>
<?php } ?>
<?php } ?>
            </ul>
          </div>
          <div class="modal-footer">
            <?php echo $this->tag->submitButton(array($this->l10n->_('Add'), 'class' => 'btn btn-info')); ?>

            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->l10n->_('Close'); ?></button>
          </div>
          <?php echo $this->tag->endForm(); ?>

        </div>
      </div>
    </div>

</div>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

<script>
  ABC_MEDIA_SERVER = '<?php echo $ABC_MEDIA_SERVER; ?>';
<?php if (isset($using_cameras)) { ?>
  usingCameras = [<?php echo $using_cameras; ?>];
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
<?php echo $this->tag->javascriptInclude('js/liveviewer.js'); ?>
<?php echo $this->tag->javascriptInclude('js/presets.js'); ?>

</body>
</html>
