<?php echo $this->nav->getPaginator($page, 'manager/outgoing/index', 'ontop'); ?>

          <table id="table-outgoing" class="table table-bordered table-condenced table-hover outgoing-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'outgoing'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'outgoing'); ?></th>
          <th><?php echo $this->l10n->__('Res.Per', 'outgoing'); ?></th>
          <th><?php echo $this->l10n->__('Amount', 'outgoing'); ?></th>
          <th><?php echo $this->l10n->__('Date', 'outgoing'); ?></th>
          <th><?php echo $this->l10n->__('Remarks', 'outgoing'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
  <?php $idx = 1; ?>
<?php foreach ($page->items as $outgoing) { ?>

          <tr>
          <td id="<?php echo $this->escaper->escapeHtml($outgoing->id); ?>"><?php echo $idx; ?></td>
          <td><?php echo $this->escaper->escapeHtml($outgoing->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($outgoing->member->name); ?></td>
          <td class="text-right"><?php echo number_format($outgoing->amount); ?></td>
          <td class="text-center"><?php echo date('Y-m-d H:i', strtotime($outgoing->exec_date)); ?></td>
          <td><?php echo $this->escaper->escapeHtml($outgoing->remarks); ?></td>
          <td><?php echo $this->tag->linkTo(array('manager/outgoing/show/' . $outgoing->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/outgoing/edit/' . $outgoing->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/outgoing/delete/' . $outgoing->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
  <?php $idx = $idx + 1; ?>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/outgoing/index', 'onbottom'); ?>
