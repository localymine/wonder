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
      <h1><?= $this->l10n->_('Surveils') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/surveils/index', $this->l10n->_('Surveils')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['servicer/surveils/saveoption', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['member_id', 'value' => $member->id]) ?>

        <div class="box-body">
          <div class="form-group required">
            <label for="latency" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Mail transmission frequency') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="radio">
<?php if ($member->latency == 1) { ?>
                <label><?= $this->tag->radioField(['latency_1', 'name' => 'latency', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('Every 10 minutes (Includes detected/restored)') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['latency_1', 'name' => 'latency', 'value' => 1]) ?> <?= $this->l10n->_('Every 10 minutes (Includes detected/restored)') ?></label>
<?php } ?>
              </div>
              <div class="radio">
<?php if ($member->latency == 0) { ?>
                <label><?= $this->tag->radioField(['latency_2', 'name' => 'latency', 'value' => 0, 'checked' => true]) ?> <?= $this->l10n->_('Just detected/restored only') ?></label>
<?php } else { ?>
                <label><?= $this->tag->radioField(['latency_2', 'name' => 'latency', 'value' => 0]) ?> <?= $this->l10n->_('Just detected/restored only') ?></label>
<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group required">
              <label for="urgentmail1" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Email Address') ?>1</label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['urgentmail1', 'class' => 'form-control', 'value' => $member->urgentmail1]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="urgentmail2" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Email Address') ?>2</label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['urgentmail2', 'class' => 'form-control', 'value' => $member->urgentmail2]) ?>

            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

            <?= $this->tag->linkTo(['servicer/surveils/show/' . $member->id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

          </div>
        </div>
        <?= $this->tag->endForm() ?>

      </div>

    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

<script>
  $(function(){
    $('[name=latency]').iCheck({
      radioClass:'iradio_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked','checked');
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked');
    }).change();
  });
</script>

</body>
</html>
