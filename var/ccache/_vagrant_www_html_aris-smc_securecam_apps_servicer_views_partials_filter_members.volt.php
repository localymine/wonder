      <div class="filter-dialog modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"><?= $this->l10n->__('Filter Members', 'Filter') ?></h4>
            </div>
            <div class="modal-body">
              <div class="bb-filter-abox form-horizontal">
                <div class="form-group">
                  <label for="name" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Member Name') ?></label>
                  <div class="col-xs-12 col-sm-8">
                  <?= $this->tag->textField(['name', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter')]) ?>

                  </div>
                </div>
                <div class="form-group">
                  <label for="membergroup_id" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Membergroup Name') ?></label>
                  <div class="col-xs-12 col-sm-8">
                  <?= $this->tag->select(['membergroup_id', $mgroups, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

                  </div>
                </div>
                <div class="form-group">
                  <label for="drm" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('DRM') ?></label>
                  <div class="col-xs-12 col-sm-8">
                  <?= $this->tag->selectStatic(['drm', ['1' => $this->l10n->__('Yes', 'DRM'), '0' => $this->l10n->__('No', 'DRM')], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

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
