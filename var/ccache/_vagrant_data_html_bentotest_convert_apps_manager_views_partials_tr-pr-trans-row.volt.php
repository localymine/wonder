<?php if (isset($posts)) { ?>
  <?php if (isset($posts['trans_prod'])) { ?>
    <?php $i = 0; ?>
    <?php foreach ($posts['trans_prod'] as $row) { ?>
      <tr>
        <td class="text-center">
          <?php echo $this->tag->select(array('warehouses', $warehouses, 'using' => array('id', 'name'), 'data-mode' => 'new', 'name' => 'trans_prod[' . $i . '][warehouse_id]', 'class' => 'form-control p_warehouse no-border', 'useEmpty' => false, 'value' => $row['warehouse_id'])); ?>
        </td>
        <td>
          <?php echo $this->tag->hiddenField(array('name' => 'trans_prod[' . $i . '][product_id]', 'class' => 'p_pid', 'value' => $row['product_id'])); ?>
          <?php echo $this->tag->textField(array('class' => 'form-control getproduct no-border', 'value' => $row['name'])); ?>
        </td>
        <td>
          <?php echo $this->tag->numericField(array('class' => 'form-control text-right p_amount no-border', 'style' => 'width:100px;float:right;', 'name' => 'trans_prod[' . $i . '][amount]', 'value' => 1, 'min' => 1, 'value' => $row['amount'])); ?>
        </td>
        <td>
          <a class="acond rmProduct"><i class="fa fa-minus-circle text-red"></i></a>
        </td>
      </tr>
      <?php $i = $i + 1; ?>
    <?php } ?>
  <?php } ?>
<?php } else { ?>
  <tr>
    <td class="text-center">
      <?php echo $this->tag->select(array('warehouses', $warehouses, 'using' => array('id', 'name'), 'data-mode' => 'new', 'name' => 'trans_prod[0][warehouse_id]', 'class' => 'form-control p_warehouse no-border', 'useEmpty' => false)); ?>
    </td>
    <td>
      <?php echo $this->tag->hiddenField(array('name' => 'trans_prod[0][product_id]', 'class' => 'p_pid', 'value' => '')); ?>
      <?php echo $this->tag->textField(array('class' => 'form-control getproduct no-border')); ?>
    </td>
    <td>
      <?php echo $this->tag->numericField(array('class' => 'form-control text-right p_amount no-border', 'style' => 'width:100px;float:right;', 'name' => 'trans_prod[0][amount]', 'value' => 1, 'min' => 1)); ?>
    </td>
    <td>
      <a class="acond rmProduct"><i class="fa fa-minus-circle text-red"></i></a>
    </td>
  </tr>
<?php } ?>
