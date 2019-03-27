<?= $this->nav->getPaginator($page, 'servicer/main/dashboard', 'ontop') ?>

          <table class="table table-bordered notifications-list">
          <colgroup>
          <col class="strstatus long">
          <col>
          <col>
          <col class="strstatus long">
          </colgroup>
          <thead>
          <tr>
          <th><?= $this->l10n->__('Notified at', 'Surveil') ?></th>
          <th><?= $this->l10n->__('Member/Endpoint', 'Surveil') ?></th>
          <th><?= $this->l10n->__('Alert for', 'Surveil') ?></th>
          <th><?= $this->l10n->__('Alert type', 'Surveil') ?></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items) && $this->length($page->items) > 0) { ?>
<?php foreach ($page->items as $notification) { ?>
          <tr>
          <td class="monospaced align-center"><?= date('Y-m-d', $notification->updated) ?><br><?= date('H:i:s', $notification->updated) ?></td>
<?php if (isset($notification->camera) && isset($notification->camera->id)) { ?>
          <td><?= $this->tag->linkTo(['servicer/groups/arrangement/' . $notification->member_id, $notification->member->name, 'class' => 'silent']) ?><br>
              <?= $this->tag->linkTo(['servicer/groups/show/' . $notification->camera->group->id, $notification->camera->group->name, 'class' => 'silent']) ?></td>
          <td><?= $this->l10n->_('Camera') ?><br>
              <?= $this->tag->linkTo(['servicer/cameras/show/' . $notification->camera->id, $notification->camera->name, 'class' => 'silent']) ?></td>
<?php } else { ?>
<?php if (isset($notification->agentbox) && isset($notification->agentbox->id)) { ?>
          <td><?= $this->tag->linkTo(['servicer/groups/arrangement/' . $notification->member_id, $notification->member->name, 'class' => 'silent']) ?><br>
              <?= $this->tag->linkTo(['servicer/groups/show/' . $notification->agentbox->group->id, $notification->agentbox->group->name, 'class' => 'silent']) ?></td>
          <td><?= $this->l10n->_('Agentbox') ?><br>
              <?= $this->tag->linkTo(['servicer/agentboxes/show/' . $notification->agentbox->id, $notification->agentbox->name, 'class' => 'silent']) ?></td>
<?php } else { ?>
<?php if (isset($notification->recorder) && isset($notification->recorder->id)) { ?>
          <td><?= $this->tag->linkTo(['servicer/groups/arrangement/' . $notification->member_id, $notification->member->name, 'class' => 'silent']) ?><br>
              <?= $this->tag->linkTo(['servicer/groups/show/' . $notification->recorder->group->id, $notification->recorder->group->name, 'class' => 'silent']) ?></td>
          <td><?= $this->l10n->_('Recorder') ?><br>
              <?= $this->tag->linkTo(['servicer/recorders/show/' . $notification->recorder->id, $notification->recorder->name, 'class' => 'silent']) ?></td>
<?php } ?>
<?php } ?>
<?php } ?>
          <td><?= $alertType[$notification->type] ?></td>
          </tr>
<?php } ?>
<?php } else { ?>
          <tr>
          <td></td>
          <td><?= $this->l10n->_('There is no Notifications.') ?></td>
          <td></td>
          <td></td>
          </tr>
<?php } ?>
          </tbody>
          </table>

<?= $this->nav->getPaginator($page, 'servicer/main/dashboard', 'onbottom') ?>
