{% if list_invoices is defined %}
  {% for invoice in list_invoices %}
    <tr id="iv-{{ invoice.id }}">
      <td>{{ invoice.id }}</td>
      <td>{{ invoice.name }}
        {{ hidden_field('name':'invoice[]','value':invoice.id) }}
      </td>
      <td><span class="tb-align-currency">{{ invoice.total_price|number_format }}</span></td>
      <td class="text-center">{{ invoice.created }}</td>
      <td>
        <a class="acond adInvoice"><i class="fa fa-plus-circle text-blue"></i></a>
      </td>
    </tr>
  {% endfor %}
{% endif %}