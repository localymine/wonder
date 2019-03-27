<?php if ($date_type == 0) { ?>  
<form class="form-inline" action="/servicer/missingrecords/index" method="get" role="form" autocomplete="off">
  <input type="hidden"  name="missing_duration" value="3">
  <input type="hidden"  name="date_type" value="0">
  <div class="form-group">
    <span><?= $this->l10n->_('Day') ?></span>
    <div class="input-group">
      <input type="text" id="date_day" name="date" class="form-control">
      <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
      </span>
    </div> 
    <button type="submit" class="btn btn-info"><?= $this->l10n->_('Search') ?></button>
  </div>
<?php } else { ?>
<form class="form-inline" action="/servicer/missingrecords/exportcsv" method="get" role="form" autocomplete="off">
  <input type="hidden"  name="date_type" value="1">
  <div class="form-group">
    <span><?= $this->l10n->_('Month') ?></span>
    <div class="input-group">
      <input type="text" id="date_month" name="date" class="form-control">
      <span class="input-group-addon">
        <span class="fa fa-calendar"></span>
      </span>
    </div> 
    <button type="submit" class="btn btn-info"><?= $this->l10n->_('Export') ?></button>
  </div>
<?php } ?>
</form>
<div class="<?= $show ?>">
  <?= $this->nav->getPaginatorMissingRecords($page, 'servicer/missingrecords/index', 'ontop') ?>
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
            <th><?= $this->l10n->_('Member Name') ?></th>
            <th><?= $this->l10n->_('Endpoint') ?></th>
            <th><?= $this->l10n->_('Agentbox Name') ?></th>
            <th><?= $this->l10n->_('Camera Name') ?></th>
            <th><?= $this->l10n->_('Type of Camera') ?></th>
            <th><?= $this->l10n->_('Duration (Minute)') ?></th>

            </tr>
            </thead>
            <tbody>

  <?php foreach ($page->items as $missingrecord) { ?>
            <tr>
             <td><span class="motion-enable<?php if ($camera->motion == 1) { ?> enabled<?php } ?>"></span><?= $this->escaper->escapeHtml($missingrecord['memberName']) ?></td>
            <td><?= $this->escaper->escapeHtml($missingrecord['layer3']) ?></td>
            <td><?= $this->escaper->escapeHtml($missingrecord['agentboxName']) ?></td>
            <td><?= $this->escaper->escapeHtml($missingrecord['name']) ?></td>
            <td><?= $this->escaper->escapeHtml($missingrecord['typeOfCamera']) ?></td>
            <td><?= $this->escaper->escapeHtml($missingrecord['duration']) ?></td>
  <?php } ?>
  <?php } else { ?>
  <?= $this->l10n->_('No Result') ?>
  <?php } ?>
            </tbody>
            </table>

  <?= $this->nav->getPaginatorMissingRecords($page, 'servicer/missingrecords/index', 'onbottom') ?>
</div>
