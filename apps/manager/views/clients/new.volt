{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Clients') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/clients/index', l10n._('Manage Clients')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      {{ form('manager/clients/create','method':'post','class':'form-horizontal','role':'form') }}

      {{ hidden_field('user_id','value':identity['id']) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">
        <div class="form-group required">
          <label for="country_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Country') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('country_id',countries,'using':['id','name'],'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'') }}

          </div>
        </div>

        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Name') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('name','class':'form-control') }}

          </div>
        </div>

        <div class="form-group required">
          <label for="type" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Type') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('type',type,'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'') }}

          </div>
        </div>

        <div class="form-group">
          <label for="firstname" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Firstname') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('firstname','class':'form-control') }}

          </div>
        </div>

        <div class="form-group">
          <label for="lastname" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Lastname') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('lastname','class':'form-control') }}

          </div>
        </div>

        <div class="form-group">
          <label for="postal" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Postal') }}</label>
          <div class="col-xs-12 col-sm-2">
            {{ text_field('postal','class':'form-control') }}

          </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Address') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('address','class':'form-control') }}

          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Email') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('email','class':'form-control') }}

          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Phone') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('phone','class':'form-control') }}

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

          {{ link_to('manager/clients/index',l10n._('Cancel'),'class':'btn btn-default') }}

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
