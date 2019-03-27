<div class="deleteconfirm-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->__('Confirmation: Delete uploaded file', 'Filter'); ?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <p id="message"><?php echo $this->l10n->_('The image will be deleted. Are you sure?'); ?></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" filter-handler="cancel"><i
              class="fa fa-times"></i> <?php echo $this->l10n->_('Cancel'); ?></button>
        <button type="button" class="btn btn-primary" filter-handler="ok"><i class="fa fa-check"></i> <?php echo $this->l10n->_('OK'); ?>
        </button>
        <?php echo $this->tag->hiddenField(array('post_data', 'data-type', 'data-image')); ?>
      </div>
    </div>
  </div>
</div>