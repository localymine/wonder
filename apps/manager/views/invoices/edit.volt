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
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Client') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('client',clients,'using':['id','name'],'name':'client_id','class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':invoice.client_id) }}

          </div>
        </div>

        <div class="form-group">
          <label for="price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Price') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="input-group">
              {{ text_field('price','class':'form-control','disabled':true,'value':invoice.price) }}
              <span class="input-group-addon">&#8363;</span>
            </div>
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

      </div>

      <div class="box-footer">
        <div class="action-area">
          {{ submit_button(l10n._('Save'),'class':'btn btn-info') }}

          {{ link_to('manager/invoices/index',l10n._('Cancel'),'class':'btn btn-default') }}

        </div>
      </div>

      {{ end_form() }}

    </div>
  </section>
{% endblock %}

{% block pagescript %}
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
