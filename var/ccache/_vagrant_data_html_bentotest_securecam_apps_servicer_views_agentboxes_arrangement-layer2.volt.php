<?php if ($layer2->count() > 0) { ?>
<?php foreach ($layer2 as $l2) { ?>
              <div class="area-divider row">
                <div class="col-xs-12 col-sm-4">
                  <div class="input-group input-group-sm input-group-fake group-header-pad">
                    <span class="form-control"><?php echo $this->escaper->escapeHtml($l2->name); ?></span>
                    <span class="input-group-btn">
                      <?php echo $this->tag->linkTo(array('servicer/groups/show/' . $l2->id, '<span class="fa fa-eye"></span>', 'class' => 'btn btn-default')); ?>

                    </span>
                  </div>
                </div>
<?php if (isset($layer3)) { ?>
<?php $this->partial('agentboxes/arrangement-layer3', array('layer3' => $layer3, 'l2' => $l2->id)); ?>
<?php } ?>
              </div>
<?php } ?>
<?php } ?>
