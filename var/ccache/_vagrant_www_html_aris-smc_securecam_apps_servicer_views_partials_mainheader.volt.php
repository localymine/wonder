<a href="<?= $this->url->get('servicer/main/index') ?>" class="logo"><span class="logo-mini"><b>SMC</b></span><span class="logo-lg"><b>SecureMC</b></span></a>
<nav class="navbar navbar-static-top">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only"><?= $this->l10n->_('Toggle navigation') ?></span></a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li class="dropdown user user-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i><span class="hidden-xs"><?= $identity['name'] . ' ( ' . $this->l10n->_($this->escaper->escapeHtml($identity['role_display'])) . ' )' ?></span></a>
  <ul class="dropdown-menu">
  <li class="user-body">
    <?= $this->tag->linkTo(['camviewer/main/index', '<i class="fa fa-video-camera"></i>' . $this->l10n->_('Move to Camera Viewer site'), 'class' => 'movecam']) ?>

<?php if ($identity['role_id'] == 1 || $identity['role_id'] == 3 || $identity['role_demote'] == 1) { ?>
    <?= $this->tag->linkTo(['manager/main/index', '<i class="fa fa-wrench"></i>' . $this->l10n->_('Move to SMC Manager site'), 'class' => 'movemgr']) ?>

<?php } ?>
  </li>
  <li class="user-footer"><?= $this->tag->linkTo(['servicer/sessions/end', $this->l10n->_('Sign Out'), 'class' => 'btn btn-default btn-flat']) ?></li>
  </ul></li>
</ul>
</div>
</nav>
