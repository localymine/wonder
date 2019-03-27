<?php echo $this->nav->getPaginator($page, 'servicer/monitors/index', 'ontop'); ?>

<table class="table table-bordered table-condenced table-hover aboxes-list">
  <colgroup>
    <col>
    <col>
    <col>
    <col>
    <col class="strstatus">
    <col class="actions actions-3">
  </colgroup>
  <thead>
  <tr>
    <th><?php echo $this->l10n->__('Monitor', 'Monitor'); ?></th>
    <th><?php echo $this->l10n->_('Member'); ?></th>
    <th><?php echo $this->l10n->_('IP Address'); ?></th>
    <th><?php echo $this->l10n->_('HW Address'); ?></th>
    <th><?php echo $this->l10n->__('Prcess status', 'Monitor'); ?></th>
    <th><i class="fa fa-cogs"></i></th>
  </tr>
  </thead>
  <tbody>
  <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $monitor) { ?>

      <tr>
        <td><?php echo $this->escaper->escapeHtml($monitor->name); ?></td>
        <td><?php echo $this->escaper->escapeHtml($monitor->member->name); ?></td>
        <td class="monospaced"><span class="meta-href"><?php echo $this->escaper->escapeHtml($monitor->ipaddr); ?></span></td>
        <td class="monospaced"><?php echo $this->escaper->escapeHtml($monitor->hwaddr); ?></td>

        <?php if ($monitor->disabled == 1) { ?>
        <td class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Monitor'); ?>
          <?php } else { ?>
        <td class="stat-<?php echo $stat_class[$monitor->status]; ?>"><?php echo $stat_label[$monitor->status]; ?>
          <?php } ?>
        </td>

        <td><?php echo $this->tag->linkTo(array('servicer/monitors/show/' . $monitor->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

          <?php echo $this->tag->linkTo(array('servicer/monitors/edit/' . $monitor->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

          <?php echo $this->tag->linkTo(array('servicer/monitors/delete/' . $monitor->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
      </tr>

    <?php } ?>
  <?php } ?>
  </tbody>
</table>

<?php echo $this->nav->getPaginator($page, 'servicer/monitors/index', 'onbottom'); ?>
