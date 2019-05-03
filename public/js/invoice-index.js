$(function () {
  $('.btn-print').on('click', function() {
    var post_data = {
      'id' : $(this).data('id')
    };
    $.ajax({
      url: '/manager/invoices/print',
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false
    }).done(function (data) {
      if (data['success'] === 1) {
        $('.tb-detail tbody').empty();
        $('.tb-detail tfoot .qty').html('');
        $('.tb-detail tfoot .sum').html('');
        $('.bill-num').html(data['id']);
        $('.client-name').html(data['client']);
        $('.buy-date').html(data['date']);
        var detail = data['detail'];
        for (var i=0; i<detail.length; i++) {
          var tr = '<tr>' +
            '<td>'+detail[i]['product']+'</td>' +
            '<td class="text-right">'+(detail[i]['price']).format()+'</td>' +
            '<td class="text-right">'+detail[i]['quantity']+'</td>' +
            '<td class="text-right">'+(detail[i]['total']).format()+'</td>' +
            '</tr>';
          $('.tb-detail tbody').append(tr);
        }
        $('.tb-detail tfoot .qty').html(data['qty']);
        $('.tb-detail tfoot .sum').html(data['sum'].format());
        $('.tb-detail tfoot .remarks').html(data['remarks']);
        //
        html2canvas(element, {
          onrendered: function (canvas) {
            $("#previewImage").empty().append(canvas);
            getCanvas = canvas;
          }
        });
      }
    });
  });
  //
  $('.btn-delivery').live('click', function() {
    var me = $(this);
    var td = me.parent();
    var post_data = {
      'id' : $(this).data('id')
    };
    $.ajax({
      url: '/manager/invoices/delivery',
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false
    }).done(function(data) {
      if (data['success'] === 1) {
        switch (data['deliver']) {
          case 0:
            me.html('Shop');
            td.removeClass('Delivering Finished').addClass('Shop');
            break;
          case 1:
            me.html('Delivering');
            td.removeClass('Shop Finished').addClass('Delivering');
            break;
          case 2:
            me.html('Finished');
            td.removeClass('Shop Delivering').addClass('Finished');
            break;
        }
      }
    });
  });
  //
  $('.btn-status').live('click', function() {
    var me = $(this);
    var td = me.parent();
    var post_data = {
      'id' : $(this).data('id')
    };
    $.ajax({
      url: '/manager/invoices/status',
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false
    }).done(function(data) {
      if (data['success'] === 1) {
        switch (data['status']) {
          case 0:
            me.html('Unpaid');
            td.removeClass('Paid').addClass('Unpaid');
            break;
          case 1:
            me.html('Paid');
            td.removeClass('Unpaid').addClass('Paid');
            break;
        }
      }
    });
  });
  //

});