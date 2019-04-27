{{ nav.getPaginator(page,'manager/transports/index','ontop') }}

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
          <th>{{ l10n.__('ID', 'transport') }}</th>
          <th>{{ l10n.__('Name', 'transport') }}</th>
          <th>{{ l10n.__('Flight Date', 'transport') }}</th>
          <th>{{ l10n.__('Receiver', 'transport') }}</th>
          <th>{{ l10n.__('Total Invoices (&#8363;)', 'transport') }}</th>
          <th>{{ l10n.__('Total Others (&#8363;)', 'transport') }}</th>
          <th>{{ l10n.__('Total (&#8363;)', 'transport') }}</th>
          <th>{{ l10n.__('Status', 'transport') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for transport in page.items %}

          <tr>
          <td title="{{ transport.remarks }}">{{ transport.id|e }}</td>
          <td><div title="{{ transport.remarks }}">{{ transport.name|e }}</div></td>
          <td class="text-center">{{ utility.substr(transport.flight_date,0,10)|e }}</td>
          <td>{{ transport.client.name|e }}</td>
          <td class="text-right">{{ transport.total|number_format }}</td>
          <td class="text-right">{{ transport.total_others|number_format }}</td>
          <td class="text-right">{{ (transport.total + transport.total_others)|number_format }}</td>
          <td class="text-center {{ status[transport.status]|e }}">{{ status[transport.status]|e }}</td>
          <td>

              {{ link_to('manager/transports/exportMore/'~transport.id,'<i class="fa fa-file-excel-o"></i>','class':'btn btn-xs btn-yahoo','data-toggle':'tooltip','data-placement':'top','title':l10n._('Export More')) }}

              {{ link_to('manager/transports/show/'~transport.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/transports/edit/'~transport.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/transports/delete/'~transport.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/transports/index','onbottom') }}
