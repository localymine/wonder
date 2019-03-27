{% if list_invoices is defined %}
  {% for invoice in list_invoices %}
    <li data-invoice-id="{{ invoice.id }}" data-invoice-name="{{ invoice.name }}" data-invoice-price="{{ invoice.price }}" >
      {% if invoice.invoice_id is defined %}
        <input type="checkbox" id="invoice-{{ invoice.id }}" name="invoice[]" data-invoice-id="{{ invoice.id }}" data-transinvoice-id="{{ invoice.transportinvoice.id }}" data-invoice-name="{{ invoice.name }}" data-mode="{{ invoice.invoice_id is defined ? 'edit' : 'new'}}" checked="true" />
      {% else %}
        <input type="checkbox" id="invoice-{{ invoice.id }}" name="invoice[]" data-invoice-id="{{ invoice.id }}" data-transinvoice-id="{{ invoice.transportinvoice.id }}" data-invoice-name="{{ invoice.name }}" data-mode="{{ invoice.invoice_id is defined ? 'edit' : 'new'}}" />
      {% endif %}
      <span class="name">{{ invoice.name }}</span>
    </li>
  {% endfor %}
{% endif %}