a:5:{i:0;s:2619:"<?php $this->_macros['customized_img'] = function($__p = null) { if (isset($__p[0])) { $ident = $__p[0]; } else { if (isset($__p["ident"])) { $ident = $__p["ident"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: ident");  } } if (isset($__p[1])) { $uid = $__p[1]; } else { if (isset($__p["uid"])) { $uid = $__p["uid"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: uid");  } } if (isset($__p[2])) { $type = $__p[2]; } else { if (isset($__p["type"])) { $type = $__p["type"]; } else {  throw new \Phalcon\Mvc\View\Exception("Macro 'customized_img' was called without parameter: type");  } }  ?><?php if ($ident['mainimage'] != '') { ?>
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
<body class="hold-transition skin-blue-light login-page">

";s:7:"content";N;i:1;s:59:"

<?php echo $this->partial('partials/javascripts'); ?>
";s:10:"pagescript";N;i:2;s:20:"
</body>
</html>
";}