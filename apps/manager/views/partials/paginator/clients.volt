{{ nav.getPaginator(page,'manager/clients/index','ontop') }}

          <table class="table table-bordered table-condenced table-hover clients-list">
          <colgroup>
          <col>
          <col>
          {#<col>#}
          {#<col>#}
          <col>
          <col>
          <col>
          <col class="strstatus">
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'client') }}</th>
          <th>{{ l10n.__('Name', 'client') }}</th>
          {#<th>{{ l10n.__('First Name', 'client') }}</th>#}
          {#<th>{{ l10n.__('Last Name', 'client') }}</th>#}
          <th>{{ l10n.__('Country', 'client') }}</th>
          <th>{{ l10n.__('Address', 'client') }}</th>
          <th>{{ l10n.__('Email', 'client') }}</th>
          <th>{{ l10n.__('Phone', 'client') }}</th>
          <th>{{ l10n.__('Type', 'client') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for client in page.items %}

          <tr>
          <td>{{ client.id|e }}</td>
          <td>{{ client.name|e }}</td>
          {#<td>{{ client.firstname|e }}</td>#}
          {#<td>{{ client.lastname|e }}</td>#}
          <td>{{ client.country.name|e }}</td>
          <td>{{ client.address|e }}</td>
          <td>{{ client.email|e }}</td>
          <td>{{ client.phone|e }}</td>
          <td align="center">
            {{ type[client.type] }}
          </td>
          <td>{{ link_to('manager/clients/show/'~client.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/clients/edit/'~client.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/clients/delete/'~client.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/clients/index','onbottom') }}
