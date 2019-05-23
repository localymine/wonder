{{ nav.getPaginator(page,'manager/types/index','ontop') }}

          <table id="table-types" class="table table-bordered table-condenced table-hover types-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'type') }}</th>
          <th>{{ l10n.__('Name', 'type') }}</th>
          <th>{{ l10n.__('Remarks', 'type') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
  {% set idx=1 %}
{% for type in page.items %}

          <tr>
          <td id="{{ type.id|e }}">{{ idx }}</td>
          <td>{{ type.name|e }}</td>
          <td>{{ type.remarks|e }}</td>
          <td>{{ link_to('manager/types/show/'~type.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/types/edit/'~type.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/types/delete/'~type.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
  {% set idx=idx+1 %}
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/types/index','onbottom') }}
