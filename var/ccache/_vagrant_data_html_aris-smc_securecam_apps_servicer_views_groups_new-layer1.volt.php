          <?= $this->tag->hiddenField(['parent_id', 'value' => 0]) ?>

          <?= $this->tag->hiddenField(['layer', 'value' => 1]) ?>

          <?= $this->tag->hiddenField(['sort', 'value' => 0]) ?>

          <div class="form-group">
            <label for="member_id" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Member Name') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $member->name ?></span>
              <?= $this->tag->hiddenField(['member_id', 'value' => $member->id]) ?>

            </div>
          </div>
          <div class="form-group required">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Group root') ?></label>
            <div class="col-xs-12 col-sm-8">
              <?= $this->tag->textField(['name', 'class' => 'form-control']) ?>

            </div>
          </div>
