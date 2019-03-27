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
      <h1><?= $this->l10n->_('Manage VIEW Accounts') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/viewaccounts/index', $this->l10n->_('Manage VIEW Accounts')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->flash->output() ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
        </div>
        <?= $this->tag->form(['servicer/viewaccounts/save/' . $group->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) ?>

        <?= $this->tag->hiddenField(['id', 'value' => $group->id]) ?>

        <?= $this->tag->hiddenField(['member_id', 'value' => $group->member->id]) ?>

        <?= $this->tag->hiddenField(['user_id', 'value' => $group->user_id]) ?>

        <div class="box-body">
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Id') ?></label>
            <div class="col-xs-12 col-sm-2">
              <span class="form-control"><?= $group->id ?></span>
            </div>
          </div>
<?php if ($group->layer == 1) { ?>
<?php $this->partial('viewaccounts/edit-layer1', ['group' => $group]); ?>
<?php } ?>
<?php if ($group->layer == 2) { ?>
<?php $this->partial('viewaccounts/edit-layer2', ['group' => $group]); ?>
<?php } ?>
<?php if ($group->layer == 3) { ?>
<?php $this->partial('viewaccounts/edit-layer3', ['group' => $group]); ?>
<?php } ?>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?= $this->tag->submitButton([$this->l10n->_('Save'), 'class' => 'btn btn-info']) ?>

            <?= $this->tag->linkTo(['servicer/viewaccounts/arrangement/' . $group->member_id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default']) ?>

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
    $('[type=checkbox]').iCheck({
      checkboxClass:'icheckbox_minimal-blue'
    }).on('ifChecked', function(evt) {
      $(this).attr('checked',true).val(1);
    }).on('ifUnchecked', function(evt) {
      $(this).removeAttr('checked').val(0);
    });
  });
</script>

</body>
</html>
