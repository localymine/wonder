<?php echo $this->nav->getPaginator($page, 'servicer/agentboxes/index', 'ontop'); ?>

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
          <col class="strstatus">
          <col class="actions actions-1">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->_('Group root'); ?></th>
          <th><?php echo $this->l10n->_('Area'); ?></th>
          <th><?php echo $this->l10n->_('Endpoint'); ?></th>
          <th><?php echo $this->l10n->_('Related Agent'); ?></th>
          <th><?php echo $this->l10n->_('IP Address'); ?></th>
          <th><?php echo $this->l10n->_('HW Address'); ?></th>
          <th><?php echo $this->l10n->_('Connection status'); ?></th>
          <th><?php echo $this->l10n->_('External Memory'); ?></th>
          <th><span class="text-xs"><?php echo $this->l10n->_('Firmware Version'); ?></span></th>
          <th><i class="fa fa-power-off"></i></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $agentbox) { ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($agentbox->group->parent->parent->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($agentbox->group->parent->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($agentbox->group->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($agentbox->name); ?></td>
          <td class="monospaced"><span class="meta-href"><?php echo $this->escaper->escapeHtml($agentbox->ipaddr); ?></span></td>
          <td class="monospaced"><?php echo $this->escaper->escapeHtml($agentbox->hwaddr); ?></td>
<?php if ($agentbox->disabled == 1) { ?>
          <td class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Agentbox'); ?>
<?php } else { ?>
          <td class="stat-<?php echo $stat_class[$agentbox->status]; ?>"><?php echo $stat_label[$agentbox->status]; ?>
<?php } ?></td>
          <td class="memstat stat-<?php echo $memstat_class[$agentbox->memstatus]; ?>"><?php echo $memtype_label[$agentbox->memtype]; ?><br><?php echo $memstat_label[$agentbox->memstatus]; ?></td>
          <td class="align-center"><?php echo $this->escaper->escapeHtml($agentbox->firmver); ?></td>
<?php if ($agentbox->disabled == 1) { ?>
          <td><button data-aboxname="<?php echo $agentbox->name; ?>" data-aboxid="<?php echo $agentbox->id; ?>" data-aboxstate="<?php echo $agentbox->status; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->__('Cannot reboot', 'Agentbox'); ?>" class="btn btn-xs btn-default disabled"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 1) { ?>
          <td><button data-aboxname="<?php echo $agentbox->name; ?>" data-aboxid="<?php echo $agentbox->id; ?>" data-aboxstate="<?php echo $agentbox->status; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->__('Reboot', 'Agentbox'); ?>" class="btn btn-xs text-white bg-fuchsia"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 2) { ?>
          <td><button data-aboxname="<?php echo $agentbox->name; ?>" data-aboxid="<?php echo $agentbox->id; ?>" data-aboxstate="<?php echo $agentbox->status; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->__('Reboot', 'Agentbox'); ?>" class="btn btn-xs text-white bg-fuchsia"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 3) { ?>
          <td><button data-aboxname="<?php echo $agentbox->name; ?>" data-aboxid="<?php echo $agentbox->id; ?>" data-aboxstate="<?php echo $agentbox->status; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->__('Reboot scheduled', 'Agentbox'); ?>" class="btn btn-xs text-white bg-fuchsia-active"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 4) { ?>
          <td><button data-aboxname="<?php echo $agentbox->name; ?>" data-aboxid="<?php echo $agentbox->id; ?>" data-aboxstate="<?php echo $agentbox->status; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->__('Rebooting', 'Agentbox'); ?>" class="btn btn-xs text-white bg-fuchsia-active"><i class="fa fa-circle-o-notch fa-spin"></i></button></td>
<?php } else { ?>
          <td><button data-aboxname="<?php echo $agentbox->name; ?>" data-aboxid="<?php echo $agentbox->id; ?>" data-aboxstate="<?php echo $agentbox->status; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $this->l10n->__('Cannot reboot', 'Agentbox'); ?>" class="btn btn-xs btn-default disabled"><i class="fa fa-power-off"></i></button></td>
<?php } ?>
          <td><?php echo $this->tag->linkTo(array('servicer/agentboxes/show/' . $agentbox->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/agentboxes/edit/' . $agentbox->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/agentboxes/delete/' . $agentbox->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'servicer/agentboxes/index', 'onbottom'); ?>
