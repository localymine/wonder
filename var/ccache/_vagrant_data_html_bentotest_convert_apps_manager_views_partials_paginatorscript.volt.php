<script>
$(function() {
  var selectpager = '[data-affect=paginator]';
  var l = location, q = [];
  var op = 0, opp = 10;
  if (l.search.length > 0) {
    $.each(l.search.substr(1).split('&'), function(i, kv) {
      var a = kv.split('=');
      switch (a[0]) {
        case 'limit':
          opp = a[1];
          if (opp == 10||opp == 20||opp == 50) {
            $(selectpager).val(opp).selectpicker('update');
          }
        break;
        case 'page':
          op = a[1];
        break;
        default:
          q.push(String(a[0]+'='+a[1]));
        break;
      }
    });
  }
  $(document).on('change', selectpager, function(e) {
    var np  = 0,
        npp = $(e.target).val();
    var uri = '//' + l.host + l.pathname + '?';
    if (l.search.length > 0) {
      np = Math.floor(((op - 1) * opp + 1) / npp) + 1;
      uri += 'page=' + np + '&limit=' + npp;
      uri += (q.length > 0 ? '&' + q.join('&') : '');
    } else {
      uri += 'page=1&limit=' + npp;
    }
    l.href = uri;
  });
  $(window).on('unload', function() {
    $(document).off('change', selectpager);
  });
});
</script>
