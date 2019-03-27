<?php echo $this->nav->getPaginator($page, 'camviewer/monitors/index', 'ontop'); ?>

<table class="table table-bordered table-condenced table-hover aboxes-list">
  <colgroup>
    <col>
    <col>
    <col>
    <col>
    <col>
    <col>
    <col class="strstatus">
    <col class="strstatus">
    <col class="actions actions-2">
  </colgroup>
  <thead>
  <tr>
    <th><?php echo $this->l10n->_('Group root'); ?></th>
    <th><?php echo $this->l10n->_('Area'); ?></th>
    <th><?php echo $this->l10n->_('Endpoint'); ?></th>
    <th><?php echo $this->l10n->__('Monitor Name', 'Monitor'); ?></th>
    <th><?php echo $this->l10n->_('IP Address'); ?></th>
    <th><?php echo $this->l10n->_('HW Address'); ?></th>
    <th><?php echo $this->l10n->_('Connection status'); ?></th>
    <th><span class="text-xs"><?php echo $this->l10n->_('Firmware Version'); ?></span></th>
    <th><i class="fa fa-cogs"></i></th>
  </tr>
  </thead>
  <tbody>
  <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $monitor) { ?>
      <tr>
        <td><?php echo $this->escaper->escapeHtml($monitor->group->parent->parent->name); ?></td>
        <td><?php echo $this->escaper->escapeHtml($monitor->group->parent->name); ?></td>
        <td><?php echo $this->escaper->escapeHtml($monitor->group->name); ?></td>
        <td><?php echo $this->escaper->escapeHtml($monitor->name); ?></td>
        <td class="monospaced"><?php echo $this->escaper->escapeHtml($monitor->ipaddr); ?></td>
        <td class="monospaced"><?php echo $this->escaper->escapeHtml($monitor->hwaddr); ?></td>
        <?php if ($monitor->disabled == 1) { ?>
        <td class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Monitor'); ?>
          <?php } else { ?>
        <td class="stat-<?php echo $stat_class[$monitor->status]; ?>"><?php echo $this->l10n->__($stat_label[$monitor->status], 'Monitor'); ?>
          <?php } ?></td>
        <td class="align-center"><?php echo $this->escaper->escapeHtml($monitor->firmver); ?></td>
        <td><?php echo $this->tag->linkTo(array('camviewer/monitors/show/' . $monitor->id, $this->l10n->_('<i class="fa fa-eye"></i> Show'), 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?></td>
      </tr>
    <?php } ?>
  <?php } ?>
  </tbody>
</table>

<?php echo $this->nav->getPaginator($page, 'camviewer/monitors/index', 'onbottom'); ?>
