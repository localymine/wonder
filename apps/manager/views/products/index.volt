{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n.__('Manage Products','product') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/products/index', l10n.__('Manage Products','product')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output()| escape }}

    <div class="box overflow">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
        {{ link_to('manager/products/new/',l10n._('<i class="fa fa-file"></i><span>New</span>'),'class':'btn btn-primary btn-sm xcenter') }}

      </div>
      <div class="box-body" data-csrftoken="{{ security.getToken() }}">

        {{ partial('partials/paginator/products') }}

      </div>
    </div>

    {{ partial('partials/modal/chart-product') }}
    {{ partial('partials/modal/product-stock') }}
    {{ partial('partials/modal/product-sub-stock') }}

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <img src="" class="imagepreview center-block text-center" style="max-height:550px;" >
          </div>
        </div>
      </div>
    </div>

  </section>
{% endblock %}

{% block pagescript %}
  {{ partial('partials/paginatorscript') }}
  {{ javascript_include('js/Chart.min.js') }}
  {{ javascript_include('js/product.js') }}
  <script>
    $(function(){
      $('#table-products').DataTable({
//        "iDisplayLength": 50,
        "bPaginate": false,
        "bInfo" : false
      });
      //
      $('[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).attr('checked',true).val(1);
      }).on('ifUnchecked', function(evt) {
        $(this).removeAttr('checked').val(0);
      });
      //
      $( "#fromDate" ).datepicker({dateFormat:'yy-mm-dd'});
      $( "#toDate" ).datepicker({dateFormat:'yy-mm-dd'});
    });
  </script>
{% endblock %}
