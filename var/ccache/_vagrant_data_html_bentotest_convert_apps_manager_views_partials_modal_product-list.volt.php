<div id="products-dialog" class="products-dialog modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->__('List Products', 'product'); ?></h4>
      </div>
      <div class="modal-body">
        <form id="addForm">
        <div class="bb-filter-abox form-horizontal row">
          <div class="col-xs-12 col-sm-12">

            <div class="form-group">
              <div class="col-xs-12 col-sm-12">
                  <?php echo $this->tag->textField(array('keyword', 'class' => 'form-control', 'placeholder' => $this->l10n->_('Keyword'))); ?>
              </div>
            </div>

            <table id="table-products" class="table table-bordered table-condenced table-hover">
              <thead>
                <tr>
                  <th><?php echo $this->l10n->__('ID'); ?></th>
                  <th></th>
                  <th><?php echo $this->l10n->_('Name'); ?></th>
                  <th><?php echo $this->l10n->_('(&#8363;)'); ?></th>
                  <th><?php echo $this->l10n->_('Qty.'); ?></th>
                  <th><?php echo $this->l10n->_('W.'); ?></th>
                  <th><i class="fa fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <tr id="55">
                  <td>1</td>
                  <td class="" style="width:32px;">
                    <a href="#" class="pop">
                      <img class="img-responsive" src="/uploads/user/<?php echo str_pad($identity['id'],7,'0',STR_PAD_LEFT); ?>/product/<?php echo $product->id; ?>/<?php echo $product->image; ?>" />
                    </a>
                  </td>
                  <td>UV SPA++++</td>
                  <td class="text-right">
                    <input type="text" class="form-control text-right no-border" value="200,000" />
                  </td>
                  <td class="text-right">
                    <input type="number" class="form-control text-right no-border quantity" min="1" max="15" value="10" />
                  </td>
                  <td class="text-center">SG</td>
                  <td class="text-center">
                    <a class="text-red addProduct" href="#"><i class="fa fa-plus-circle"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>