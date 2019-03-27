          <?= $this->tag->hiddenField(['parent_id', 'value' => $group->parent_id]) ?>

          <?= $this->tag->hiddenField(['layer', 'value' => $group->layer]) ?>

          <div class="form-group">
            <label for="name" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Endpoint') ?></label>
            <div class="col-xs-12 col-sm-8">
              <span class="form-control"><?= $this->escaper->escapeHtml($group->name) ?></span>
            </div>
          </div>
          <div class="form-group">
            <label for="login" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('VIEW Account Login') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['login', 'class' => 'form-control', 'value' => $group->login]) ?>

            </div>
          </div>
          <div class="form-group">
            <label for="passwd" class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('VIEW Account Password') ?></label>
            <div class="col-xs-12 col-sm-4">
              <?= $this->tag->textField(['passwd', 'class' => 'form-control', 'value' => $group->passwd]) ?>

            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('FORCE Edit') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="force_edit">
<?php if ($force_edit == 1) { ?>
                  <?= $this->tag->checkField(['force_edit', 'name' => 'force_edit', 'value' => 1, 'checked' => true]) ?> <?= $this->l10n->_('FORCE Edit') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['force_edit', 'name' => 'force_edit', 'value' => 1]) ?> <?= $this->l10n->_('FORCE Edit') ?>

<?php } ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-xs-12 col-sm-3 control-label"><?= $this->l10n->_('Download') ?></label>
            <div class="col-xs-12 col-sm-8">
              <div class="checkbox-inline">
                <label for="downloadable">
<?php if ($group->downloadable == 1) { ?>
<?php if ($upper_downloadable == 1) { ?>
                  <?= $this->tag->checkField(['downloadable', 'name' => 'downloadable', 'value' => $group->downloadable, 'checked' => true]) ?> <?= $this->l10n->_('Download') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['downloadable', 'name' => 'downloadable', 'value' => $group->downloadable, 'checked' => true, 'disabled' => 'disabled']) ?> <?= $this->l10n->_('Download') ?>
                  <?= $this->tag->hiddenField(['downloadable_hidden', 'name' => 'downloadable', 'value' => $group->downloadable]) ?>

<?php } ?>
<?php } else { ?>
<?php if ($upper_downloadable == 1) { ?>
                  <?= $this->tag->checkField(['downloadable', 'name' => 'downloadable', 'value' => $group->downloadable]) ?> <?= $this->l10n->_('Download') ?>

<?php } else { ?>
                  <?= $this->tag->checkField(['downloadable', 'name' => 'downloadable', 'value' => $group->downloadable, 'disabled' => 'disabled', 'onclick' => 'return false;']) ?> <?= $this->l10n->_('Download') ?>
                  <?= $this->tag->hiddenField(['downloadable_hidden', 'name' => 'downloadable', 'value' => $group->downloadable]) ?>

<?php } ?>
<?php } ?>
                </label>
              </div>
            </div>
          </div>
