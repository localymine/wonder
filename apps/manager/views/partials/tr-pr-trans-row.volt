<tr>
  <td class="text-center">
    {{ select('warehouses',warehouses,'using':['id','name'],'data-mode':'new','name':'trans_prod[0][warehouse_id]','class':'form-control p_warehouse','useEmpty':false) }}
  </td>
  <td>
    {{ hidden_field('name':'trans_prod[0][product_id]','class':'p_pid','value':'') }}
    {{ text_field('class':'form-control getproduct') }}
  </td>
  <td>
    {{ text_field('class':'form-control text-right p_amount','style':'width:100px;float:right;','name':'trans_prod[0][amount]','value':1) }}
  </td>
  <td>
    <a class="acond rmProduct"><i class="fa fa-minus-circle text-red"></i></a>
  </td>
</tr>
