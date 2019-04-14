{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Invoices') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/invoices/index', l10n._('Manage Invoices')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      {{ form('manager/invoices/create','method':'post','class':'form-horizontal','role':'form','enctype':'multipart/form-data') }}

      {{ hidden_field('user_id','value':identity['id']) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Client') }}</label>
          <div class="col-xs-12 col-sm-4">
            <div id="client_id" name="client_id"></div>
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Status') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('status',status,'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'') }}

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3') }}

          </div>
        </div>

        <div class="form-group">
          <label for="total_price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Total Price') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('total_price','class':'form-control text-right','readonly':true) }}
              <span class="input-group-addon">&#8363;</span>
            </div>
            <a class="text-black" href="#" data-target="#products-dialog" data-toggle="modal"><i class="fa fa-plus-circle"></i> {{ l10n._('Add products') }}</a>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-sm-12">
            <table class="table table-responsive">
              <thead>
              <tr>
                <th>{{ l10n.__('ID') }}</th>
                <th></th>
                <th>{{ l10n._('Name') }}</th>
                <th>{{ l10n._('(&#8363;)') }}</th>
                <th>{{ l10n._('Qty.') }}</th>
                <th>{{ l10n._('W.') }}</th>
                <th><i class="fa fa-cogs"></i></th>
              </tr>
              </thead>
              <tbody id="cart-list">
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          {{ submit_button(l10n._('Save'),'class':'btn btn-info') }}

          {{ link_to('manager/invoices/index',l10n._('Cancel'),'class':'btn btn-default') }}

        </div>
      </div>

      {{ end_form() }}

    </div>

    {{ partial('partials/modal/product-list') }}
    {{ partial('partials/modal/image-enlarge') }}

  </section>
{% endblock %}

{% block pagescript %}
  {{ javascript_include('js/invoice.js') }}
  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });

      var source = [];
      var clients = eval('{{ clients }}');
      for (var i=0; i<clients.length; i++) {
        var classes = clients[i].type == 1 ? 'text-bold fa fa-star' : '';
        var html = '<div tabIndex=0 data-id="'+ clients[i].id +'"><div class="'+classes+'">'+ clients[i].name +'</div></div>';
        source[i] = {html: html, title: clients[i].name};
      }
      // Create a jqxComboBox
      var timer;
      $("#client_id").jqxComboBox({source: source, width:298, height: 34}).on('change', function(e){
        var args = e.args;
        if (args) {
          if(args.item !== null) {
            var item = args.item;
            var id = $(item.html).data('id');
            clearTimeout(timer);
            timer = setTimeout(function(){$('input[name=client_id]').val(id);}, 500)
          }
        }
      });

    });
  </script>
{% endblock %}
