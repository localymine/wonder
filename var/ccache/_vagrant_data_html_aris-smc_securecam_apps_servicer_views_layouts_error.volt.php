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
<?= $this->tag->getTitle() ?>
</head>
<body class="skin-blue http-error">

<div class="wrapper">

<header class="main-header">
<a href="<?= $this->url->get('servicer/main/index') ?>" class="logo"><span class="logo-mini"><b>S</b>MC</span><span class="logo-lg"><b>Secure</b>MC</span></a>
</header>

<div class="content-wrapper">
<div class="error-msg">
<section>
<?= $this->getContent() ?>
</section>
</div>
</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>
</body>
</html>
