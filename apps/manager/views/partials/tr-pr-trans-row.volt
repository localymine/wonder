{% if posts is defined %}
  {% if posts['trans_prod'] is defined %}
    {% set i = 0 %}
    {% for row in posts['trans_prod'] %}
      <tr>
        <td class="text-center">
          {{ select('warehouses',warehouses,'using':['id','name'],'data-mode':'new','name':'trans_prod['~i~'][warehouse_id]','class':'form-control p_warehouse no-border','useEmpty':false,'value':row['warehouse_id']) }}
        </td>
        <td>
          {{ hidden_field('name':'trans_prod['~i~'][product_id]','class':'p_pid','value':row['product_id']) }}
          {{ text_field('class':'form-control getproduct no-border','value':row['name']) }}
        </td>
        <td>
          {{ numeric_field('class':'form-control text-right p_amount no-border','style':'width:100px;float:right;','name':'trans_prod['~i~'][amount]','value':1,'min':1,'value':row['amount']) }}
        </td>
        <td>
          <a class="acond rmProduct"><i class="fa fa-minus-circle text-red"></i></a>
        </td>
      </tr>
      {% set i = i + 1 %}
    {% endfor %}
  {% endif %}
{% else %}
  <tr>
    <td class="text-center">
      {{ select('warehouses',warehouses,'using':['id','name'],'data-mode':'new','name':'trans_prod[0][warehouse_id]','class':'form-control p_warehouse no-border','useEmpty':false) }}
    </td>
    <td>
      {{ hidden_field('name':'trans_prod[0][product_id]','class':'p_pid','value':'') }}
      {{ text_field('class':'form-control getproduct no-border') }}
    </td>
    <td>
      {{ numeric_field('class':'form-control text-right p_amount no-border','style':'width:100px;float:right;','name':'trans_prod[0][amount]','value':1,'min':1) }}
    </td>
    <td>
      <a class="acond rmProduct"><i class="fa fa-minus-circle text-red"></i></a>
    </td>
  </tr>
{% endif %}
