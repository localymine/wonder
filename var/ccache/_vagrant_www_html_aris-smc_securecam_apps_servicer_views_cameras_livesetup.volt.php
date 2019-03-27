<?= $this->tag->getDoctype() ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?= $this->partial('partials/stylesheets') ?>
<!--[if lt IE 9]>
<?= $this->tag->javascriptInclude('js/ie/html5shiv.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/respond.min.js') ?>
<?= $this->tag->javascriptInclude('js/ie/excanvas.js') ?>
<![endif]-->
<!--[if gte IE 9]>
<?= $this->tag->javascriptInclude('js/ie/polyfill.min.js') ?>
<![endif]-->
<?= $this->tag->getTitle() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini<?php if (isset($bodycollapsed)) { ?> sidebar-collapse<?php } ?>">

<div class="wrapper">

<header class="main-header">
<?= $this->partial('partials/mainheader') ?>
</header>

<aside class="main-sidebar">

<?= $this->partial('partials/sidebar') ?>

</aside>

<div class="content-wrapper">

    <section class="content-header">
      <h1><?= $this->l10n->_('Manage Cameras') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/cameras/index', $this->l10n->_('Manage Cameras')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
<?php if ($camera->live == 1) { ?>
        <?= $this->tag->form(['servicer/cameras/livesetup/' . $camera->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['id', 'value' => $camera->id]) ?>

        <div class="box-body">
<?php if ($camera->type == 4) { ?>
          <?= $this->tag->hiddenField(['ovf_port', 'value' => $camera->cameraoption->ovf_port]) ?>

          <?= $this->tag->hiddenField(['ovf_talk', 'value' => $camera->cameraoption->ovf_talk]) ?>

          <?= $this->tag->hiddenField(['ovf_audio', 'value' => $camera->cameraoption->ovf_audio]) ?>

          <div class="form-group">
            <label for="ovf_type" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->__('RTSP options', 'RTSP') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->select(['ovf_type', $ovf_types, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'emptyValue' => 0, 'value' => $camera->cameraoption->ovf_type]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="ovf_uri" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->__('RTSP Live Streaming URI', 'RTSP') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ovf_uri', 'name' => 'ovf_uri', 'class' => 'form-control', 'value' => $camera->cameraoption->ovf_uri]) ?>

            </div>
          </div>
<?php } else { ?>

          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Live Port') ?></label>
            <div class="col-xs-12 col-sm-2">
              <span class="form-control"><?= $this->escaper->escapeHtml($camera->port) ?></span>
            </div>
          </div>
          <div class="form-group">
            <label for="liveurl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Live URL') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['liveurl', 'name' => 'liveurl', 'class' => 'form-control', 'value' => $camera->liveurl]) ?>

            </div>
          </div>
<?php } ?>
<?php if ($camera->ptz == 1) { ?>
          <div class="form-group">
            <label for="ptzupurl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ Tilt up command') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ptzupurl', 'name' => 'ptzupurl', 'class' => 'form-control', 'value' => $camera->ptzupurl]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="ptzdownurl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ Tilt down command') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ptzdownurl', 'name' => 'ptzdownurl', 'class' => 'form-control', 'value' => $camera->ptzdownurl]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="ptzlefturl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ Pan left command') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ptzlefturl', 'name' => 'ptzlefturl', 'class' => 'form-control', 'value' => $camera->ptzlefturl]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="ptzrighturl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ Pan right command') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ptzrighturl', 'name' => 'ptzrighturl', 'class' => 'form-control', 'value' => $camera->ptzrighturl]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="ptzzoominurl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ Zoom in command') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ptzzoominurl', 'name' => 'ptzzoominurl', 'class' => 'form-control', 'value' => $camera->ptzzoominurl]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="ptzzoomouturl" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('PTZ Zoom out command') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['ptzzoomouturl', 'name' => 'ptzzoomouturl', 'class' => 'form-control', 'value' => $camera->ptzzoomouturl]) ?>

            </div>
          </div>
<?php } else { ?>
          <div class="form-group">
            <div class="col-xs-12 col-sm-8 col-sm-offset-3">
              <p class="form-control-static"><?= $this->l10n->_('PTZ is disabled.') ?></p>
            </div>
          </div>
<?php } ?>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

            <?= $this->tag->linkTo(['servicer/cameras/show/' . $camera->id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

          </div>
        </div>
        <?= $this->tag->endForm() ?>

<?php } else { ?>
        <div class="box-body">
          <div class="form-group">
            <div class="col-xs-12 col-sm-12">
              <p class="form-control-static text-center"><?= $this->l10n->_('Live is disabled.') ?></p>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->linkTo(['servicer/cameras/show/' . $camera->id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

          </div>
        </div>
<?php } ?>
      </div>
    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>


</body>
</html>
