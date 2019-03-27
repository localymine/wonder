<?php if ($layer3->count() > 0) { ?>
                <div class="col-xs-12 col-sm-8">
<?php foreach ($layer3 as $l3) { ?>
<?php if ($l3->parent_id == $l2) { ?>
                  <div class="area-divider row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="input-group input-group-sm input-group-fake group-header-pad">
                        <span class="form-control"><?php echo $this->escaper->escapeHtml($l3->name); ?></span>
                        <span class="input-group-btn">
                          <?php echo $this->tag->linkTo(array('servicer/groups/show/' . $l3->id, '<span class="fa fa-eye"></span>', 'class' => 'btn btn-default')); ?>

                          <?php echo $this->tag->linkTo(array('servicer/agentboxes/new/' . $l3->member_id . '/' . $l3->id, '<span class="fa fa-pencil"></span>', 'class' => 'btn btn-default')); ?>

                        </span>
                      </div>
                    </div>
<?php if (isset($agentboxes)) { ?>
<?php $this->partial('agentboxes/arrangement-layer4', array('agentboxes' => $agentboxes, 'l3' => $l3->id)); ?>
<?php } ?>
                  </div>
<?php } ?>
<?php } ?>
                </div>
<?php } ?>
