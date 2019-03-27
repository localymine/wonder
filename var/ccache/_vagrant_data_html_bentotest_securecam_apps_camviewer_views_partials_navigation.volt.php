      <div class="corenav">
        <button type="button" id="corenav-open" class="btn btn-lg btn-default fa fa-bars"></button>
        <ul class="corenav-menu">
          <li class="identifier"><i class="fa fa-user"></i> <?php echo $identity['name'] . ' ( ' . $this->l10n->_($this->escaper->escapeHtml($identity['role_display'])) . ' )'; ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/main/vodview', $this->l10n->_('VOD Viewer'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/main/liveview', $this->l10n->_('Live Viewer'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/main/live4view', $this->l10n->_('4-Multi Live Viewer'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/main/live9view', $this->l10n->_('9-Multi Live Viewer'))); ?></li>
<?php if ($identity['layer'] == 1) { ?>
          <li class="delimiter"></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/groups/index', $this->l10n->_('<i class="fa fa-building-o"></i><span>Area/Endpoints</span>'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/agentboxes/index', $this->l10n->_('<i class="fa fa-database"></i><span>Manage Agentboxes</span>'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/recaccounts/index', $this->l10n->_('<i class="fa fa-cloud-upload"></i><span>REC Accounts</span>'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/viewaccounts/index', $this->l10n->_('<i class="fa fa-television"></i><span>VIEW Accounts</span>'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/cameras/index', $this->l10n->_('<i class="fa fa-video-camera"></i><span>Manage Camera</span>'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/recorders/index', $this->l10n->_('<i class="fa fa-film"></i><span>Manage Recorders</span>'))); ?></li>
          <li><?php echo $this->tag->linkTo(array('camviewer/monitors/index', $this->l10n->_('<i class="fa fa-desktop"></i><span>Manage Monitors</span>'))); ?></li>
<?php } ?>
          <li class="delimiter"></li>
<?php if (isset($identity['favalid']) && $identity['favalid'] == 1) { ?>
          <li><?php echo $this->tag->linkTo(array('camviewer/pluginfieldanalyst/index', $this->l10n->_('<i class="fa fa-area-chart"></i><span>Analysis of Entering / Leaving</span>'))); ?></li>
          <li class="delimiter"></li>
<?php } ?>
          <li><?php echo $this->tag->linkTo(array('camviewer/sessions/end', $this->l10n->_('<i class="fa fa-sign-out"></i><span>Sign Out</span>'))); ?></li>
        </ul>
      </div>
