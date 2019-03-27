<?php if ($layer3->count() > 0) { ?>
                <div class="col-xs-12 col-sm-6">
<?php foreach ($layer3 as $l3) { ?>
<?php if ($l3->parent_id == $l2) { ?>
                  <div class="input-group input-group-sm input-group-fake group-header-pad">
                    <span class="form-control"><?php echo $l3->name; ?></span>
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><?php echo $this->tag->linkTo(array('servicer/groups/show/' . $l3->id, $this->l10n->_('<i class="fa fa-eye"></i> Show Layer'))); ?></li>
                      </ul>
                    </span>
                  </div>
<?php } ?>
<?php } ?>
                </div>
<?php } ?>
