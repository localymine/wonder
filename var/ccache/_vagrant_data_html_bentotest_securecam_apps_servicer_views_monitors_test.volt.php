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
    <h1><?php echo $this->l10n->_('Test API'); ?></h1>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-body">
        <button id="sync" class="btn btn-danger">Sync from API</button>
        <button id="controller" class="btn btn-primary">Sync from Controller</button>
        <div id="sync_data">

        </div>
        <ul>
          <?php foreach ($cameras as $camera) { ?>
           <li><?php echo $camera->name; ?></li>
          <?php } ?>
        </ul>
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

  <?php echo $this->partial('partials/paginatorscript'); ?>
  <?php echo $this->tag->javascriptInclude('js/searchform.js'); ?>
  <script>
    $(function () {

      $('#sync').on('click', function () {
        $('#sync_data').empty();
        var post_data = {'actas' : 'Livemonitor', 'uniquekey' : '38da8c696ce24eb499e95cd5962afc44'};
        $.ajax({
          url: '/api/livemonitors/sync',
          type:'POST',
          data:post_data,
          dataType:'json',
          async:true,
          cache:false
        }).done(function (data){
          $('#sync_data').html(JSON.stringify(data));
        });
      });

      $('#controller').on('click', function () {
        $('#sync_data').empty();
        var post_data = {'actas' : 'Livemonitor', 'uniquekey' : '38da8c696ce24eb499e95cd5962afc44'};
        $.ajax({
          url: '/servicer/monitors/testapi',
          type:'POST',
          data:post_data,
          dataType:'json',
          async:true,
          cache:false
        }).done(function (data){
          $('#sync_data').html(JSON.stringify(data));
        });
      });

    });
  </script>
  <?php echo $this->partial('partials/pickerscript'); ?>

</body>
</html>
