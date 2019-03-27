<?php if (isset($list_invoices)) { ?>
  <?php foreach ($list_invoices as $invoice) { ?>
    <li data-invoice-id="<?php echo $invoice->id; ?>" data-invoice-name="<?php echo $invoice->name; ?>" data-invoice-price="<?php echo $invoice->price; ?>" >
      <?php if (isset($invoice->invoice_id)) { ?>
        <input type="checkbox" id="invoice-<?php echo $invoice->id; ?>" name="invoice[]" data-invoice-id="<?php echo $invoice->id; ?>" data-transinvoice-id="<?php echo $invoice->transportinvoice->id; ?>" data-invoice-name="<?php echo $invoice->name; ?>" data-mode="<?php echo (isset($invoice->invoice_id) ? 'edit' : 'new'); ?>" checked="true" />
      <?php } else { ?>
        <input type="checkbox" id="invoice-<?php echo $invoice->id; ?>" name="invoice[]" data-invoice-id="<?php echo $invoice->id; ?>" data-transinvoice-id="<?php echo $invoice->transportinvoice->id; ?>" data-invoice-name="<?php echo $invoice->name; ?>" data-mode="<?php echo (isset($invoice->invoice_id) ? 'edit' : 'new'); ?>" />
      <?php } ?>
      <span class="name"><?php echo $invoice->name; ?></span>
    </li>
  <?php } ?>
<?php } ?>