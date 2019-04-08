<div id="products-dialog" class="products-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">{{ l10n.__('List Products', 'product') }}</h4>
      </div>
      <div class="modal-body">
        <form id="addForm">
        <div class="bb-filter-abox form-horizontal row">
          <div class="col-xs-12 col-sm-12">

            <div class="form-group">
              <div class="col-xs-12 col-sm-12">
                  {{ text_field('keyword','class':'form-control','placeholder':l10n._('Keyword')) }}
              </div>
            </div>

            <table id="table-products" class="table table-bordered table-condenced table-hover">
              <thead>
                <tr>
                  <th>{{ l10n.__('ID') }}</th>
                  <th></th>
                  <th>{{ l10n._('Name') }}</th>
                  <th>{{ l10n._('(&#8363;)') }}</th>
                  <th>{{ l10n._('Qty.') }}</th>
                  <th>{{ l10n._('W.') }}</th>
                  <th><i class="fa fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody id="product-list">
              </tbody>
            </table>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>