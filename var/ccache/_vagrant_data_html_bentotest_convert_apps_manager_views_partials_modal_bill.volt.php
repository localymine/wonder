<div id="bill-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg chart-lg" style="width: 480px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->_('Bill of'); ?> <span class="client-name text-bold text-success"></span></h4>
      </div>
      <div id="bill-holder" class="modal-body" style="background: #fff6f6;">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="text-center">
                <span style="color: deeppink">🌸</span><span style="font-weight: bold;font-size:16px;">Sakura Shop</span><span style="color: deeppink">🌸</span>
              </div>
              <div class="text-center">
                <h4>Hóa Đơn</h4>
              </div>
            </div>
            <div class="form-group">
              <label class="inline">No.</label>
              <div class="inline bill-num"></div>
            </div>
            <div class="form-group">
              <label class="inline">Ngày</label>
              <div class="inline buy-date"></div>
            </div>
            <div class="form-group">
              <label class="inline">Khách hàng</label>
              <div class="inline client-name"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-responsive tb-detail">
              <tbody>
              <tr>
                <td>Slim UP</td>
                <td class="text-right"></td>
                <td class="text-right"></td>
                <td class="text-right"></td>
              </tr>
              </tbody>
              <tfoot>
              <tr>
                <td colspan="2" class="text-right text-bold">Tổng cộng</td>
                <td class="text-right qty"></td>
                <td class="text-right sum"></td>
              </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a id="btn-download" href="#" class="btn btn-success">Download</a>
        <div id="previewImage" class="hidden"></div>
      </div>
    </div>
  </div>
</div>