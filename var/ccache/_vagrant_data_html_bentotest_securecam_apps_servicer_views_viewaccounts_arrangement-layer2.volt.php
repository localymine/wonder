<?php if ($layer2->count() > 0) { ?>
<?php foreach ($layer2 as $l2) { ?>
              <div class="area-divider row">
                <div class="col-xs-12 col-sm-6">
                  <div class="input-group input-group-sm input-group-fake group-header-pad">
                    <span class="form-control"><?php echo $l2->name; ?></span>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/show/' . $l2->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Account'))); ?></li>
                        <li><?php echo $this->tag->linkTo(array('servicer/viewaccounts/edit/' . $l2->id, $this->l10n->_('<i class="fa fa-pencil"></i> Edit Account'))); ?></li>
                      </ul>
                    </span>
                  </div>
                </div>
<?php if (isset($layer3)) { ?>
<?php $this->partial('viewaccounts/arrangement-layer3', array('layer3' => $layer3, 'l2' => $l2->id)); ?>
<?php } ?>
              </div>
<?php } ?>
<?php } ?>
