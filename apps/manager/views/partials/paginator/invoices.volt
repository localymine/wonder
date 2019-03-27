{{ nav.getPaginator(page,'manager/invoices/index','ontop') }}

          <table class="table table-bordered table-condenced table-hover clients-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'invoice') }}</th>
          <th>{{ l10n.__('Name', 'invoice') }}</th>
          <th>{{ l10n.__('Total Price(¥)', 'invoice') }}</th>
          <th>{{ l10n.__('Client', 'invoice') }}</th>
          <th>{{ l10n.__('Status', 'invoice') }}</th>
          <th>{{ l10n.__('Disabled', 'invoice') }}</th>
          <th>{{ l10n.__('Date', 'invoice') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for invoice in page.items %}

          <tr>
          <td>{{ invoice.id|e }}</td>
          <td>{{ invoice.name|e }}</td>
          <td class="text-right">{{ invoice.total_price|number_format }}</td>
          <td>{{ invoice.client.name|e }}</td>
          <td>{{ status[invoice.status]|e }}</td>
{% if invoice.disabled == 1 %}
          <td align="center"><i class="fa fa-ban text-danger" aria-hidden="true"></i></td>
{% else %}
          <td></td>
{% endif %}
          <td class="text-right">{{ invoice.created }}</td>
          <td>{{ link_to('manager/invoices/show/'~invoice.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/invoices/edit/'~invoice.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/invoices/delete/'~invoice.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/invoices/index','onbottom') }}
