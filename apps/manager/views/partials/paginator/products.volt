{{ nav.getPaginator(page,'manager/products/index','ontop') }}

          <table id="table-products" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col>
          <col>
          <col>
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
          <th>{{ l10n.__('Price (&#8363;)', 'product') }}</th>
          <th>{{ l10n.__('Quantity', 'product') }}</th>
          <th>{{ l10n.__('Category', 'product') }}</th>
          <th>{{ l10n.__('Brand', 'product') }}</th>
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
            <a href="#" class="pop">
              <img class="img-responsive" src="/uploads/user/<?php echo str_pad($identity['id'],7,'0',STR_PAD_LEFT); ?>/product/{{ product.id }}/{{ product.image }}" />
            </a>
          </td>
          <td class="width-m">{{ product.name|e }}</td>
          <td class="text-right price">{{ product.price|number_format }}</td>
          <td class="text-right quantity">{{ product.quantity }}</td>
          <td class="text-center">{{ product.category.name|e }}</td>
          <td class="text-center">{{ product.brand.name|e }}</td>
          <td>
            <button class="btn btn-xs btn-foursquare btn-chart" title="{{ l10n._('Price in Stock') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-target="#chart-product-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-line-chart"></i></button>
            {{ link_to('manager/products/show/'~product.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

            {{ link_to('manager/products/edit/'~product.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

            <button class="btn btn-xs btn-yahoo btn-add" title="{{ l10n._('Add') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-price="{{ product.price }}" data-target="#add-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-plus-circle"></i></button>
            <button class="btn btn-xs btn-flickr btn-sub" title="{{ l10n._('Subtract') }}" data-id="{{ product.id }}" data-product="{{ product.name }}" data-price="{{ product.price }}" data-target="#sub-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-minus-circle"></i></button>
            <button class="btn btn-xs btn-warning btn-copy" title="{{ l10n._('Copy') }}" data-id="{{ product.id }}" data-toggle="tooltip" data-placement="top"><i class="fa fa-copy"></i></button>

              {{ link_to('manager/products/delete/'~product.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/products/index','onbottom') }}
