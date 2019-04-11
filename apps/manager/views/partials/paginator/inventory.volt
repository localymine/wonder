{{ nav.getPaginator(page,'manager/products/index','ontop') }}

          <table id="table-products" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col style="width: 1%;">
          <col style="width: 4%;">
          <col>
          <col>
          <col>
          <col style="width: 10%;">
          <col class="actions actions-1"  style="width: 1%;">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'product') }}</th>
          <th></th>
          <th>{{ l10n.__('Name', 'product') }}</th>
          <th>{{ l10n.__('Category', 'product') }}</th>
          <th>{{ l10n.__('Brand', 'product') }}</th>
          <th>{{ l10n.__('Quantity', 'product') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for product in page.items %}

          <tr id="p{{ product.id }}">
          <td title="{{ product.remarks }}">{{ product.id|e }}</td>
          <td>
            <a href="javascript:void(0)" class="pop">
              {#{{ image('manager/products/image/'~product.id,'class':'img-responsive') }}#}
              <img class="img-responsive" style="width:32px" src="/uploads/user/{{ utility.str_pad(product.user_id) }}/product/{{ utility.str_pad(product.id) }}/{{ product.image }}" />
            </a>
          </td>
          <td class="width-m">{{ product.name|e }}<span style="display: none;">{{ product.remarks }}</span></td>
          <td class="text-center">
            {% if product.category_id != 0 %}
              {{ product.category.name|e }}
            {% endif %}
          </td>
          <td class="text-center">
            {% if product.brand_id != 0 %}
              {{ product.brand.name|e }}
            {% endif %}
          </td>
          <td class="text-left quantity">
            {% for pq in product.productquantity %}
              <div>{{ pq.warehouse.name }} : <span style="float:right;">{{ pq.quantity }}</span></div>
            {% endfor %}
          </td>
          <td>
            <button class="btn btn-xs btn-foursquare btn-chart" title="{{ l10n._('Price in Stock') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-target="#chart-product-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-line-chart"></i></button>
            <button class="btn btn-xs btn-yahoo btn-add" title="{{ l10n._('Add') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-price="{{ product.price }}" data-target="#add-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-plus-circle"></i></button>
            <button class="btn btn-xs btn-flickr btn-sub" title="{{ l10n._('Subtract') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-price="{{ product.price }}" data-target="#sub-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-minus-circle"></i></button>
            <button class="btn btn-xs btn-success btn-move" title="{{ l10n._('Move') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-price="{{ product.price }}" data-target="#move-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-arrows-h"></i></button>
            {{ link_to('manager/products/show/'~product.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/products/index','onbottom') }}
