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
      <h1><?php echo $this->l10n->__('Manage Monitors', 'Monitor'); ?></h1>
    </section>

    <section class="content">
      <?php echo $this->flash->output(); ?>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title pull-left"><?php echo $this->escaper->escapeHtml($page_heading); ?></h3>
        </div>
        <div class="box-body">

          <ul class="program_mesh">
            <?php foreach ($data_programs as $index => $program) { ?>
              <?php if ($program->mesh == 1) { ?>

                <li>
                  <div class="program">
                    <div class="inline-block info">
                      <span class="badge badge-info"><?php echo $index + 1; ?></span>
                      <?php echo $this->l10n->__('Display Time', 'Monitor'); ?>: <?php echo $program->duration; ?> <?php echo $this->l10n->__('Secs', 'Monitor'); ?>
                    </div>
                    <?php foreach ($program->cameras as $camera) { ?>
                      <div class="inline-block mesh">
                        <?php if ($camera->name == '') { ?>
                          <div class="mesh1 align-middle no-cam">
                        <?php } else { ?>
                          <div class="mesh1 align-middle">
                        <?php } ?>
                            <div class="camera ellipsis" title="<?php echo $camera->name; ?>"><?php echo $camera->name; ?></div>
                            <div class="endpoint ellipsis" title="<?php echo $camera->endpoint; ?>"><?php echo $camera->endpoint; ?></div>
                          </div>
                      </div>
                    <?php } ?>
                  </div>
                </li>

              <?php } elseif ($program->mesh == 4) { ?>

                <li>
                  <div class="program">
                    <div class="inline-block info">
                      <span class="badge badge-info"><?php echo $index + 1; ?></span>
                      <?php echo $this->l10n->__('Display Time', 'Monitor'); ?>: <?php echo $program->duration; ?> <?php echo $this->l10n->__('Secs', 'Monitor'); ?>
                    </div>
                    <div class="inline-block mesh">
                        <div class="mesh4">
                          <ul class="cameras">
                            <?php foreach ($program->cameras as $camera) { ?>
                              <?php if ($camera->name == '') { ?>
                                <li class="no-cam">
                              <?php } else { ?>
                                <li>
                              <?php } ?>
                                <div class="item">
                                  <div class="camera ellipsis" title="<?php echo $camera->name; ?>"><?php echo $camera->name; ?></div>
                                  <div class="endpoint ellipsis" title="<?php echo $camera->endpoint; ?>"><?php echo $camera->endpoint; ?></div>
                                </div>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                    </div>
                  </div>
                </li>

              <?php } ?>

            <?php } ?>
          </ul>

        </div>
        <div class="box-footer">
          <div class="action-area">
            <?php echo $this->tag->linkTo(array('camviewer/monitors/index', $this->l10n->_('Cancel'), 'class' => 'btn btn-default pull-left')); ?>
          </div>
        </div>
      </div>
    </section>
  </div>

</div>

</div>

<?php echo $this->partial('partials/javascripts'); ?>

  <script>
    $(function () {
      gnavwait = null;
      $('#corenav-open').on('click', function () {
        $('.corenav-menu').toggle();
      });
      $('.corenav-menu').on('mouseleave', function () {
        var self = $(this);
        $(this).on('mouseenter', function () {
          clearTimeout(gnavwait);
          gnavwait = null;
          self.off('mouseenter');
        });
        gnavwait = setTimeout(function () {
          self.hide();
        }, 1000);
      });
    });
  </script>

</body>
</html>
