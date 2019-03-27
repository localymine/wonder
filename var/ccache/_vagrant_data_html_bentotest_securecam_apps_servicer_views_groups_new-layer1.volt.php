          <?php echo $this->tag->hiddenField(array('parent_id', 'value' => 0)); ?>

          <?php echo $this->tag->hiddenField(array('layer', 'value' => 1)); ?>

          <?php echo $this->tag->hiddenField(array('sort', 'value' => 0)); ?>

          <div class="form-group">
            <label for="member_id" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Member Name'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $member->name; ?></span>
              <?php echo $this->tag->hiddenField(array('member_id', 'value' => $member->id)); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('name', 'class' => 'form-control')); ?>

            </div>
          </div>
