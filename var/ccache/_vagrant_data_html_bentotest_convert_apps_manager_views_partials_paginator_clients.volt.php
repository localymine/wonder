<?php echo $this->nav->getPaginator($page, 'manager/clients/index', 'ontop'); ?>

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
          <th><?php echo $this->l10n->__('ID', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'client'); ?></th>
          <th><?php echo $this->l10n->__('First Name', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Last Name', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Country', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Address', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Email', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Phone', 'client'); ?></th>
          <th><?php echo $this->l10n->__('Type', 'client'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $client) { ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($client->id); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->firstname); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->lastname); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->country->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->address); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->email); ?></td>
          <td><?php echo $this->escaper->escapeHtml($client->phone); ?></td>
          <td align="center">
            <?php echo $type[$client->type]; ?>
          </td>
          <td><?php echo $this->tag->linkTo(array('manager/clients/show/' . $client->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/clients/edit/' . $client->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/clients/delete/' . $client->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/clients/index', 'onbottom'); ?>
