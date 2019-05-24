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
      {{ form('manager/incomes/save','method':'post','class':'form-horizontal','role':'form') }}

      {#{{ hidden_field('user_id','value':income.user_id) }}#}

      {{ hidden_field('id','value':income.id) }}

      <div class="box-body">
        <div class="form-group">
          <label for="name" class="col-xs-12 col-sm-3 control-label">{{ l10n._('ID') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ text_field('name','class':'form-control','disabled':true,'value':income.id) }}

          </div>
        </div>

        <div class="form-group">
          <label for="name" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Name') }}</label>
          <div class="col-xs-12 col-sm-4">
            {{ text_field('name','class':'form-control','value':income.name) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="member_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Responsible Person') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('member_id', members, 'using':['id','name'],'name':'member_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':true,'value':income.member_id) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="type_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Type') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('type_id', types, 'using':['id','name'],'name':'type_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':true,'value':income.type_id) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="amount" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Amount') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('amount','class':'form-control','value':income.amount) }}
              <span class="input-group-addon">&#8363;</span>
            </div>

          </div>
        </div>

        <div class="form-group">
          <label for="exec_date" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Execute Date') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('exec_date','class':'form-control date-chooser','value': date('Y-m-d H:i', income.exec_date|strtotime)) }}

              <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                  </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3','value':income.remarks) }}

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Disabled') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                {% if income.disabled == 1 %}
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
      $('input[income=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });
    });
  </script>
{% endblock %}
