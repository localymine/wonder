<?php if ($layer3->count() > 0) { ?>
                <div class="col-xs-12 col-sm-8">
<?php foreach ($layer3 as $l3) { ?>
<?php if ($l3->parent_id == $l2) { ?>
                  <div class="area-divider row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="input-group input-group-sm input-group-fake group-header-pad">
                        <span class="form-control"><?= $l3->name ?></span>
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->tag->linkTo(['servicer/recaccounts/show/' . $l3->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Account')]) ?></li>
<?php if ($identity['role_id'] == 1) { ?>
                            <li><?= $this->tag->linkTo(['servicer/recaccounts/edit/' . $l3->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit Account')]) ?></li>
<?php } ?>
                          </ul>
                        </span>
                      </div>
                    </div>
<?php if (isset($agentboxes)) { ?>
<?php $this->partial('recaccounts/arrangement-layer4', ['agentboxes' => $agentboxes, 'l3' => $l3->id]); ?>
<?php } ?>
                  </div>
<?php } ?>
<?php } ?>
                </div>
<?php } ?>
