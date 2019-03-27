<div id="add-stock-dialog" class="add-stock-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">{{ l10n.__('Add Stock', 'product') }} - <span class="product-name text-bold text-success"></span></h4>
      </div>
      <div class="modal-body">
        <form id="addForm">
        <div class="bb-filter-abox form-horizontal row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="market_price"
                     class="col-xs-12 col-sm-3 control-label">{{ l10n.__('Market price','product') }}</label>
              <div class="col-xs-12 col-sm-7">
                <div class="input-group">
                  {{ text_field('market_price','class':'form-control','placeholder':l10n.__('Market price','product')) }}
                  <span class="input-group-addon"><i class="fa fa-yen"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="purchase_price"
                     class="col-xs-12 col-sm-3 control-label">{{ l10n.__('Purchase price','product') }}</label>
              <div class="col-xs-12 col-sm-7">
                <div class="input-group">
                  {{ text_field('purchase_price','class':'form-control','placeholder':l10n.__('Purchase price','product')) }}
                  <span class="input-group-addon"><i class="fa fa-yen"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="saleprice" class="col-xs-12 col-sm-3 control-label">{{ l10n.__('Saleprice','product') }}</label>
              <div class="col-xs-12 col-sm-7">
                <div class="input-group">
                  {{ text_field('saleprice','class':'form-control','placeholder':l10n.__('Saleprice','product')) }}
                  <span class="input-group-addon">&#8363;</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="quantity" class="col-xs-12 col-sm-3 control-label">{{ l10n.__('Quantity','product') }}</label>
              <div class="col-xs-12 col-sm-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  {{ text_field('quantity','class':'form-control','placeholder':l10n.__('Quantity','product')) }}
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12 col-sm-7">
                <label for="apply" class="col-md-offset-6 font-light">
                  {{ check_field('apply','value':0) }}
                  {{ l10n.__('Apply current SalePrice','product') }}
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="warehouse_id" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Warehouse') }}</label>
              <div class="col-xs-12 col-sm-3">
                {{ select('warehouse_id',warehouses,'using':['id','name'],'name':'warehouse_id','class':'form-control show-tick','data-style':'btn-white','useEmpty':false) }}

              </div>
            </div>
            <div class="form-group">
              <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n.__('Remarks','product') }}</label>
              <div class="col-xs-12 col-sm-7">
                  {{ text_area('remarks','class':'form-control','placeholder':l10n.__('Remarks','product')) }}
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i
              class="fa fa-times"></i> {{ l10n._('Discards') }}</button>
        <button id="submitAddstock" type="button" class="btn btn-primary" data-id=""><i
              class="fa fa-check"></i> {{ l10n._('Add') }}</button>
      </div>
    </div>
  </div>
</div>
