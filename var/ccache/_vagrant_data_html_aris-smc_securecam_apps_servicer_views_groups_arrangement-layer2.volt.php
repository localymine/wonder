<?php if ($layer2->count() > 0) { ?>
<?php foreach ($layer2 as $l2) { ?>
              <div class="area-divider row">
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm input-group-fake group-header-pad">
                    <span class="form-control"><?= $this->escaper->escapeHtml($l2->name) ?></span>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><?= $this->tag->linkTo(['servicer/groups/show/' . $l2->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Layer')]) ?></li>
                        <li><?= $this->tag->linkTo(['servicer/groups/new/' . $member->id . '/' . $l2->id, $this->l10n->_('<i class="fa fa-file"></i> New Endpoint')]) ?></li>
                      </ul>
                    </span>
                  </div>
                </div>
<?php if (isset($layer3)) { ?>
<?php $this->partial('groups/arrangement-layer3', ['layer3' => $layer3, 'l2' => $l2->id]); ?>
<?php } ?>
              </div>
<?php } ?>
<?php } else { ?>
              
<?php } ?>
