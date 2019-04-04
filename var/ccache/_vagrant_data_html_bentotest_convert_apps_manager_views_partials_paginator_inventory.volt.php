<?php echo $this->nav->getPaginator($page, 'manager/products/index', 'ontop'); ?>

          <table id="table-products" class="table table-bordered table-condenced table-hover">
          <colgroup>
          <col style="width: 1%;">
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
          <th><?php echo $this->l10n->__('Quantity', 'product'); ?></th>
          <th><i class="fa fa-cogs"></i></th>
          </tr>
          </thead>
          <tbody>
<?php if (isset($page->items)) { ?>
<?php foreach ($page->items as $product) { ?>

          <tr id="p<?php echo $product->id; ?>" title="<?php echo $product->remarks; ?>">
          <td><?php echo $this->escaper->escapeHtml($product->id); ?></td>
          <td class="" style="width:32px;">
            <a href="javascript:void(0)" class="pop">
              
              <img class="img-responsive" src="/uploads/user/<?php echo $this->utility->str_pad($product->user_id); ?>/product/<?php echo $this->utility->str_pad($product->id); ?>/<?php echo $product->image; ?>" />
            </a>
          </td>
          <td class="width-m"><?php echo $this->escaper->escapeHtml($product->name); ?></td>
          <td class="text-left quantity">
            <?php foreach ($product->productquantity as $pq) { ?>
              <div><?php echo $pq->warehouse->name; ?> : <span style="float:right;"><?php echo $pq->quantity; ?></span></div>
            <?php } ?>
          </td>
          <td>
            <?php echo $this->tag->linkTo(array('manager/products/show/' . $product->id, '<i class="fa fa-eye"></i>', 'class' => 'btn btn-xs btn-info', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => $this->l10n->_('Show'))); ?>

          </tr>
<?php } ?>
<?php } ?>
          </tbody>
          </table>

<?php echo $this->nav->getPaginator($page, 'manager/products/index', 'onbottom'); ?>
