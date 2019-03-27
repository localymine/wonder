<?= $this->nav->getPaginator($page, 'servicer/recorders/index', 'ontop') ?>

          <table class="table table-bordered table-condenced table-hover recorders-list">
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
          <th><?= $this->l10n->_('Group root') ?></th>
          <th><?= $this->l10n->_('Area') ?></th>
          <th><?= $this->l10n->_('Endpoint') ?></th>
          <th><?= $this->l10n->_('Related Agent') ?></th>
          <th><?= $this->l10n->_('Recorder Name') ?></th>
          <th><?= $this->l10n->_('IP Address') ?></th>
          <th><?= $this->l10n->_('HW Address') ?></th>
          <th><?= $this->l10n->_('Life-Or-Death') ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $recorder) { ?>
          <tr>
          <td><?= $this->escaper->escapeHtml($recorder->group->parent->parent->name) ?></td>
          <td><?= $this->escaper->escapeHtml($recorder->group->parent->name) ?></td>
          <td><?= $this->escaper->escapeHtml($recorder->group->name) ?></td>
          <td><?php if (isset($recorder->agentbox->name)) { ?><?= $this->escaper->escapeHtml($recorder->agentbox->name) ?><?php } ?></td>
          <td><?= $this->escaper->escapeHtml($recorder->name) ?></td>
          <td class="monospaced"><?= $this->escaper->escapeHtml($recorder->ipaddr) ?></td>
          <td class="monospaced"><?= $this->escaper->escapeHtml($recorder->hwaddr) ?></td>
<?php if ($recorder->disabled == 1) { ?>
          <td class="stat-paused"><?= $this->l10n->__('Suspended', 'Recorder') ?></td>
<?php } else { ?>
          <td class="stat-<?= $doa_class[$recorder->status] ?>"><?= $doa_label[$recorder->status] ?></td>
<?php } ?>
          <td><?= $this->tag->linkTo(['servicer/recorders/show/' . $recorder->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show')]) ?>

              <?= $this->tag->linkTo(['servicer/recorders/edit/' . $recorder->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit')]) ?>

              <?= $this->tag->linkTo(['servicer/recorders/delete/' . $recorder->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete')]) ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?= $this->nav->getPaginator($page, 'servicer/recorders/index', 'onbottom') ?>
