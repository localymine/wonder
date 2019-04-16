<?php if (isset($selected_invoices)) { ?>
  <?php foreach ($selected_invoices as $invoice) { ?>
    <tr id="iv-<?php echo $invoice->id; ?>">
      <td><?php echo $invoice->id; ?></td>
      <td>
        <?php echo $invoice->client->name; ?>
        
        <input type="hidden" name="invoice[]" value="<?php echo $invoice->id; ?>" />
      </td>
      <td><span class="tb-align-currency"><?php echo number_format($invoice->total_price); ?></span></td>
      <td class="text-center"><?php echo $invoice->created; ?></td>
      <td>
        <a class="acond rmInvoice"><i class="fa fa-minus-circle text-red"></i></a>
      </td>
    </tr>
  <?php } ?>
<?php } ?>