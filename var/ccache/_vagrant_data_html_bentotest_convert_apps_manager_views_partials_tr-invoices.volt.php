<?php if (isset($selected_invoices)) { ?>
  <?php $i = 1; ?>
  <?php foreach ($selected_invoices as $invoice) { ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $invoice->name; ?>
        <?php echo $this->tag->hiddenField(array('invoice-' . $invoice->id, 'name' => 'invoice[]', 'value' => $invoice->id)); ?>
      </td>
      <td><span class="tb-align-currency"><?php echo number_format($invoice->price); ?></span></td>
      <td><a class="acond rmInvoice" data-group="<?php echo (isset($mode) ? $mode : 'new'); ?>" data-id="<?php echo $invoice->transportinvoice->id; ?>"><i class="fa fa-minus-circle"></i></a>
      </td>
    </tr>
    <?php $i = $i + 1; ?>
  <?php } ?>
<?php } ?>