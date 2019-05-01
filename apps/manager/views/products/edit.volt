{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Products') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/products/index', l10n._('Manage Products')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      {{ form('manager/products/save','method':'post','class':'form-horizontal','role':'form','enctype':'multipart/form-data') }}

      {{ hidden_field('product_id','value':product.id) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">

        <div class="form-group required">
          <label for="name" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Product Name') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_field('name','class':'form-control','value':product.name) }}

          </div>
        </div>

        <div class="form-group">
          <label for="price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('SalePrice') }}</label>
          <div class="col-xs-12 col-sm-4">
            <div class="input-group">
              {{ text_field('price','class':'form-control','value':product.price) }}
              <span class="input-group-addon">&#8363;</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="wholesale_price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Wholesale Price') }}</label>
          <div class="col-xs-12 col-sm-4">
            <div class="input-group">
              {{ text_field('wholesale_price','class':'form-control','value':product.wholesale_price) }}
              <span class="input-group-addon">&#8363;</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="purchase_price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Purechase Price (avg)') }}</label>
          <div class="col-xs-12 col-sm-4">
            <div class="input-group">
              {{ text_field('purchase_price','class':'form-control','value':product.purchase_price) }}
              <span class="input-group-addon">¥</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="unit" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Unit') }}</label>
          <div class="col-xs-12 col-sm-2">
            {{ text_field('unit','class':'form-control','value':product.unit) }}
          </div>
        </div>

        <div class="form-group">
          <label for="size" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Size') }}</label>
          <div class="col-xs-12 col-sm-2">
            {{ text_field('size','class':'form-control','value':product.size) }}
          </div>
        </div>

        <div class="form-group">
          <label for="image" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Product Image') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ file_field('image', 'class':'form-control') }}
          </div>
          {% if image == '' %}
            <div class="col-xs-6 col-sm-6">
              {#{{ image('manager/products/image/' ~ product.id, 'class':'img-thumbnail', 'style':'max-width:200px') }}#}

              <a href="#" class="pop">
                {{ utility.image(product.user_id, product.id, product.image, ['height:150px']) }}
              </a>

              <button type="button" class="btn btn-danger btn-delete btn-xs" data-type="1">
                <i class="fa fa-close"></i> {{ l10n._('Delete') }}

              </button>
            </div>
          {% endif %}
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Type') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('category_id',categories,'using':['id','name'],'name':'category_id','class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':product.category_id) }}

          </div>
        </div>

        <div class="form-group required">
          <label for="brand_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Brand') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('brand_id',brands,'using':['id','name'],'name':'brand_id','class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'','value':product.brand_id) }}

          </div>
        </div>

        <div class="form-group">
          <label for="description" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Description') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('description','class':'form-control','rows':'3','value':product.description) }}

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3','value':product.remarks) }}

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Disabled') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                {% if product.disabled == 1 %}
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

          {{ link_to('manager/products/index',l10n._('Cancel'),'class':'btn btn-default') }}

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
