<?php if (isset($posts)) { ?>
  <?php if (isset($posts['others'])) { ?>
    <?php $i = 0; ?>
    <?php foreach ($posts['others'] as $row) { ?>
      <li>
        <div class="row">
          <div class="col-xs-12 col-sm-1 col-sm-offset-2">
            <a class="acond deletecond" href="javascript:void(0);" data-id="<?php echo $row['id']; ?>"><i class="fa fa-minus-circle"></i></a>
          </div>
          <div class="col-xs-12 col-sm-2">
            <?php if (isset($row['name']) && $row['name'] != '') { ?>
              <?php echo $this->tag->setdefault('others[' . $i . '][name]', $row['name']); ?>
            <?php } ?>
            <?php echo $this->tag->textField(array('others[' . $i . '][name]', 'class' => 'form-control o_name', 'placeholder' => $this->l10n->_('name'))); ?>
          </div>
          <div class="col-xs-12 col-sm-2">
            <?php if (isset($row['price']) && $row['price'] != '') { ?>
              <?php echo $this->tag->setdefault('others[' . $i . '][price]', $row['price']); ?>
            <?php } ?>
            <?php echo $this->tag->textField(array('others[' . $i . '][price]', 'class' => 'form-control o_price', 'placeholder' => $this->l10n->_('price'))); ?><span class="currency">¥</span>
          </div>
          <div class="col-xs-12 col-sm-4">
            <?php if (isset($row['remarks']) && $row['remarks'] != '') { ?>
              <?php echo $this->tag->setdefault('others[' . $i . '][remarks]', $row['remarks']); ?>
            <?php } ?>
            <?php echo $this->tag->textField(array('others[' . $i . '][remarks]', 'class' => 'form-control o_remarks', 'placeholder' => $this->l10n->_('remarks'))); ?>
          </div>
          <?php echo $this->tag->hiddenField(array('others[' . $i . '][id]', 'class' => 'o_id', 'value' => $row['id'])); ?>
        </div>
      </li>
      <?php $i = $i + 1; ?>
    <?php } ?>
  <?php } ?>
<?php } else { ?>
  <li>
    <div class="row">
      <div class="col-xs-12 col-sm-1 col-sm-offset-2">
        <a class="acond deletecond" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>
      </div>
      <div class="col-xs-12 col-sm-2">
        <?php echo $this->tag->textField(array('others[0][name]', 'class' => 'form-control o_name', 'placeholder' => $this->l10n->_('name'))); ?>
      </div>
      <div class="col-xs-12 col-sm-2">
        <?php echo $this->tag->textField(array('others[0][price]', 'class' => 'form-control o_price', 'placeholder' => $this->l10n->_('price'))); ?>
      </div>
      <div class="col-xs-12 col-sm-4">
        <?php echo $this->tag->textField(array('others[0][remarks]', 'class' => 'form-control o_remarks', 'placeholder' => $this->l10n->_('remarks'))); ?>
      </div>
      <?php echo $this->tag->hiddenField(array('others[0][id]', 'class' => 'o_id', 'value' => '')); ?>
    </div>
  </li>
<?php } ?>