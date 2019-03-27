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
    <h1><?= $this->l10n->_('Emails Export') ?></h1>
    <ol class="breadcrumb">
      <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
      <li><?= $this->tag->linkTo(['servicer/emails/index', $this->l10n->_('Emails Export')]) ?></li>
      <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
    </ol>
  </section>

  <section class="content">
    <?= $this->escaper->escapeHtml($this->flash->output()) ?>
    <div class="box">

      <?= $this->tag->form(['servicer/emails/index', 'method' => 'post', 'class' => 'form-horizontal form-ex-emails', 'role' => 'form']) ?>
      
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>

      <div class="box-body">
        <div class="col-xs-6 col-sm-6">
          <div class="form-group">
            <label class="col-xs-6 col-sm-6 control-label"><?= $this->l10n->_('Membership Suspension:') ?></label>
            <div class="col-xs-6 col-sm-6">
              <?= $this->tag->selectStatic(['member_status', $member_status, 'class' => 'form-control selectpicker show-tick', 'data-size' => 10, 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-6 col-sm-6 control-label"><?= $this->l10n->_('Camera Suspension:') ?></label>
            <div class="col-xs-6 col-sm-6">
              <?= $this->tag->selectStatic(['camera_status', $camera_status, 'class' => 'form-control selectpicker show-tick', 'data-size' => 10, 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-6 col-sm-6 control-label"><?= $this->l10n->_('Camera Types:') ?></label>
            <div class="col-xs-6 col-sm-6">
              <?= $this->tag->select(['cid', $cameratypes, 'using' => ['value', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-live-search' => true, 'data-size' => 10, 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-6">
          <div class="form-group">
            <label><?= $this->l10n->_('Mail Address') ?></label>
            <?= $this->tag->textArea(['lst_emails', 'class' => 'form-control show-tick', 'rows' => '8', 'value' => $model_data]) ?>
          </div>
        </div>
      </div>

      <div class="box-footer">
        <div class="col-xs-12 align-center">
          <button class="btn btn-primary" filter-handler="export"><i class="fa fa-times"></i> <?= $this->l10n->_('Export') ?></button>
          <button class="btn btn-white btn-cancel" filter-handler="cancel"><i class="fa fa-check"></i> <?= $this->l10n->_('Clear') ?></button>
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
    $(function (options) {
      $('.btn-cancel').on('click', function (e) {
        e.preventDefault();
        $('#lst_emails').empty();
      });
    });
  </script>

</body>
</html>
