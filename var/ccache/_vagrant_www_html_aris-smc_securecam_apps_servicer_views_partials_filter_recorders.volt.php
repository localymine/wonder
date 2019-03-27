      <div class="filter-dialog modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"><?= $this->l10n->__('Filter Recorders', 'Filter') ?></h4>
            </div>
            <div class="modal-body">
              <div class="bb-filter-abox form-horizontal row">
                <div class="col-xs-5 col-sm-5">
                  <div class="form-group">
                    <label for="root_id" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Group root') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->select(['root_id', $layer1, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="area_id" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Area') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->select(['area_id', $layer2, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="group_id" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Endpoint') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->select(['group_id', $layer3, 'using' => ['id', 'name'], 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

                    </div>
                  </div>
                </div>
                <div class="col-xs-7 col-sm-7">
                  <div class="form-group">
                    <label for="name" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Recorder Name') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->textField(['name', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter')]) ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="abox_name" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Related Agent') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->textField(['abox_name', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter')]) ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="hwaddr" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('HW Address') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->textField(['hwaddr', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter HW Address', 'Filter')]) ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="status" class="col-xs-12 col-sm-4 control-label"><?= $this->l10n->_('Life-Or-Death') ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?= $this->tag->selectStatic(['status', $doa_label, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '']) ?>

                    </div>
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
