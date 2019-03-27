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
      <h1><?php echo $this->l10n->_('Manage VIEW Accounts'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/index', $this->l10n->_('Manage VIEW Accounts'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="hidden-xs col-sm-4 group-header-pad">
              <h4><?php echo $this->l10n->_('Group root'); ?></h4>
            </div>
            <div class="hidden-xs col-sm-4 group-header-pad">
              <h4><?php echo $this->l10n->_('Area'); ?></h4>
            </div>
            <div class="hidden-xs col-sm-4 group-header-pad">
              <h4><?php echo $this->l10n->_('Endpoint'); ?></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-4">
<?php if (isset($layer1)) { ?>
              <div class="input-group input-group-sm input-group-fake group-header-pad">
                <span class="form-control"><?php echo $layer1->name; ?></span>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/show/' . $layer1->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Account'))); ?></li>
                  </ul>
                </span>
              </div>
<?php } ?>
            </div>
            <div class="col-xs-12 col-sm-8">
<?php if (isset($layer2)) { ?>
<?php $this->partial('viewaccounts/arrangement-layer2', array('layer2' => $layer2, 'layer3' => $layer3)); ?>
<?php } ?>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-xs-12 col-sm-12 align-center">
              <?php echo $this->tag->linkTo(array('servicer/members/show/' . $member->id, $this->l10n->_('Back to Detail of Member'), 'class' => 'silent')); ?>
            </div>
          </div>
        </div>
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
