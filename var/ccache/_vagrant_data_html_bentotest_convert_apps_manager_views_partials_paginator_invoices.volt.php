<?php echo $this->nav->getPaginator($page, 'manager/invoices/index', 'ontop'); ?>

          <table id="table-invoices" class="table table-bordered table-invoices table-hover">
          <colgroup>
          <col style="width:2%;">
          <col>
          <col>
          <col style="width:15%;">
          <col style="width:10%;">
          <col style="width:10%;">
          <col style="width:15%;">
          <col style="width:11%;">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Client', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Transport', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Total (&#8363;)', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Delivery', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Status', 'invoice'); ?></th>
          <th><?php echo $this->l10n->__('Date', 'invoice'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $invoice) { ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($invoice->id); ?></td>
          <td><?php echo $this->escaper->escapeHtml($invoice->client->name); ?></td>
          <td class="text-center" title="<?php echo $this->escaper->escapeHtml($invoice->transportinvoice->transport->remarks); ?>"><?php echo (isset($invoice->transportinvoice->transport->name) ? $invoice->transportinvoice->transport->name : ''); ?></td>
          <td class="text-right"><?php echo number_format($invoice->total_price); ?></td>
          <td class="text-center deliver <?php echo $this->escaper->escapeHtml($deliver[$invoice->deliver]); ?>">
              <span class="btn-delivery hand" data-id="<?php echo $invoice->id; ?>"><?php echo $this->escaper->escapeHtml($deliver[$invoice->deliver]); ?></span>
          </td>
          <td class="text-center status <?php echo $this->escaper->escapeHtml($status[$invoice->status]); ?>">
            <span class="btn-status hand" data-id="<?php echo $invoice->id; ?>"><?php echo $this->escaper->escapeHtml($status[$invoice->status]); ?></span>
          </td>
          <td class="text-right"><?php echo $invoice->created; ?></td>
          <td>

            <button class="btn btn-xs btn-yahoo btn-print" data-id="<?php echo $invoice->id; ?>" data-target="#bill-dialog" data-toggle="modal"><i class="fa fa-image"></i></button>

              <?php echo $this->tag->linkTo(array('manager/invoices/show/' . $invoice->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/invoices/edit/' . $invoice->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/invoices/delete/' . $invoice->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/invoices/index', 'onbottom'); ?>
