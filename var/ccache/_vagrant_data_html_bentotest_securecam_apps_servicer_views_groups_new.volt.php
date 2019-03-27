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

    <section class="content-header" >
      <h1><?php echo $this->l10n->_('Manage Groups'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/groups/index/' . $member->id, $this->l10n->_('Manage Groups'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <?php echo $this->tag->form(array('servicer/groups/create', 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form')); ?>

        <?php echo $this->tag->hiddenField(array('user_id', 'value' => $identity['id'])); ?>

        <div class="box-body">
<?php if ($newlayer == 1) { ?>
<?php $this->partial('groups/new-layer1', array('group' => $group)); ?>
<?php } ?>
<?php if ($newlayer == 2) { ?>
<?php $this->partial('groups/new-layer2', array('group' => $group)); ?>
<?php } ?>
<?php if ($newlayer == 3) { ?>
<?php $this->partial('groups/new-layer3', array('group' => $group)); ?>
<?php } ?>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->submitButton(array($this->l10n->_('Save'), 'class' => 'btn btn-info')); ?>

            <?php echo $this->tag->linkTo(array('servicer/groups/arrangement/' . $member->id, $this->l10n->_('Cancel'), 'class' => 'btn btn-default')); ?>

          </div>
        </div>
        <?php echo $this->tag->endForm(); ?>

      </div>
    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>


</body>
</html>
