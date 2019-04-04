<li data-invoice-id="{{ invoice.id }}" data-invoice-price="{{ invoice.total_price }}" data-invoice-name="{{ invoice.id }} - {{ invoice.client.name }}" >
  <input type="checkbox" id="invoice-{{ invoice.id }}" name="invoice[]" data-invoice-id="{{ invoice.id }}" data-transinvoice-id="{{ invoice.transportinvoice.id }}" data-invoice-name="{{ invoice.id }} - {{ invoice.client.name }}" data-mode="{{ invoice.invoice_id is defined ? 'edit' : 'new'}}" />
  <span class="name">{{ invoice.id }} - {{ invoice.client.name }}</span>
</li>