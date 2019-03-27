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
<!--[if gte IE 9]>
{{ javascript_include('js/ie/polyfill.min.js') }}
<![endif]-->
{{ get_title() }}
</head>
<body class="hold-transition skin-blue sidebar-mini{% if bodycollapsed is defined %} sidebar-collapse{% endif %}">

<div class="wrapper">

<header class="main-header">
{{ partial('partials/mainheader') }}
</header>

<aside class="main-sidebar">
{% block sidebar %}{% endblock %}
</aside>

<div class="content-wrapper">
{% block content %}{% endblock %}
</div>

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> {{ constant('SKR_APPVERSION') }}</div>
<strong>&copy;<span class="hidden-xs"> 2018 - {{ date('Y') }}</span> {{ constant('SKR_APPNAME') }}</strong>
</footer>

</div>

{{ partial('partials/javascripts') }}
{% block pagescript %}{% endblock %}
</body>
</html>
