{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n.__('Manage Invoices','invoice') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/invoices/index', l10n.__('Manage Invoices','invoice')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output()| escape }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>

        {{ link_to('manager/invoices/new/',l10n._('<i class="fa fa-file"></i><span>New</span>'),'class':'btn btn-primary btn-sm xcenter') }}

        <button class="btn btn-default btn-sm xoutput btn-export">
          <i class="fa fa-file-excel-o"></i> <span>Export</span>
        </button>

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/invoices') }}
        {{ partial('partials/modal/bill') }}
        {{ partial('partials/filter/invoices') }}

      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
  {{ javascript_include('js/invoice-index.js') }}
  <script>
    $(function(){
      $('#table-invoices').DataTable({
//        "iDisplayLength": 50,
        "ordering": false,
        "bPaginate": false,
        "bInfo" : false
      });
    });

    var element = document.getElementById('bill-holder');
    var getCanvas;
    $('#btn-download').on('click', function() {
      var r = Math.random().toString(36).substring(7);
      var imgageData = getCanvas.toDataURL('image/png');
      var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
      $('#btn-download').attr('download', r+'.png').attr('href', newData);
    });

    Number.prototype.format = function(n, x) {
      var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
      return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    };
  </script>
{% endblock %}
