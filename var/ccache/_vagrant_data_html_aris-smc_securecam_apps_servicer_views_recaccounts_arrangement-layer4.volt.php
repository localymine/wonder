<?php if ($agentboxes->count() > 0) { ?>
                    <div class="col-xs-12 col-sm-6">
<?php foreach ($agentboxes as $abox) { ?>
<?php if ($abox->group_id == $l3) { ?>
                      <div class="input-group input-group-sm input-group-fake group-header-pad">
                        <span class="form-control"><?= $abox->name ?></span>
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->tag->linkTo(['servicer/recaccounts/showabox/' . $abox->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Account')]) ?></li>
<?php if ($identity['role_id'] == 1) { ?>
                            <li><?= $this->tag->linkTo(['servicer/recaccounts/edit/' . $l3, $this->l10n->_('<i class="fa fa-pencil"></i> Edit Account')]) ?></li>
<?php } ?>
                          </ul>
                        </span>
                      </div>
<?php } ?>
<?php } ?>
                    </div>
<?php } ?>
