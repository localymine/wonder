{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n.__('Manage Clients','client') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/clients/index', l10n.__('Manage Clients','client')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output()| escape }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
        {{ link_to('manager/clients/new/',l10n._('<i class="fa fa-file"></i><span>New</span>'),'class':'btn btn-primary btn-sm xcenter') }}

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/brands') }}

      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
  <script>
  $(function() {
    $('#table-brands').DataTable({
//        "iDisplayLength": 50,
      "ordering": false,
      "bPaginate": false,
      "bInfo": false
    });
  });
  </script>
{% endblock %}
