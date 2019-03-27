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
<!--[if gt IE 9]>
{{ javascript_include('js/ie/polyfill.min.js') }}
<![endif]-->
{{ get_title() }}
</head>
<body class="hold-transition skin-blue login-page">

{% block content %}{% endblock %}

{{ partial('partials/javascripts') }}
{% block pagescript %}{% endblock %}
</body>
</html>
