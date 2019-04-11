<?php if (isset($list_invoices)) { ?>
  <?php foreach ($list_invoices as $invoice) { ?>
    <tr id="iv-<?php echo $invoice->id; ?>">
      <td><?php echo $invoice->id; ?></td>
      <td><?php echo $invoice->client->name; ?>
        <?php echo $this->tag->hiddenField(array('name' => 'invoice[]', 'value' => $invoice->id)); ?>
      </td>
      <td><span class="tb-align-currency"><?php echo number_format($invoice->total_price); ?></span></td>
      <td class="text-center"><?php echo $invoice->created; ?></td>
      <td>
        <a class="acond adInvoice"><i class="fa fa-plus-circle text-blue"></i></a>
      </td>
    </tr>
  <?php } ?>
<?php } ?>