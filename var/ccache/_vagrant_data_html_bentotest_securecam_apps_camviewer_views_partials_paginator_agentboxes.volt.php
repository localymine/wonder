<?php echo $this->nav->getPaginator($page, 'camviewer/agentboxes/index', 'ontop'); ?>

          <table class="table table-bordered table-condenced table-hover aboxes-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="strstatus">
          <col class="strstatus">
          <col class="strstatus">
          <col class="actions actions-2">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->_('Group root'); ?></th>
          <th><?php echo $this->l10n->_('Area'); ?></th>
          <th><?php echo $this->l10n->_('Endpoint'); ?></th>
          <th><?php echo $this->l10n->_('Related Agent'); ?></th>
          <th><?php echo $this->l10n->_('IP Address'); ?></th>
          <th><?php echo $this->l10n->_('HW Address'); ?></th>
          <th><?php echo $this->l10n->_('Connection status'); ?></th>
          <th><?php echo $this->l10n->_('External Memory'); ?></th>
          <th><span class="text-xs"><?php echo $this->l10n->_('Firmware Version'); ?></span></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $agentbox) { ?>
          <tr>
          <td><?php echo $this->escaper->escapeHtml($agentbox->group->parent->parent->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($agentbox->group->parent->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($agentbox->group->name); ?></td>
          <td><?php echo $this->escaper->escapeHtml($agentbox->name); ?></td>
          <td class="monospaced"><?php echo $this->escaper->escapeHtml($agentbox->ipaddr); ?></td>
          <td class="monospaced"><?php echo $this->escaper->escapeHtml($agentbox->hwaddr); ?></td>
<?php if ($agentbox->disabled == 1) { ?>
          <td class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Agentbox'); ?>
<?php } else { ?>
          <td class="stat-<?php echo $stat_class[$agentbox->status]; ?>"><?php echo $this->l10n->__($stat_label[$agentbox->status], 'Agentbox'); ?>
<?php } ?></td>
          <td class="memstat stat-<?php echo $memstat_class[$agentbox->memstatus]; ?>"><?php echo $this->l10n->_($memtype_label[$agentbox->memtype]); ?><br><?php echo $this->l10n->__($memstat_label[$agentbox->memstatus], 'Agentbox'); ?></td>
          <td class="align-center"><?php echo $this->escaper->escapeHtml($agentbox->firmver); ?></td>
          <td><?php echo $this->tag->linkTo(array('camviewer/agentboxes/show/' . $agentbox->id, $this->l10n->_('<i class="fa fa-eye"></i> Show'), 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'camviewer/agentboxes/index', 'onbottom'); ?>
