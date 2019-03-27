<?= $this->nav->getPaginator($page, 'servicer/agentboxes/index', 'ontop') ?>

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
          <th><?= $this->l10n->_('Group root') ?></th>
          <th><?= $this->l10n->_('Area') ?></th>
          <th><?= $this->l10n->_('Endpoint') ?></th>
          <th><?= $this->l10n->_('Related Agent') ?></th>
          <th><?= $this->l10n->_('IP Address') ?></th>
          <th><?= $this->l10n->_('HW Address') ?></th>
          <th><?= $this->l10n->_('Connection status') ?></th>
          <th><?= $this->l10n->_('External Memory') ?></th>
          <th><span class="text-xs"><?= $this->l10n->_('Firmware Version') ?></span></th>
          <th><i class="fa fa-power-off"></i></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $agentbox) { ?>

          <tr>
          <td><?= $this->escaper->escapeHtml($agentbox->group->parent->parent->name) ?></td>
          <td><?= $this->escaper->escapeHtml($agentbox->group->parent->name) ?></td>
          <td><?= $this->escaper->escapeHtml($agentbox->group->name) ?></td>
          <td><?= $this->escaper->escapeHtml($agentbox->name) ?></td>
          <td class="monospaced"><span class="meta-href"><?= $this->escaper->escapeHtml($agentbox->ipaddr) ?></span></td>
          <td class="monospaced"><?= $this->escaper->escapeHtml($agentbox->hwaddr) ?></td>
<?php if ($agentbox->disabled == 1) { ?>
          <td class="stat-paused"><?= $this->l10n->__('Suspended', 'Agentbox') ?>
<?php } else { ?>
          <td class="stat-<?= $stat_class[$agentbox->status] ?>"><?= $stat_label[$agentbox->status] ?>
<?php } ?></td>
          <td class="memstat stat-<?= $memstat_class[$agentbox->memstatus] ?>"><?= $memtype_label[$agentbox->memtype] ?><br><?= $memstat_label[$agentbox->memstatus] ?></td>
          <td class="align-center"><?= $this->escaper->escapeHtml($agentbox->firmver) ?></td>
<?php if ($agentbox->disabled == 1) { ?>
          <td><button data-aboxname="<?= $agentbox->name ?>" data-aboxid="<?= $agentbox->id ?>" data-aboxstate="<?= $agentbox->status ?>" data-toggle="tooltip" data-placement="top" title="<?= $this->l10n->__('Cannot reboot', 'Agentbox') ?>" class="btn btn-xs btn-default disabled"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 1) { ?>
          <td><button data-aboxname="<?= $agentbox->name ?>" data-aboxid="<?= $agentbox->id ?>" data-aboxstate="<?= $agentbox->status ?>" data-toggle="tooltip" data-placement="top" title="<?= $this->l10n->__('Reboot', 'Agentbox') ?>" class="btn btn-xs text-white bg-fuchsia"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 2) { ?>
          <td><button data-aboxname="<?= $agentbox->name ?>" data-aboxid="<?= $agentbox->id ?>" data-aboxstate="<?= $agentbox->status ?>" data-toggle="tooltip" data-placement="top" title="<?= $this->l10n->__('Reboot', 'Agentbox') ?>" class="btn btn-xs text-white bg-fuchsia"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 3) { ?>
          <td><button data-aboxname="<?= $agentbox->name ?>" data-aboxid="<?= $agentbox->id ?>" data-aboxstate="<?= $agentbox->status ?>" data-toggle="tooltip" data-placement="top" title="<?= $this->l10n->__('Reboot scheduled', 'Agentbox') ?>" class="btn btn-xs text-white bg-fuchsia-active"><i class="fa fa-power-off"></i></button></td>
<?php } elseif ($agentbox->status == 4) { ?>
          <td><button data-aboxname="<?= $agentbox->name ?>" data-aboxid="<?= $agentbox->id ?>" data-aboxstate="<?= $agentbox->status ?>" data-toggle="tooltip" data-placement="top" title="<?= $this->l10n->__('Rebooting', 'Agentbox') ?>" class="btn btn-xs text-white bg-fuchsia-active"><i class="fa fa-circle-o-notch fa-spin"></i></button></td>
<?php } else { ?>
          <td><button data-aboxname="<?= $agentbox->name ?>" data-aboxid="<?= $agentbox->id ?>" data-aboxstate="<?= $agentbox->status ?>" data-toggle="tooltip" data-placement="top" title="<?= $this->l10n->__('Cannot reboot', 'Agentbox') ?>" class="btn btn-xs btn-default disabled"><i class="fa fa-power-off"></i></button></td>
<?php } ?>
          <td><?= $this->tag->linkTo(['servicer/agentboxes/show/' . $agentbox->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show')]) ?>

              <?= $this->tag->linkTo(['servicer/agentboxes/edit/' . $agentbox->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit')]) ?>

              <?= $this->tag->linkTo(['servicer/agentboxes/delete/' . $agentbox->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete')]) ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?= $this->nav->getPaginator($page, 'servicer/agentboxes/index', 'onbottom') ?>
