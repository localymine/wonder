$(function () {
  $('.quantity').on('keyup', function(e) {
    var v = $(this).val();
    var min = $(this).attr('min');
    var max = $(this).attr('max');
    if(v !== ''){
      if(parseInt(v) < parseInt(min)){
        $(this).val(min);
      }
      if(parseInt(v) > parseInt(max)){
        $(this).val(max);
      }
    }
  });

  $('.subCart').on('click', function() {
    var tr = $(this).parent().parent();
    var inputHidden = '<div class="delDetail">' +
      '<input type="hidden" class="id" name="dpd[][id]" value="'+$(this).data('id')+'" />' +
      '<input type="hidden" class="product" name="dpd[][product]" value="'+$(this).data('product')+'" />' +
      '<input type="hidden" class="warehouse" name="dpd[][warehouse]" value="'+$(this).data('warehouse')+'" />' +
      '</div>';
    $('#delHidden').append(inputHidden);
    tr.remove();
    //
    $('.delDetail').each(function(index) {
      $('.id', this).attr('name','dpd['+index+'][id]');
      $('.product', this).attr('name','dpd['+index+'][product]');
      $('.warehouse', this).attr('name','dpd['+index+'][warehouse]');
    });
    //
    $('#total_price').val(counter());
    updateIds();
  });
  $('.quantity').on('change', function () {
    $('#total_price').val(counter());
  });
  $('.price,.quantity').on('keyup', function () {
    $('#total_price').val(counter());
  });

  $('#keyword').on('keyup', function() {
    var keyword = $(this).val();
    var post_data = {
      'keyword' : keyword
    };
    if (keyword.length > 2) {
      $.ajax({
        url: '/manager/invoices/getProduct',
        type:'POST',
        data:post_data,
        dataType:'json',
        async:true,
        cache:false
      }).done(function (data) {
        if (data['success'] === 1) {
          $('#product-list').empty();
          var rs = eval(data['data']);
          for (var i=0; i<rs.length; i++) {
            var p1 = (rs[i]['user_id']).toString().padStart(7,0);
            var p2 = (rs[i]['id']).toString().padStart(7,0);
            var template = '<tr>' +
              '<td class="no">' + (i + 1) + '</td>' +
              '<td class="" style="width:32px;">' +
              '<a href="javascript:void(0)" class="pop">' +
              '<img class="img-responsive" src="/uploads/user/' + p1 + '/product/' + p2 + '/' + rs[i]['image'] + '" />' +
              '</a>' +
              '</td>' +
              '<td>'+rs[i]['name']+'</td>' +
              '<td class="text-right">' +
              '<input type="text" name="apd['+i+'][price]" class="form-control text-right no-border price" value="'+rs[i]['price']+'" />' +
              '</td>' +
              '<td class="text-right">' +
              '<input type="number" name="apd['+i+'][quantity]" class="form-control text-right no-border quantity" min="1" max="'+rs[i]['quantity']+'" value="1" />' +
              '</td>' +
              '<td class="text-center">'+rs[i]['warehouse']+'</td>' +
              '<td class="text-center">' +
              '<a class="addCart" href="javascript:void(0)" data-id="" data-product="'+rs[i]['id']+'" data-warehouse="'+rs[i]['warehouse_id']+'"><i class="fa text-blue fa-plus-circle"></i></a>' +
              '<input type="hidden" class="warehouse" name="apd['+i+'][warehouse]" value="'+rs[i]['warehouse_id']+'" />' +
              '<input type="hidden" class="product" name="apd['+i+'][product]" value="'+rs[i]['id']+'" />' +
              '</td>' +
              '</tr>';
            $('#product-list').append(template);
          }
          $('.quantity').on('keyup', function(e) {
            var v = $(this).val();
            var min = $(this).attr('min');
            var max = $(this).attr('max');
            if(v !== ''){
              if(parseInt(v) < parseInt(min)){
                $(this).val(min);
              }
              if(parseInt(v) > parseInt(max)){
                $(this).val(max);
              }
            }
          });
          $('.addCart').on('click', function() {
            var tr = $(this).parent().parent().clone();
            $('#cart-list').append(tr);
            $('a.addCart i',tr).removeClass('fa-plus-circle text-blue').addClass('fa-minus-circle text-red');
            $('a.addCart',tr).removeClass('addCart').addClass('subCart');
            $('#total_price').val(counter());
            updateIds();
            //
            $('.subCart').on('click', function() {
              var tr = $(this).parent().parent();
              tr.remove();
              //
              $('#total_price').val(counter());
              updateIds();

            });
            $('.quantity').on('change', function () {
              $('#total_price').val(counter());
            });
            $('.price,.quantity').on('keyup', function () {
              $('#total_price').val(counter());
            });
          });
        }
      });
    }
  });

  function counter() {
    var total_price = 0;
    $('#cart-list tr').each(function() {
      var price = $('.price', this).val();
      var qty   = $('.quantity', this).val();
      total_price += price * qty;
    });
    return total_price;
  }

  function updateIds() {
    $('#cart-list tr').each(function(index) {
      $('.no', this).html(index + 1);
    });
  }


  $('.pop').live('click', function() {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
  });
});