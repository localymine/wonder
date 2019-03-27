<div id="chart-product-dialog" class="add-stock-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg chart-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->__('Product in Stock', 'product'); ?> - <span class="product-name text-bold text-success"></span></h4>
      </div>
      <div class="modal-body">
        <div class="bb-filter-abox form-horizontal row">
          <div class="form-group">
            <label class="col-sm-3 control-label">Date</label>
            <div class="col-sm-9 form-inline">
              <label for="formdate" class="control-label"><?php echo $this->l10n->_('From'); ?></label>
              <input type="text" id="fromDate" class="form-control" />

              <label for="todate" class="control-label"><?php echo $this->l10n->_('To'); ?></label>
              <input type="text" id="toDate" class="form-control" />

              <button id="renderChart" class="btn btn-foursquare" data-id="">Render Chart</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="mychart">
            <canvas id="chartContainer" style="height: 450px; width: 100%;" aria-label="Product Chart" role="img">
              <p>not support canvas</p>
            </canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
