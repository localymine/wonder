{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Incomes') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/incomes/index', l10n._('Manage Incomes')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      {{ form('manager/incomes/create','method':'post','class':'form-horizontal','role':'form') }}

      {{ hidden_field('user_id','value':identity['id']) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">
        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Name') }}</label>
          <div class="col-xs-12 col-sm-4">
            {{ text_field('name','class':'form-control') }}

          </div>
        </div>

        <div class="form-group required">
          <label for="member_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Responsible Person') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('member_id', members, 'using':['id','name'],'name':'member_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':true) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="type_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Type') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('type_id', types, 'using':['id','name'],'name':'type_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':true) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="amount" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Amount') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('amount','class':'form-control') }}
              <span class="input-group-addon">&#8363;</span>
            </div>

          </div>
        </div>

        <div class="form-group">
          <label for="exec_date" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Execute Date') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('exec_date','class':'form-control date-chooser') }}

              <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3') }}

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Disabled') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                {{ check_field('disabled','name':'disabled','value':1) }} {{ l10n._('Disabled') }}

              </label>
            </div>
          </div>
        </div>

      </div>
      <div class="box-footer">
        <div class="action-area">
          {{ submit_button(l10n._('Save'),'class':'btn btn-info') }}

          {{ link_to('manager/incomes/index',l10n._('Cancel'),'class':'btn btn-default') }}

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

      $('[name=exec_date]').datetimepicker({
        format:'Y-MM-DD HH:mm',
        locale:'en',
        useCurrent:true,
        dayViewHeaderFormat:'{{ l10n._('MMM YYYY') }}',
        tooltips: {
          today: '{{ l10n._('Select Today') }}',
          clear: '{{ l10n._('Deselect') }}',
          close: '{{ l10n._('Close') }}',
          selectMonth: '{{ l10n._('Select Month') }}',
          prevMonth: '{{ l10n._('Previous Month') }}',
          nextMonth: '{{ l10n._('Next Month') }}',
          selectYear: '{{ l10n._('Select Year') }}',
          prevYear: '{{ l10n._('Previous Year') }}',
          nextYear: '{{ l10n._('Next Year') }}',
          selectTime: '{{ l10n._('Select Time') }}'
        }
      });
    });
  </script>
{% endblock %}
