<?php echo $this->nav->getPaginator($page, 'manager/transports/index', 'ontop'); ?>

          <table class="table table-bordered table-condenced table-hover clients-list">
          <colgroup>
          <col>
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
          <th><?php echo $this->l10n->__('ID', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Flight Date', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Flight End', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Receiver', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Total Invoices (&#8363;)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Total Others (&#8363;)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Total (&#8363;)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Status', 'transport'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $transport) { ?>

          <tr>
          <td title="<?php echo $transport->remarks; ?>"><?php echo $this->escaper->escapeHtml($transport->id); ?></td>
          <td><div title="<?php echo $transport->remarks; ?>"><?php echo $this->escaper->escapeHtml($transport->name); ?></div></td>
          <td class="text-center"><?php echo $this->escaper->escapeHtml($this->utility->substr($transport->flight_date, 0, 10)); ?></td>
          <td class="text-center"><?php echo $this->escaper->escapeHtml($this->utility->substr($transport->flight_end, 0, 10)); ?></td>
          <td><?php echo $this->escaper->escapeHtml($transport->client->name); ?></td>
          <td class="text-right"><?php echo number_format($transport->total); ?></td>
          <td class="text-right"><?php echo number_format($transport->total_others); ?></td>
          <td class="text-right"><?php echo number_format(($transport->total + $transport->total_others)); ?></td>
          <td class="text-center <?php echo $this->escaper->escapeHtml($status[$transport->status]); ?>"><?php echo $this->escaper->escapeHtml($status[$transport->status]); ?></td>
          <td>

              <?php echo $this->tag->linkTo(array('manager/transports/exportMore/' . $transport->id, '<i class="fa fa-file-excel-o"></i>', 'class' => 'btn btn-xs btn-yahoo', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Export More'))); ?>

              <?php echo $this->tag->linkTo(array('manager/transports/show/' . $transport->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/transports/edit/' . $transport->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/transports/delete/' . $transport->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/transports/index', 'onbottom'); ?>
