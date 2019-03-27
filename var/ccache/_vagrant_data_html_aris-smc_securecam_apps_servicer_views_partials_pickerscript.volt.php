<script>
$(function() {
  $('.selectpicker').selectpicker({
    theme:'bootstrap',
    language:'ja',
    dropupAuto:false,
    size:10,
    noneSelectedText:'<?php echo $this->l10n->__('Nothing selected', 'Picker'); ?>',
    noneResultsText:'<?php echo $this->l10n->__('No results matched {0}', 'Picker'); ?>',
    countSelectedText:'<?php echo $this->l10n->__('{0} item(s) selected', 'Picker'); ?>',
    maxOptionsText:'<?php echo $this->l10n->__('Limit reached ({n} item(s) max)', 'Picker'); ?>',
    selectAllText:'<?php echo $this->l10n->__('Select All', 'Picker'); ?>',
    deselectAllText:'<?php echo $this->l10n->__('Deselect All', 'Picker'); ?>',
    doneButtonText:'<?php echo $this->l10n->__('Close', 'Picker'); ?>',
    liveSearchPlaceholder:'<?php echo $this->l10n->__('Enter any chars to search', 'Picker'); ?>',
  });
});
</script>
