{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Transports') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/transports/index', l10n._('Manage Transports')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      {{ form('manager/transports/save','method':'post','class':'form-horizontal','role':'form','enctype':'multipart/form-data') }}

      {{ hidden_field('user_id','value':identity['id']) }}
      {{ hidden_field('transport_id','value':transport.id) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">

        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Transport Issue') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('name','class':'form-control','value':transport.name) }}

          </div>
        </div>

        <div class="form-group">
          <label for="sent_date" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Sent Date') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('sent_date','class':'form-control col-3','value': utility.substr(transport.sent_date,0,10)) }}

          </div>
        </div>

        <div class="form-group">
          <label for="flight_date" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Flight Date') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('flight_date','class':'form-control col-3','value': utility.substr(transport.flight_date,0,10)) }}

          </div>
        </div>

        <div class="form-group">
          <label for="flight_end" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Flight End') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('flight_end','class':'form-control col-3','value': utility.substr(transport.flight_end,0,10)) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Transporter') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('client',clients,'using':['id','name'],'name':'client_id','data-mode':'new','class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':transport.client.id) }}
            {#{{ text_field('client_name','class':'form-control','disabled':'true','value':transport.client.name) }}#}
            {#{{ hidden_field('client','value':transport.client.id) }}#}

          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Status') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('status',status,'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':transport.status) }}

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3','value':transport.remarks) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="send_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Sender') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('send_id',sender,'using':['id','name'],'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':transport.send_id) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="receive_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Receiver') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('receive_id',receiver,'using':['id','name'],'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':transport.receive_id) }}

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Disabled') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                {% if transport.disabled == 1 %}
                  {{ check_field('disabled','name':'disabled','value':1,'checked':true) }} {{ l10n._('Disabled') }}

                {% else %}
                  {{ check_field('disabled','name':'disabled','value':1) }} {{ l10n._('Disabled') }}

                {% endif %}

              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"></label>
          <div class="col-xs-12 col-sm-8">
            <a class="acond addInvoice" data-target="#invoicechooser" data-toggle="modal"><i class="fa fa-plus-circle"></i> {{ l10n._('Add Invoices') }}</a>
            {{ hidden_field('count','value':count) }}
            <table class="table table-responsive lstChose">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{ l10n._('Invoice name', 'invoice') }}</th>
                <th class="text-center" scope="col">{{ l10n._('Price(&#8363;)', 'invoice') }}</th>
                <th>{{ l10n._('Datetime', 'invoice') }}</th>
                <th scope="col"></th>
              </tr>
              </thead>
              <tbody>
              {{ partial('partials/tr-invoices') }}
              </tbody>
            </table>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Other Costs') }}</label>
        </div>

        <div class="form-group">
          {{ hidden_field('othercount','value':count) }}
          <ul class="ulcond lstcond">
            {{ partial('partials/othersrow') }}
          </ul>
          {{ hidden_field('rmOtherIds') }}
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-sm-9 col-sm-offset-3">
            <a class="acond addcond" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> {{ l10n._('Add more condition') }}</a>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Products Transportation') }}</label>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label"></label>
          <div class="col-xs-12 col-sm-8">
            <a class="acond addProducts" href="javascript:void(0);"><i class="fa fa-plus-circle"></i> {{ l10n._('Add Products') }}</a>
            {{ hidden_field('prtranscount','value':prtranscount) }}
            <table class="table table-responsive lstProducts">
              <thead>
              <tr>
                <th scope="col">{{ l10n._('Warehouse') }}</th>
                <th scope="col">{{ l10n._('Product') }}</th>
                <th class="text-center" scope="col">{{ l10n._('Amount') }}</th>
                <th scope="col"></th>
              </tr>
              </thead>
              <tbody>
              {{ partial('partials/tr-pr-trans-row') }}
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          {{ submit_button(l10n._('Save'),'class':'btn btn-info') }}

          {{ link_to('manager/transports/index',l10n._('Cancel'),'class':'btn btn-default') }}

        </div>
      </div>

      {{ end_form() }}

    </div>
  </section>

  {{ partial('partials/modal/transport-invoices-list') }}

{% endblock %}

{% block pagescript %}
  {{ javascript_include('js/other.js') }}
  <script>
    WAREHOUSES = {{ warehousesArr|json_encode }};
    $(function(){
      $.invoiceForm({
        addButton: "a.addcond",
        listCondition: "ul.lstcond",
        deleteButton: "a.deletecond",
        count: {{ count }}
      });
    });
  </script>
  {{ javascript_include('js/transport.js') }}
  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });
      $('.modal-body ul li').on('click', function(evt) {
        $('input[type=checkbox]', this).iCheck('toggle');
      });
      //
      $('[name=sent_date],[name=flight_date],[name=flight_end]').datetimepicker({
        format: 'Y-MM-DD',
        useCurrent: true,
        dayViewHeaderFormat: "{{ l10n._('MMM YYYY') }}",
        tooltips: {
          today: "{{ l10n._('Select Today') }}",
          clear: "{{ l10n._('Deselect') }}",
          close: "{{ l10n._('Close') }}",
          selectMonth: "{{ l10n._('Select Month') }}",
          prevMonth: "{{ l10n._('Previous Month') }}",
          nextMonth: "{{ l10n._('Next Month') }}",
          selectYear: "{{ l10n._('Select Year') }}",
          prevYear: "{{ l10n._('Previous Year') }}",
          nextYear: "{{ l10n._('Next Year') }}"
        }
      });
    });
  </script>
{% endblock %}
