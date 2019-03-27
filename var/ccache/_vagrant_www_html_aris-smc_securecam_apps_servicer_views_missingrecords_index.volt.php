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
      <h1><?= $this->l10n->_('Video missing logs') ?></h1>
      <ol class="breadcrumb">
        <li><?= $this->tag->linkTo(['servicer/main/index', $this->l10n->_('<i class="fa fa-dashboard"></i> DashBoard')]) ?></li>
        <li><?= $this->tag->linkTo(['servicer/missingrecords/index&hide', $this->l10n->_('Video missing logs')]) ?></li>
        <li class="active"><?= $this->escaper->escapeHtml($page_heading) ?></li>
      </ol>
    </section>

    <section class="content">
<?= $this->escaper->escapeHtml($this->flash->output()) ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?= $this->escaper->escapeHtml($page_heading) ?></h3>

          <button class="btn btn-default btn-sm xoutput exportcsv <?= $show ?>" type="submit"><?= $this->l10n->_('<i class="fa fa-file-excel-o"></i><span>Export</span>') ?></button>

        </div>
        <div class="box-body" data-csrftoken="<?= $this->security->getToken() ?>">

<?= $this->partial('partials/paginator/missingrecords') ?>

        </div>
      </div>

<?= $this->partial('partials/filter/missingrecords') ?>

<?= $this->partial('partials/csvconformation') ?>
    </section>

</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> <?= constant('ABC_APPVERSION') ?></div>
<strong>&copy;<span class="hidden-xs"> 2016 - <?= date('Y') ?></span> <?= constant('ABC_APPNAME') ?></strong>
</footer>

</div>

<?= $this->partial('partials/javascripts') ?>

<?= $this->tag->javascriptInclude('js/searchform.js') ?>
<script>

$(function() {
   $.searchform({
    modal    : '.filter-dialog',
    cancelBtn: 'button[filter-handler=reset]',
    submitBtn: 'button[filter-handler=apply]',
    formOpen : 'button.page-filter',
    formEntry: ['member_endpoint','chk_agentbox','agentbox_name','camera_type','camera_suspension','name','date','date_type','missing_duration'],
    childrenPath:'<?= $this->url->get('servicer/groups/getchildren') ?>',
    chooseLabel :'<?= $this->l10n->_('Choose...') ?>'
  });
  $.confirmationform({
    modal: '.confirmation-dialog',
    cancelBtn: 'button[filter-handler=cancel]',
    submitBtn: 'button[filter-handler=ok]',
    formOpen : 'button.exportcsv',
    childrenPath:'<?= $this->url->get('servicer/missingrecords/exportcsv') ?>',
    message: '<?= $this->l10n->_('Do you want to Export CSV?') ?>'
  });

  //remeber seleted date.
  local_date_type = '<?= $date_type ?>';
  localStorage.setItem('date_type',local_date_type);
  if(local_date_type == 1) {
    localStorage.setItem('date_month','<?= $date ?>');  
    if(localStorage.getItem('date_day') == null)
      localStorage.setItem('date_day','<?= $date ?>');  
  }else{
    localStorage.setItem('date_day','<?= $date ?>');  
    if(localStorage.getItem('date_month') == null)
      localStorage.setItem('date_month','<?= $date ?>');
  } 
  
  //Show input date
  $('#date_day').datetimepicker({
    format:'Y-MM-DD',
    locale:'ja',
    defaultDate: localStorage.getItem('date_day'),
    dayViewHeaderFormat:'<?= $this->l10n->_('MMM YYYY') ?>',
    maxDate: "<?= $currentDate ?>",
    minDate: "<?= $minDate ?>",
    tooltips: {
      today: '<?= $this->l10n->_('Select Today') ?>',
      clear: '<?= $this->l10n->_('Deselect') ?>',
      close: '<?= $this->l10n->_('Close') ?>',
      selectMonth: '<?= $this->l10n->_('Select Month') ?>',
      prevMonth: '<?= $this->l10n->_('Previous Month') ?>',
      nextMonth: '<?= $this->l10n->_('Next Month') ?>',
      selectYear: '<?= $this->l10n->_('Select Year') ?>',
      prevYear: '<?= $this->l10n->_('Previous Year') ?>',
      nextYear: '<?= $this->l10n->_('Next Year') ?>'
    }
  });
  $('#date_month').datetimepicker({
    format:'Y-MM',
    locale:'ja',
    defaultDate: localStorage.getItem('date_month'),
    dayViewHeaderFormat:'<?= $this->l10n->_('MMM YYYY') ?>',
    maxDate: "<?= $currentDate ?>",
    minDate: "<?= $minDate ?>",
    tooltips: {
      today: '<?= $this->l10n->_('Select Today') ?>',
      clear: '<?= $this->l10n->_('Deselect') ?>',
      close: '<?= $this->l10n->_('Close') ?>',
      selectMonth: '<?= $this->l10n->_('Select Month') ?>',
      prevMonth: '<?= $this->l10n->_('Previous Month') ?>',
      nextMonth: '<?= $this->l10n->_('Next Month') ?>',
      selectYear: '<?= $this->l10n->_('Select Year') ?>',
      prevYear: '<?= $this->l10n->_('Previous Year') ?>',
      nextYear: '<?= $this->l10n->_('Next Year') ?>'
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

  //Sort
  $('#table_missing_duration').DataTable( {
    "order": [],
    "bPaginate": false,
    "searching": false
  } );

});
</script>
<?= $this->partial('partials/pickerscript') ?>

</body>
</html>
