<?php if ($layer2->count() > 0) { ?>
<?php foreach ($layer2 as $l2) { ?>
              <div class="area-divider row">
                <div class="col-xs-12 col-sm-4">
                  <div class="input-group input-group-sm input-group-fake group-header-pad">
                    <span class="form-control"><?php echo $l2->name; ?></span>
                    <span class="input-group-btn">
                      <a class="btn btn-fake"></a>
                    </span>
                  </div>
                </div>
<?php if (isset($layer3)) { ?>
<?php $this->partial('recaccounts/arrangement-layer3', array('layer3' => $layer3, 'l2' => $l2->id)); ?>
<?php } ?>
              </div>
<?php } ?>
<?php } ?>
