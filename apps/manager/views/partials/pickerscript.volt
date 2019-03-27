<script>
$(function() {
  $('.selectpicker').selectpicker({
    theme:'bootstrap',
    language:'ja',
    dropupAuto:false,
    size:10,
    noneSelectedText:'{{ l10n.__('Nothing selected', 'Picker') }}',
    noneResultsText:'{{ l10n.__('No results matched {0}', 'Picker') }}',
    countSelectedText:'{{ l10n.__('{0} item(s) selected', 'Picker') }}',
    maxOptionsText:'{{ l10n.__('Limit reached ({n} item(s) max)', 'Picker') }}',
    selectAllText:'{{ l10n.__('Select All', 'Picker') }}',
    deselectAllText:'{{ l10n.__('Deselect All', 'Picker') }}',
    doneButtonText:'{{ l10n.__('Close', 'Picker') }}',
    liveSearchPlaceholder:'{{ l10n.__('Enter any chars to search', 'Picker') }}',
  });
});
</script>
