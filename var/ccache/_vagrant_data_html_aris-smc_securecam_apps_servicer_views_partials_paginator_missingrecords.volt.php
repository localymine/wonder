<?php if ($date_type == 0) { ?>  
<form class="form-inline" action="/servicer/missingrecords/index" method="get" role="form" autocomplete="off">
  <input type="hidden"  name="missing_duration" value="3">
  <input type="hidden"  name="date_type" value="0">
  <div class="form-group">
    <span><?php echo $this->l10n->_('Day'); ?></span>
    <div class="input-group">
      <input type="text" id="date_day" name="date" class="form-control">
      <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
      </span>
    </div> 
    <button type="submit" class="btn btn-info"><?php echo $this->l10n->_('Search'); ?></button>
  </div>
<?php } else { ?>
<form class="form-inline" action="/servicer/missingrecords/exportcsv" method="get" role="form" autocomplete="off">
  <input type="hidden"  name="date_type" value="1">
  <div class="form-group">
    <span><?php echo $this->l10n->_('Month'); ?></span>
    <div class="input-group">
      <input type="text" id="date_month" name="date" class="form-control">
      <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
      </span>
    </div> 
    <button type="submit" class="btn btn-info"><?php echo $this->l10n->_('Export'); ?></button>
  </div>
<?php } ?>
</form>
<div class="<?php echo $show; ?>">
  <?php echo $this->nav->getPaginatorMissingRecords($page, 'servicer/missingrecords/index', 'ontop'); ?>
  <?php if (!(empty($page->items))) { ?>
            <table class="table table-bordered table-condenced table-hover cameras-list" id="table_missing_duration">
            <colgroup>
            <col>
            <col>
            <col>
            <col>
            </colgroup>
            <thead>
            <tr>
            <th><?php echo $this->l10n->_('Member Name'); ?></th>
            <th><?php echo $this->l10n->_('Endpoint'); ?></th>
            <th><?php echo $this->l10n->_('Agentbox Name'); ?></th>
            <th><?php echo $this->l10n->_('Camera Name'); ?></th>
            <th><?php echo $this->l10n->_('Type of Camera'); ?></th>
            <th><?php echo $this->l10n->_('Duration (Minute)'); ?></th>

            </tr>
            </thead>
            <tbody>


  <?php foreach ($page->items as $missingrecord) { ?>
            <tr>
              <td><?php echo $this->escaper->escapeHtml($missingrecord['memberName']); ?></td>
              <td><?php echo $this->escaper->escapeHtml($missingrecord['layer3']); ?></td>
              <td><?php echo $this->escaper->escapeHtml($missingrecord['agentboxName']); ?></td>
              <td><?php echo $this->escaper->escapeHtml($missingrecord['name']); ?></td>
              <td class="text-center"><?php echo $this->escaper->escapeHtml($missingrecord['typeOfCamera']); ?></td>
              <td class="vlogmin"><?php echo number_format($this->escaper->escapeHtml($missingrecord['duration_min'])); ?></td>
            </tr>
  <?php } ?>
  <?php } else { ?>
  <?php echo $this->l10n->_('No Result'); ?>
  <?php } ?>
            </tbody>
            </table>

  <?php echo $this->nav->getPaginatorMissingRecords($page, 'servicer/missingrecords/index', 'onbottom'); ?>
</div>
