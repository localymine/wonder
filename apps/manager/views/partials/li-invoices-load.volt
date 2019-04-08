{% if list_invoices is defined %}
  {% for invoice in list_invoices %}
    <tr>
      <td>{{ invoice.id }}</td>
      <td>{{ invoice.name }}
        {{ hidden_field('invoice-'~invoice.id,'name':'invoice[]','value':invoice.id) }}
      </td>
      <td><span class="tb-align-currency">{{ invoice.total_price|number_format }}</span></td>
      <td>{{ invoice.created }}</td>
      <td>
        <input type="checkbox" id="invoice-{{ invoice.id }}" name="invoice[]" data-invoice-id="{{ invoice.id }}" data-transinvoice-id="{{ invoice.transportinvoice.id }}" data-invoice-name="{{ invoice.client.name }}" data-invoice-price="{{ invoice.total_price }}" data-datetime="{{ invoice.created }}"  data-mode="{{ invoice.invoice_id is defined ? 'edit' : 'new'}}" />
      </td>
    </tr>
  {% endfor %}
{% endif %}