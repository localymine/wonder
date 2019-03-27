<div id="sub-stock-dialog" class="sub-stock-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->__('Subtract Stock', 'product'); ?> - <span class="product-name text-bold text-success"></span></h4>
      </div>
      <div class="modal-body">
        <form id="subForm">
        <div class="bb-filter-abox form-horizontal row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="quantity" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Quantity', 'product'); ?></label>
              <div class="col-xs-12 col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-minus"></i></span>
                  <?php echo $this->tag->textField(array('subQuantity', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Quantity', 'product'))); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="subwarehouse_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Warehouse'); ?></label>
              <div class="col-xs-12 col-sm-3">
                <?php echo $this->tag->select(array('subwarehouse_id', $warehouses, 'using' => array('id', 'name'), 'name' => 'subwarehouse_id', 'class' => 'form-control show-tick', 'data-style' => 'btn-white', 'useEmpty' => false)); ?>

              </div>
            </div>
            <div class="form-group">
              <label for="subremarks" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->__('Remarks', 'product'); ?></label>
              <div class="col-xs-12 col-sm-7">
                <?php echo $this->tag->textArea(array('subremarks', 'class' => 'form-control', 'placeholder' => $this->l10n->__('Remarks', 'product'))); ?>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i
              class="fa fa-times"></i> <?php echo $this->l10n->_('Discards'); ?></button>
        <button id="submitSubstock" type="button" class="btn btn-primary" data-id=""><i
              class="fa fa-check"></i> <?php echo $this->l10n->_('Subtract'); ?></button>
      </div>
    </div>
  </div>
</div>
