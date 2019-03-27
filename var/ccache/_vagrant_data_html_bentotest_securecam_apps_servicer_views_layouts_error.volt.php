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
<?php echo $this->tag->getTitle(); ?>
</head>
<body class="skin-blue http-error">

<div class="wrapper">

<header class="main-header">
<a href="<?php echo $this->url->get('servicer/main/index'); ?>" class="logo"><span class="logo-mini"><b>S</b>MC</span><span class="logo-lg"><b>Secure</b>MC</span></a>
</header>

<div class="content-wrapper">
<div class="error-msg">
<section>
<?php echo $this->getContent(); ?>
</section>
</div>
</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>
</body>
</html>
