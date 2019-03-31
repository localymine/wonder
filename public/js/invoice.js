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
            var template = '<tr id="p' + rs[i]['id'] + '">' +
              '<td>' + rs[i]['id'] + '</td>' +
              '<td class="" style="width:32px;">' +
              '<a href="javascript:voide(0)" class="pop">' +
              //                    '<img class="img-responsive" src="/uploads/user/' + (rs[i]['id']).toString().padStart(7,0) + '/product/' + rs[i]['id'] + '/' + rs[i]['image'] + '" />' +
              '</a>' +
              '</td>' +
              '<td>'+rs[i]['name']+'</td>' +
              '<td class="text-right">' +
              '<input type="text" name="pd['+i+'][price]" class="form-control text-right no-border price" value="'+rs[i]['price']+'" />' +
              '</td>' +
              '<td class="text-right">' +
              '<input type="number" name="pd['+i+'][quantity]" class="form-control text-right no-border quantity" min="1" max="'+rs[i]['quantity']+'" value="1" />' +
              '</td>' +
              '<td class="text-center">'+rs[i]['warehouse']+'</td>' +
              '<td class="text-center">' +
              '<a class="addCart" href="javascript:void(0)" data-id="'+rs[i]['id']+'" data-name="'+rs[i]['name']+'" data-whid="'+rs[i]['warehouse_id']+'"><i class="fa text-blue fa-plus-circle"></i></a>' +
              '<input type="hidden" class="warehouse" name="pd['+i+'][warehouse]" value="'+rs[i]['warehouse_id']+'" />' +
              '<input type="hidden" class="product" name="pd['+i+'][product]" value="'+rs[i]['id']+'" />' +
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
              var tr = $(this).parent().parent().remove();
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
      $('.product', this).attr('name','pd['+index+'][product]');
      $('.warehouse', this).attr('name','pd['+index+'][warehouse]');
      $('.price', this).attr('name','pd['+index+'][price]');
      $('.quantity', this).attr('name','pd['+index+'][quantity]');
    });
  }


  $('.pop').on('click', function() {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
  });
});