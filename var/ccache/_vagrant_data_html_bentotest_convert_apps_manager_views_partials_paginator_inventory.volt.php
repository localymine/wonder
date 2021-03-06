<?php echo $this->nav->getPaginator($page, 'manager/products/index', 'ontop'); ?>

          <table id="table-products" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col style="width: 1%;">
          <col style="width: 4%;">
          <col>
          <col>
          <col>
          <col style="width: 10%;">
          <col class="actions actions-1"  style="width: 1%;">
          </colgroup>
          <thead>
          <tr>
          <th><?php echo $this->l10n->__('ID', 'product'); ?></th>
          <th></th>
          <th><?php echo $this->l10n->__('Name', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Category', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Brand', 'product'); ?></th>
          <th><?php echo $this->l10n->__('Quantity', 'product'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $product) { ?>

          <tr id="p<?php echo $product->id; ?>" data-disabled="<?php echo $product->disabled; ?>">
          <td title="<?php echo $product->remarks; ?>"><?php echo $this->escaper->escapeHtml($product->id); ?></td>
          <td>
            <a href="javascript:void(0)" class="pop">
              
              <?php echo $this->utility->image($product->user_id, $product->id, $product->image, array('width:32px')); ?>
            </a>
          </td>
          <td class="width-m">
            <?php echo $this->escaper->escapeHtml($product->name); ?><span style="display: none;"><?php echo $product->remarks; ?></span>
            <span style="display: none;"><?php echo $product->description; ?></span>
          </td>
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
          <td class="text-left quantity">
            <?php foreach ($product->productquantity as $pq) { ?>
              <div><?php echo $pq->warehouse->name; ?> : <span style="float:right;" class="wh-<?php echo $pq->warehouse->id; ?>"><?php echo $pq->quantity; ?></span></div>
            <?php } ?>
          </td>
          <td>
            <button class="btn btn-xs btn-foursquare btn-chart" title="<?php echo $this->l10n->_('Price in Stock'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-target="#chart-product-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-line-chart"></i></button>
            <?php echo $this->tag->linkTo(array('manager/products/export/' . $product->id, '<i class="fa fa-file-excel-o"></i>', 'class' => 'btn btn-xs btn-yahoo', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Export'))); ?>
            <button class="btn btn-xs btn-yahoo btn-add" title="<?php echo $this->l10n->_('Add'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-price="<?php echo $product->price; ?>" data-target="#add-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-plus-circle"></i></button>
            <button class="btn btn-xs btn-flickr btn-sub" title="<?php echo $this->l10n->_('Subtract'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-price="<?php echo $product->price; ?>" data-target="#sub-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-minus-circle"></i></button>
            <button class="btn btn-xs btn-success btn-move" title="<?php echo $this->l10n->_('Move'); ?>" data-id="<?php echo $product->id; ?>" data-product="<?php echo $product->name; ?>" data-price="<?php echo $product->price; ?>" data-target="#move-stock-dialog" data-toggle="modal" data-placement="top"><i class="fa fa-arrows-h"></i></button>
            <?php echo $this->tag->linkTo(array('manager/products/show/' . $product->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/products/index', 'onbottom'); ?>
