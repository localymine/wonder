{{ get_doctype() }}
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="robots" content="noindex,nofollow">
{{ partial('partials/stylesheets') }}
<!--[if lt IE 9]>
{{ javascript_include('js/ie/html5shiv.min.js') }}
{{ javascript_include('js/ie/respond.min.js') }}
{{ javascript_include('js/ie/excanvas.js') }}
<![endif]-->
{{ get_title() }}
</head>
<body class="skin-blue http-error">

<div class="wrapper">

<header class="main-header">
<a href="{{ url('servicer/main/index') }}" class="logo"><span class="logo-mini"><b>S</b>MC</span><span class="logo-lg"><b>Secure</b>MC</span></a>
</header>

<div class="content-wrapper">
<div class="error-msg">
<section>
{{ content() }}
</section>
</div>
</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> {{ constant('SKR_APPVERSION') }}</div>
<strong>&copy;<span class="hidden-xs"> 2018 - {{ date('Y') }}</span> {{ constant('SKR_APPNAME') }}</strong>
</footer>

</div>

{{ partial('partials/javascripts') }}
</body>
</html>
