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

  $('.addProducts').live('click', function() {
    var options = '';
    WAREHOUSES.forEach(function(ele) {
      options += '<option value="'+ ele.id +'">' + ele.name + '</option>';
    });
    var row = '<tr>' +
      '<td class="text-center">' +
      '<select id="warehouses" name="trans_prod[][warehouse_id]" class="form-control p_warehouse" data-mode="new">' + options + '</select>' +
      '</td>' +
      '<td>' +
        '<input type="hidden" name="trans_prod[][product_id]" class="p_pid" value="">' +
        '<input type="text" class="form-control getproduct">' +
      '</td>' +
      '<td>' +
        '<input type="text" name="trans_prod[][amount]" value="1" class="form-control text-right p_amount" style="width:100px;float:right;">' +
      '</td>' +
      '<td>' +
        '<a class="acond rmProduct"><i class="fa fa-minus-circle text-red"></i></a>' +
      '</td>' +
    '</tr>';
    $('.lstProducts tbody').append(row);
    resetProductName();
  });

  $('.rmProduct').live('click', function() {
    $(this).parent().parent().remove();
    resetProductName();
  });

  function resetProductName(){
    $('.lstProducts tbody').find('tr').each(function (index) {
      $('select.p_warehouse', this).attr('name', 'trans_prod[' + index + '][name]');
      $('input.p_pid', this).attr('name', 'trans_prod[' + index + '][price]');
      $('input.p_amount', this).attr('name', 'trans_prod[' + index + '][remarks]');
    });
  }

  $('.getproduct').live('keyup', function() {
    var me = $(this);
    var keyword = me.val().trim();
    if (keyword.length >= 3) {
      var selectLst = document.createElement('select');
      var post_data = {
        'keyword': keyword
      };
      $.ajax({
        url: '/manager/products/getproduct',
        type:'POST',
        data:post_data,
        dataType:'json',
        async:true,
        cache:false
      }).done(function(data) {
        if(data['success'] === 1) {
          selectLst.id = 'selectProduct';
          selectLst.className = 'form-control';
          (data['product']).forEach(function(ele){
            var option = document.createElement('option');
            option.value = ele.id;
            option.text  = ele.name;
            option.title = ele.remarks;
            selectLst.appendChild(option);
          });
          $('#selectProduct').remove();
          me.after(selectLst);
          //
          $(selectLst).bind('change', function() {
            var id = $(this).val();
            var text = $('option:selected',this).text();
            me.val(text);
            me.parent().find('input:hidden').val(id);
            $(this).remove();
          });
          //
        }
      });
    } else {
      $('#selectProduct').remove();
    }
  });

});
