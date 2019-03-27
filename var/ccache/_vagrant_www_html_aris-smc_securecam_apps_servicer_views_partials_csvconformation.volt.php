<div class="confirmation-dialog modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?= $this->l10n->__('Export CSV Confirmation', 'Filter') ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p id="message"><?= $this->l10n->_('Do you want to Export CSV?') ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <?= $this->tag->form(['method' => 'post']) ?>
                    <button type="button" class="btn btn-default" filter-handler="cancel"><i class="fa fa-times"></i> <?= $this->l10n->_('Cancel') ?></button>
                    <button type="button" class="btn btn-primary" filter-handler="ok"><i class="fa fa-check"></i> <?= $this->l10n->_('OK') ?></button>
                    <?= $this->tag->hiddenField(['csv_filter', 'value' => $page->query]) ?>
                <?= $this->tag->endForm() ?>
            </div>
        </div>
    </div>
</div>