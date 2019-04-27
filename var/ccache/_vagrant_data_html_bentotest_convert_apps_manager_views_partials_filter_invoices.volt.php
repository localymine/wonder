<div id="invoices-export-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php echo $this->tag->form(array('method' => 'post', 'action' => 'manager/inventory/export')); ?>
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->__('Export Inventory', 'inventory'); ?></h4>
      </div>
      <div class="modal-body">
        <div class="bb-filter-abox form-horizontal row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="from" class="col-xs-12 col-sm-1 control-label"><?php echo $this->l10n->__('ID', 'inventory'); ?></label>
              <div class="col-xs-12 col-sm-4">
                  <?php echo $this->tag->textField(array('from', 'class' => 'form-control', 'placeholder' => $this->l10n->__('From', 'inventory'))); ?>
              </div>
              <label class="col-sm-1 control-label">～</label>
              <div class="col-xs-12 col-sm-4">
                <?php echo $this->tag->textField(array('to', 'class' => 'form-control', 'placeholder' => $this->l10n->__('To', 'inventory'))); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="from_date" class="col-xs-12 col-sm-1 control-label"><?php echo $this->l10n->__('Date', 'inventory'); ?></label>
              <div class="col-xs-12 col-sm-4">
                <?php echo $this->tag->textField(array('from_date', 'class' => 'form-control', 'placeholder' => $this->l10n->__('From', 'inventory'))); ?>
              </div>
              <label class="col-sm-1 control-label">～</label>
              <div class="col-xs-12 col-sm-4">
                <?php echo $this->tag->textField(array('to_date', 'class' => 'form-control', 'placeholder' => $this->l10n->__('To', 'inventory'))); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="export-inventory" class="btn btn-success" type="submit">
          <i class="fa fa-download"></i> Download
        </button>
      </div>
      <?php echo $this->tag->endForm(); ?>
    </div>
  </div>
</div>
