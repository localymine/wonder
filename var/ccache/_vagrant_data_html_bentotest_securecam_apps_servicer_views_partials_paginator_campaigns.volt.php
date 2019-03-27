<?php echo $this->nav->getPaginator($page, 'servicer/campaigns/index', 'ontop'); ?>

          <table class="table table-bordered table-condenced table-hover campaigns-list">
          <colgroup>
            <col>
            <col class="col-2">
            <col class="col-2">
            <col class="col-2">
            <col class="actions actions-3">
          </colgroup>
          <thead>
            <tr>
            <th><?php echo $this->l10n->__('name', 'Campaign'); ?></th>
            <th><?php echo $this->l10n->__('term_from', 'Campaign'); ?></th>
            <th><?php echo $this->l10n->__('term_to', 'Campaign'); ?></th>
            <th><?php echo $this->l10n->__('enabled/disabled', 'Campaign'); ?></th>
            <th><i class="fa fa-cogs"></i></th>
            </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $campaign) { ?>
            <tr>
            <td><?php echo $this->escaper->escapeHtml($campaign->name); ?></td>
            <td><?php if ($campaign->term_from != null) { ?><?php echo date($this->l10n->_('Y-m-d'), strtotime($campaign->term_from)); ?><?php } ?></td>
            <td><?php if ($campaign->term_to != null) { ?><?php echo date($this->l10n->_('Y-m-d'), strtotime($campaign->term_to)); ?><?php } ?></td>
            <td class="<?php echo $selection_classes[$campaign->disabled]; ?>"><?php echo $selections[$campaign->disabled]; ?></td>
            <td>
              <?php echo $this->tag->linkTo(array('servicer/campaigns/show/' . $campaign->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>
              <?php echo $this->tag->linkTo(array('servicer/campaigns/edit/' . $campaign->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>
<?php if ($identity['role_id'] == 1) { ?>
              <?php echo $this->tag->linkTo(array('servicer/campaigns/delete/' . $campaign->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?>
<?php } ?>
            </td>
            </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'servicer/campaigns/index', 'onbottom'); ?>
