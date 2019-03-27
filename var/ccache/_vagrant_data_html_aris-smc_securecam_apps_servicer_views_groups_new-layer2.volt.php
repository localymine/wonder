          <?= $this->tag->hiddenField(['member_id', 'value' => $member->id]) ?>

          <?= $this->tag->hiddenField(['parent_id', 'value' => $group->parent_id]) ?>

          <?= $this->tag->hiddenField(['layer', 'value' => $group->layer]) ?>

          <?= $this->tag->hiddenField(['smb_created', 'value' => $smb_created]) ?>

          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $group->parent->name ?></span>
            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Area') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control', 'value' => $group->name]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="sort" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Sort order') ?></label>
            <div class="col-xs-12 col-sm-2">
              <?= $this->tag->textField(['sort', 'class' => 'form-control', 'value' => $group->sort, 'value' => 1]) ?>

            </div>
          </div>
