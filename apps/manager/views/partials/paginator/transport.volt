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
          <col>
          <col>
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'transport') }}</th>
          <th>{{ l10n.__('Name', 'transport') }}</th>
          <th>{{ l10n.__('Client', 'transport') }}</th>
          <th>{{ l10n.__('Rate', 'transport') }}</th>
          <th>{{ l10n.__('Profit(%)', 'transport') }}</th>
          <th>{{ l10n.__('Total(¥)', 'transport') }}</th>
          <th>{{ l10n.__('Total(P)-(¥)', 'transport') }}</th>
          <th>{{ l10n.__('Total(R)-(vnd)', 'transport') }}</th>
          <th>{{ l10n.__('Status', 'transport') }}</th>
          <th>{{ l10n.__('Disabled', 'transport') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for transport in page.items %}

          <tr>
          <td>{{ transport.id|e }}</td>
          <td>{{ transport.name|e }}</td>
          <td>{{ transport.client.name|e }}</td>
          <td class="text-right">{{ transport.rate|e }}</td>
          <td class="text-right">{{ transport.profit|e }}</td>
          <td class="text-right">{{ transport.total|number_format }}</td>
          <td class="text-right">{{ transport.increment|number_format }}</td>
          <td class="text-right">{{ transport.total_rate|number_format }}</td>
          <td class="text-center">{{ status[transport.status]|e }}</td>
{% if transport.disabled == 1 %}
          <td align="center"><i class="fa fa-ban text-danger" aria-hidden="true"></i></td>
{% else %}
          <td></td>
{% endif %}
          <td>{{ link_to('manager/transports/show/'~transport.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/transports/edit/'~transport.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/transports/delete/'~transport.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/transports/index','onbottom') }}
