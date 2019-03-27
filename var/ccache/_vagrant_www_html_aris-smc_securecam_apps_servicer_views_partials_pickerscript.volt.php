<script>
$(function() {
  var isMobile = ($.smcsupport.IOS || $.smcsupport.DRD);
  $('.selectpicker').selectpicker({
    theme:'bootstrap',
    language:'ja',
    mobile:isMobile,
    noneSelectedText:'<?= $this->l10n->__('Nothing selected', 'Picker') ?>',
    noneResultsText:'<?= $this->l10n->__('No results matched {0}', 'Picker') ?>',
    countSelectedText:'<?= $this->l10n->__('{0} item(s) selected', 'Picker') ?>',
    maxOptionsText:'<?= $this->l10n->__('Limit reached ({n} item(s) max)', 'Picker') ?>',
    selectAllText:'<?= $this->l10n->__('Select All', 'Picker') ?>',
    deselectAllText:'<?= $this->l10n->__('Deselect All', 'Picker') ?>',
    doneButtonText:'<?= $this->l10n->__('Close', 'Picker') ?>',
    liveSearchPlaceholder:'<?= $this->l10n->__('Enter any chars to search', 'Picker') ?>',
  });
});
</script>
