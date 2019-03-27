$(function () {
  $('.btn-copy').on('click', function() {
    if (confirm('Do you want to clone this record?')) {
      var id = $(this).data('id');
      var post_data = {id:id};
      $.ajax({
        url: '/manager/products/copy',
        type:'POST',
        data:post_data,
        dataType:'json',
        async:true,
        cache:false
      }).done(function(data) {
        if(data['success'] === 1) {
          window.location.reload();
        }
      });
    }
  });


  $('.btn-add').on('click', function() {
   $('.product-name').html($(this).data('product'));
   $('#submitAddstock').data('id', $(this).data('id'));
   $('#addForm')[0].reset();
   $('#saleprice').val($(this).data('price'));
  });

  $('#submitAddstock').on('click', function() {
    var id    = $(this).data('id');
    var apply = parseInt($('#apply').val());
    console.log(apply)
    var post_data = {
      id: id,
      market_price  : $('#market_price').val(),
      purchase_price: $('#purchase_price').val(),
      saleprice     : $('#saleprice').val(),
      quantity      : $('#quantity').val(),
      warehouse     : $('#warehouse_id :selected').val(),
      remarks       : $('#remarks').val(),
      apply         : apply
    };
    console.log(post_data)
    $.ajax({
      url: '/manager/products/addStock',
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false
    }).done(function(data) {
      if(data['success'] === 1) {
        $('#p'+id+' .quantity').html(data['quantity']);
        if (apply===1) {
          $('#p'+id+' .price').html(data['saleprice']);
        }
        $('#add-stock-dialog').modal('toggle');
        $('#p'+id).effect('highlight', {}, 1000);
      }
    });
  });

  $('.btn-sub').on('click', function() {
    $('.product-name').html($(this).data('product'));
    $('#submitSubstock').data('id', $(this).data('id'));
    $('#subForm')[0].reset();
  });

  $('#submitSubstock').on('click', function() {
    var id    = $(this).data('id');
    var post_data = {
      id: id,
      quantity      : $('#subQuantity').val(),
      warehouse     : $('#subwarehouse_id :selected').val(),
      remarks       : $('#subremarks').val()
    };
    $.ajax({
      url: '/manager/products/subStock',
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false
    }).done(function(data) {
      if(data['success'] === 1) {
        $('#p'+id+' .quantity').html(data['quantity']);
        $('#sub-stock-dialog').modal('toggle');
        $('#p'+id).effect('highlight', {}, 1000);
      }
    });
  });

  $('.btn-chart').on('click', function() {
    $('.product-name').html($(this).data('product'));
    var id = $(this).data('id');
    $('#renderChart').data('id', id);
    var curDate = moment(moment().toDate()).format('YYYY-MM-DD');
    $('#toDate').val(curDate);
    var preDate = moment().subtract(30, 'day').format('YYYY-MM-DD');
    $('#fromDate').val(preDate);
    var post_data = {
      id  : id,
      from: preDate,
      to  : curDate
    };
    drawChart(post_data);
  });
  $('#renderChart').on('click', function () {
    var id   = $(this).data('id');
    var from = $('#fromDate').val();
    var to   = $('#toDate').val();
    var post_data = {
      id  : id,
      from: from,
      to  : to
    };
    drawChart(post_data);
  });

  var ctx = document.getElementById('chartContainer').getContext('2d');
  var chart = new Chart(ctx);
  function drawChart(post_data) {
    chart.destroy();
    $.ajax({
      url: '/manager/products/chart',
      type:'POST',
      data:post_data,
      dataType:'json',
      async:true,
      cache:false
    }).done(function (data) {
      if (data['success'] === 1) {
        chart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: eval(data['labels']),
            datasets: [{
              label: 'Market Price',
              data: eval(data['market_price']),
              borderWidth: 1,
              backgroundColor: 'rgba(255,23,68,1)',
              borderColor: 'rgba(255,23,68,1)',
              borderDash: [3, 3],
              pointRadius: 5,
              fill: false
            }, {
              label: 'Purchase Price',
              data: eval(data['purchase_price']),
              borderWidth: 2,
              backgroundColor: 'rgba(85,139,47,1)',
              borderColor: 'rgba(85,139,47,1)',
              pointRadius: 5,
              fill: false
            }, {
              label: 'Sale Price',
              data: eval(data['saleprice']),
              borderWidth: 2,
              backgroundColor: 'rgba(245,127,23,1)',
              borderColor: 'rgba(245,127,23,1)',
              pointRadius: 5,
              fill: false
            }]
          },
          // Configuration options
          options: {
            responsive: true,
            tooltips: {
              mode: 'index',
              intersect: false,
              callbacks: {
                label: function (tooltipItems, data) {
                  return data.datasets[tooltipItems.datasetIndex].label + ': ¥' + tooltipItems.yLabel;
                },
                footer: function (tooltipItems, data) {
                  return '^^';
                }
              }
            },
            hover: {
              mode: 'index',
              intersect: false
            },
            scales: {
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Price'
                },
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });
  }

  $('.pop').on('click', function() {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
  });
});