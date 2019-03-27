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
      <h1><?php echo $this->l10n->_('Video missing logs'); ?></h1>
      <ol class="breadcrumb">
        <li><?php echo $this->tag->linkTo(array('servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard'))); ?></li>
        <li><?php echo $this->tag->linkTo(array('servicer/missingrecords/index&hide', $this->l10n->_('Video missing logs'))); ?></li>
        <li class="active"><?php echo $this->escaper->escapeHtml($page_heading); ?></li>
      </ol>
    </section>

    <section class="content">
<?php echo $this->escaper->escapeHtml($this->flash->output()); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>

          <button class="btn btn-default btn-sm xoutput exportcsv <?php echo $show; ?>" type="submit"><?php echo $this->l10n->_('<i class="fa fa-file-excel-o"></i><span>Export</span>'); ?></button>

        </div>
        <div class="box-body" data-csrftoken="<?php echo $this->security->getToken(); ?>">

<?php echo $this->partial('partials/paginator/missingrecords'); ?>

        </div>
      </div>

<?php echo $this->partial('partials/filter/missingrecords'); ?>

<?php echo $this->partial('partials/csvconformation'); ?>
    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?php echo constant('ABC_APPVERSION'); ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?php echo date('Y'); ?></span> <?php echo constant('ABC_APPNAME'); ?></strong>
</footer>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

<?php echo $this->tag->javascriptInclude('js/searchform.js'); ?>
<script>

$(function() {
   $.searchform({
    modal    : '.filter-dialog',
    cancelBtn: 'button[filter-handler=reset]',
    submitBtn: 'button[filter-handler=apply]',
    formOpen : 'button.page-filter',
    formEntry: ['member_endpoint','chk_agentbox','agentbox_name','camera_type','camera_suspension','name','date','date_type','missing_duration'],
    childrenPath:'<?php echo $this->url->get('servicer/groups/getchildren'); ?>',
    chooseLabel :'<?php echo $this->l10n->_('Choose...'); ?>'
  });
  $.confirmationform({
    modal: '.confirmation-dialog',
    cancelBtn: 'button[filter-handler=cancel]',
    submitBtn: 'button[filter-handler=ok]',
    formOpen : 'button.exportcsv',
    childrenPath:'<?php echo $this->url->get('servicer/missingrecords/exportcsv'); ?>',
    message: '<?php echo $this->l10n->_('Do you want to Export CSV?'); ?>'
  });

  //remeber seleted date.
  local_date_type = '<?php echo $date_type; ?>';
  localStorage.setItem('date_type',local_date_type);
  if(local_date_type == 1) {
    localStorage.setItem('date_month','<?php echo $date; ?>');  
    if(localStorage.getItem('date_day') == null)
      localStorage.setItem('date_day','<?php echo $date; ?>');  
  }else{
    localStorage.setItem('date_day','<?php echo $date; ?>');  
    if(localStorage.getItem('date_month') == null)
      localStorage.setItem('date_month','<?php echo $date; ?>');
  } 
  
  //Show input date
  $('#date_day').datetimepicker({
    format:'Y-MM-DD',
    locale:'ja',
    defaultDate: localStorage.getItem('date_day'),
    dayViewHeaderFormat:'<?php echo $this->l10n->_('MMM YYYY'); ?>',
    maxDate: "<?php echo $currentDate; ?>",
    minDate: "<?php echo $minDate; ?>",
    tooltips: {
      today: '<?php echo $this->l10n->_('Select Today'); ?>',
      clear: '<?php echo $this->l10n->_('Deselect'); ?>',
      close: '<?php echo $this->l10n->_('Close'); ?>',
      selectMonth: '<?php echo $this->l10n->_('Select Month'); ?>',
      prevMonth: '<?php echo $this->l10n->_('Previous Month'); ?>',
      nextMonth: '<?php echo $this->l10n->_('Next Month'); ?>',
      selectYear: '<?php echo $this->l10n->_('Select Year'); ?>',
      prevYear: '<?php echo $this->l10n->_('Previous Year'); ?>',
      nextYear: '<?php echo $this->l10n->_('Next Year'); ?>'
    }
  });
  $('#date_month').datetimepicker({
    format:'Y-MM',
    locale:'ja',
    defaultDate: localStorage.getItem('date_month'),
    dayViewHeaderFormat:'<?php echo $this->l10n->_('MMM YYYY'); ?>',
    maxDate: "<?php echo $currentDate; ?>",
    minDate: "<?php echo $minDate; ?>",
    tooltips: {
      today: '<?php echo $this->l10n->_('Select Today'); ?>',
      clear: '<?php echo $this->l10n->_('Deselect'); ?>',
      close: '<?php echo $this->l10n->_('Close'); ?>',
      selectMonth: '<?php echo $this->l10n->_('Select Month'); ?>',
      prevMonth: '<?php echo $this->l10n->_('Previous Month'); ?>',
      nextMonth: '<?php echo $this->l10n->_('Next Month'); ?>',
      selectYear: '<?php echo $this->l10n->_('Select Year'); ?>',
      prevYear: '<?php echo $this->l10n->_('Previous Year'); ?>',
      nextYear: '<?php echo $this->l10n->_('Next Year'); ?>'
    }
  });

  //Save status checkbox agentbox filter
  $('#chk_agentbox').change(function(){
      this.value = Number(this.checked);
      this.value == true?showAgentBoxFilter(true):showAgentBoxFilter(false);
  });
  function showAgentBoxFilter(show){
    show == true ?agentbox_name.disabled = "": agentbox_name.disabled = "disabled";
  }
  if($('#chk_agentbox').is(":checked")){
    chk_agentbox.value = 1;
    showAgentBoxFilter(true)
  }else{
    chk_agentbox.value = 0;
    showAgentBoxFilter(false);
  }

  //Save status checkbox camera suspension
  $('#camera_suspension').change(function(){
      this.value = Number(this.checked);
  });
  if($('#camera_suspension').is(":checked")){
      camera_suspension.value = 1;
  }else{
      camera_suspension.value = 0;
  }

});
</script>
<?php echo $this->partial('partials/pickerscript'); ?>

</body>
</html>
