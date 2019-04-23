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

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">

<div class="wrapper">

<header class="main-header">
<?php echo $this->partial('partials/mainheader'); ?>
</header>

<aside class="main-sidebar">

  <?php echo $this->partial('partials/sidebar'); ?>

</aside>

<div class="content-wrapper">

  <section class="content-header">
    <h1><?php echo $this->l10n->_('Manage Clients'); ?></h1>
    <ol class="breadcrumb">
      <li><?php echo $this->tag->linkTo(array('manager/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
      <li><?php echo $this->tag->linkTo(array('manager/clients/index', $this->l10n->_('Manage Clients'))); ?></li>
      <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
    </ol>
  </section>

  <section class="content">
    <?php echo $this->flash->output(); ?>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
      </div>
      <?php echo $this->tag->form(array('manager/clients/save', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

      <?php echo $this->tag->hiddenField(array('user_id', 'value' => $client->user_id)); ?>

      <?php echo $this->tag->hiddenField(array('id', 'value' => $client->id)); ?>

      <div class="box-body">
        <div class="form-group required">
          <label for="course" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Country'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('country_id', $countries, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $client->country_id)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Name'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'value' => $client->name)); ?>

          </div>
        </div>

        <div class="form-group required">
          <label for="type" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Type'); ?></label>
          <div class="col-xs-12 col-sm-3">
            <?php echo $this->tag->select(array('type', $type, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $client->type)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="firstname" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Firstname'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('firstname', 'class' => 'form-control', 'value' => $client->firstname)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="lastname" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Lastname'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('lastname', 'class' => 'form-control', 'value' => $client->lastname)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="postal" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Postal'); ?></label>
          <div class="col-xs-12 col-sm-2">
            <?php echo $this->tag->textField(array('postal', 'class' => 'form-control', 'value' => $client->postal)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Address'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('address', 'class' => 'form-control', 'value' => $client->address)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Email'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('email', 'class' => 'form-control', 'value' => $client->email)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Phone'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textField(array('phone', 'class' => 'form-control', 'value' => $client->phone)); ?>

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Remarks'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <?php echo $this->tag->textArea(array('remarks', 'class' => 'form-control', 'rows' => '3', 'value' => $client->remarks)); ?>

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Disabled'); ?></label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                <?php if ($client->disabled == 1) { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1, 'checked' => true)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } else { ?>
                  <?php echo $this->tag->checkField(array('disabled', 'name' => 'disabled', 'value' => 1)); ?> <?php echo $this->l10n->_('Disabled'); ?>

                <?php } ?>

              </label>
            </div>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

          <?php echo $this->tag->linkTo(array('manager/clients/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

        </div>
      </div>
      <?php echo $this->tag->endForm(); ?>

    </div>
  </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('SKR_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2018 - <?php echo date('Y'); ?></span> <?php echo constant('SKR_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });
    });
  </script>

</body>
</html>
