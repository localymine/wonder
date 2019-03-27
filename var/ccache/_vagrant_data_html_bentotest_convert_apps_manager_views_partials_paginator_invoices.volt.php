<?php echo $this->nav->getPaginator($page, 'manager/invoices/index', 'ontop'); ?>

          <table class="table table-bordered table-condenced table-hover clients-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Total Price(¥)', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Client', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Status', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Disabled', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Date', 'invoice'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $invoice) { ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($invoice->id); ?></td>
          <td><?php echo $this->escaper->escapeHtml($invoice->name); ?></td>
          <td class="text-right"><?php echo number_format($invoice->total_price); ?></td>
          <td><?php echo $this->escaper->escapeHtml($invoice->client->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($status[$invoice->status]); ?></td>
<?php if ($invoice->disabled == 1) { ?>
          <td align="center"><i class="fa fa-ban text-danger" aria-hidden="true"></i></td>
<?php } else { ?>
          <td></td>
<?php } ?>
          <td class="text-right"><?php echo $invoice->created; ?></td>
          <td><?php echo $this->tag->linkTo(array('manager/invoices/show/' . $invoice->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/invoices/edit/' . $invoice->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/invoices/delete/' . $invoice->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/invoices/index', 'onbottom'); ?>
