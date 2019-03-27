{% if posts is defined %}
  {% if posts['others'] is defined %}
    {% set i = 0 %}
    {% for row in posts['others'] %}
      <li>
        <div class="row">
          <div class="col-xs-12 col-sm-1 col-sm-offset-2">
            <a class="acond deletecond" href="javascript:void(0);" data-id="{{ row['id'] }}"><i class="fa fa-minus-circle"></i></a>
          </div>
          <div class="col-xs-12 col-sm-2">
            {% if row['name'] is defined and row['name'] != '' %}
              {{ setdefault('others['~i~'][name]', row['name']) }}
            {% endif %}
            {{ text_field('others['~i~'][name]','class':'form-control o_name','placeholder':l10n._('name')) }}
          </div>
          <div class="col-xs-12 col-sm-2">
            {% if row['price'] is defined and row['price'] != '' %}
              {{ setdefault('others['~i~'][price]', row['price']) }}
            {% endif %}
            {{ text_field('others['~i~'][price]','class':'form-control o_price','placeholder':l10n._('price')) }}<span class="currency">¥</span>
          </div>
          <div class="col-xs-12 col-sm-4">
            {% if row['remarks'] is defined and row['remarks'] != '' %}
              {{ setdefault('others['~i~'][remarks]', row['remarks']) }}
            {% endif %}
            {{ text_field('others['~i~'][remarks]','class':'form-control o_remarks','placeholder':l10n._('remarks')) }}
          </div>
          {{ hidden_field('others['~i~'][id]','class':'o_id','value':row['id']) }}
        </div>
      </li>
      {% set i = i + 1 %}
    {% endfor %}
  {% endif %}
{% else %}
  <li>
    <div class="row">
      <div class="col-xs-12 col-sm-1 col-sm-offset-2">
        <a class="acond deletecond" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>
      </div>
      <div class="col-xs-12 col-sm-2">
        {{ text_field('others[0][name]','class':'form-control o_name','placeholder':l10n._('name')) }}
      </div>
      <div class="col-xs-12 col-sm-2">
        {{ text_field('others[0][price]','class':'form-control o_price','placeholder':l10n._('price')) }}
      </div>
      <div class="col-xs-12 col-sm-4">
        {{ text_field('others[0][remarks]','class':'form-control o_remarks','placeholder':l10n._('remarks')) }}
      </div>
      {{ hidden_field('others[0][id]','class':'o_id','value':'') }}
    </div>
  </li>
{% endif %}