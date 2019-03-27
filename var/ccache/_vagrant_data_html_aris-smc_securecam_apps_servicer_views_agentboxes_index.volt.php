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
      <h1><?php echo $this->l10n->_('Manage Agentboxes'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/agentboxes/index', $this->l10n->_('Manage Agentboxes'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->escaper->escapeHtml($this->flash->output()); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
          <?php echo $this->tag->linkTo(array('servicer/agentboxes/new', $this->l10n->_('<i class="fa fa-file"></i><span>New</span>'), 'class' => 'btn btn-primary btn-sm xcenter')); ?>

          <button class="btn btn-default btn-sm xoutput exportcsv" type="submit"><?php echo $this->l10n->_('<i class="fa fa-file-excel-o"></i><span>Export</span>'); ?></button>

        </div>
        <div class="box-body" data-csrftoken="<?php echo $this->security->getToken(); ?>">

<?php echo $this->partial('partials/paginator/agentboxes'); ?>

        </div>
      </div>

<?php echo $this->partial('partials/filter/agentboxes'); ?>

<?php echo $this->partial('partials/csvconformation'); ?>
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
$(function() {
  $.searchform({
    modal    : '.filter-dialog',
    cancelBtn: 'button[filter-handler=reset]',
    submitBtn: 'button[filter-handler=apply]',
    formOpen : 'button.page-filter',
    formEntry: ['root_id','area_id','group_id','name','hwaddr','status','memtype','firmver'],
    childrenPath:'<?php echo $this->url->get('servicer/groups/getchildren'); ?>',
    chooseLabel :'<?php echo $this->l10n->_('Choose...'); ?>'
  });
  $.confirmationform({
      modal: '.confirmation-dialog',
      cancelBtn: 'button[filter-handler=cancel]',
      submitBtn: 'button[filter-handler=ok]',
      formOpen : 'button.exportcsv',
      childrenPath:'<?php echo $this->url->get('servicer/agentboxes/exportcsv'); ?>',
      message: '<?php echo $this->l10n->_('Do you want to Export CSV?'); ?>'
  });
  $(document).on('click', 'button[data-aboxid]:not(.disabled)', function(evt) {
    var evtgt = $(evt.currentTarget);
    var aboxid = evtgt.attr('data-aboxid');
    var aboxname = evtgt.attr('data-aboxname');
    var state = parseInt($(this).attr('data-aboxstate'));
    var options = {
      title:'<?php echo $this->l10n->_('Schedule reboot Agentbox'); ?>'
    };
    switch(state) {
      case 1:
      case 2:
        options.message = String('<?php echo $this->l10n->_('Do you want to reboot this Agentbox <strong>%s</strong>?<br>This cannot be undone.'); ?>').replace('%s', aboxname);
        options.buttons = {
          cancel:{
            label:'<?php echo $this->l10n->_('<i class="fa fa-times"></i> Cancel'); ?>'
          },
          confirm:{
            label:'<?php echo $this->l10n->_('<i class="fa fa-check"></i> Confirm'); ?>'
          }
        };
        options.callback = function(confirmed) {
          if (confirmed) {
            var token = $('.box-body').attr('data-csrftoken');
            var post_data = {
              id:aboxid,
              redirect:location.href,
              csrf:token
            };
            $.smcsupport.showLoading();
            $.ajax({
              type:'POST',
              url :'/servicer/agentboxes/setreboot',
              data:post_data,
              dataType:'json',
              cache:false
            }).done(function(data/*, textStatus, jqXHR*/) {
              if (data.success == 1) {
                if (data.csrf) {
                  $('.box-body').attr('data-csrftoken', data.csrf);
                }
                setTimeout(function() {
                  $.smcsupport.hideLoading();
                  $('.box-body').empty().html(data.markup);
                  $('[data-affect=paginator]').selectpicker('refresh');
                  $.smcsupport.bsAlert('success', data.flash);
                }, 2000);
              } else {
                $.smcsupport.bsAlert('error', data.flash);
              }
            });
          }
        };
        bootbox.confirm(options);
      break;
      case 3:
        options.message = String('<?php echo $this->l10n->_('The Agentbox <strong>%s</strong> is already reboot-scheduled.'); ?>').replace('%s', aboxname);
        options.buttons = {
          cancel:{
            label:'<?php echo $this->l10n->_('<i class="fa fa-times"></i> Cancel'); ?>'
          }
        }
        bootbox.dialog(options);
      break;
      case 4:
        options.message = String('<?php echo $this->l10n->_('The Agentbox <strong>%s</strong> is rebooting.<br>Please wait a minutes.'); ?>').replace('%s', aboxname);
        options.buttons = {
          cancel:{
            label:'<?php echo $this->l10n->_('<i class="fa fa-times"></i> Cancel'); ?>'
          }
        }
        bootbox.dialog(options);
      break;
    }
  }).on('mouseover', '.meta-href.enable', function(evt) {
    $(evt.target).tooltip('show');
  }).on('mouseout', '.meta-href.enable', function(evt) {
    $(evt.target).tooltip('hide');
  }).on('click', '.meta-href.enable', function(evt) {
    var addr = 'http://' + evt.target.textContent + '/';
    window.open(addr);
  }).keydown(function(evt) {
    if (evt.keyCode === 18) {
      $('.meta-href').addClass('enable').tooltip({title:'<?php echo $this->l10n->_('Go to Agentbox Administration login'); ?>'});
    }
  }).keyup(function(evt) {
    $('.meta-href').removeClass('enable').tooltip('destroy');
  });
  $(window).on('blur', function() {
    $(document).keyup();
  }).on('unload', function() {
    $(document).off('blur')
      .off('mouseover', '.meta-href.enable')
      .off('mouseout', '.meta-href.enable')
      .off('click', '.meta-href.enable')
      .off('click', 'button[data-aboxid]:not(.disabled)');
  });
});
</script>
<?php echo $this->partial('partials/pickerscript'); ?>

</body>
</html>
