<?php echo $this->nav->getPaginator($page, 'manager/products/index', 'ontop'); ?>

          <table id="table-products" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col>
          <col class="actions actions-3">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'product'); ?></th>
          <th></th>
          <th><?php echo $this->l10n->__('Name', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Price (&#8363;)', 'product'); ?></th>
          <th><?php echo $this->l10n->__('WS Price (&#8363;)', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Quantity', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Category', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Brand', 'product'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $product) { ?>

          <tr id="p<?php echo $product->id; ?>">
          <td title="<?php echo $product->remarks; ?>"><?php echo $this->escaper->escapeHtml($product->id); ?></td>
          
          <td class="" style="width:32px;">
            <a href="javascript:void(0)" class="pop">
              <img class="img-responsive" src="/uploads/user/<?php echo $this->utility->str_pad($product->user_id); ?>/product/<?php echo $this->utility->str_pad($product->id); ?>/<?php echo $product->image; ?>" />
            </a>
          </td>
          <td class="width-m"><?php echo $this->escaper->escapeHtml($product->name); ?><span style="display: none;"><?php echo $product->remarks; ?></span></td>
          <td class="text-right price"><?php echo number_format($product->price); ?></td>
          <td class="text-right price"><?php echo number_format($product->wholesale_price); ?></td>
          <td class="text-right quantity"><?php echo $product->quantity; ?></td>
          <td class="text-center">
            <?php if ($product->category_id != 0) { ?>
            <?php echo $this->escaper->escapeHtml($product->category->name); ?>
            <?php } ?>
          </td>
          <td class="text-center">
            <?php if ($product->brand_id != 0) { ?>
            <?php echo $this->escaper->escapeHtml($product->brand->name); ?>
            <?php } ?>
          </td>
          <td>
            <button class="btn btn-xs btn-foursquare btn-chart" title="<?php echo $this->l10n->_('Price in Stock'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-target="#chart-product-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-line-chart"></i></button>
            <?php echo $this->tag->linkTo(array('manager/products/show/' . $product->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

            <?php echo $this->tag->linkTo(array('manager/products/edit/' . $product->id, '<i class="fa fa-pencil"></i>', 'class' => 'btn btn-xs btn-success', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Edit'))); ?>

            <button class="btn btn-xs btn-yahoo btn-add" title="<?php echo $this->l10n->_('Add'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-price="<?php echo $product->price; ?>" data-target="#add-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-plus-circle"></i></button>
            <button class="btn btn-xs btn-flickr btn-sub" title="<?php echo $this->l10n->_('Subtract'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-price="<?php echo $product->price; ?>" data-target="#sub-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-minus-circle"></i></button>
            <button class="btn btn-xs btn-warning btn-copy" title="<?php echo $this->l10n->_('Copy'); ?>" data-id="<?php echo $product->id; ?>" data-toggle="tooltip" data-placement="top"><i class="fa fa-copy"></i></button>

              <?php echo $this->tag->linkTo(array('manager/products/delete/' . $product->id, '<i class="fa fa-trash"></i>', 'class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Delete'))); ?></td>
          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/products/index', 'onbottom'); ?>
