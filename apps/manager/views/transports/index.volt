{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n.__('Manage Transports','transport') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/transport/index', l10n.__('Manage Transport','transport')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output()| escape }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
        {{ link_to('manager/transports/new/',l10n._('<i class="fa fa-file"></i><span>New</span>'),'class':'btn btn-primary btn-sm xcenter') }}

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/transport') }}

      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
{% endblock %}
