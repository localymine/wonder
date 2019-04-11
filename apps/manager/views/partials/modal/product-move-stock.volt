<div id="move-stock-dialog" class="move-stock-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">{{ l10n.__('Subtract Stock', 'product') }} - <span class="product-name text-bold text-success"></span></h4>
      </div>
      <div class="modal-body">
        <form id="subForm">
        <div class="bb-filter-abox form-horizontal row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="warehouse_from" class="col-xs-12 col-sm-3 control-label">{{ l10n._('From Warehouse') }}</label>
              <div class="col-xs-12 col-sm-3">
                {{ select('warehouse_from',warehouses,'using':['id','name'],'name':'warehouse_from_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':false) }}

              </div>
            </div>
            <div class="form-group">
              <label for="warehouse_to" class="col-xs-12 col-sm-3 control-label">{{ l10n._('To Warehouse') }}</label>
              <div class="col-xs-12 col-sm-3">
                {{ select('warehouse_to',warehouses,'using':['id','name'],'name':'warehouse_to_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':false) }}

              </div>
            </div>
            <div class="form-group">
              <label for="moveQuantity" class="col-xs-12 col-sm-3 control-label">{{ l10n.__('Quantity','product') }}</label>
              <div class="col-xs-12 col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-arrows-h"></i></span>
                  {{ text_field('moveQuantity','class':'form-control','placeholder':l10n.__('Quantity','product')) }}
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i
              class="fa fa-times"></i> {{ l10n._('Discards') }}</button>
        <button id="submitMovestock" type="button" class="btn btn-primary" data-id=""><i
              class="fa fa-check"></i> {{ l10n._('Move') }}</button>
      </div>
    </div>
  </div>
</div>
