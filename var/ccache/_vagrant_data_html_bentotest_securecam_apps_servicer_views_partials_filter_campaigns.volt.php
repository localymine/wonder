      <div class="filter-dialog modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title"><?php echo $this->l10n->__('Filter Campaigns', 'Filter'); ?></h4>
            </div>
            <div class="modal-body">
              <div class="bb-filter-abox form-horizontal row">
                <div class="col-xs-12 col-sm-8">
                  <div class="form-group">
                    <label for="name" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->__('name', 'Campaign'); ?></label>
                    <div class="col-xs-12 col-sm-8">
                      <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Enter any chars to search', 'Filter'))); ?>
                   </div>
                  </div>
                  <div class="form-group">
                    <label for="term_from" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->__('term_from', 'Campaign'); ?></label>
                    <div class="col-xs-12 col-sm-5">
                      <div class="input-group">
                        <?php echo $this->tag->textField(array('term_from', 'class' => 'form-control')); ?>
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="term_to" class="col-xs-12 col-sm-4 control-label"><?php echo $this->l10n->__('term_to', 'Campaign'); ?></label>
                    <div class="col-xs-12 col-sm-5">
                      <div class="input-group">
                        <?php echo $this->tag->textField(array('term_to', 'class' => 'form-control')); ?>
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
