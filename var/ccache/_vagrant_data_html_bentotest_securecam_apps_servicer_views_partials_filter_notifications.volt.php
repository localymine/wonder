      <div class="filter-dialog modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"><?php echo $this->l10n->__('Filter Agentboxes', 'Filter'); ?></h4>
            </div>
            <div class="modal-body">
              <div class="bb-filter-abox form-horizontal row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Member/Endpoint', 'Surveil'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?php echo $this->tag->textField(array('alert__q', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter'))); ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alert_type" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Alert type', 'Surveil'); ?></label>
                    <div class="col-xs-12 col-sm-4">
                    <?php echo $this->tag->selectStatic(array('alert_type', $alertSelection, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Notified at', 'Surveil'); ?></label>
                    <div class="col-xs-12 col-sm-4">
                      <div class="input-group">
                        <?php echo $this->tag->textField(array('alert_from', 'class' => 'form-control')); ?>
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                    <div class="col-xs-12 visible-xs hidden-sm hidden-md hidden-lg"><?php echo $this->l10n->_(' ~ '); ?></div>
                    <div class="col-xs-12 col-sm-4">
                      <div class="input-group">
                        <?php echo $this->tag->textField(array('alert_to', 'class' => 'form-control')); ?>
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" filter-handler="reset"><i class="fa fa-times"></i> <?php echo $this->l10n->_('Discards filter'); ?></button>
              <button type="button" class="btn btn-primary" filter-handler="apply"><i class="fa fa-check"></i> <?php echo $this->l10n->_('Apply filter'); ?></button>
            </div>
          </div>
        </div>
      </div>
