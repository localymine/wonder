<section class="sidebar">
<div id="menu-side">
<ul class="sidebar-menu">
<?= $this->nav->getNav() ?>
</ul>
<?php if ($identity['role_id'] == 1) { ?>
<?= $this->nav->getAdminNav() ?>
<?php } ?>
</div>
</section>
