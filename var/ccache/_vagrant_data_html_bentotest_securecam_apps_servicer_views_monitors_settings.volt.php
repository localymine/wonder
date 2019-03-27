<?php echo $this->tag->getDoctype(); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?php echo $this->partial('partials/stylesheets'); ?>
<!--[if lt IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/html5shiv.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/respond.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/excanvas.js'); ?>
<![endif]-->
<!--[if gte IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/polyfill.min.js'); ?>
<![endif]-->
<?php echo $this->tag->getTitle(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?php echo $this->partial('partials/mainheader'); ?>
</header>

<aside class="main-sidebar">

  <?php echo $this->partial('partials/sidebar'); ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?php echo $this->l10n->__('Manage Monitors', 'Monitor'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('servicer/monitors/index', $this->l10n->__('Manage Monitors', 'Monitor'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->escaper->escapeHtml($this->flash->output()); ?>
    <div class="alert alert-danger hidden"><?php echo sprintf($this->l10n->_('%1$s must be within the range of %2$s to %3$s'), $this->l10n->__('Display Time', 'Monitor'), $min_display_interval, $max_display_interval); ?> </div>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
      </div>
      <div class="box-body no-select" data-csrftoken="<?php echo $this->security->getToken(); ?>">
        <div class="row">
          <div class="col-md-8 ">
            <div class="row screen_container" data-bind="foreach: programs">
              <div class="row screen_boxs" data-bind="attr:{id: 'program_'+$index()}">
                <div class="col-md-6 screen_box">
                  <div class="col-md-2">
                    <a class="acond addcond sbox-mid" href="javascript:void(0);"><i class="fa fa-minus-circle" data-bind="click: $parent.removeScreen,attr:{program_id: $index}"></i></a>
                  </div>
                  <div class="col-md-8">
                    <div class="sbox-mid">
                      <div class="form-group">
                        <div><?php echo $this->l10n->__('Split Screen', 'Monitor'); ?></div>
                        <select data-bind="value: mesh, event:{ change: $parent.screenChange},attr:{select_id:$index}" class="form-control show-tick ">
                          <option value="1">1 Screen</option>
                          <option value="4">4 Screen</option>
                        </select>
                      </div>
                      <div class="form-group" data-bind="attr:{id: 'display_'+$index()}">
                        <div><?php echo $this->l10n->__('Display Time', 'Monitor'); ?></div>
                        <div class="input-group">
                          <input type="text" data-bind="textInput: duration" class="form-control duration" />
                          <span class="input-group-addon duration"><?php echo $this->l10n->__('Secs', 'Monitor'); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6" data-bind="attr: { id: 'screen_container_' + $index()}">
                  <div class="screen_1" data-bind="visible: mesh == 1, attr: { id: 'screen_1_' + $index()}">
                    <div class="dropable"></div>
                  </div>
                  <div class="screen_4" data-bind="visible: mesh == 4, attr: { id: 'screen_4_' + $index() }">
                    <div class="dropable"></div>
                    <div class="dropable"></div>
                    <div class="dropable"></div>
                    <div class="dropable"></div>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="row">
                <div class="col-md-4">
                  <div class="col-md-12">
                    <a class="acond addcond" href="javascript:void(0);" data-bind="click: addScreen"><i class="fa fa-plus-circle"></i> <?php echo $this->l10n->__('Add Screen', 'Monitor'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div id="fixCamerasList" class="form-group">
              <div class="mb-3">
                <span class="lb-camera-list"><?php echo $this->l10n->__('List Cameras', 'Monitor'); ?></span>
              </div>
              <div>
                <?php echo $this->tag->textField(array('keyword', 'class' => 'form-control', 'placeholder' => $this->l10n->_('Search'))); ?>
              </div>
              <div id="style-1" class="cameras_bound">
                <table id="list_camera">
                  <thead>
                  <tr>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody class="listcamera" data-bind="foreach: cameras">
                  <tr class="draggable">
                    <td data-bind="attr:{camera_id: $data.id, group_name:$data.group_name}">
                      <i class="fa fa-video-camera align-middle"></i>
                      <span class="lb-camera ellipsis" data-bind="text: $data.name"></span>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <div class="text-center">
                <button class="btn btn-primary" data-bind="click: saveData"><?php echo $this->l10n->_('Save'); ?></button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <?php echo $this->tag->hiddenField(array('cameras_data', 'value' => $cameras_data)); ?>
    <?php echo $this->tag->hiddenField(array('monitor_data', 'value' => $monitor_data)); ?>
    <?php echo $this->tag->hiddenField(array('monitor_id', 'value' => $monitor_id)); ?>
    <?php echo $this->tag->hiddenField(array('min_inteval', 'value' => $min_display_interval)); ?>
    <?php echo $this->tag->hiddenField(array('max_inteval', 'value' => $max_display_interval)); ?>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <?php echo $this->partial('partials/paginatorscript'); ?>
  <?php echo $this->tag->javascriptInclude('js/jquery-ui.min.js'); ?>
  <?php echo $this->tag->javascriptInclude('js/knockout-3.5.0rc.js'); ?>
  <?php echo $this->tag->javascriptInclude('js/monitorsetting.js'); ?>
  <?php echo $this->partial('partials/pickerscript'); ?>

</body>
</html>
