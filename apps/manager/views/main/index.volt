{% extends 'layouts/html-single-column.volt' %}

{% block content %}
  <div class="login-box">
    {{ flash.output() }}
    <div class="login-box-body">
      <p class="login-box-msg">{{ l10n._('Sign In') }}</p>
      {{ form('manager/sessions/start','method':'post') }}

      <div class="form-group has-feedback">
        <span class="fa fa-user form-control-feedback feedback-left"></span>
        {{ text_field('username','class':'form-control form-control-left','placeholder':l10n._('User Name'),'required':'required','autofocus':'autofocus') }}

      </div>
      <div class="form-group has-feedback ">
        <span class="fa fa-lock form-control-feedback feedback-left"></span>
        {{ password_field('password','class':'form-control form-control-left','placeholder':l10n._('Password'),'required':'required') }}

      </div>
      <div class="row">
        <div class="col-xs-6 col-xs-offset-6">
          <button type="submit" class="btn btn-primary btn-block">{{ l10n._('Sign In') }}</button>
        </div>
      </div>
      {{ end_form() }}

    </div>
  </div>
{% endblock %}

{% block pagescript %}
{% endblock %}
