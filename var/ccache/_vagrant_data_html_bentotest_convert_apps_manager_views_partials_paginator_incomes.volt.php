<?php echo $this->nav->getPaginator($page, 'manager/incomes/index', 'ontop'); ?>

          <table id="table-incomes" class="table table-bordered table-condenced table-hover incomes-list">
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
          <th><?php echo $this->l10n->__('ID', 'income'); ?></th>
          <th><?php echo $this->l10n->__('Name', 'income'); ?></th>
          <th><?php echo $this->l10n->__('Amount', 'income'); ?></th>
          <th><?php echo $this->l10n->__('Date', 'income'); ?></th>
          <th><?php echo $this->l10n->__('Remarks', 'income'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
  <?php $idx = 1; ?>
<?php foreach ($page->items as $income) { ?>

          <tr>
          <td id="<?php echo $this->escaper->escapeHtml($income->id); ?>"><?php echo $idx; ?></td>
          <td><?php echo $this->escaper->escapeHtml($income->name); ?></td>
          <td class="text-right"><?php echo number_format($income->amount); ?></td>
          <td class="text-center"><?php echo date('Y-m-d H:i', strtotime($income->exec_date)); ?></td>
          <td><?php echo $this->escaper->escapeHtml($income->remarks); ?></td>
          <td><?php echo $this->tag->linkTo(array('manager/incomes/show/' . $income->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

              <?php echo $this->tag->linkTo(array('manager/incomes/edit/' . $income->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

              <?php echo $this->tag->linkTo(array('manager/incomes/delete/' . $income->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
  <?php $idx = $idx + 1; ?>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/incomes/index', 'onbottom'); ?>
