<?= $this->nav->getPaginator($page, 'servicer/cameras/index', 'ontop') ?>

          <table class="table table-bordered table-condenced table-hover cameras-list">
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
          <th><?= $this->l10n->_('Camera Name') ?></th>
          <th><?= $this->l10n->_('IP Address') ?></th>
          <th><?= $this->l10n->_('HW Address') ?></th>
          <th><?= $this->l10n->_('Process status') ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $camera) { ?>
          <tr>
          <td><?= $this->escaper->escapeHtml($camera->group->parent->parent->name) ?></td>
          <td><?= $this->escaper->escapeHtml($camera->group->parent->name) ?></td>
          <td><?= $this->escaper->escapeHtml($camera->group->name) ?></td>
          <td><?php if (isset($camera->agentbox->name)) { ?><?= $this->escaper->escapeHtml($camera->agentbox->name) ?><?php } ?></td>
          <td><span class="motion-enable<?php if ($camera->motion == 1) { ?> enabled<?php } ?>"></span><?= $this->escaper->escapeHtml($camera->name) ?></td>
          <td class="monospaced"><span class="meta-href"><?= $this->escaper->escapeHtml($camera->ipaddr) ?></span></td>
          <td class="monospaced"><?= $this->escaper->escapeHtml($camera->hwaddr) ?></td>
<?php if ($camera->disabled == 1) { ?>
          <td class="stat-paused">
            <?= $this->l10n->__('Suspended', 'Camera') ?>

<?php } else { ?>
          <td class="stat-<?= $stat_class[$camera->status] ?>">
            <?= $stat_label[$camera->status] ?>

<?php } ?></td>
          <td><?= $this->tag->linkTo(['servicer/cameras/show/' . $camera->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show')]) ?>

              <?= $this->tag->linkTo(['servicer/cameras/edit/' . $camera->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit')]) ?>

              <?= $this->tag->linkTo(['servicer/cameras/delete/' . $camera->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete')]) ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?= $this->nav->getPaginator($page, 'servicer/cameras/index', 'onbottom') ?>
