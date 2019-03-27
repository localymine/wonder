<?php if (isset($posts)) { ?>
  <?php if (isset($posts['conds'])) { ?>
    <?php $i = 0; ?>
    <?php foreach ($posts['conds'] as $row) { ?>
    <li>
      <div class="row">
        <div class="col-xs-12 col-sm-1 text-right">
          <a class="acond deletecond" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>
        </div>
        <div class="col-xs-12 col-sm-3">
          <?php if (isset($row['devicetype_id']) && $row['devicetype_id'] != '') { ?>
            <?= $this->tag->setdefault('conds[' . $i . '][devicetype_id]', $row['devicetype_id']) ?>
          <?php } ?>
          <?= $this->tag->select(['conds[' . $i . '][devicetype_id]', $devicetypes, 'using' => ['id', 'name'], 'class' => 'form-control show-tick devicetype_id', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Device type'), 'emptyValue' => '']) ?>
        </div>
        <div class="col-xs-12 col-sm-3">
          <?php if (isset($row['manufacture_id']) && $row['manufacture_id'] != '') { ?>
            <?= $this->tag->setdefault('conds[' . $i . '][manufacture_id]', $row['manufacture_id']) ?>
          <?php } ?>
          <?= $this->tag->select(['conds[' . $i . '][manufacture_id]', $manufactures, 'using' => ['id', 'name'], 'class' => 'form-control show-tick manufacture_id', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Manufacture'), 'emptyValue' => '']) ?>
        </div>
        <div class="col-xs-12 col-sm-4">
          <?php if (isset($row['keyword']) && $row['keyword'] != '') { ?>
            <?= $this->tag->setdefault('conds[' . $i . '][keyword]', $row['keyword']) ?>
          <?php } ?>
          <?= $this->tag->textField(['conds[' . $i . '][keyword]', 'class' => 'form-control keyword', 'placeholder' => 'Keyword']) ?>
        </div>
      </div>
    </li>
      <?php $i = $i + 1; ?>
    <?php } ?>
  <?php } ?>
<?php } else { ?>
  <li>
    <div class="row">
      <div class="col-xs-12 col-sm-1 text-right">
        <a class="acond deletecond" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>
      </div>
      <div class="col-xs-12 col-sm-3">
        <?= $this->tag->select(['conds[0][devicetype_id]', $devicetypes, 'using' => ['id', 'name'], 'class' => 'form-control show-tick devicetype_id', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Device type'), 'emptyValue' => '']) ?>
      </div>
      <div class="col-xs-12 col-sm-3">
        <?= $this->tag->select(['conds[0][manufacture_id]', $manufactures, 'using' => ['id', 'name'], 'class' => 'form-control show-tick manufacture_id', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Manufacture'), 'emptyValue' => '']) ?>
      </div>
      <div class="col-xs-12 col-sm-4">
        <?= $this->tag->textField(['conds[0][keyword]', 'class' => 'form-control keyword', 'placeholder' => 'Keyword']) ?>
      </div>
    </div>
  </li>
<?php } ?>
