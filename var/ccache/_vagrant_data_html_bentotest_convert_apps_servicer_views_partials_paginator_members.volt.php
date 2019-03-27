<?php echo $this->nav->getPaginator($page, 'servicer/members/index', 'ontop'); ?>

          <table class="table table-bordered table-condenced table-hover members-list">
          <colgroup>
          <col>
          <col>
          <col class="col-1">
          <col class="strstatus long">
          <col class="strstatus long">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->_('Member Name'); ?></th>
          <th><?php echo $this->l10n->_('Membergroup Name'); ?></th>
          <th>DRM</th>
          <th><?php echo $this->l10n->_('Withdraw at'); ?></th>
          <th><?php echo $this->l10n->_('Service Status'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $member) { ?>

<?php $dispclas = array('green', 'green', 'paused', 'will-withdraw', 'withdrawn'); ?>
<?php $dispstat = 1; ?>
<?php if ($member->disabled == 1) { ?>
  <?php $dispstat = 2; ?>
<?php } else { ?>
  <?php if (isset($member->withdraw)) { ?>
    <?php $now = time(); ?>
    <?php $wd = strtotime($member->withdraw); ?>
    <?php if (isset($member->disableflg)) { ?>
      <?php $dispstat = (($now < $wd ? 3 : 4)); ?>
    <?php } else { ?>
      <?php $dispstat = 3; ?>
    <?php } ?>
  <?php } ?>
<?php } ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($member->name); ?></td>
          <td><?php if ($member->membergroup_id > 0) { ?><?php echo $this->escaper->escapeHtml($member->membergroup->name); ?><?php } ?></td>
          <td class="align-center"><?php if ($member->usedrm == 1) { ?><?php echo $this->l10n->__('Yes', 'DRM'); ?><?php } else { ?><?php echo $this->l10n->__('No', 'DRM'); ?><?php } ?></td>
          <td class="align-center"><?php if (isset($member->withdraw)) { ?><?php echo date('Y-m-d', strtotime($member->withdraw)); ?><?php } ?></td>
          <td class="stat-<?php echo $dispclas[$dispstat]; ?>"><?php foreach ($servicestats as $s) { ?><?php if ($s->value == $dispstat) { ?><?php echo $this->escaper->escapeHtml($s->name); ?><?php } ?><?php } ?></td>
          <td><?php echo $this->tag->linkTo(array('servicer/members/show/' . $member->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/members/edit/' . $member->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/members/delete/' . $member->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'servicer/members/index', 'onbottom'); ?>
