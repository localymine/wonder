$(function () {
  $.invoiceForm = function (options) {
    var defaults = {
      addButton: null,
      listCondition: null,
      deleteButton: null,
      limit: 5,
      count: 1
    };
    var settings = (options ? $.extend(defaults, options) : $.extend(defaults));

    var rmOtherIds = [];

    var template = '<li>' +
      '<div class="row">' +
      '<div class="col-xs-12 col-sm-1 col-sm-offset-2">' +
      '<a class="acond deletecond" href="javascript:void(0);"><i class="fa fa-minus-circle"></i></a>' +
      '</div>' +
      '<div class="col-xs-12 col-sm-2">' +
      '<input type="text" name="others[][name]" class="form-control o_name" placeholder="name">' +
      '</div>' +
      '<div class="col-xs-12 col-sm-2">' +
      '<input type="text" name="others[][price]" class="form-control o_price" placeholder="price">' +
      '</div>' +
      '<div class="col-xs-12 col-sm-4">' +
      '<input type="text" name="others[][remarks]" class="form-control o_remarks" placeholder="remarks">' +
      '</div>' +
      '<input type="hidden" name="others[][id]" value="" class="o_id">' +
      '</div>' +
      '</li>';

    function resetName(){
      $(settings.listCondition).find('li').each(function (index) {
        $('input.o_name', this).attr('name', 'others[' + index + '][name]');
        $('input.o_price', this).attr('name', 'others[' + index + '][price]');
        $('input.o_remarks', this).attr('name', 'others[' + index + '][remarks]');
        $('input.o_id', this).attr('name', 'others[' + index + '][id]');
      });
    }

    $(settings.addButton).on('click', function () {
      $(settings.listCondition).append(template);
      settings.count++;
      resetName();
      $('#othercount').val(settings.count);
    });

    $('body').delegate(settings.deleteButton, 'click', function () {
      $(this).parent().parent().parent().remove();
      rmOtherIds.push($(this).data('id'));
      $('#rmOtherIds').val(rmOtherIds.toString());
      settings.count--;
      resetName();
      $('#othercount').val(settings.count);
    });
  }
});