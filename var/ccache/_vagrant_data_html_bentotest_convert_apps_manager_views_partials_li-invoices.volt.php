<li data-invoice-id="<?php echo $invoice->id; ?>" data-invoice-price="<?php echo $invoice->total_price; ?>" data-invoice-name="<?php echo $invoice->id; ?> - <?php echo $invoice->client->name; ?>" >
  <input type="checkbox" id="invoice-<?php echo $invoice->id; ?>" name="invoice[]" data-invoice-id="<?php echo $invoice->id; ?>" data-transinvoice-id="<?php echo $invoice->transportinvoice->id; ?>" data-invoice-name="<?php echo $invoice->id; ?> - <?php echo $invoice->client->name; ?>" data-mode="<?php echo (isset($invoice->invoice_id) ? 'edit' : 'new'); ?>" />
  <span class="name"><?php echo $invoice->id; ?> - <?php echo $invoice->client->name; ?></span>
</li>