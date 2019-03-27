      <div class="filter-dialog modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"><?= $this->l10n->__('Filter Membergroups', 'Filter') ?></h4>
            </div>
            <div class="modal-body">
              <div class="bb-filter-abox form-horizontal">
                <div class="form-group">
                  <label for="name" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Membergroup Name') ?></label>
                  <div class="col-xs-12 col-sm-8">
                  <?= $this->tag->textField(['name', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter')]) ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" filter-handler="reset"><i class="fa fa-times"></i> <?= $this->l10n->_('Discards filter') ?></button>
              <button type="button" class="btn btn-primary" filter-handler="apply"><i class="fa fa-check"></i> <?= $this->l10n->_('Apply filter') ?></button>
            </div>
          </div>
        </div>
      </div>
