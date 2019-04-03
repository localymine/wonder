<div id="bill-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg chart-lg" style="width: 480px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="bootbox-close-button close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $this->l10n->_('Bill of'); ?> <span class="client-name text-bold text-success"></span></h4>
      </div>
      <div id="bill-holder" class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <span style="color: deeppink">🌸</span>Sakura Shop<span style="color: deeppink">🌸</span>
            </div>
            <div class="form-group">
              <label class="inline">Bill No.</label>
              <div class="inline bill-num"></div>
            </div>
            <div class="form-group">
              <label class="inline">Customer</label>
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
                <td colspan="2" class="text-right text-bold">Total</td>
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