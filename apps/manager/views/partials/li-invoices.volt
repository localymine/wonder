<li data-invoice-id="{{ invoice.id }}" data-invoice-name="{{ invoice.name }}" data-invoice-price="{{ invoice.price }}" >
  <input type="checkbox" id="invoice-{{ invoice.id }}" name="invoice[]" data-invoice-id="{{ invoice.id }}" data-transinvoice-id="{{ invoice.transportinvoice.id }}" data-invoice-name="{{ invoice.name }}" data-mode="{{ invoice.invoice_id is defined ? 'edit' : 'new'}}" />
  <span class="name">{{ invoice.name }}</span>
</li>