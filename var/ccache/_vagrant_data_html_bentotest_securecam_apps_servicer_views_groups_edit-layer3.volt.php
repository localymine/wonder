          

          <?php echo $this->tag->hiddenField(array('layer', 'value' => $group->layer)); ?>

          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $group->parent->parent->name; ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Area'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->select(array('parent_id', $layer2, 'using' => array('id', 'name'), 'class' => 'form-control selectpicker show-tick', 'data-style' => 'btn-white', 'useEmpty' => true, 'emptyText' => $this->l10n->_('Choose...'), 'emptyValue' => '', 'value' => $group->parent_id)); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Endpoint'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'value' => $group->name)); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="sort" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Sort order'); ?></label>
            <div class="col-xs-12 col-sm-2">
              <?php echo $this->tag->numericField(array('sort', 'class' => 'form-control', 'value' => $group->sort)); ?>

            </div>
          </div>
          <div class="form-group">
              <label for="email1" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Email Address'); ?>1</label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('email1', 'class' => 'form-control', 'value' => $group->email1)); ?>

            </div>
          </div>
          <div class="form-group">
            <label for="email2" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Email Address'); ?>2</label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('email2', 'class' => 'form-control', 'value' => $group->email2)); ?>

            </div>
          </div>
