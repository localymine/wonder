      <div class="filter-dialog modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"><?php echo $this->l10n->_('Missing logs Filter'); ?></h4>
            </div>
            <div class="modal-body">
              <input  type="hidden" name="date_type" value='<?php echo $date_type; ?>'>
              <input  type="hidden" name="date" value='<?php echo $date; ?>'>
              <div class="bb-filter-abox form-horizontal row">
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="member_endpoint" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->__('Member/Endpoint', 'Surveil'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?php echo $this->tag->textField(array('member_endpoint', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter'))); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="agentbox_name" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->_('Agentbox'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                      <?php echo $this->tag->checkField(array('chk_agentbox', 'class' => 'form-check-input')); ?> <?php echo $this->l10n->_('Use Agentbox'); ?>                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="agentbox_name" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->_('Agentbox Name'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?php echo $this->tag->textField(array('agentbox_name', 'class' => 'form-control', 'disabled' => true, 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter'))); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->_('Camera Name'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter'))); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="type" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->_('Type of Camera'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                    <?php echo $this->tag->select(array('camera_type', $cameratypes, 'using' => array('value', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '')); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="camera_suspension" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->_('Camera Suspension'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                      <?php echo $this->tag->checkField(array('camera_suspension', 'class' => 'form-check-input')); ?> <?php echo $this->l10n->_('Show Suspended Camera'); ?> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="missing_duration" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->_('Missing Duration'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                        <?php echo $this->tag->select(array('missing_duration', $missingDuration, 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Show all'), 'emptyValue' => '')); ?>
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
