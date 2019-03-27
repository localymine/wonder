;(function($) {
  $.fn.zoomify = {
    instantiated:false,
    dragged :false,
    prevevt :null,
    osource :{w:0, h:0, x:0, y:0},
    geom    :{w:0, h:0, x:0, y:0},
    matrix  :[1, 0, 0, 1, 0, 0],  /* scaleX, skewY, skewX, scaleY, distanceX, distanceY */
    settings:{
      ovideo    :null,
      clickup   :null,
      clickdown :null,
      clickreset:null,
      factor:0.1
    },
    initialize:function(options) {
      var self = this;
      if (options !== null) {
        $.extend(this.settings, options);
      }
      var ovideo = $(this.settings.ovideo);
      this.osource.x = ovideo.offset().left;
      this.osource.y = ovideo.offset().top;
      this.osource.w = ovideo.width();
      this.osource.h = ovideo.height();
      this.geom.x = this.osource.x;
      this.geom.y = this.osource.y;
      this.geom.w = this.osource.w;
      this.geom.h = this.osource.h;
      $(document).ready(function() {
        ovideo.on('wheel', function(evt) {
          self.zoomwheel(evt);
        }).on('mousedown', function(evt) {
          self.endraggable(evt);
        });
        $(self.settings.clickup).on('click', function(evt) {
          self.zoomclick(evt);
          return evt.preventDefault() && false;
        });
        $(self.settings.clickdown).on('click', function(evt) {
          self.zoomclick(evt);
          return evt.preventDefault() && false;
        });
        $(self.settings.clickreset).on('click', function(evt) {
          self.resetzoom();
          return evt.preventDefault() && false;
        });
        self.instantiated = true;
      });
      $(window).on('unload', function() {
        self.dispose();
      });
    },
    zoomclick:function(evt) {
      var srcId = '#' + evt.originalEvent.target.id;
      var delta = (srcId == this.settings.clickup ? 1 : -1);
      this.zoom(delta);
    },
    zoomwheel:function(evt) {
      var e = evt.originalEvent;
      var delta = e.deltaY ? -(e.deltaY) : e.wheelDelta ? e.wheelDelta : -(e.detail);
      this.zoom(delta);
      return evt.preventDefault() && false;
    },
    zoom:function(delta) {
      var scale = this.matrix[0];
      var tr = scale + (this.settings.factor * (delta < 0 ? -1 : 1));
      if(tr < 1||4 < tr) {
        //console.log($(this.settings.ovideo)[0].getBoundingClientRect());
        //console.log(this.matrix);
        return;
      }
      this.geom.w = this.osource.w * tr;
      this.geom.h = this.osource.h * tr;
//console.log(this.geom);
      this.matrix[0] = tr;
      this.matrix[3] = tr;
      if (this.matrix[0] == 1) {
        this.matrix[4] = 0;
      }
      if (this.matrix[3] == 1) {
        this.matrix[5] = 0;
      }
      this.update();
      //console.log($(this.settings.ovideo)[0].getBoundingClientRect());
      //console.log(this.matrix);
    },
    endraggable:function(evt) {
      if (this.matrix[0] == 1 && this.matrix[3] == 1) {
        return;
      }
      evt.preventDefault();
      this.prevevt = evt.originalEvent;
      var self = this;
      $(this.settings.ovideo)
        .on('mousemove', function(evt) {
          self.drag(evt);
        })
        .on('mouseup', function(evt) {
          self.disdraggable(evt);
        });
    },
    drag:function(evt) {
//console.group();
//console.log(this.osource);
      evt.preventDefault();
      var e = evt.originalEvent;
      var ovideo = $(this.settings.ovideo);
      var rect = ovideo.offset();
      var wrap = ovideo.parent();
      var area = wrap[0].getBoundingClientRect();
//console.log(area);
      var offsetX = rect.left;
      var offsetY = rect.top;
//console.log('evt.pageX '+evt.pageX);
//console.log('evt.pageY '+evt.pageY);
//console.log('offsetX '+offsetX);
//console.log('offsetY '+offsetY);
      var cursorX = evt.pageX - rect.left;
      var cursorY = evt.pageY - rect.top;
//console.log('cursorX '+cursorX);
//console.log('cursorY '+cursorY);
      var ratioX  = parseInt((cursorX / this.geom.w) * 10) / 10;
      var ratioY  = parseInt((cursorY / this.geom.h) * 10) / 10;
//console.log('ratioX '+ratioX);
//console.log('ratioY '+ratioY);

//console.log(this.prevevt);
      var diffX = (e.pageX - this.prevevt.pageX);
      var diffY = (e.pageY - this.prevevt.pageY);
//console.log(diffX);
//console.log(diffY);



      this.matrix[4] += diffX;
      this.matrix[5] += diffY;
//console.log(this.matrix);
      this.prevevt = e;
      this.update();
      //console.log($(this.settings.ovideo)[0].getBoundingClientRect());
      //console.log(this.matrix);
//console.groupEnd();
    },
    disdraggable:function(evt) {
      evt.preventDefault();
      this.prevevt = evt.originalEvent;
      $(this.settings.ovideo)
        .off('mousemove')
        .off('mouseup');
    },
    update:function() {
      $(this.settings.ovideo).css('transform', 'matrix('+this.matrix.join(',')+')');
    },
    resetzoom:function() {
      this.prevevt = null;
      this.matrix = [1, 0, 0, 1, 0, 0];
      $(this.settings.ovideo).css('transform', 'matrix('+this.matrix.join(',')+')');
    },
    dispose:function() {
      this.resetzoom();
      $(this.settings.ovideo)
        .off('wheel')
        .off('mousedown')
        .off('mousemove')
        .off('mouseup');
      $(this.settings.clickup).off('click');
      $(this.settings.clickdown).off('click');
      $(this.settings.clickreset).off('click');
      this.osource = {w:0, h:0, x:0, y:0};
      this.matrix  = [1, 0, 0, 1, 0, 0];
      this.instantiated = false;
    },
    enabled:function() {
      return this.instantiated;
    }
  };
  $.zoomify = function(options) {
    if (typeof options === 'object') {
      $.fn.zoomify.initialize(options);
    } else if (typeof options === 'string') {
      switch (options) {
        case 'resetzoom':
          $.fn.zoomify.resetzoom();
        break;
        case 'dispose':
          $.fn.zoomify.dispose();
        break;
        case 'enabled':
          $.fn.zoomify.enabled();
        break;
        default:
          //console.log('unknown command: zoomify.'+options);
        break;
      }
    }
  };
})(jQuery);

