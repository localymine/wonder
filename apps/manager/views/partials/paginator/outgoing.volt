{{ nav.getPaginator(page,'manager/outgoing/index','ontop') }}

          <table id="table-outgoing" class="table table-bordered table-condenced table-hover outgoing-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'outgoing') }}</th>
          <th>{{ l10n.__('Name', 'outgoing') }}</th>
          <th>{{ l10n.__('Amount', 'outgoing') }}</th>
          <th>{{ l10n.__('Date', 'outgoing') }}</th>
          <th>{{ l10n.__('Remarks', 'outgoing') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
  {% set idx=1 %}
{% for outgoing in page.items %}

          <tr>
          <td id="{{ outgoing.id|e }}">{{ idx }}</td>
          <td>{{ outgoing.name|e }}</td>
          <td class="text-right">{{ outgoing.amount|number_format }}</td>
          <td class="text-center">{{ date('Y-m-d H:i', outgoing.exec_date|strtotime) }}</td>
          <td>{{ outgoing.remarks|e }}</td>
          <td>{{ link_to('manager/outgoing/show/'~outgoing.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/outgoing/edit/'~outgoing.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/outgoing/delete/'~outgoing.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
  {% set idx=idx+1 %}
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/outgoing/index','onbottom') }}
