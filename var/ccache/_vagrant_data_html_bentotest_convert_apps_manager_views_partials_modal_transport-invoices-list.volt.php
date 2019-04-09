<div class="modal" id="invoicechooser" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="invoiceModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="invoiceModalLabel" class="modal-title"><?php echo $this->l10n->_('Add Invoices'); ?></h4>
      </div>
      <div class="modal-body">
        <table class="ulcond lstInvoices table table-responsive">
          <tbody>
          <?php echo $this->partial('partials/tr-invoices-load'); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>