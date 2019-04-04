{% if selected_invoices is defined %}
  {% set i = 1 %}
  {% for invoice in selected_invoices %}
    <tr>
      <td>{{ i }}</td>
      <td>{{ invoice.id }} - {{ invoice.client.name }}
        {{ hidden_field('invoice-'~invoice.id,'name':'invoice[]','value':invoice.id) }}
      </td>
      <td><span class="tb-align-currency">{{ invoice.total_price|number_format }}</span></td>
      <td><a class="acond rmInvoice" data-group="{{ mode is defined ? mode : 'new' }}" data-id="{{ invoice.transportinvoice.id }}"><i class="fa fa-minus-circle"></i></a>
      </td>
    </tr>
    {% set i = i + 1 %}
  {% endfor %}
{% endif %}