<?php echo $this->nav->getPaginator($page, 'manager/members/index', 'ontop'); ?>

          <table id="table-members" class="table table-bordered table-condenced table-hover members-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'member'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'member'); ?></th>
          <th><?php echo $this->l10n->__('Email', 'member'); ?></th>
          <th><?php echo $this->l10n->__('Phone', 'member'); ?></th>
          <th><?php echo $this->l10n->__('Remarks', 'member'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $member) { ?>

          <tr>
          <td><?php echo $this->escaper->escapeHtml($member->id); ?></td>
          <td><?php echo $this->escaper->escapeHtml($member->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($member->email); ?></td>
          <td><?php echo $this->escaper->escapeHtml($member->phone); ?></td>
          <td><?php echo $this->escaper->escapeHtml($member->remarks); ?></td>
          <td><?php echo $this->tag->linkTo(array('manager/members/show/' . $member->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/members/edit/' . $member->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/members/delete/' . $member->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/members/index', 'onbottom'); ?>
