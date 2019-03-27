<?php echo $this->nav->getPaginator($page, 'servicer/membergroups/index', 'ontop'); ?>

          <table class="table table-bordered table-condenced table-hover membergroups-list">
          <colgroup>
          <col class="col-1">
          <col>
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->_('Id'); ?></th>
          <th><?php echo $this->l10n->_('Membergroup Name'); ?></th>
          <th><?php echo $this->l10n->_('Num of Members'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $membergroup) { ?>
          <tr>
          <td><?php echo $this->escaper->escapeHtml($membergroup->id); ?></td>
          <td><?php echo $this->escaper->escapeHtml($membergroup->name); ?></td>
          <td><?php echo $membergroup->member->count() . $this->l10n->_(' person/people'); ?></td>
          <td><?php echo $this->tag->linkTo(array('servicer/membergroups/show/' . $membergroup->id, '<span class="fa fa-eye"></span>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/membergroups/edit/' . $membergroup->id, '<span class="fa fa-pencil"></span>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('servicer/membergroups/delete/' . $membergroup->id, '<span class="fa fa-trash"></span>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'servicer/membergroups/index', 'onbottom'); ?>
