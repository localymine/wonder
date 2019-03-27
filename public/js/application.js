if (typeof jQuery === "undefined") {
  throw new Error("AdminLTE requires jQuery");
}
$.AdminLTE = {};
$.AdminLTE.options = {
  navbarMenuSlimscroll: true,
  navbarMenuSlimscrollWidth: "3px", //The width of the scroll bar
  navbarMenuHeight: "200px", //The height of the inner menu
  animationSpeed: 250,
  sidebarToggleSelector: "[data-toggle='offcanvas']",
  sidebarPushMenu:true,
  sidebarSlimScroll:true,
  sidebarExpandOnHover:false,
  enableBoxRefresh:true,
  enableBSToppltip: true,
  BSTooltipSelector: "[data-toggle='tooltip']",
  enableFastclick: true,
  enableControlSidebar: false,
  controlSidebarOptions: {
    toggleBtnSelector: "[data-toggle='control-sidebar']",
    selector: ".control-sidebar",
    slide: true
  },
  enableBoxWidget: true,
  boxWidgetOptions: {
    boxWidgetIcons: {
      collapse: 'fa-minus',
      open: 'fa-plus',
      remove: 'fa-times'
    },
    boxWidgetSelectors: {
      remove: '[data-widget="remove"]',
      collapse: '[data-widget="collapse"]'
    }
  },
  directChat: {
    enable:false,
    contactToggleSelector: '[data-widget="chat-pane-toggle"]'
  },
  colors: {
    lightBlue: "#3c8dbc",
    red: "#f56954",
    green: "#00a65a",
    aqua: "#00c0ef",
    yellow: "#f39c12",
    blue: "#0073b7",
    navy: "#001F3F",
    teal: "#39CCCC",
    olive: "#3D9970",
    lime: "#01FF70",
    orange: "#FF851B",
    fuchsia: "#F012BE",
    purple: "#8E24AA",
    maroon: "#D81B60",
    black: "#222222",
    gray: "#d2d6de"
  },
  screenSizes: {
    xs: 480,
    sm: 768,
    md: 992,
    lg: 1200
  }
};

