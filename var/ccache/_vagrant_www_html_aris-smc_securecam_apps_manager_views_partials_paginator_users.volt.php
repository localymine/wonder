<?= $this->nav->getPaginator($page, 'manager/users/index', 'ontop') ?>

          <table class="table table-bordered table-condenced table-hover users-list">
          <colgroup>
          <col>
          <col>
          <col class="strstatus">
          <col>
          <col class="strstatus">
          <col class="strstatus">
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?= $this->l10n->_('Servicer Name') ?></th>
          <th><?= $this->l10n->_('Service Name') ?></th>
          <th><?= $this->l10n->_('Domain Owner') ?></th>
          <th><?= $this->l10n->_('Sales type') ?></th>
          <th><?= $this->l10n->_('Payment type') ?></th>
          <th><?= $this->l10n->_('Num of Members') ?></th>
          <th><?= $this->l10n->_('Status of Service') ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $user) { ?>
          <tr>
          <td><?= $user->name ?></td>
          <td><?= $user->servicename ?></td>
          <td><?php if ($user->role_id == 3) { ?><?= $this->l10n->__('YES', 'OwnerRole') ?><?php } else { ?><?= $this->l10n->__('NO', 'OwnerRole') ?><?php } ?></td>
          <td><?php foreach ($salestypes as $s) { ?><?php if ($s->value == $user->salestype) { ?><?= $s->name ?><?php } ?><?php } ?></td>
          <td><?php foreach ($paymethods as $p) { ?><?php if ($p->value == $user->paytype) { ?><?= $p->name ?><?php } ?><?php } ?></td>
          <td><?= $user->member->count() ?></td>
          <td><?php if ($user->disabled == 0) { ?><?= $this->l10n->_('Enabled') ?><?php } else { ?><?= $this->l10n->_('Disabled') ?><?php } ?></td>
          <td><?= $this->tag->linkTo(['manager/users/show/' . $user->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show')]) ?>

              <?= $this->tag->linkTo(['manager/users/edit/' . $user->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit')]) ?>

<?php if ($user->role_id != 1 && $user->id != $identity['id']) { ?>
              <?= $this->tag->linkTo(['manager/users/delete/' . $user->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete')]) ?></td>

<?php } else { ?>
              <?= $this->tag->linkTo(['#', '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-default disabled']) ?></td>

<?php } ?>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?= $this->nav->getPaginator($page, 'manager/users/index', 'onbottom') ?>
