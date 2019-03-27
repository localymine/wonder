<?php echo $this->nav->getPaginator($page, 'servicer/cameras/index', 'ontop'); ?>

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
          <th><?php echo $this->l10n->_('Group root'); ?></th>
          <th><?php echo $this->l10n->_('Area'); ?></th>
          <th><?php echo $this->l10n->_('Endpoint'); ?></th>
          <th><?php echo $this->l10n->_('Related Agent'); ?></th>
          <th><?php echo $this->l10n->_('Camera Name'); ?></th>
          <th><?php echo $this->l10n->_('IP Address'); ?></th>
          <th><?php echo $this->l10n->_('HW Address'); ?></th>
          <th><?php echo $this->l10n->_('Process status'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $camera) { ?>
          <tr>
          <td><?php echo $this->escaper->escapeHtml($camera->group->parent->parent->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($camera->group->parent->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($camera->group->name); ?></td>
          <td><?php if (isset($camera->agentbox->name)) { ?><?php echo $this->escaper->escapeHtml($camera->agentbox->name); ?><?php } ?></td>
          <td><span class="motion-enable<?php if ($camera->motion == 1) { ?> enabled<?php } ?>"></span><?php echo $this->escaper->escapeHtml($camera->name); ?></td>
          <td class="monospaced"><span class="meta-href"><?php echo $this->escaper->escapeHtml($camera->ipaddr); ?></span></td>
          <td class="monospaced"><?php echo $this->escaper->escapeHtml($camera->hwaddr); ?></td>
<?php if ($camera->disabled == 1) { ?>
          <td class="stat-paused">
            <?php echo $this->l10n->__('Suspended', 'Camera'); ?>

<?php } else { ?>
          <td class="stat-<?php echo $stat_class[$camera->status]; ?>">
            <?php echo $stat_label[$camera->status]; ?>

<?php } ?></td>
          <td><?php echo $this->tag->linkTo(array('servicer/cameras/show/' . $camera->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/cameras/edit/' . $camera->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/cameras/delete/' . $camera->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'servicer/cameras/index', 'onbottom'); ?>
