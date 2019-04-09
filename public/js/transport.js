$(function () {

  $('.adInvoice').live('click', function (){
    var tr = $(this).parent().parent();
    var cloneTr = tr.clone();
    tr.fadeOut('normal', function(){ $(this).remove(); });
    $('table.lstChose tbody').append(cloneTr);
    cloneTr.effect('highlight', {}, 1000);
    $('a.adInvoice i',cloneTr).removeClass('fa-plus-circle text-blue').addClass('fa-minus-circle text-red');
    $('a.adInvoice',cloneTr).removeClass('adInvoice').addClass('rmInvoice');
  });

  $('.rmInvoice').live('click', function (){
    var tr = $(this).parent().parent();
    var cloneTr = tr.clone();
    tr.fadeOut('normal', function(){ $(this).remove(); });
    $('table.lstInvoices tbody').append(cloneTr);
    $('a.rmInvoice i',cloneTr).removeClass('fa-minus-circle text-red').addClass('fa-plus-circle text-blue');
    $('a.rmInvoice',cloneTr).removeClass('rmInvoice').addClass('adInvoice');
  });

});