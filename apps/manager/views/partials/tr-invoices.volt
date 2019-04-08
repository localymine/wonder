{% if selected_invoices is defined %}
  {% for invoice in selected_invoices %}
    <tr>
      <td>{{ invoice.id }}</td>
      <td>{{ invoice.client.name }}
        {{ hidden_field('invoice-'~invoice.id,'name':'invoice[]','value':invoice.id) }}
      </td>
      <td><span class="tb-align-currency">{{ invoice.total_price|number_format }}</span></td>
      <td><a class="acond rmInvoice" data-group="{{ mode is defined ? mode : 'new' }}" data-id="{{ invoice.transportinvoice.id }}"><i class="fa fa-minus-circle"></i></a>
      </td>
    </tr>
  {% endfor %}
{% endif %}