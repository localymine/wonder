{{ nav.getPaginator(page,'manager/products/index','ontop') }}

          <table id="table-products" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'product') }}</th>
          <th></th>
          <th>{{ l10n.__('Name', 'product') }}</th>
          <th>{{ l10n.__('Quantity', 'product') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for product in page.items %}

          <tr id="p{{ product.id }}" title="{{ product.remarks }}">
          <td>{{ product.id|e }}</td>
          {#<td class="" style="width:32px;">{{ image('manager/products/image/'~product.id,'class':'img-responsive') }}</td>#}
          <td class="" style="width:32px;">
            <a href="javascript:void(0)" class="pop">
              <img class="img-responsive" src="/uploads/user/<?php echo str_pad($identity['id'],7,'0',STR_PAD_LEFT); ?>/product/{{ product.id }}/{{ product.image }}" />
            </a>
          </td>
          <td class="width-m">{{ product.name|e }}</td>
          <td class="text-right quantity">
            {{ product.quantity }}
            qty in warehouse 1
            qty in warehouse 2
          </td>
          <td>
            {{ link_to('manager/products/show/'~product.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/products/index','onbottom') }}
