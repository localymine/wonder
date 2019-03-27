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
          <col>
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Client', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Rate', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Profit(%)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Total(¥)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Total(P)-(¥)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Total(R)-(vnd)', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Status', 'transport'); ?></th>
          <th><?php echo $this->l10n->__('Disabled', 'transport'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $transport) { ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($transport->id); ?></td>
          <td><?php echo $this->escaper->escapeHtml($transport->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($transport->client->name); ?></td>
          <td class="text-right"><?php echo $this->escaper->escapeHtml($transport->rate); ?></td>
          <td class="text-right"><?php echo $this->escaper->escapeHtml($transport->profit); ?></td>
          <td class="text-right"><?php echo number_format($transport->total); ?></td>
          <td class="text-right"><?php echo number_format($transport->increment); ?></td>
          <td class="text-right"><?php echo number_format($transport->total_rate); ?></td>
          <td class="text-center"><?php echo $this->escaper->escapeHtml($status[$transport->status]); ?></td>
<?php if ($transport->disabled == 1) { ?>
          <td align="center"><i class="fa fa-ban text-danger" aria-hidden="true"></i></td>
<?php } else { ?>
          <td></td>
<?php } ?>
          <td><?php echo $this->tag->linkTo(array('manager/transports/show/' . $transport->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/transports/edit/' . $transport->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/transports/delete/' . $transport->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/transports/index', 'onbottom'); ?>
