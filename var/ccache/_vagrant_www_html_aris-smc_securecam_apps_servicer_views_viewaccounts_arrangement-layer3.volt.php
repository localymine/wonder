<?php if ($layer3->count() > 0) { ?>
                <div class="col-xs-12 col-sm-6">
<?php foreach ($layer3 as $l3) { ?>
<?php if ($l3->parent_id == $l2) { ?>
                  <div class="input-group input-group-sm input-group-fake group-header-pad">
                    <span class="form-control"><?= $l3->name ?></span>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><?= $this->tag->linkTo(['servicer/viewaccounts/show/' . $l3->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Account')]) ?></li>
                        <li><?= $this->tag->linkTo(['servicer/viewaccounts/edit/' . $l3->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit Account')]) ?></li>
                      </ul>
                    </span>
                  </div>
<?php } ?>
<?php } ?>
                </div>
<?php } ?>
