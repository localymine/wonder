      <div class="corenav">
        <button type="button" id="corenav-open" class="btn btn-lg btn-default fa fa-bars"></button>
        <ul class="corenav-menu">
          <li class="identifier"><i class="fa fa-user"></i> <?= $identity['name'] . ' ( ' . $this->l10n->_($this->escaper->escapeHtml($identity['role_display'])) . ' )' ?></li>
          <li><?= $this->tag->linkTo(['camviewer/main/vodview', $this->l10n->_('VOD Viewer')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/main/liveview', $this->l10n->_('Live Viewer')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/main/live4view', $this->l10n->_('4-Multi Live Viewer')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/main/live9view', $this->l10n->_('9-Multi Live Viewer')]) ?></li>
<?php if ($identity['layer'] == 1) { ?>
          <li class="delimiter"></li>
          <li><?= $this->tag->linkTo(['camviewer/groups/index', $this->l10n->_('<i class="fa fa-building-o"></i><span>Area/Endpoints</span>')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/agentboxes/index', $this->l10n->_('<i class="fa fa-database"></i><span>Manage Agentboxes</span>')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/recaccounts/index', $this->l10n->_('<i class="fa fa-cloud-upload"></i><span>REC Accounts</span>')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/viewaccounts/index', $this->l10n->_('<i class="fa fa-television"></i><span>VIEW Accounts</span>')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/cameras/index', $this->l10n->_('<i class="fa fa-video-camera"></i><span>Manage Camera</span>')]) ?></li>
          <li><?= $this->tag->linkTo(['camviewer/recorders/index', $this->l10n->_('<i class="fa fa-film"></i><span>Manage Recorders</span>')]) ?></li>
<?php } ?>
          <li class="delimiter"></li>
<?php if (isset($identity['favalid']) && $identity['favalid'] == 1) { ?>
          <li><?= $this->tag->linkTo(['camviewer/pluginfieldanalyst/index', $this->l10n->_('<i class="fa fa-area-chart"></i><span>Analysis of Entering / Leaving</span>')]) ?></li>
          <li class="delimiter"></li>
<?php } ?>
          <li><?= $this->tag->linkTo(['camviewer/sessions/end', $this->l10n->_('<i class="fa fa-sign-out"></i><span>Sign Out</span>')]) ?></li>
        </ul>
      </div>
