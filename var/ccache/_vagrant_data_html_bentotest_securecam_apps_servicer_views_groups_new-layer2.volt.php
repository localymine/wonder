          <?php echo $this->tag->hiddenField(array('member_id', 'value' => $member->id)); ?>

          <?php echo $this->tag->hiddenField(array('parent_id', 'value' => $group->parent_id)); ?>

          <?php echo $this->tag->hiddenField(array('layer', 'value' => $group->layer)); ?>

          <?php echo $this->tag->hiddenField(array('smb_created', 'value' => $smb_created)); ?>

          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Group root'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?php echo $group->parent->name; ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Area'); ?></label>
            <div class="col-xs-12 col-sm-8">
              <?php echo $this->tag->textField(array('name', 'class' => 'form-control', 'value' => $group->name)); ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="sort" class="col-xs-12 col-sm-3 control-label"><?php echo $this->l10n->_('Sort order'); ?></label>
            <div class="col-xs-12 col-sm-2">
              <?php echo $this->tag->textField(array('sort', 'class' => 'form-control', 'value' => $group->sort, 'value' => 1)); ?>

            </div>
          </div>
