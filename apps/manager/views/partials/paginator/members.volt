{{ nav.getPaginator(page,'manager/members/index','ontop') }}

          <table id="table-members" class="table table-bordered table-condenced table-hover members-list">
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
          <th>{{ l10n.__('ID', 'member') }}</th>
          <th>{{ l10n.__('Name', 'member') }}</th>
          <th>{{ l10n.__('Email', 'member') }}</th>
          <th>{{ l10n.__('Phone', 'member') }}</th>
          <th>{{ l10n.__('Remarks', 'member') }}</th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
{% if page.items is defined %}
{% for member in page.items %}

          <tr>
          <td>{{ member.id|e }}</td>
          <td>{{ member.name|e }}</td>
          <td>{{ member.email|e }}</td>
          <td>{{ member.phone|e }}</td>
          <td>{{ member.remarks|e }}</td>
          <td>{{ link_to('manager/members/show/'~member.id,'<i class="fa fa-eye"></i>','class':'btn btn-xs btn-info','data-toggle':'tooltip','data-placement':'top','title':l10n._('Show')) }}

              {{ link_to('manager/members/edit/'~member.id,'<i class="fa fa-pencil"></i>','class':'btn btn-xs btn-success','data-toggle':'tooltip','data-placement':'top','title':l10n._('Edit')) }}

              {{ link_to('manager/members/delete/'~member.id,'<i class="fa fa-trash"></i>','class':'btn btn-xs btn-danger','data-toggle':'tooltip','data-placement':'top','title':l10n._('Delete')) }}</td>
          </tr>
{% endfor %}
{% endif %}
          </tbody>
          </table>

{{ nav.getPaginator(page,'manager/members/index','onbottom') }}
