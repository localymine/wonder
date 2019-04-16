{% if selected_invoices is defined %}
  {% for invoice in selected_invoices %}
    <tr id="iv-{{ invoice.id }}">
      <td>{{ invoice.id }}</td>
      <td>
        {{ invoice.client.name }}
        {#{{ hidden_field('name':'invoice[]','value': invoice.id) }}#}
        <input type="hidden" name="invoice[]" value="{{ invoice.id }}" />
      </td>
      <td><span class="tb-align-currency">{{ invoice.total_price|number_format }}</span></td>
      <td class="text-center">{{ invoice.created }}</td>
      <td>
        <a class="acond rmInvoice"><i class="fa fa-minus-circle text-red"></i></a>
      </td>
    </tr>
  {% endfor %}
{% endif %}