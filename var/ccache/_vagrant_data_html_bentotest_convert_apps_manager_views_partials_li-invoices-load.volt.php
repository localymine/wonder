<?php if (isset($list_invoices)) { ?>
  <?php foreach ($list_invoices as $invoice) { ?>
    <tr>
      <td><?php echo $invoice->id; ?></td>
      <td><?php echo $invoice->name; ?>
        <?php echo $this->tag->hiddenField(array('invoice-' . $invoice->id, 'name' => 'invoice[]', 'value' => $invoice->id)); ?>
      </td>
      <td><span class="tb-align-currency"><?php echo number_format($invoice->total_price); ?></span></td>
      <td><?php echo $invoice->created; ?></td>
      <td>
        <input type="checkbox" id="invoice-<?php echo $invoice->id; ?>" name="invoice[]" data-invoice-id="<?php echo $invoice->id; ?>" data-transinvoice-id="<?php echo $invoice->transportinvoice->id; ?>" data-invoice-name="<?php echo $invoice->client->name; ?>" data-invoice-price="<?php echo $invoice->total_price; ?>" data-datetime="<?php echo $invoice->created; ?>"  data-mode="<?php echo (isset($invoice->invoice_id) ? 'edit' : 'new'); ?>" />
      </td>
    </tr>
  <?php } ?>
<?php } ?>