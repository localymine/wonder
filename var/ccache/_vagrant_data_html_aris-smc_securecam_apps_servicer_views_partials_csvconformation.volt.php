<div class="confirmation-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->__('Confirmation: Export as CSV', 'Filter'); ?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <p id="message"><?php echo $this->l10n->_('Export the list as a CSV. Are you sure?'); ?></p>
        </div>
      </div>
      <div class="modal-footer">
        <?php echo $this->tag->form(array('method' => 'post')); ?>
          <button type="button" class="btn btn-default" filter-handler="cancel"><i class="fa fa-times"></i> <?php echo $this->l10n->_('Cancel'); ?></button>
          <button type="button" class="btn btn-primary" filter-handler="ok"><i class="fa fa-check"></i> <?php echo $this->l10n->_('OK'); ?></button>
          <?php echo $this->tag->hiddenField(array('csv_filter', 'value' => $page->query)); ?>
        <?php echo $this->tag->endForm(); ?>
      </div>
    </div>
  </div>
</div>