$(function () {
  'use strict';
  var o = $.AdminLTE.options;
  var _body = $('body');
  _body.removeClass('hold-transition');

  _init();
  $.AdminLTE.layout.activate();
  $.AdminLTE.tree('.sidebar');

  if (o.enableControlSidebar) {
    $.AdminLTE.controlSidebar.activate();
  }
  if (o.navbarMenuSlimscroll && typeof $.fn.slimscroll !== 'undefined') {
    $('.navbar .menu').slimscroll({
      height: o.navbarMenuHeight,
      alwaysVisible: false,
      size: o.navbarMenuSlimscrollWidth
    }).css("width", "100%");
  }
  if (o.sidebarPushMenu) {
    $.AdminLTE.pushMenu.activate(o.sidebarToggleSelector);
  }
  if (o.enableBSToppltip) {
    _body.tooltip({
      selector: o.BSTooltipSelector
    });
  }
  if (o.enableBoxWidget) {
    $.AdminLTE.boxWidget.activate();
  }
  if (o.enableFastclick && typeof FastClick !== 'undefined') {
    FastClick.attach(document.body);
  }
  $('.btn-group[data-toggle="btn-toggle"]').each(function () {
    var group = $(this);
    $(this).find('.btn').on('click', function (e) {
      group.find('.btn.active').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
  });
});

function _init() {
  'use strict';
  $.AdminLTE.layout = {
    activate: function () {
      var _this = this;
      _this.fix();
      _this.fixSidebar();
      $(window, '.wrapper').resize(function () {
        _this.fix();
        _this.fixSidebar();
      });
    },
    fix: function () {
      var neg = $('.main-header').height();
      var footer = $('.main-footer');
      if (footer[0]) {
        neg += footer.height() + 31;
      }
      var window_height = $(window).height();
      var sidebar = $('.sidebar');
      var sidebar_height = 0;
      if (sidebar[0]) {
        sidebar_height = sidebar.height();
      }
      if ($('body').hasClass('fixed')) {
        $('.content-wrapper, .right-side').css('min-height', window_height - (footer.height() + 31));
      } else {
        if (window_height >= sidebar_height) {
          $('.content-wrapper, .right-side').css('min-height', window_height - neg);
        } else {
          $('.content-wrapper, .right-side').css('min-height', sidebar_height);
        }
      }
    },
    fixSidebar: function () {
      var sidebar = $('.sidebar');
      if (!$('body').hasClass('fixed')) {
        if (typeof $.fn.slimScroll !== 'undefined') {
          sidebar.slimScroll({destroy: true}).height('auto');
        }
        return;
      } else if (typeof $.fn.slimScroll === 'undefined' && window.console) {
        window.console.error("Error: the fixed layout requires the slimscroll plugin!");
      }
      if ($.AdminLTE.options.sidebarSlimScroll) {
        if (typeof $.fn.slimScroll !== 'undefined') {
          sidebar.slimScroll({destroy: true}).height('auto');
          sidebar.slimscroll({
            height: ($(window).height() - $('.main-header').height()) + 'px',
            color: 'rgba(0,0,0,0.2)',
            size: '3px'
          });
        }
      }
    }
  };

  $.AdminLTE.pushMenu = {
    activate: function (toggleBtn) {
      var _body = $('body');
      var screenSizes = $.AdminLTE.options.screenSizes;
      $(document).on('click', toggleBtn, function (e) {
        e.preventDefault();
        if ($(window).width() > (screenSizes.sm - 1)) {
          if (_body.hasClass('sidebar-collapse')) {
            _body.removeClass('sidebar-collapse').trigger('expanded.pushMenu');
            Cookies.set('smc_pm_collapse', 0, {expires:30});
          } else {
            _body.addClass('sidebar-collapse').trigger('collapsed.pushMenu');
            Cookies.set('smc_pm_collapse', 1, {expires:30});
          }
        } else {
          if (_body.hasClass('sidebar-open')) {
            _body.removeClass('sidebar-open').removeClass('sidebar-collapse').trigger('collapsed.pushMenu');
          } else {
            _body.addClass('sidebar-open').trigger('expanded.pushMenu');
          }
        }
      });

      $('.content-wrapper').click(function () {
        if ($(window).width() <= (screenSizes.sm - 1) && _body.hasClass('sidebar-open')) {
          $('body').removeClass('sidebar-open');
        }
      });

      //Enable expand on hover for sidebar mini
      if ($.AdminLTE.options.sidebarExpandOnHover
          || (_body.hasClass('fixed')
          && _body.hasClass('sidebar-mini'))) {
        this.expandOnHover();
      }
    },
    expandOnHover: function () {
      var _this = this;
      var _body = $('body');
      var screenWidth = $.AdminLTE.options.screenSizes.sm - 1;
      //Expand sidebar on hover
      $('.main-sidebar').hover(function () {
        if (_body.hasClass('sidebar-mini')
            && _body.hasClass('sidebar-collapse')
            && $(window).width() > screenWidth) {
          _this.expand();
        }
      }, function () {
        if (_body.hasClass('sidebar-mini')
            && _body.hasClass('sidebar-expanded-on-hover')
            && $(window).width() > screenWidth) {
          _this.collapse();
        }
      });
    },
    expand: function () {
      $('body').removeClass('sidebar-collapse').addClass('sidebar-expanded-on-hover');
    },
    collapse: function () {
      var _body = $('body');
      if (_body.hasClass('sidebar-expanded-on-hover')) {
        _body.removeClass('sidebar-expanded-on-hover').addClass('sidebar-collapse');
      }
    }
  };

  $.AdminLTE.tree = function (menu) {
    var _this = this;
    var animationSpeed = $.AdminLTE.options.animationSpeed;
    $(document).on('click', menu + ' li a', function (e) {
      var $this = $(this);
      var checkElement = $this.next();
      if ((checkElement.is('.treeview-menu')) && (checkElement.is(':visible')) && (!$('body').hasClass('sidebar-collapse'))) {
        checkElement.slideUp(animationSpeed, function () {
          checkElement.removeClass('menu-open');
        });
        checkElement.parent("li").removeClass("active");
      } else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
        var parent = $this.parents('ul').first();
        var ul = parent.find('ul:visible').slideUp(animationSpeed);
        ul.removeClass('menu-open');
        var parent_li = $this.parent("li");
        checkElement.slideDown(animationSpeed, function () {
          checkElement.addClass('menu-open');
          parent.find('li.active').removeClass('active');
          parent_li.addClass('active');
          _this.layout.fix();
        });
      }
      if (checkElement.is('.treeview-menu')) {
        e.preventDefault();
      }
    });
  };
  $.AdminLTE.controlSidebar = {
    activate: function () {
      var _this = this;
      var o = $.AdminLTE.options.controlSidebarOptions;
      var sidebar = $(o.selector);
      var btn = $(o.toggleBtnSelector);
      btn.on('click', function (e) {
        e.preventDefault();
        if (!sidebar.hasClass('control-sidebar-open')
            && !$('body').hasClass('control-sidebar-open')) {
          _this.open(sidebar, o.slide);
        } else {
          _this.close(sidebar, o.slide);
        }
      });
      var bg = $(".control-sidebar-bg");
      _this._fix(bg);
      if ($('body').hasClass('fixed')) {
        _this._fixForFixed(sidebar);
      } else {
        if ($('.content-wrapper, .right-side').height() < sidebar.height()) {
          _this._fixForContent(sidebar);
        }
      }
    },
    open: function (sidebar, slide) {
      if (slide) {
        sidebar.addClass('control-sidebar-open');
      } else {
        $('body').addClass('control-sidebar-open');
      }
    },
    close: function (sidebar, slide) {
      if (slide) {
        sidebar.removeClass('control-sidebar-open');
      } else {
        $('body').removeClass('control-sidebar-open');
      }
    },
    _fix: function (sidebar) {
      var _this = this;
      if ($("body").hasClass('layout-boxed')) {
        sidebar.css('position', 'absolute');
        sidebar.height($(".wrapper").height());
        $(window).resize(function () {
          _this._fix(sidebar);
        });
      } else {
        sidebar.css({
          'position': 'fixed',
          'height': 'auto'
        });
      }
    },
    _fixForFixed: function (sidebar) {
      sidebar.css({
        'position': 'fixed',
        'max-height': '100%',
        'overflow': 'auto',
        'padding-bottom': '50px'
      });
    },
    _fixForContent: function (sidebar) {
      $(".content-wrapper, .right-side").css('min-height', sidebar.height());
    }
  };

  $.AdminLTE.boxWidget = {
    selectors: $.AdminLTE.options.boxWidgetOptions.boxWidgetSelectors,
    icons: $.AdminLTE.options.boxWidgetOptions.boxWidgetIcons,
    animationSpeed: $.AdminLTE.options.animationSpeed,
    activate: function (_box) {
      var _this = this;
      if (!_box) {
        _box = document; // activate all boxes per default
      }
      $(_box).on('click', _this.selectors.collapse, function (e) {
        e.preventDefault();
        _this.collapse($(this));
      });
      $(_box).on('click', _this.selectors.remove, function (e) {
        e.preventDefault();
        _this.remove($(this));
      });
    },
    collapse: function (element) {
      var _this = this;
      var box = element.parents(".box").first();
      var box_content = box.find("> .box-body, > .box-footer, > form  >.box-body, > form > .box-footer");
      if (!box.hasClass("collapsed-box")) {
        element.children(":first")
            .removeClass(_this.icons.collapse)
            .addClass(_this.icons.open);
        box_content.slideUp(_this.animationSpeed, function () {
          box.addClass("collapsed-box");
        });
      } else {
        element.children(":first")
            .removeClass(_this.icons.open)
            .addClass(_this.icons.collapse);
        box_content.slideDown(_this.animationSpeed, function () {
          box.removeClass("collapsed-box");
        });
      }
    },
    remove: function (element) {
      var box = element.parents(".box").first();
      box.slideUp(this.animationSpeed);
    }
  };
}
(function ($) {
  'use strict';
  $.fn.activateBox = function () {
    $.AdminLTE.boxWidget.activate(this);
  };
  $.fn.toggleBox = function(){
    var button = $($.AdminLTE.boxWidget.selectors.collapse, this);
    $.AdminLTE.boxWidget.collapse(button);
  };
  $.fn.removeBox = function(){
    var button = $($.AdminLTE.boxWidget.selectors.remove, this);
    $.AdminLTE.boxWidget.remove(button);
  };
})(jQuery);

(function($) {
  $.smcsupport = {
    ua   :navigator.userAgent.toLowerCase(),
    os   :navigator.platform,
    IOS  :null,
    DRD  :null,
    WIN  :null,
    OSX  :null,
    OSVER:0,
    IOS11:0,
    IOS10:0,
    IOS9 :0,
    IOS8 :0,
    IOS7 :0,
    IOS6 :0,
    DRD7 :0,
    DRD6 :0,
    DRD5 :0,
    DRD4 :0,
    MSE  :0,
    PC   :0,
    UAID :0,
    BROWSER:null,
    initialize:function() {
      this.IOS = ((this.os.match(/ip(hone|[ao]d)/i)) ? true : false);
      this.DRD = ((this.os.match(/linux|android/i) || this.os == null) && (this.ua.match(/android/)) ? true : false);
      this.WIN = ((this.os.match(/win/i)) ? true : false);
      this.OSX = ((this.os.match(/mac/i)) ? true : false);
      if (this.IOS) {
        this.OSVER = parseFloat(this.ua.match(/version\/([\d\.]+)/)[1]);
        if (this.OSVER >= 11) { this.IOS11 = 1; }
        else if(11 > this.OSVER && this.OSVER >= 10) { this.IOS10 = 1; }
        else if(10 > this.OSVER && this.OSVER >=  9) { this.IOS9  = 1; }
        else if( 9 > this.OSVER && this.OSVER >=  8) { this.IOS8  = 1; }
        else if( 8 > this.OSVER && this.OSVER >=  7) { this.IOS7  = 1; }
        else if( 7 > this.OSVER && this.OSVER >=  6) { this.IOS6  = 1; }
        else if( 6 > this.OSVER){ this.IOS = 0; }
      }
      if (this.DRD) {
        this.OSVER = parseFloat(this.ua.match(/android\s+([\d\.]+)/)[1]);
        if (this.OSVER >= 7) { this.DRD7 = 1; }
        else if(7 > this.OSVER && this.OSVER >= 6) { this.DRD6 = 1; }
        else if(6 > this.OSVER && this.OSVER >= 5) { this.DRD5 = 1; }
        else if(5 > this.OSVER && this.OSVER >= 4) { this.DRD4 = 1; }
        else if(4 > this.OSVER) { this.DRD = 0;}
      }
      if (typeof MediaSource !== 'undefined') {
        this.MSE = 1;
      }
      if (this.WIN) {
        if (this.ua.match(/chrome/)) {
          this.BROWSER = (this.ua.match(/edge/) ? 'EDGE' : 'CHROMIUM');
        } else if (this.ua.match(/(msie|trident)/)) {
          this.BROWSER = (this.ua.match(/rv:([\d\.]+)/) ? 'IE11' : 'IE10');
        } else if (this.ua.match(/firefox/)) {
          this.BROWSER = 'FF40';
        } else {
          this.BROWSER = 'UNKNOWN';
        }
        this.PC = 1;
      }
      if (this.OSX) {
        if (this.ua.match(/safari/)) {
          this.BROWSER = (this.ua.match(/chrome/) ? 'CHROMIUM' : 'SAFARI');
        } else if (this.ua.match(/firefox/)) {
          this.BROWSER = 'FF40';
        } else {
          this.BROWSER = 'UNKNOWN';
        }
        this.PC = 1;
      }
      this.UAID = (this.PC << 2) | (this.IOS << 1) | this.DRD;
    },
    toFuzzyDateISO:function(datestr) {
      if (datestr === undefined) {
        datestr = (new Date()).toISOString();
      }
      var _s = datestr.replace(/\.\d+Z/, '').replace(/T/, ' ').replace(/\-/g, '/');
      if (!_s.match(/(:\d{2}:\d{2})$/)) {
        _s += ":00";
      }
      return _s;
    },
    toFuzzyDateDB:function(datestr) {
      if (datestr === undefined) {
        datestr = (new Date()).toISOString();
      }
      var _s = datestr.replace(/\.\d+Z/, '').replace(/T/, ' ').replace(/\//g, '-');
      if (!_s.match(/(:\d{2}:\d{2})$/)) {
        _s += ":00";
      }
      return _s;
    },
    showLoading:function(message) {
      var obody = $('section.content');
      var camview = $('.camview-root');
      var dlg = $('<div id="smc-loading"></div>');
      if (message !== undefined && typeof message === 'string') {
        dlg.text(message);
      }
      (camview[0] ? camview : obody).prepend(dlg);
    },
    hideLoading:function() {
      $('#smc-loading').remove();
    },
    epoch:function() {
      var _d = new Date();
      return parseInt(_d.getTime() / 1000);
    },
    toEpoch:function(dateString) {
      var parts = dateString.match(/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/);
      return Date.UTC(parts[1], parts[2] - 1, parts[3], parts[4], parts[5], parts[6]) / 1000 - 32400;
    },
    bsAlert:function(type, message) {
      var tmpl = '<div class="alert alert-dismissable">' +
                 '<button type="button" class="close" data-dismiss="alert">' +
                 '<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>' +
                 '</button></div>';
      var el = $(tmpl);
      el.addClass('alert-' + type).append(message).prependTo('section.content');
    }
  };

  $.smcsupport.initialize();

})(jQuery);

!function(a,b){"use strict";"function"==typeof define&&define.amd?define(["jquery"],b):"object"==typeof exports?module.exports=b(require("jquery")):a.bootbox=b(a.jQuery)}(this,function a(b,c){"use strict";function d(a){var b=q[o.locale];return b?b[a]:q.en[a]}function e(a,c,d){a.stopPropagation(),a.preventDefault();var e=b.isFunction(d)&&d.call(c,a)===!1;e||c.modal("hide")}function f(a){var b,c=0;for(b in a)c++;return c}function g(a,c){var d=0;b.each(a,function(a,b){c(a,b,d++)})}function h(a){var c,d;if("object"!=typeof a)throw new Error("Please supply an object of options");if(!a.message)throw new Error("Please specify a message");return a=b.extend({},o,a),a.buttons||(a.buttons={}),c=a.buttons,d=f(c),g(c,function(a,e,f){if(b.isFunction(e)&&(e=c[a]={callback:e}),"object"!==b.type(e))throw new Error("button with key "+a+" must be an object");e.label||(e.label=a),e.className||(e.className=2>=d&&f===d-1?"btn-primary":"btn-default")}),a}function i(a,b){var c=a.length,d={};if(1>c||c>2)throw new Error("Invalid argument length");return 2===c||"string"==typeof a[0]?(d[b[0]]=a[0],d[b[1]]=a[1]):d=a[0],d}function j(a,c,d){return b.extend(!0,{},a,i(c,d))}function k(a,b,c,d){var e={className:"bootbox-"+a,buttons:l.apply(null,b)};return m(j(e,d,c),b)}function l(){for(var a={},b=0,c=arguments.length;c>b;b++){var e=arguments[b],f=e.toLowerCase(),g=e.toUpperCase();a[f]={label:d(g)}}return a}function m(a,b){var d={};return g(b,function(a,b){d[b]=!0}),g(a.buttons,function(a){if(d[a]===c)throw new Error("button key "+a+" is not allowed (options are "+b.join("\n")+")")}),a}var n={dialog:"<div class='bootbox modal' tabindex='-1' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-body'><div class='bootbox-body'></div></div></div></div></div>",header:"<div class='modal-header'><h4 class='modal-title'></h4></div>",footer:"<div class='modal-footer'></div>",closeButton:"<button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>&times;</button>",form:"<form class='bootbox-form'></form>",inputs:{text:"<input class='bootbox-input bootbox-input-text form-control' autocomplete=off type=text />",textarea:"<textarea class='bootbox-input bootbox-input-textarea form-control'></textarea>",email:"<input class='bootbox-input bootbox-input-email form-control' autocomplete='off' type='email' />",select:"<select class='bootbox-input bootbox-input-select form-control'></select>",checkbox:"<div class='checkbox'><label><input class='bootbox-input bootbox-input-checkbox' type='checkbox' /></label></div>",date:"<input class='bootbox-input bootbox-input-date form-control' autocomplete=off type='date' />",time:"<input class='bootbox-input bootbox-input-time form-control' autocomplete=off type='time' />",number:"<input class='bootbox-input bootbox-input-number form-control' autocomplete=off type='number' />",password:"<input class='bootbox-input bootbox-input-password form-control' autocomplete='off' type='password' />"}},o={locale:"en",backdrop:"static",animate:!0,className:null,closeButton:!0,show:!0,container:"body"},p={};p.alert=function(){var a;if(a=k("alert",["ok"],["message","callback"],arguments),a.callback&&!b.isFunction(a.callback))throw new Error("alert requires callback property to be a function when provided");return a.buttons.ok.callback=a.onEscape=function(){return b.isFunction(a.callback)?a.callback.call(this):!0},p.dialog(a)},p.confirm=function(){var a;if(a=k("confirm",["cancel","confirm"],["message","callback"],arguments),a.buttons.cancel.callback=a.onEscape=function(){return a.callback.call(this,!1)},a.buttons.confirm.callback=function(){return a.callback.call(this,!0)},!b.isFunction(a.callback))throw new Error("confirm requires a callback");return p.dialog(a)},p.prompt=function(){var a,d,e,f,h,i,k;if(f=b(n.form),d={className:"bootbox-prompt",buttons:l("cancel","confirm"),value:"",inputType:"text"},a=m(j(d,arguments,["title","callback"]),["cancel","confirm"]),i=a.show===c?!0:a.show,a.message=f,a.buttons.cancel.callback=a.onEscape=function(){return a.callback.call(this,null)},a.buttons.confirm.callback=function(){var c;switch(a.inputType){case"text":case"textarea":case"email":case"select":case"date":case"time":case"number":case"password":c=h.val();break;case"checkbox":var d=h.find("input:checked");c=[],g(d,function(a,d){c.push(b(d).val())})}return a.callback.call(this,c)},a.show=!1,!a.title)throw new Error("prompt requires a title");if(!b.isFunction(a.callback))throw new Error("prompt requires a callback");if(!n.inputs[a.inputType])throw new Error("invalid prompt type");switch(h=b(n.inputs[a.inputType]),a.inputType){case"text":case"textarea":case"email":case"date":case"time":case"number":case"password":h.val(a.value);break;case"select":var o={};if(k=a.inputOptions||[],!b.isArray(k))throw new Error("Please pass an array of input options");if(!k.length)throw new Error("prompt with select requires options");g(k,function(a,d){var e=h;if(d.value===c||d.text===c)throw new Error("given options in wrong format");d.group&&(o[d.group]||(o[d.group]=b("<optgroup/>").attr("label",d.group)),e=o[d.group]),e.append("<option value='"+d.value+"'>"+d.text+"</option>")}),g(o,function(a,b){h.append(b)}),h.val(a.value);break;case"checkbox":var q=b.isArray(a.value)?a.value:[a.value];if(k=a.inputOptions||[],!k.length)throw new Error("prompt with checkbox requires options");if(!k[0].value||!k[0].text)throw new Error("given options in wrong format");h=b("<div/>"),g(k,function(c,d){var e=b(n.inputs[a.inputType]);e.find("input").attr("value",d.value),e.find("label").append(d.text),g(q,function(a,b){b===d.value&&e.find("input").prop("checked",!0)}),h.append(e)})}return a.placeholder&&h.attr("placeholder",a.placeholder),a.pattern&&h.attr("pattern",a.pattern),a.maxlength&&h.attr("maxlength",a.maxlength),f.append(h),f.on("submit",function(a){a.preventDefault(),a.stopPropagation(),e.find(".btn-primary").click()}),e=p.dialog(a),e.off("shown.bs.modal"),e.on("shown.bs.modal",function(){h.focus()}),i===!0&&e.modal("show"),e},p.dialog=function(a){a=h(a);var d=b(n.dialog),f=d.find(".modal-dialog"),i=d.find(".modal-body"),j=a.buttons,k="",l={onEscape:a.onEscape};if(b.fn.modal===c)throw new Error("$.fn.modal is not defined; please double check you have included the Bootstrap JavaScript library. See http://getbootstrap.com/javascript/ for more details.");if(g(j,function(a,b){k+="<button data-bb-handler='"+a+"' type='button' class='btn "+b.className+"'>"+b.label+"</button>",l[a]=b.callback}),i.find(".bootbox-body").html(a.message),a.animate===!0&&d.addClass("fade"),a.className&&d.addClass(a.className),"large"===a.size?f.addClass("modal-lg"):"small"===a.size&&f.addClass("modal-sm"),a.title&&i.before(n.header),a.closeButton){var m=b(n.closeButton);a.title?d.find(".modal-header").prepend(m):m.css("margin-top","-10px").prependTo(i)}return a.title&&d.find(".modal-title").html(a.title),k.length&&(i.after(n.footer),d.find(".modal-footer").html(k)),d.on("hidden.bs.modal",function(a){a.target===this&&d.remove()}),d.on("shown.bs.modal",function(){d.find(".btn-primary:first").focus()}),"static"!==a.backdrop&&d.on("click.dismiss.bs.modal",function(a){d.children(".modal-backdrop").length&&(a.currentTarget=d.children(".modal-backdrop").get(0)),a.target===a.currentTarget&&d.trigger("escape.close.bb")}),d.on("escape.close.bb",function(a){l.onEscape&&e(a,d,l.onEscape)}),d.on("click",".modal-footer button",function(a){var c=b(this).data("bb-handler");e(a,d,l[c])}),d.on("click",".bootbox-close-button",function(a){e(a,d,l.onEscape)}),d.on("keyup",function(a){27===a.which&&d.trigger("escape.close.bb")}),b(a.container).append(d),d.modal({backdrop:a.backdrop?"static":!1,keyboard:!1,show:!1}),a.show&&d.modal("show"),d},p.setDefaults=function(){var a={};2===arguments.length?a[arguments[0]]=arguments[1]:a=arguments[0],b.extend(o,a)},p.hideAll=function(){return b(".bootbox").modal("hide"),p};var q={bg_BG:{OK:"Ок",CANCEL:"Отказ",CONFIRM:"Потвърждавам"},br:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Sim"},cs:{OK:"OK",CANCEL:"Zrušit",CONFIRM:"Potvrdit"},da:{OK:"OK",CANCEL:"Annuller",CONFIRM:"Accepter"},de:{OK:"OK",CANCEL:"Abbrechen",CONFIRM:"Akzeptieren"},el:{OK:"Εντάξει",CANCEL:"Ακύρωση",CONFIRM:"Επιβεβαίωση"},en:{OK:"OK",CANCEL:"Cancel",CONFIRM:"OK"},es:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Aceptar"},et:{OK:"OK",CANCEL:"Katkesta",CONFIRM:"OK"},fa:{OK:"قبول",CANCEL:"لغو",CONFIRM:"تایید"},fi:{OK:"OK",CANCEL:"Peruuta",CONFIRM:"OK"},fr:{OK:"OK",CANCEL:"Annuler",CONFIRM:"D'accord"},he:{OK:"אישור",CANCEL:"ביטול",CONFIRM:"אישור"},hu:{OK:"OK",CANCEL:"Mégsem",CONFIRM:"Megerősít"},hr:{OK:"OK",CANCEL:"Odustani",CONFIRM:"Potvrdi"},id:{OK:"OK",CANCEL:"Batal",CONFIRM:"OK"},it:{OK:"OK",CANCEL:"Annulla",CONFIRM:"Conferma"},ja:{OK:"OK",CANCEL:"キャンセル",CONFIRM:"確認"},lt:{OK:"Gerai",CANCEL:"Atšaukti",CONFIRM:"Patvirtinti"},lv:{OK:"Labi",CANCEL:"Atcelt",CONFIRM:"Apstiprināt"},nl:{OK:"OK",CANCEL:"Annuleren",CONFIRM:"Accepteren"},no:{OK:"OK",CANCEL:"Avbryt",CONFIRM:"OK"},pl:{OK:"OK",CANCEL:"Anuluj",CONFIRM:"Potwierdź"},pt:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Confirmar"},ru:{OK:"OK",CANCEL:"Отмена",CONFIRM:"Применить"},sq:{OK:"OK",CANCEL:"Anulo",CONFIRM:"Prano"},sv:{OK:"OK",CANCEL:"Avbryt",CONFIRM:"OK"},th:{OK:"ตกลง",CANCEL:"ยกเลิก",CONFIRM:"ยืนยัน"},tr:{OK:"Tamam",CANCEL:"İptal",CONFIRM:"Onayla"},zh_CN:{OK:"OK",CANCEL:"取消",CONFIRM:"确认"},zh_TW:{OK:"OK",CANCEL:"取消",CONFIRM:"確認"}};return p.addLocale=function(a,c){return b.each(["OK","CANCEL","CONFIRM"],function(a,b){if(!c[b])throw new Error("Please supply a translation for '"+b+"'")}),q[a]={OK:c.OK,CANCEL:c.CANCEL,CONFIRM:c.CONFIRM},p},p.removeLocale=function(a){return delete q[a],p},p.setLocale=function(a){return p.setDefaults("locale",a)},p.init=function(c){return a(c||b)},p});

(function(global,factory){if(typeof exports==='object'){factory(require('jquery'));}else{factory(global.jQuery);}}(this, function($){function defined(a){return"undefined"!=typeof a}function extend(a,b,c){var d=function(){};d.prototype=b.prototype,a.prototype=new d,a.prototype.constructor=a,b.prototype.constructor=b,a._super=b.prototype,c&&$.extend(a.prototype,c)}function native(a,b){var c;"string"==typeof a&&(b=a,a=document);for(var d=0;d<SUBST.length;++d){b=b.replace(SUBST[d][0],SUBST[d][1]);for(var e=0;e<VENDOR_PREFIXES.length;++e)if(c=VENDOR_PREFIXES[e],c+=0===e?b:b.charAt(0).toUpperCase()+b.substr(1),defined(a[c]))return a[c]}return void 0}var SUBST=[["",""],["exit","cancel"],["screen","Screen"]],VENDOR_PREFIXES=["","o","ms","moz","webkit","webkitCurrent"],ua=navigator.userAgent,fsEnabled=native("fullscreenEnabled"),parsedChromeUA=ua.match(/Android.*Chrome\/(\d+)\./),IS_ANDROID_CHROME=!!parsedChromeUA,CHROME_VERSION;IS_ANDROID_CHROME&&(ANDROID_CHROME_VERSION=parseInt(parsedChromeUA[1]));var IS_NATIVELY_SUPPORTED=(!IS_ANDROID_CHROME||ANDROID_CHROME_VERSION>37)&&defined(native("fullscreenElement"))&&(!defined(fsEnabled)||fsEnabled===!0),version=$.fn.jquery.split("."),JQ_LT_17=parseInt(version[0])<2&&parseInt(version[1])<7,FullScreenAbstract=function(){this.__options=null,this._fullScreenElement=null,this.__savedStyles={}};FullScreenAbstract.prototype={"native":native,_DEFAULT_OPTIONS:{styles:{boxSizing:"border-box",MozBoxSizing:"border-box",WebkitBoxSizing:"border-box"},toggleClass:null},__documentOverflow:"",__htmlOverflow:"",_preventDocumentScroll:function(){this.__documentOverflow=document.body.style.overflow,this.__htmlOverflow=document.documentElement.style.overflow,$(this._fullScreenElement).is("body, html")||$("body, html").css("overflow","hidden")},_allowDocumentScroll:function(){document.body.style.overflow=this.__documentOverflow,document.documentElement.style.overflow=this.__htmlOverflow},_fullScreenChange:function(){this.__options&&(this.isFullScreen()?(this._preventDocumentScroll(),this._triggerEvents()):(this._allowDocumentScroll(),this._revertStyles(),this._triggerEvents(),this._fullScreenElement=null))},_fullScreenError:function(a){this.__options&&(this._revertStyles(),this._fullScreenElement=null,a&&$(document).trigger("fscreenerror",[a]))},_triggerEvents:function(){$(this._fullScreenElement).trigger(this.isFullScreen()?"fscreenopen":"fscreenclose"),$(document).trigger("fscreenchange",[this.isFullScreen(),this._fullScreenElement])},_saveAndApplyStyles:function(){var a=$(this._fullScreenElement);this.__savedStyles={};for(var b in this.__options.styles)this.__savedStyles[b]=this._fullScreenElement.style[b],this._fullScreenElement.style[b]=this.__options.styles[b];a.is("body")&&(document.documentElement.style.overflow=this.__options.styles.overflow),this.__options.toggleClass&&a.addClass(this.__options.toggleClass)},_revertStyles:function(){var a=$(this._fullScreenElement);for(var b in this.__options.styles)this._fullScreenElement.style[b]=this.__savedStyles[b];a.is("body")&&(document.documentElement.style.overflow=this.__savedStyles.overflow),this.__options.toggleClass&&a.removeClass(this.__options.toggleClass)},open:function(a,b){a!==this._fullScreenElement&&(this.isFullScreen()&&this.exit(),this._fullScreenElement=a,this.__options=$.extend(!0,{},this._DEFAULT_OPTIONS,b),this._saveAndApplyStyles())},exit:null,isFullScreen:null,isNativelySupported:function(){return IS_NATIVELY_SUPPORTED}};var FullScreenNative=function(){FullScreenNative._super.constructor.apply(this,arguments),this.exit=$.proxy(native("exitFullscreen"),document),this._DEFAULT_OPTIONS=$.extend(!0,{},this._DEFAULT_OPTIONS,{styles:{width:"100%",height:"100%"}}),$(document).bind(this._prefixedString("fullscreenchange")+" MSFullscreenChange",$.proxy(this._fullScreenChange,this)).bind(this._prefixedString("fullscreenerror")+" MSFullscreenError",$.proxy(this._fullScreenError,this))};extend(FullScreenNative,FullScreenAbstract,{VENDOR_PREFIXES:["","o","moz","webkit"],_prefixedString:function(a){return $.map(this.VENDOR_PREFIXES,function(b){return b+a}).join(" ")},open:function(a){FullScreenNative._super.open.apply(this,arguments);var b=native(a,"requestFullscreen");b.call(a)},exit:$.noop,isFullScreen:function(){return null!==native("fullscreenElement")},element:function(){return native("fullscreenElement")}});var FullScreenFallback=function(){FullScreenFallback._super.constructor.apply(this,arguments),this._DEFAULT_OPTIONS=$.extend({},this._DEFAULT_OPTIONS,{styles:{position:"fixed",zIndex:"2147483647",left:0,top:0,bottom:0,right:0}}),this.__delegateKeydownHandler()};extend(FullScreenFallback,FullScreenAbstract,{__isFullScreen:!1,__delegateKeydownHandler:function(){var a=$(document);a.delegate("*","keydown.fullscreen",$.proxy(this.__keydownHandler,this));var b=JQ_LT_17?a.data("events"):$._data(document).events,c=b.keydown;JQ_LT_17?b.live.unshift(b.live.pop()):c.splice(0,0,c.splice(c.delegateCount-1,1)[0])},__keydownHandler:function(a){return this.isFullScreen()&&27===a.which?(this.exit(),!1):!0},_revertStyles:function(){FullScreenFallback._super._revertStyles.apply(this,arguments),this._fullScreenElement.offsetHeight},open:function(){FullScreenFallback._super.open.apply(this,arguments),this.__isFullScreen=!0,this._fullScreenChange()},exit:function(){this.__isFullScreen&&(this.__isFullScreen=!1,this._fullScreenChange())},isFullScreen:function(){return this.__isFullScreen},element:function(){return this.__isFullScreen?this._fullScreenElement:null}}),$.fullscreen=IS_NATIVELY_SUPPORTED?new FullScreenNative:new FullScreenFallback,$.fn.fullscreen=function(a){var b=this[0];return a=$.extend({toggleClass:null,overflow:"hidden"},a),a.styles={overflow:a.overflow},delete a.overflow,b&&$.fullscreen.open(b,a),this};}));


/**
 * Number.prototype.format(n, x, s, c)
 *
 * @param integer n: length of decimal
 * @param integer x: length of whole part
 * @param mixed   s: sections delimiter
 * @param mixed   c: decimal delimiter
 */
Number.prototype.format = function(n, x, s, c) {
  var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
    num = this.toFixed(Math.max(0, ~~n));

  return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};