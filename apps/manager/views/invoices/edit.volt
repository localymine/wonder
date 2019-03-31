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
      {{ form('manager/invoices/save','method':'post','class':'form-horizontal','role':'form','enctype':'multipart/form-data') }}

      {{ hidden_field('user_id','value':invoice.user_id) }}
      {{ hidden_field('invoice_id','value':invoice.id) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">

        <div class="form-group required">
          <label for="id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('ID') }}</label>
          <div class="col-xs-12 col-sm-2">
            {{ text_field('id','class':'form-control text-right','readonly':true, 'value':invoice.id) }}
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Client') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('client',eclients,'using':['id','name'],'name':'client_id','class':'form-control selectpicker show-tick','disabled':true,'data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':invoice.client_id) }}
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Status') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('status',status,'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':invoice.status) }}

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3','value':invoice.remarks) }}

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Disabled') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                {% if invoice.disabled == 1 %}
                  {{ check_field('disabled','name':'disabled','value':1,'checked':true) }} {{ l10n._('Disabled') }}

                {% else %}
                  {{ check_field('disabled','name':'disabled','value':1) }} {{ l10n._('Disabled') }}

                {% endif %}

              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="total_price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Total Price') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('total_price','class':'form-control text-right','readonly':true, invoice.price) }}
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
              {% for detail in invoice_detail %}
                <tr id="p' + rs[i]['id'] + '">
                  <td>{{ detail.id }}</td>
                  <td class="" style="width:32px;">
                    <a href="javascript:voide(0)" class="pop">
                      {#<img class="img-responsive" src="/uploads/user/' + (detail.id).toString().padStart(7,0) + '/product/' + detail.id + '/' + rs[i]['image'] + '" />#}
                    </a>
                  </td>
                  <td>{{ detail.product.name }}</td>
                  <td class="text-right">
                    <input type="text" name="pd['+i+'][price]" class="form-control text-right no-border price"
                           value="{{ detail.price }}"/>
                  </td>
                  <td class="text-right">
                    <input type="number" name="pd['+i+'][quantity]" class="form-control text-right no-border quantity"
                           min="1" max="{{ utility.getQuantity(invoice.user_id, detail.product_id, detail.warehouse.id) }}" value="{{ detail.quantity }}"/>
                  </td>
                  <td class="text-center">{{ detail.warehouse.name }}</td>
                  <td class="text-center">
                    <a class="addCart" href="javascript:void(0)" data-id="'+rs[i]['id']+'" data-name="'+rs[i]['name']+'"
                       data-whid="'+rs[i]['warehouse_id']+'"><i class="fa text-blue fa-plus-circle"></i></a>
                    <input type="hidden" class="warehouse" name="pd['+i+'][warehouse]"
                           value="{{ detail.warehouse.id }}"/>
                    <input type="hidden" class="product" name="pd['+i+'][product]" value="{{ detail.product_id }}"/>
                  </td>
                </tr>
              {% endfor %}
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
    });
  </script>
{% endblock %}
