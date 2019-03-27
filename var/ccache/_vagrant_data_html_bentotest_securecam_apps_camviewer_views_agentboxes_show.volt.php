<?php $this->_macros['customized_img'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
<img src="<?php echo $this->url->get('main/image/' . $uid . '/' . $type); ?>"><?php } else { ?>
<img src="<?php echo $this->url->get('img/blank.png'); ?>"><?php } ?><?php }; $this->_macros['customized_img'] = \Closure::bind($this->_macros['customized_img'], $this); ?><?php $this->_macros['customized_path'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_path' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
<?php echo $this->url->get('main/image/' . $uid . '/' . $type); ?><?php } else { ?>
<?php echo $this->url->get('img/blank.png'); ?><?php } ?><?php }; $this->_macros['customized_path'] = \Closure::bind($this->_macros['customized_path'], $this); ?>
<?php echo $this->tag->getDoctype(); ?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
<?php echo $this->partial('partials/stylesheets'); ?>
<!--[if lt IE 9]>
<?php echo $this->tag->javascriptInclude('js/ie/html5shiv.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/respond.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/ie/excanvas.js'); ?>
<![endif]-->
<?php echo $this->tag->getTitle(); ?>
</head>
<body class="hold-transition skin-blue-light nosidebar sidebar-collapse">

<div class="wrapper">

<div class="content-wrapper">

  <div class="group-sandoxed-content">

    <section class="content-header">
      <h1><?php echo $this->l10n->_('Manage Agentboxes'); ?></h1>
    </section>

    <section class="content">
<?php echo $this->flash->output(); ?>

<?php $this->partial('partials/navigation', array('identity' => $identity)); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <div class="box-body">
          <div class="row row-gutter-20">
            <div class="col-xs-12 col-sm-6">
              <table class="table table-bordered">
              <colgroup>
              <col class="col-5">
              <col class="col-7">
              </colgroup>
              <tbody>
              <tr>
              <th><?php echo $this->l10n->_('Id'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->id); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Agentbox Name'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Group root'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->group->parent->parent->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Area'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->group->parent->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Endpoint'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->group->name); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Temporarily suspend agent process on the server'); ?></th>
              <td><?php if ($agentbox->disabled == 1) { ?><?php echo $this->l10n->_('Suspend'); ?><?php } ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Remarks'); ?></th>
              <td><?php echo nl2br($this->escaper->escapeHtml($agentbox->remarks)); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Updated at'); ?></th>
              <td><?php echo date($this->l10n->_('Y-m-d H:i:s'), strtotime($agentbox->updated)); ?></td>
              </tr>
              </tbody>
              </table>
            </div>
            <div class="col-xs-12 col-sm-6">
              <table class="table table-bordered">
              <colgroup>
              <col class="col-5">
              <col class="col-7">
              </colgroup>
              <tbody>
              <tr>
              <th><?php echo $this->l10n->_('HW Address'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->hwaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('IP Address(static)'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->ipaddr); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Netmask'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->netmask); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Gateway'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->gateway); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('DNS'); ?>1</th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->dns1); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('DNS'); ?>2</th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->dns2); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Firmware Version'); ?></th>
              <td><?php echo $this->escaper->escapeHtml($agentbox->firmver); ?></td>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('Connection status'); ?></th>
<?php if ($agentbox->disabled == 1) { ?>
              <td><span class="stat-paused"><?php echo $this->l10n->__('Suspended', 'Agentbox'); ?></span></td>
<?php } else { ?>
              <td><span class="stat-<?php echo $stat_class[$agentbox->status]; ?>"><?php echo $this->l10n->__($stat_label[$agentbox->status], 'Agentbox'); ?></span></td>
<?php } ?>
              </tr>
              <tr>
              <th><?php echo $this->l10n->_('External Memory'); ?></th>
              <td><span class="stat-<?php echo $memstat_class[$agentbox->memstatus]; ?>"><?php echo $this->l10n->_($memtype_label[$agentbox->memtype]); ?> ( <?php echo $this->l10n->__($memstat_label[$agentbox->memstatus], 'Agentbox'); ?> )</span></td>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('camviewer/agentboxes/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default pull-left')); ?>

            <div class="btn-group dropup pull-left">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <?php echo $this->l10n->_('Other Options'); ?></button>
              <ul class="dropdown-menu">
                <li><?php echo $this->tag->linkTo(array('camviewer/aboxoptions/account/' . $agentbox->id, $this->l10n->_('Account setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('camviewer/aboxoptions/traffic/' . $agentbox->id, $this->l10n->_('Traffic control setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('camviewer/aboxoptions/memory/' . $agentbox->id, $this->l10n->_('External memory setting'))); ?></li>
                <li><?php echo $this->tag->linkTo(array('camviewer/aboxoptions/ntp/' . $agentbox->id, $this->l10n->_('NTP setting'))); ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</div>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

<script>
$(function() {
  gnavwait = null;
  $('#corenav-open').on('click', function() {
    $('.corenav-menu').toggle();
  });
  $('.corenav-menu').on('mouseleave', function() {
    var self = $(this);
    $(this).on('mouseenter', function() {
      clearTimeout(gnavwait);
      gnavwait = null;
      self.off('mouseenter');
    });
    gnavwait = setTimeout(function() {
      self.hide();
    }, 1000);
  });
});
</script>

</body>
</html>
