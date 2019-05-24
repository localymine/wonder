{{ nav.getPaginator(page,'manager/incomes/index','ontop') }}

          <table id="table-incomes" class="table table-bordered table-condenced table-hover incomes-list">
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
          <th>{{ l10n.__('ID', 'income') }}</th>
          <th>{{ l10n.__('Name', 'income') }}</th>
          <th>{{ l10n.__('Amount', 'income') }}</th>
          <th>{{ l10n.__('Date', 'income') }}</th>
          <th>{{ l10n.__('Remarks', 'income') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
  {% set idx=1 %}
{% for income in page.items %}

          <tr>
          <td id="{{ income.id|e }}">{{ idx }}</td>
          <td>{{ income.name|e }}</td>
          <td class="text-right">{{ income.amount|number_format }}</td>
          <td class="text-center">{{ date('Y-m-d H:i', income.exec_date|strtotime) }}</td>
          <td>{{ income.remarks|e }}</td>
          <td>{{ link_to('manager/incomes/show/'~income.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/incomes/edit/'~income.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/incomes/delete/'~income.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
  {% set idx=idx+1 %}
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/incomes/index','onbottom') }}
