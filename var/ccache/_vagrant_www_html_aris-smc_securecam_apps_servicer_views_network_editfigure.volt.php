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
    <h1><?= $this->l10n->_('Network  ') ?></h1>
    <ol class="breadcrumb">
      <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
      <li><?= $this->tag->linkTo(['servicer/groups/show/' . $group->id, $this->l10n->_('Detail of Group')]) ?></li>
      <li><?= $this->tag->linkTo(['servicer/network/show/' . $group->id, $this->l10n->_('Network')]) ?></li>
      <li><a href="javascript:void(0);"><?= $this->l10n->_('Network Figure') ?></a></li>
    </ol>
  </section>

  <section class="content">
    <?= $this->flash->output() ?>

    <?= $this->tag->form(['servicer/network/editfigure/' . $group->id, 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) ?>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>
      </div>

      <div class="box-body">

        <div class="form-group">
          <label class="col-xs-12 col-sm-12"><?= $this->l10n->_('Network figure') ?></label>
        </div>

        <div class="form-group">
          <label for="image" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Upload Image') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?= $this->tag->fileField(['image', 'class' => 'form-control']) ?>
          </div>
          <div class="col-xs-12 col-sm-4">
            <?php if ((isset($model->image) && $model->image != '')) { ?>
              <?= $this->tag->image(['/servicer/network/image/' . $group->id, 'class' => 'img-thumbnail']) ?>
              <a href="javascript:void(0)" class="btn btn-danger btn-delete btn-xs btn-delete-image" data-image="<?= $model->image ?>"><i class="fa fa-close"></i></a>
            <?php } else { ?>
              <i class="fa fa-image fa-5x"></i>
            <?php } ?>
          </div>
        </div>

        <div class="form-group">
          <label for="file" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Upload File') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?= $this->tag->fileField(['file', 'class' => 'form-control']) ?>
          </div>
          <div class="col-xs-12 col-sm-4">
            <?php if ((isset($model->file) && $model->file != '')) { ?>
              <?= $this->tag->linkTo(['/servicer/network/file/' . $group->id, $this->l10n->_('Download File')]) ?> <?= $model->file ?>
              <a href="javascript:void(0)" class="btn btn-danger btn-delete btn-xs btn-delete-file" data-image="<?= $model->file ?>"><i class="fa fa-close"></i></a>
            <?php } else { ?>
              <i class="fa fa-file fa-5x"></i>
            <?php } ?>
          </div>
        </div>

        <div class="list-seperator"></div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-12"><?= $this->l10n->_('Line type connection') ?></label>
        </div>

        <div class="form-group required">
          <label for="linetype_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Line types') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if ((isset($model->linetype_id))) { ?>
              <?= $this->tag->setDefault('linetype_id', $model->linetype_id) ?>
            <?php } ?>
            <?= $this->tag->select(['linetype_id', $linetypes, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>
          </div>
        </div>

        <div class="form-group">
          <label for="servicename" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Service name') ?></label>
          <div class="col-xs-12 col-sm-5">
            <?php if ((isset($model->servicename))) { ?>
              <?= $this->tag->setDefault('servicename', $model->servicename) ?>
            <?php } ?>
            <?= $this->tag->textField(['servicename', 'class' => 'form-control']) ?>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          <div class="col-xs-12 col-sm-12">
            <div class="text-center">
              <?= $this->tag->linkTo(['servicer/network/show/' . $group->id, $this->l10n->_('Back'), 'class' => 'btn btn-primary']) ?>
              <?= $this->tag->submitButton([$this->l10n->_('Submit'), 'class' => 'btn btn-success']) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= $this->tag->endForm() ?>
  </section>
  <?= $this->partial('partials/deleteconfirm') ?>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

  <?= $this->tag->javascriptInclude('js/deleteconfirm.js') ?>
  <script>
    $(function () {
      $.deleteconfirm({
        modal: '.deleteconfirm-dialog',
        cancelBtn: 'button[filter-handler=cancel]',
        submitBtn: 'button[filter-handler=ok]',
        formOpen : 'a.btn-delete-image',
        childrenPath:'<?= $this->url->get('servicer/network/delete') ?>',
        postdata: 'data={"gid":"<?= $group->id ?>","file":"<?= $model->image ?>","type":"1"}',
        message: '<?= $this->l10n->_('Do you want to delete?') ?>'
      });
    });
    $(function () {
      $.deleteconfirm({
        modal: '.deleteconfirm-dialog',
        cancelBtn: 'button[filter-handler=cancel]',
        submitBtn: 'button[filter-handler=ok]',
        formOpen : 'a.btn-delete-file',
        childrenPath:'<?= $this->url->get('servicer/network/delete') ?>',
        postdata: 'data={"gid":"<?= $group->id ?>","file":"<?= $model->file ?>","type":"2"}',
        message: '<?= $this->l10n->_('Do you want to delete?') ?>'
      });
    });
  </script>

</body>
</html>
