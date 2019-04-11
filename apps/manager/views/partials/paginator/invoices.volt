{{ nav.getPaginator(page,'manager/invoices/index','ontop') }}

          <table id="table-invoices" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col style="width:2%;">
          <col>
          <col style="width:20%;">
          <col style="width:10%;">
          <col style="width:15%;">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'invoice') }}</th>
          <th>{{ l10n.__('Client', 'invoice') }}</th>
          <th>{{ l10n.__('Total (&#8363;)', 'invoice') }}</th>
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
          <td class="text-center">{{ status[invoice.status]|e }}</td>
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
