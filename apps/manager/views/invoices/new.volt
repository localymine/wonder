{% extends 'layouts/html-multi-columns.volt' %}

{% block sidebar %}
  {{ partial('partials/sidebar') }}
{% endblock %}

{% block content %}
  <section class="content-header">
    <h1>{{ l10n._('Manage Invoices') }}</h1>
    <ol class="breadcrumb">
      <li>{{ link_to('manager/main/index', l10n._('<i class="fa fa-dashboard"></i> DashBoard')) }}</li>
      <li>{{ link_to('manager/invoices/index', l10n._('Manage Invoices')) }}</li>
      <li class="active">{{ page_heading|e }}</li>
    </ol>
  </section>

  <section class="content">
    {{ flash.output() }}

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title pull-left">{{ page_heading|e }}</h3>
      </div>
      {{ form('manager/invoices/create','method':'post','class':'form-horizontal','role':'form','enctype':'multipart/form-data') }}

      {{ hidden_field('user_id','value':identity['id']) }}

      {{ hidden_field('csrf','value':security.getToken()) }}

      <div class="box-body">

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Client') }}</label>
          <div class="col-xs-12 col-sm-3">
            {#{{ select('client',clients,'using':['id','name'],'name':'client_id','class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'') }}#}

            <div id="client_id" name="client_id"></div>
          </div>
        </div>

        <div class="form-group">
          <label for="total_price" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Total Price') }}</label>
          <div class="col-xs-12 col-sm-3">
            <div class="input-group">
              {{ text_field('total_price','class':'form-control text-right','disabled':true) }}
              <span class="input-group-addon">&#8363;</span>
            </div>
          </div>
        </div>

        <div class="form-group required">
          <label for="status" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Status') }}</label>
          <div class="col-xs-12 col-sm-3">
            {{ select('status',status,'class':'form-control selectpicker show-tick','data-style':'btn-white','useEmpty':true,'emptyText':l10n._('Choose...'), 'emptyValue':'') }}

          </div>
        </div>

        <div class="form-group">
          <label for="remarks" class="col-xs-12 col-sm-3 control-label">{{ l10n._('Remarks') }}</label>
          <div class="col-xs-12 col-sm-8">
            {{ text_area('remarks','class':'form-control','rows':'3') }}

          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Disabled') }}</label>
          <div class="col-xs-12 col-sm-8">
            <div class="checkbox-inline">
              <label for="disabled">
                {{ check_field('disabled','name':'disabled','value':1) }} {{ l10n._('Disabled') }}

              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-12 col-sm-3 control-label">{{ l10n._('Order Lists') }}</label>
          <div class="col-xs-12 col-sm-9">
            <a class="text-black" href="#" data-target="#products-dialog" data-toggle="modal"><i class="fa fa-plus-circle"></i> {{ l10n._('Add products') }}</a>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-sm-12">
            <table class="table table-responsive">
              <thead>
              <tr>
                <th>{{ l10n.__('ID') }}</th>
                <th></th>
                <th>{{ l10n._('Name') }}</th>
                <th>{{ l10n._('(&#8363;)') }}</th>
                <th>{{ l10n._('Qty.') }}</th>
                <th>{{ l10n._('W.') }}</th>
                <th><i class="fa fa-cogs"></i></th>
              </tr>
              </thead>
              <tbody id="cart-list">
              </tbody>
            </table>
          </div>
        </div>

      </div>

      <div class="box-footer">
        <div class="action-area">
          {{ submit_button(l10n._('Save'),'class':'btn btn-info') }}

          {{ link_to('manager/invoices/index',l10n._('Cancel'),'class':'btn btn-default') }}

        </div>
      </div>

      {{ end_form() }}

    </div>

    {{ partial('partials/modal/product-list') }}

  </section>
{% endblock %}

{% block pagescript %}
  <script>
    $(function(){
      $('input[type=checkbox]').iCheck({
        checkboxClass:'icheckbox_minimal-blue'
      }).on('ifChecked', function(evt) {
        $(this).val(1).attr('checked', 'checked');
      }).on('ifUnchecked', function(evt) {
        $(this).val(0).removeAttr('checked');
      });

      var source = [];
      var clients = eval('{{ clients }}');
      for (var i=0; i<clients.length; i++) {
        var html = '<div tabIndex=0 data-id="'+ clients[i].id +'"><div>'+ clients[i].name +'</div></div>';
        source[i] = {html: html, title: clients[i].name};
      }
      // Create a jqxComboBox
      $("#client_id").jqxComboBox({source: source, height: 34}).on('change', function(e){
        var args = e.args;
        if (args) {
          if(args.item !== null) {
            var item = args.item;
            $('input[name=client_id]').val($(item.html).data('id'));
          }
        }
      });

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
                    '<a href="#" class="pop">' +
                    '<img class="img-responsive" src="/uploads/user/' + (rs[i]['id']).toString().padStart(7,0) + '/product/' + rs[i]['id'] + '/' + rs[i]['image'] + '" />' +
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
                    '<a class="addCart" href="#" data-id="'+rs[i]['id']+'" data-name="'+rs[i]['name']+'" data-whid="'+rs[i]['warehouse_id']+'"><i class="fa text-blue fa-plus-circle"></i></a>' +
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
                // update name
                $('#total_price').val(counter());
                //
                $('.subCart').on('click', function() {
                  var tr = $(this).parent().parent().remove();
                  // update name
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

    });
  </script>
{% endblock %}
