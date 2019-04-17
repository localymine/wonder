<?php echo $this->nav->getPaginator($page, 'manager/brands/index', 'ontop'); ?>

          <table id="table-brands" class="table table-bordered table-condenced table-hover brands-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'brand'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'brand'); ?></th>
          <th><?php echo $this->l10n->__('Remarks', 'brand'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
  <?php $idx = 1; ?>
<?php foreach ($page->items as $brand) { ?>

          <tr>
          <td id="<?php echo $this->escaper->escapeHtml($brand->id); ?>"><?php echo $idx; ?></td>
          <td><?php echo $this->escaper->escapeHtml($brand->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($brand->remarks); ?></td>
          <td><?php echo $this->tag->linkTo(array('manager/brands/show/' . $brand->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/brands/edit/' . $brand->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/brands/delete/' . $brand->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
  <?php $idx = $idx + 1; ?>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/brands/index', 'onbottom'); ?>
