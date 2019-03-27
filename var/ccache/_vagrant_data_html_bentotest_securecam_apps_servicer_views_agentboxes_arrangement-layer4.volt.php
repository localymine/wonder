<?php if ($agentboxes->count() > 0) { ?>
                    <div class="col-xs-12 col-sm-6">
<?php foreach ($agentboxes as $abox) { ?>
<?php if ($abox->group_id == $l3) { ?>
                      <div class="input-group input-group-sm input-group-fake group-header-pad">
                        <span class="form-control"><?php echo $this->escaper->escapeHtml($abox->name); ?></span>
                        <span class="input-group-btn">
                          <?php echo $this->tag->linkTo(array('servicer/agentboxes/show/' . $abox->id, '<span class="fa fa-eye"></span>', 'class' => 'btn btn-default')); ?>

                        </span>
                      </div>
<?php } ?>
<?php } ?>
                    </div>
<?php } ?>
