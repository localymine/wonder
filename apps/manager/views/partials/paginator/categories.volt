{{ nav.getPaginator(page,'manager/categories/index','ontop') }}

          <table id="table-categories" class="table table-bordered table-condenced table-hover categories-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'category') }}</th>
          <th>{{ l10n.__('Name', 'category') }}</th>
          <th>{{ l10n.__('Remarks', 'category') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
  {% set idx=1 %}
{% for category in page.items %}

          <tr>
          <td id="{{ category.id|e }}">{{ idx }}</td>
          <td>{{ category.name|e }}</td>
          <td>{{ utility.make_links_from_http(category.remarks|nl2br) }}</td>
          <td>{{ link_to('manager/categories/show/'~category.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/categories/edit/'~category.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/categories/delete/'~category.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
  {% set idx=idx+1 %}
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/categories/index','onbottom') }}
