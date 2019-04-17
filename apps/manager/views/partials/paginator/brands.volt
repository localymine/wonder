{{ nav.getPaginator(page,'manager/brands/index','ontop') }}

          <table id="table-brands" class="table table-bordered table-condenced table-hover brands-list">
          <colgroup>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th>{{ l10n.__('ID', 'brand') }}</th>
          <th>{{ l10n.__('Name', 'brand') }}</th>
          <th>{{ l10n.__('Remarks', 'brand') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
  {% set idx=1 %}
{% for brand in page.items %}

          <tr>
          <td id="{{ brand.id|e }}">{{ idx }}</td>
          <td>{{ brand.name|e }}</td>
          <td>{{ brand.remarks|e }}</td>
          <td>{{ link_to('manager/brands/show/'~brand.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/brands/edit/'~brand.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/brands/delete/'~brand.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
  {% set idx=idx+1 %}
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/brands/index','onbottom') }}
