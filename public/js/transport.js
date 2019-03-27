$(function () {

  function resetList() {
    $('table.lstChose > tbody').html('');
    $('ul.lstInvoices').empty();
    $('#choseInvoices').val('');
  }

  $('#client[data-mode=new]').on('change', function () {
    var cid = $(this).val();
    resetList();
    if (cid != '') {
      $.ajax({
        type: 'GET',
        url: '/manager/transports/get',
        data: {
          client_id: cid,
          mode: $('#mode').val()
        },
        dataType: 'json',
        cache: false
      }).done(function (data) {
        if (parseInt(data.success) === 1) {
          for (var i = 0; i < data.invoice.length; i++) {
            var addel = $(data.invoice[i]).hide();
            $('input[type=checkbox]', addel).iCheck({
              checkboxClass: 'icheckbox_minimal-blue'
            }).on('ifChecked', function () {
              $(this).attr('checked', true);
            }).on('ifUnchecked', function () {
              $(this).removeAttr('checked');
            }).iCheck('update');
            addel.on('click', function() {
              $('input[type=checkbox]',   this).iCheck('toggle');
            }).appendTo($('ul.lstInvoices')).fadeIn();
          }
        }
      });
    }
  });

  $('#client[data-mode=edit]').on('change', function () {
    resetList();
    var cid = $(this).val();
    var transport_id = $(this).data('transport_id');
    reloadInvoiceList(cid, transport_id);
  });

  function reloadInvoiceList(cid, transport_id) {
    if (cid != '') {
      $.ajax({
        type: 'GET',
        url: '/manager/transports/get2',
        data: {
          client_id: cid,
          transport_id: transport_id ,
          mode: $('#mode').val()
        },
        dataType: 'json',
        cache: false
      }).done(function (data) {
        if (parseInt(data.success) === 1) {
          for (var i = 0; i < data.invoice.length; i++) {
            var addel = $(data.invoice[i]).hide();
            $('input[type=checkbox]', addel).iCheck({
              checkboxClass: 'icheckbox_minimal-blue'
            }).on('ifChecked', function () {
              $(this).attr('checked', true);
            }).on('ifUnchecked', function () {
              $(this).removeAttr('checked');
            }).iCheck('update');
            addel.on('click', function() {
              $('input[type=checkbox]',   this).iCheck('toggle');
            }).appendTo($('ul.lstInvoices')).fadeIn();
          }
        }
      });
    }
  }

  $.transportForm = function (options) {
    var defaults = {
      modal: null,
      showButton: null,
      saveButton: null,
      listItems: null
    };
    var settings = (options ? $.extend(defaults, options) : $.extend(defaults));
    var choseInvoices = [];

    $('a.rmInvoice[data-group="new"]').on('click', function(){
      bindRmGrNew(this);
    });

    $('a.rmInvoice[data-group="edit"]').on('click', function(){
      var me = this;
      $.ajax({
        type: 'POST',
        url : '/manager/transports/remove',
        data: {
          id: $(this).data('id')
        },
        dataType: 'json',
        cache: false
      }).done(function (data) {
        if (parseInt(data.success) === 1) {
          bindRmGrNew(me);
          $('ul.lstInvoices').empty();
          var cid = $('#client').val();
          var transport_id = $('#client').data('transport_id');
          reloadInvoiceList(cid, transport_id);
        }
      });
    });

    function row(obj) {
      return '<tr>' +
        '<td>'+obj.no+'</td>'+
        '<td>'+obj.name+'<input type="hidden" id="invoice-'+obj.id+'" name="invoice[]" value="'+obj.iv_id+'" /></td>'+
        '<td><span class="tb-align-currency">'+(obj.price).format(0,3,',')+'</span></td>'+
        '<td><a class="acond rmInvoice" data-group="'+obj.mode+'" data-id="'+obj.id+'"><i class="fa fa-minus-circle"></i></a></td>'+
        '</tr>';
    }

    $(settings.saveButton).on('click', function () {
      $('table.lstChose > tbody').html('');
      var i = 0;
      $(settings.listItems).each(function (index) {
        var chkbox = $('input[type=checkbox]', this);
        if ($(chkbox).prop("checked")) {
          var invoice  = {};
          invoice['no']    = ++i;
          invoice['id']    = $(chkbox).data('transinvoice-id');
          invoice['iv_id'] = $(chkbox).data('invoice-id');
          invoice['name']  = $(chkbox).data('invoice-name');
          invoice['mode']  = $(chkbox).data('mode'); /* new or edit */
          invoice['price'] = $(this).data('invoice-price');
          console.log(invoice)
          $('table.lstChose > tbody').append(row(invoice));
          choseInvoices.push(invoice['iv_id']);
          //
          $('a.rmInvoice[data-group="new"]').bind('click', function(){
            bindRmGrNew(this);
          });
        }
      });
      $('#choseInvoices').val(choseInvoices.toString());
      $(settings.modal).modal('hide');
    });

    function bindRmGrNew(me){
      $(me).parent().parent().remove();
      var iv_id = $(me).data('id');
      choseInvoices = $.grep(choseInvoices, function (value) {
        return value != iv_id;
      });
      $('#choseInvoices').val(choseInvoices.toString());
      //
      $(settings.listItems).each(function(index) {
        var chkbox =$('input[type=checkbox]', me);
        if ($(chkbox).prop("checked")) {
          if (iv_id == $(chkbox).data('invoice-id')) {
            $(chkbox).iCheck('uncheck');
          }
        }
      });
    }

    $(document).on('click', settings.showButton, function () {
      $(settings.modal).modal({
        backdrop: true,
        keyboard: true,
        show: true
      })
    });

  }
});