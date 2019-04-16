{{ nav.getPaginator(page,'manager/invoices/index','ontop') }}

          <table id="table-invoices" class="table table-bordered table-invoices table-hover">
          <colgroup>
          <col style="width:2%;">
          <col>
          <col style="width:15%;">
          <col style="width:10%;">
          <col style="width:10%;">
          <col style="width:15%;">
          <col style="width:11%;">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'invoice') }}</th>
          <th>{{ l10n.__('Client', 'invoice') }}</th>
          <th>{{ l10n.__('Total (&#8363;)', 'invoice') }}</th>
          <th>{{ l10n.__('Delivery', 'invoice') }}</th>
          <th>{{ l10n.__('Status', 'invoice') }}</th>
          <th>{{ l10n.__('Date', 'invoice') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for invoice in page.items %}

          <tr>
          <td>{{ invoice.id|e }}</td>
          <td>{{ invoice.client.name|e }}</td>
          <td class="text-right">{{ invoice.total_price|number_format }}</td>
          <td class="text-center deliver {{ deliver[invoice.deliver]|e }}">
            {% if invoice.deliver == 0 or invoice.deliver == 1 %}
              {#<button class="btn btn-sm btn-reddit btn-delivery" data-id="{{ invoice.id }}">{{ deliver[invoice.deliver]|e }}</button>#}
              <span class="btn-delivery hand" data-id="{{ invoice.id }}">{{ deliver[invoice.deliver]|e }}</span>
            {% else %}
              {{ deliver[invoice.deliver]|e }}
            {% endif %}
          </td>
          <td class="text-center status {{ status[invoice.status]|e }}">
            {% if invoice.status == 0 %}
              <button class="btn btn-sm btn-danger btn-status" data-id="{{ invoice.id }}">UnPaid</button>
            {% else %}
              {{ status[invoice.status]|e }}
            {% endif %}
          </td>
          <td class="text-right">{{ invoice.created }}</td>
          <td>

            <button class="btn btn-xs btn-yahoo btn-print" data-id="{{ invoice.id }}" data-target="#bill-dialog" data-toggle="modal"><i class="fa fa-image"></i></button>

              {#{{ link_to('manager/invoices/print/'~invoice.id,'<i class="fa fa-image"></i>','class':'btn btn-xs btn-yahoo','data-toggle':'tooltip','data-placement':'top','title':l10n._('Print')) }}#}

              {{ link_to('manager/invoices/show/'~invoice.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/invoices/edit/'~invoice.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/invoices/delete/'~invoice.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/invoices/index','onbottom') }}
