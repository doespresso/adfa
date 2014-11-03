/* Modernizr 2.7.1 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-flexbox-flexboxlegacy-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-applicationcache-canvas-canvastext-draganddrop-hashchange-history-audio-video-indexeddb-input-inputtypes-localstorage-postmessage-sessionstorage-websockets-websqldatabase-webworkers-geolocation-inlinesvg-smil-svg-svgclippaths-touch-webgl-shiv-mq-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-load
 */
;



window.Modernizr = (function( window, document, undefined ) {

    var version = '2.7.1',

    Modernizr = {},

    enableClasses = true,

    docElement = document.documentElement,

    mod = 'modernizr',
    modElem = document.createElement(mod),
    mStyle = modElem.style,

    inputElem  = document.createElement('input')  ,

    smile = ':)',

    toString = {}.toString,

    prefixes = ' -webkit- -moz- -o- -ms- '.split(' '),



    omPrefixes = 'Webkit Moz O ms',

    cssomPrefixes = omPrefixes.split(' '),

    domPrefixes = omPrefixes.toLowerCase().split(' '),

    ns = {'svg': 'http://www.w3.org/2000/svg'},

    tests = {},
    inputs = {},
    attrs = {},

    classes = [],

    slice = classes.slice,

    featureName,


    injectElementWithStyles = function( rule, callback, nodes, testnames ) {

      var style, ret, node, docOverflow,
          div = document.createElement('div'),
                body = document.body,
                fakeBody = body || document.createElement('body');

      if ( parseInt(nodes, 10) ) {
                      while ( nodes-- ) {
              node = document.createElement('div');
              node.id = testnames ? testnames[nodes] : mod + (nodes + 1);
              div.appendChild(node);
          }
      }

                style = ['&#173;','<style id="s', mod, '">', rule, '</style>'].join('');
      div.id = mod;
          (body ? div : fakeBody).innerHTML += style;
      fakeBody.appendChild(div);
      if ( !body ) {
                fakeBody.style.background = '';
                fakeBody.style.overflow = 'hidden';
          docOverflow = docElement.style.overflow;
          docElement.style.overflow = 'hidden';
          docElement.appendChild(fakeBody);
      }

      ret = callback(div, rule);
        if ( !body ) {
          fakeBody.parentNode.removeChild(fakeBody);
          docElement.style.overflow = docOverflow;
      } else {
          div.parentNode.removeChild(div);
      }

      return !!ret;

    },

    testMediaQuery = function( mq ) {

      var matchMedia = window.matchMedia || window.msMatchMedia;
      if ( matchMedia ) {
        return matchMedia(mq).matches;
      }

      var bool;

      injectElementWithStyles('@media ' + mq + ' { #' + mod + ' { position: absolute; } }', function( node ) {
        bool = (window.getComputedStyle ?
                  getComputedStyle(node, null) :
                  node.currentStyle)['position'] == 'absolute';
      });

      return bool;

     },


    isEventSupported = (function() {

      var TAGNAMES = {
        'select': 'input', 'change': 'input',
        'submit': 'form', 'reset': 'form',
        'error': 'img', 'load': 'img', 'abort': 'img'
      };

      function isEventSupported( eventName, element ) {

        element = element || document.createElement(TAGNAMES[eventName] || 'div');
        eventName = 'on' + eventName;

            var isSupported = eventName in element;

        if ( !isSupported ) {
                if ( !element.setAttribute ) {
            element = document.createElement('div');
          }
          if ( element.setAttribute && element.removeAttribute ) {
            element.setAttribute(eventName, '');
            isSupported = is(element[eventName], 'function');

                    if ( !is(element[eventName], 'undefined') ) {
              element[eventName] = undefined;
            }
            element.removeAttribute(eventName);
          }
        }

        element = null;
        return isSupported;
      }
      return isEventSupported;
    })(),


    _hasOwnProperty = ({}).hasOwnProperty, hasOwnProp;

    if ( !is(_hasOwnProperty, 'undefined') && !is(_hasOwnProperty.call, 'undefined') ) {
      hasOwnProp = function (object, property) {
        return _hasOwnProperty.call(object, property);
      };
    }
    else {
      hasOwnProp = function (object, property) {
        return ((property in object) && is(object.constructor.prototype[property], 'undefined'));
      };
    }


    if (!Function.prototype.bind) {
      Function.prototype.bind = function bind(that) {

        var target = this;

        if (typeof target != "function") {
            throw new TypeError();
        }

        var args = slice.call(arguments, 1),
            bound = function () {

            if (this instanceof bound) {

              var F = function(){};
              F.prototype = target.prototype;
              var self = new F();

              var result = target.apply(
                  self,
                  args.concat(slice.call(arguments))
              );
              if (Object(result) === result) {
                  return result;
              }
              return self;

            } else {

              return target.apply(
                  that,
                  args.concat(slice.call(arguments))
              );

            }

        };

        return bound;
      };
    }

    function setCss( str ) {
        mStyle.cssText = str;
    }

    function setCssAll( str1, str2 ) {
        return setCss(prefixes.join(str1 + ';') + ( str2 || '' ));
    }

    function is( obj, type ) {
        return typeof obj === type;
    }

    function contains( str, substr ) {
        return !!~('' + str).indexOf(substr);
    }

    function testProps( props, prefixed ) {
        for ( var i in props ) {
            var prop = props[i];
            if ( !contains(prop, "-") && mStyle[prop] !== undefined ) {
                return prefixed == 'pfx' ? prop : true;
            }
        }
        return false;
    }

    function testDOMProps( props, obj, elem ) {
        for ( var i in props ) {
            var item = obj[props[i]];
            if ( item !== undefined) {

                            if (elem === false) return props[i];

                            if (is(item, 'function')){
                                return item.bind(elem || obj);
                }

                            return item;
            }
        }
        return false;
    }

    function testPropsAll( prop, prefixed, elem ) {

        var ucProp  = prop.charAt(0).toUpperCase() + prop.slice(1),
            props   = (prop + ' ' + cssomPrefixes.join(ucProp + ' ') + ucProp).split(' ');

            if(is(prefixed, "string") || is(prefixed, "undefined")) {
          return testProps(props, prefixed);

            } else {
          props = (prop + ' ' + (domPrefixes).join(ucProp + ' ') + ucProp).split(' ');
          return testDOMProps(props, prefixed, elem);
        }
    }    tests['flexbox'] = function() {
      return testPropsAll('flexWrap');
    };


    tests['flexboxlegacy'] = function() {
        return testPropsAll('boxDirection');
    };


    tests['canvas'] = function() {
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    };

    tests['canvastext'] = function() {
        return !!(Modernizr['canvas'] && is(document.createElement('canvas').getContext('2d').fillText, 'function'));
    };



    tests['webgl'] = function() {
        return !!window.WebGLRenderingContext;
    };


    tests['touch'] = function() {
        var bool;

        if(('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
          bool = true;
        } else {
          injectElementWithStyles(['@media (',prefixes.join('touch-enabled),('),mod,')','{#modernizr{top:9px;position:absolute}}'].join(''), function( node ) {
            bool = node.offsetTop === 9;
          });
        }

        return bool;
    };



    tests['geolocation'] = function() {
        return 'geolocation' in navigator;
    };


    tests['postmessage'] = function() {
      return !!window.postMessage;
    };


    tests['websqldatabase'] = function() {
      return !!window.openDatabase;
    };

    tests['indexedDB'] = function() {
      return !!testPropsAll("indexedDB", window);
    };

    tests['hashchange'] = function() {
      return isEventSupported('hashchange', window) && (document.documentMode === undefined || document.documentMode > 7);
    };

    tests['history'] = function() {
      return !!(window.history && history.pushState);
    };

    tests['draganddrop'] = function() {
        var div = document.createElement('div');
        return ('draggable' in div) || ('ondragstart' in div && 'ondrop' in div);
    };

    tests['websockets'] = function() {
        return 'WebSocket' in window || 'MozWebSocket' in window;
    };


    tests['rgba'] = function() {
        setCss('background-color:rgba(150,255,150,.5)');

        return contains(mStyle.backgroundColor, 'rgba');
    };

    tests['hsla'] = function() {
            setCss('background-color:hsla(120,40%,100%,.5)');

        return contains(mStyle.backgroundColor, 'rgba') || contains(mStyle.backgroundColor, 'hsla');
    };

    tests['multiplebgs'] = function() {
                setCss('background:url(https://),url(https://),red url(https://)');

            return (/(url\s*\(.*?){3}/).test(mStyle.background);
    };    tests['backgroundsize'] = function() {
        return testPropsAll('backgroundSize');
    };

    tests['borderimage'] = function() {
        return testPropsAll('borderImage');
    };



    tests['borderradius'] = function() {
        return testPropsAll('borderRadius');
    };

    tests['boxshadow'] = function() {
        return testPropsAll('boxShadow');
    };

    tests['textshadow'] = function() {
        return document.createElement('div').style.textShadow === '';
    };


    tests['opacity'] = function() {
                setCssAll('opacity:.55');

                    return (/^0.55$/).test(mStyle.opacity);
    };


    tests['cssanimations'] = function() {
        return testPropsAll('animationName');
    };


    tests['csscolumns'] = function() {
        return testPropsAll('columnCount');
    };


    tests['cssgradients'] = function() {
        var str1 = 'background-image:',
            str2 = 'gradient(linear,left top,right bottom,from(#9f9),to(white));',
            str3 = 'linear-gradient(left top,#9f9, white);';

        setCss(
                       (str1 + '-webkit- '.split(' ').join(str2 + str1) +
                       prefixes.join(str3 + str1)).slice(0, -str1.length)
        );

        return contains(mStyle.backgroundImage, 'gradient');
    };


    tests['cssreflections'] = function() {
        return testPropsAll('boxReflect');
    };


    tests['csstransforms'] = function() {
        return !!testPropsAll('transform');
    };


    tests['csstransforms3d'] = function() {

        var ret = !!testPropsAll('perspective');

                        if ( ret && 'webkitPerspective' in docElement.style ) {

                      injectElementWithStyles('@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}', function( node, rule ) {
            ret = node.offsetLeft === 9 && node.offsetHeight === 3;
          });
        }
        return ret;
    };


    tests['csstransitions'] = function() {
        return testPropsAll('transition');
    };



    tests['fontface'] = function() {
        var bool;

        injectElementWithStyles('@font-face {font-family:"font";src:url("https://")}', function( node, rule ) {
          var style = document.getElementById('smodernizr'),
              sheet = style.sheet || style.styleSheet,
              cssText = sheet ? (sheet.cssRules && sheet.cssRules[0] ? sheet.cssRules[0].cssText : sheet.cssText || '') : '';

          bool = /src/i.test(cssText) && cssText.indexOf(rule.split(' ')[0]) === 0;
        });

        return bool;
    };

    tests['generatedcontent'] = function() {
        var bool;

        injectElementWithStyles(['#',mod,'{font:0/0 a}#',mod,':after{content:"',smile,'";visibility:hidden;font:3px/1 a}'].join(''), function( node ) {
          bool = node.offsetHeight >= 3;
        });

        return bool;
    };
    tests['video'] = function() {
        var elem = document.createElement('video'),
            bool = false;

            try {
            if ( bool = !!elem.canPlayType ) {
                bool      = new Boolean(bool);
                bool.ogg  = elem.canPlayType('video/ogg; codecs="theora"')      .replace(/^no$/,'');

                            bool.h264 = elem.canPlayType('video/mp4; codecs="avc1.42E01E"') .replace(/^no$/,'');

                bool.webm = elem.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,'');
            }

        } catch(e) { }

        return bool;
    };

    tests['audio'] = function() {
        var elem = document.createElement('audio'),
            bool = false;

        try {
            if ( bool = !!elem.canPlayType ) {
                bool      = new Boolean(bool);
                bool.ogg  = elem.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,'');
                bool.mp3  = elem.canPlayType('audio/mpeg;')               .replace(/^no$/,'');

                                                    bool.wav  = elem.canPlayType('audio/wav; codecs="1"')     .replace(/^no$/,'');
                bool.m4a  = ( elem.canPlayType('audio/x-m4a;')            ||
                              elem.canPlayType('audio/aac;'))             .replace(/^no$/,'');
            }
        } catch(e) { }

        return bool;
    };


    tests['localstorage'] = function() {
        try {
            localStorage.setItem(mod, mod);
            localStorage.removeItem(mod);
            return true;
        } catch(e) {
            return false;
        }
    };

    tests['sessionstorage'] = function() {
        try {
            sessionStorage.setItem(mod, mod);
            sessionStorage.removeItem(mod);
            return true;
        } catch(e) {
            return false;
        }
    };


    tests['webworkers'] = function() {
        return !!window.Worker;
    };


    tests['applicationcache'] = function() {
        return !!window.applicationCache;
    };


    tests['svg'] = function() {
        return !!document.createElementNS && !!document.createElementNS(ns.svg, 'svg').createSVGRect;
    };

    tests['inlinesvg'] = function() {
      var div = document.createElement('div');
      div.innerHTML = '<svg/>';
      return (div.firstChild && div.firstChild.namespaceURI) == ns.svg;
    };

    tests['smil'] = function() {
        return !!document.createElementNS && /SVGAnimate/.test(toString.call(document.createElementNS(ns.svg, 'animate')));
    };


    tests['svgclippaths'] = function() {
        return !!document.createElementNS && /SVGClipPath/.test(toString.call(document.createElementNS(ns.svg, 'clipPath')));
    };

    function webforms() {
                                            Modernizr['input'] = (function( props ) {
            for ( var i = 0, len = props.length; i < len; i++ ) {
                attrs[ props[i] ] = !!(props[i] in inputElem);
            }
            if (attrs.list){
                                  attrs.list = !!(document.createElement('datalist') && window.HTMLDataListElement);
            }
            return attrs;
        })('autocomplete autofocus list placeholder max min multiple pattern required step'.split(' '));
                            Modernizr['inputtypes'] = (function(props) {

            for ( var i = 0, bool, inputElemType, defaultView, len = props.length; i < len; i++ ) {

                inputElem.setAttribute('type', inputElemType = props[i]);
                bool = inputElem.type !== 'text';

                                                    if ( bool ) {

                    inputElem.value         = smile;
                    inputElem.style.cssText = 'position:absolute;visibility:hidden;';

                    if ( /^range$/.test(inputElemType) && inputElem.style.WebkitAppearance !== undefined ) {

                      docElement.appendChild(inputElem);
                      defaultView = document.defaultView;

                                        bool =  defaultView.getComputedStyle &&
                              defaultView.getComputedStyle(inputElem, null).WebkitAppearance !== 'textfield' &&
                                                                                  (inputElem.offsetHeight !== 0);

                      docElement.removeChild(inputElem);

                    } else if ( /^(search|tel)$/.test(inputElemType) ){
                                                                                    } else if ( /^(url|email)$/.test(inputElemType) ) {
                                        bool = inputElem.checkValidity && inputElem.checkValidity() === false;

                    } else {
                                        bool = inputElem.value != smile;
                    }
                }

                inputs[ props[i] ] = !!bool;
            }
            return inputs;
        })('search tel url email datetime date month week time datetime-local number range color'.split(' '));
        }
    for ( var feature in tests ) {
        if ( hasOwnProp(tests, feature) ) {
                                    featureName  = feature.toLowerCase();
            Modernizr[featureName] = tests[feature]();

            classes.push((Modernizr[featureName] ? '' : 'no-') + featureName);
        }
    }

    Modernizr.input || webforms();


     Modernizr.addTest = function ( feature, test ) {
       if ( typeof feature == 'object' ) {
         for ( var key in feature ) {
           if ( hasOwnProp( feature, key ) ) {
             Modernizr.addTest( key, feature[ key ] );
           }
         }
       } else {

         feature = feature.toLowerCase();

         if ( Modernizr[feature] !== undefined ) {
                                              return Modernizr;
         }

         test = typeof test == 'function' ? test() : test;

         if (typeof enableClasses !== "undefined" && enableClasses) {
           docElement.className += ' ' + (test ? '' : 'no-') + feature;
         }
         Modernizr[feature] = test;

       }

       return Modernizr;
     };


    setCss('');
    modElem = inputElem = null;

    ;(function(window, document) {
                var version = '3.7.0';

            var options = window.html5 || {};

            var reSkip = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i;

            var saveClones = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i;

            var supportsHtml5Styles;

            var expando = '_html5shiv';

            var expanID = 0;

            var expandoData = {};

            var supportsUnknownElements;

        (function() {
          try {
            var a = document.createElement('a');
            a.innerHTML = '<xyz></xyz>';
                    supportsHtml5Styles = ('hidden' in a);

            supportsUnknownElements = a.childNodes.length == 1 || (function() {
                        (document.createElement)('a');
              var frag = document.createDocumentFragment();
              return (
                typeof frag.cloneNode == 'undefined' ||
                typeof frag.createDocumentFragment == 'undefined' ||
                typeof frag.createElement == 'undefined'
              );
            }());
          } catch(e) {
                    supportsHtml5Styles = true;
            supportsUnknownElements = true;
          }

        }());

            function addStyleSheet(ownerDocument, cssText) {
          var p = ownerDocument.createElement('p'),
          parent = ownerDocument.getElementsByTagName('head')[0] || ownerDocument.documentElement;

          p.innerHTML = 'x<style>' + cssText + '</style>';
          return parent.insertBefore(p.lastChild, parent.firstChild);
        }

            function getElements() {
          var elements = html5.elements;
          return typeof elements == 'string' ? elements.split(' ') : elements;
        }

            function getExpandoData(ownerDocument) {
          var data = expandoData[ownerDocument[expando]];
          if (!data) {
            data = {};
            expanID++;
            ownerDocument[expando] = expanID;
            expandoData[expanID] = data;
          }
          return data;
        }

            function createElement(nodeName, ownerDocument, data){
          if (!ownerDocument) {
            ownerDocument = document;
          }
          if(supportsUnknownElements){
            return ownerDocument.createElement(nodeName);
          }
          if (!data) {
            data = getExpandoData(ownerDocument);
          }
          var node;

          if (data.cache[nodeName]) {
            node = data.cache[nodeName].cloneNode();
          } else if (saveClones.test(nodeName)) {
            node = (data.cache[nodeName] = data.createElem(nodeName)).cloneNode();
          } else {
            node = data.createElem(nodeName);
          }

                                                    return node.canHaveChildren && !reSkip.test(nodeName) && !node.tagUrn ? data.frag.appendChild(node) : node;
        }

            function createDocumentFragment(ownerDocument, data){
          if (!ownerDocument) {
            ownerDocument = document;
          }
          if(supportsUnknownElements){
            return ownerDocument.createDocumentFragment();
          }
          data = data || getExpandoData(ownerDocument);
          var clone = data.frag.cloneNode(),
          i = 0,
          elems = getElements(),
          l = elems.length;
          for(;i<l;i++){
            clone.createElement(elems[i]);
          }
          return clone;
        }

            function shivMethods(ownerDocument, data) {
          if (!data.cache) {
            data.cache = {};
            data.createElem = ownerDocument.createElement;
            data.createFrag = ownerDocument.createDocumentFragment;
            data.frag = data.createFrag();
          }


          ownerDocument.createElement = function(nodeName) {
                    if (!html5.shivMethods) {
              return data.createElem(nodeName);
            }
            return createElement(nodeName, ownerDocument, data);
          };

          ownerDocument.createDocumentFragment = Function('h,f', 'return function(){' +
                                                          'var n=f.cloneNode(),c=n.createElement;' +
                                                          'h.shivMethods&&(' +
                                                                                                                getElements().join().replace(/[\w\-]+/g, function(nodeName) {
            data.createElem(nodeName);
            data.frag.createElement(nodeName);
            return 'c("' + nodeName + '")';
          }) +
            ');return n}'
                                                         )(html5, data.frag);
        }

            function shivDocument(ownerDocument) {
          if (!ownerDocument) {
            ownerDocument = document;
          }
          var data = getExpandoData(ownerDocument);

          if (html5.shivCSS && !supportsHtml5Styles && !data.hasCSS) {
            data.hasCSS = !!addStyleSheet(ownerDocument,
                                                                                'article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}' +
                                                                                    'mark{background:#FF0;color:#000}' +
                                                                                    'template{display:none}'
                                         );
          }
          if (!supportsUnknownElements) {
            shivMethods(ownerDocument, data);
          }
          return ownerDocument;
        }

            var html5 = {

                'elements': options.elements || 'abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video',

                'version': version,

                'shivCSS': (options.shivCSS !== false),

                'supportsUnknownElements': supportsUnknownElements,

                'shivMethods': (options.shivMethods !== false),

                'type': 'default',

                'shivDocument': shivDocument,

                createElement: createElement,

                createDocumentFragment: createDocumentFragment
        };

            window.html5 = html5;

            shivDocument(document);

    }(this, document));

    Modernizr._version      = version;

    Modernizr._prefixes     = prefixes;
    Modernizr._domPrefixes  = domPrefixes;
    Modernizr._cssomPrefixes  = cssomPrefixes;

    Modernizr.mq            = testMediaQuery;

    Modernizr.hasEvent      = isEventSupported;

    Modernizr.testProp      = function(prop){
        return testProps([prop]);
    };

    Modernizr.testAllProps  = testPropsAll;


    Modernizr.testStyles    = injectElementWithStyles;
    Modernizr.prefixed      = function(prop, obj, elem){
      if(!obj) {
        return testPropsAll(prop, 'pfx');
      } else {
            return testPropsAll(prop, obj, elem);
      }
    };


    docElement.className = docElement.className.replace(/(^|\s)no-js(\s|$)/, '$1$2') +

                                                    (enableClasses ? ' js ' + classes.join(' ') : '');

    return Modernizr;

})(this, this.document);
/*yepnope1.5.4|WTFPL*/
(function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}})(this,document);
Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0));};
;
var sliding_speed = 500,
    sl_progress = true,
    short = false,
    reinittimeout,
    grid,
    gallery,
    presentation;

//yepnope.injectCss(['dev/component/odometer/themes/odometer-theme-minimal.css']);

if (Modernizr.touch) {
    sliding_speed = 500;
    short = true;
    console.log("short");
//    sl_progress = false;
}

//yepnope({
//    test: Modernizr.touch,
//    yep: 'assets/js/app/fastclick.js',
//    callback: function (url, result, key) {
//        FastClick.attach(document.body);
//        console.log("load fastclick 1");
//    },
//    complete: function () {
//    }
//});

window.onload = function () {
    console.log('wl');
}


var c_page_id,
    c_page_index,
    l_page_id,
    l_page_index;


yepnope([
    {
        load: {
            'jquery': '' + '/assets/js/app/jquery.js',
            'ipreload': '' + '/assets/js/app/ipreload.js',
            'ilightbox': '' + '/assets/js/app/ilightbox.js',
//            'llxt': ''+'/assets/js/app/llxt.js',
//            'llxtbg': ''+'/assets/js/app/llxtbg.js',
            'shuffle': '' + '/assets/js/app/shuffle.js',
            'swiper': '' + '/assets/js/app/swiper.js',
//            'swiper_progress': ''+'/assets/js/app/swiper-progress.js',
        },
        callback: {

            'jquery': function (url, result, key) {


//                setTimeout(
//                    function(){$("#main-loader").removeClass("loading");
//                        $(".line-top,.line-bottom,.line-left,.line-right").addClass("aframe");
//                        setTimeout(function(){
//                            $("#main-loader").css("display","none");
//                        },300);
//                }, 10);

                $(function() {
                    $('a').bind('click', function(event) {
                        var $anchor = $(this);
                        $('html, body').stop().animate({
                            scrollTop: $($anchor.attr('href')).offset().top
                        }, 500);
                        event.preventDefault();
                    });
                });

                $(function () {

//                    $(".no-touch a[attr-bgorig]").on("mouseenter",function(){
//                        $("#body-bg").css('background-image', 'url(' + $(this).attr("attr-bgorig") + ')');
//                    });
//                    $(".no-touch a[attr-bgorig]").on("mouseleave",function(){
//                        $("#body-bg").css('background-image', 'none');
//                    });


//                    var tpt = $('#top-panel').offset().top + $('#top-panel').height();
                    var scrollTimeout;
                    var lastoffset = 0;
                    $(window).scroll(function () {
                        if (scrollTimeout) {
                            clearTimeout(scrollTimeout);
                            scrollTimeout = null;
                        }
                        scrollTimeout = setTimeout(scrollHandler, 0);
                    });

                    scrollHandler = function () {
                        var thisoffset = $(window).scrollTop();
                        if (thisoffset >= 640) {
                            $("body:not(.toup)").addClass("toup");
                        } else {
                            $("body.toup").removeClass("toup");
                        }
                    };


                    $('a[href*=#]:not([href=#])').click(function () {
                        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                            return false;
                            if (target.length) {
                                $('html,body').animate({
                                    scrollTop: target.offset().top
                                }, 1000);
                                return false;
                            }
                        }
                    });
//
//                    function changebg(img, mutator_class) {
//                        if (mutator_class != undefined) {
//                            $("#body-bg").addClass(mutator_class);
//                        }
//                        else {
//                            $("#body-bg").removeClass('mutator-bg-dark');
//                        }
//                        $("#slide-bg").css({
//                            "background-image": "url(" + img + ")",
//                        });
//                    }

                    $('#menu-opener').on("click", function (e) {
                        console.log("open menu");
                        $(".overlay").addClass("open");
                    });

                    $('button.overlay-close').on("click", function (e) {
                        console.log("open menu");
                        $(".overlay").removeClass("open");
                    });


                });
            },

//
            'ipreload': function (url, result, key) {
                console.log("ipreload");
////                $('[data-src]').preload(function(){
////                    console.log("images loaded");
////                    setTimeout(function () {
////                        $("#main-loader").addClass("removed");
////                    },1000);
////                });
//                var im = $("body").find("[data-src]");
//                    var preloaded = 0,
//                    started = false;
//
//                $.preload(im, 1, function () {
//                    preloaded++;
//                    console.log($(this).data("src"));
//                    $(this).css("background-image",'url(' + $(this).data("src") + ')');
//                    if ((preloaded > 3 || preloaded > im.length/2) && !started) {
//                        started = true;
//                        console.log("GO");

//                    }
//                });
            },

            'ilightbox': function (url, result, key) {

                var activityIndicatorOn = function () {
                        $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
                    },
                    activityIndicatorOff = function () {
                        $('#imagelightbox-loading').remove();
                    },
                    overlayOn = function () {
                        $('<div id="imagelightbox-overlay"></div>').appendTo('body');
                    },
                    overlayOff = function () {
                        $('#imagelightbox-overlay').remove();
                    },
                    closeButtonOn = function (instance) {
                        $('<a href="#" id="imagelightbox-close">Close</a>').appendTo('body').on('click', function () {
                            $(this).remove();
                            instance.quitImageLightbox();
                            return false;
                        });
                    },
                    closeButtonOff = function () {
                        $('#imagelightbox-close').remove();
                    },
                    navigationOn = function (instance, selector) {
                        var images = $(selector);
                        if (images.length) {
                            var nav = $('<div id="imagelightbox-nav"></div>');
                            for (var i = 0; i < images.length; i++)
                                nav.append('<a href="#"></a>');

                            nav.appendTo('body');
                            nav.on('click touchend', function () {
                                return false;
                            });

                            var navItems = nav.find('a');
                            navItems.on('click touchend', function () {
                                var $this = $(this);
                                if (images.eq($this.index()).attr('href') != $('#imagelightbox').attr('src'))
                                    instance.switchImageLightbox($this.index());

                                navItems.removeClass('active');
                                navItems.eq($this.index()).addClass('active');

                                return false;
                            })
                                .on('touchend', function () {
                                    return false;
                                });
                        }
                    },
                    navigationUpdate = function (selector) {
                        var items = $('#imagelightbox-nav a');
                        items.removeClass('active');
                        items.eq($(selector).filter('[href="' + $('#imagelightbox').attr('src') + '"]').index(selector)).addClass('active');
                    },
                    navigationOff = function () {
                        $('#imagelightbox-nav').remove();
                    };


                $('a[rel="imagelightbox"]').imageLightbox(
                    {
                        onStart: function () {
                            overlayOn();
                            gallery.stopAutoplay();
                        },
                        onLoadStart: function () {
                            activityIndicatorOn();
                        },
                        onLoadEnd: function () {
                            activityIndicatorOff();
                            console.log("END");
                            setTimeout($("#imagelightbox").css('-webkit-transform', ''),1500);


                        },
                        onEnd: function () {
                            activityIndicatorOff();
                            overlayOff();
                        }
                    });

            },

            'shuffle': function (url, result, key) {
                console.log("shuffle");
                grid = $('#shuffle');

                grid.shuffle({
                    itemSelector: '.item', // the selector for the items in the grid
//                    sizer: '#shuffle_sizer',
                    sizer: null,
                    group: 'all', // Filter group
                    speed: 150, // Transition/animation speed (milliseconds)
                    easing: 'linear', // css easing function to use
                    itemSelector: '', // e.g. '.picture-item'
//                    sizer: null, // sizer element. Can be anything columnWidth is
                    gutterWidth: 0, // a static number or function that tells the plugin how wide the gutters between columns are (in pixels)
                    columnWidth: 0, // a static number or function that returns a number which tells the plugin how wide the columns are (in pixels)
                    delimeter: null, // if your group is not json, and is comma delimeted, you could set delimeter to ','
                    buffer: 0, // useful for percentage based heights when they might not always be exactly the same (in pixels)
                    initialSort: null, // Shuffle can be initialized with a sort object. It is the same object given to the sort method
                    throttle: $.throttle || null, // By default, shuffle will try to throttle the resize event. This option will change the method it uses
                    throttleTime: 300, // How often shuffle can be called on resize (in milliseconds)
                    sequentialFadeDelay: 150, // Delay between each item that fades in when adding items
                    supported: Modernizr.csstransforms && Modernizr.csstransitions // supports transitions and transforms
                });
                $('#filter a').click(function (e) {
                    e.preventDefault();

                    // set active class
                    $('#filter a').removeClass('active');
                    $(this).addClass('active');

                    // get group name from clicked item
                    var groupName = $(this).attr('data-group');

                    // reshuffle grid
                    grid.shuffle('shuffle', groupName);
                });
            },

            'swiper': function (url, result, key) {

                setTimeout(function () {
                    $("#main-loader").addClass("removed");
                }, 1500);

//                function fader(el) {
//                    el.fadeIn(100);
//                    setTimeout(function () {
//                        el.fadeOut(500);
//                    }, 600);
//                    return true;
//                }

                if ($("body").find(".photos").length > 0) {
                    var photos = new Swiper('.photos .swiper-container', {
                        resizeReInit: true,
                        mode: 'horizontal',
                        slidesPerView: '1.7',
//                        loop: true,
                        centeredSlides: true,
                        onSwiperCreated: function (swiper) {
                            swiper.stopAutoplay();
                        },
                        onFirstInit: function (swiper) {
                            $(".slide-counter-page>#t-slide").text(swiper.slides.length);
                            $(".slide-counter-page>#c-slide").text(swiper.activeIndex + 1);
                            var i = swiper.activeIndex;
                            if (i == 0) {
                                console.log("first");
                            }
                        },
                        onSlideChangeEnd: function (swiper) {

                            var i = swiper.activeIndex;
                            $(".slide-counter-page>#c-slide").text(i + 1);
//                            $(".photos").find(".slide-counter").addClass('element-animation',function(){
//                                console.log("add");
//                            });
                            fader($(".slide-counter"));

                            console.log(i, swiper.slides.length);
                            if (i >= swiper.slides.length - 1) {
                                console.log("last");
                                $(".swiper-container .ui-arrow-next").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-next").show(0);
                            }
                            if (i == 0) {
                                console.log("first");
                                $(".swiper-container .ui-arrow-prev").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-prev").show(0);
                            }
                        },
                    });

                    $(".swiper-container .ui-arrow-next").on("click", function () {
                        photos.swipeNext();
                    });
                    $(".swiper-container .ui-arrow-prev").on("click", function () {
                        photos.swipePrev();
                    });
                }

                if ($("body").find(".photos-wide").length > 0) {
                    gallery = new Swiper('.photos-wide .swiper-container', {
                        mode: 'horizontal',
//                        slidesPerViewFit: 2,
                        loop: false,
                        centeredSlides: true,
                        initialSlide: 0,
                        speed: 1000,//sliding_speed,
                        autoplay: 5000,
                        autoplayDisableOnInteraction: true,
                        shortSwipes: true,
//                        offsetPxBefore: 380,
                        resizeReInit: true, // на сколько я понимаю этот параметр не учитывается [1]
                        createPagination: true,
                        onSlideClick: function (swiper) {
                            var act = swiper.clickedSlide;
                            console.log(act);
                            if (!act.isActive()) {
                                swiper.swipeTo(swiper.clickedSlideIndex);
                            }
                        },

                        onSwiperCreated: function (swiper) {
                            swiper.stopAutoplay();
                        },
                        onFirstInit: function (swiper) {
                            console.log("first init wide");

                            $(".photos-wide").addClass("inited");
//                            $(".slide-counter-page>#t-slide").text(swiper.slides.length);
//                            $(".slide-counter-page>#c-slide").text(swiper.activeIndex+1);
//                            var i = swiper.activeIndex;
//                            if(i == 0){
//                                console.log("first");
//                            }
                        },
                        onSlideClick: function (swiper) {
                            console.log(swiper.clickedSlideIndex);
//                            swiper.params.slidesPerView = 1.7;
//                            swiper.reInit();
                        },
                        onSlideChangeEnd: function (swiper) {

                            var i = swiper.activeIndex;
//                            $(".slide-counter-page>#c-slide").text(i+1);
////                            $(".photos").find(".slide-counter").addClass('element-animation',function(){
////                                console.log("add");
////                            });
//                            fader($(".slide-counter"));

                            console.log(i, swiper.slides.length);
                            if (i >= swiper.slides.length - 1) {
                                console.log("last");
                                $(".swiper-container .ui-arrow-next").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-next").show(0);
                            }
                            if (i == 0) {
                                console.log("first");
                                $(".swiper-container .ui-arrow-prev").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-prev").show(0);
                            }
                        }
                    });

                    $(".swiper-container .ui-arrow-next").on("click", function () {
                        gallery.swipeNext();
                    });
                    $(".swiper-container .ui-arrow-prev").on("click", function () {
                        gallery.swipePrev();
                    });

                }

                if ($("body").find("#presentation").length > 0) {
                    presentation = new Swiper('#main-swiper', {
                        mode: 'horizontal',
                        slidesPerViewFit: false,
                        loop: true,
                        centeredSlides: true,
                        initialSlide: 0,
                        speed: sliding_speed,
                        autoplay: 5000,
                        autoplayDisableOnInteraction: true,
                        shortSwipes: true,
//                        offsetPxBefore: 380,
                        resizeReInit: true, // на сколько я понимаю этот параметр не учитывается [1]
                        pagination: "#paging",
                        createPagination: true,
                        paginationClickable: true,
                        onSwiperCreated: function (swiper) {
                            swiper.stopAutoplay();
                        },
                        onSlideClick: function (swiper) {
                            var act = swiper.clickedSlide;
                            console.log(act);
                            if (!act.isActive()) {
                                swiper.swipeTo(swiper.clickedSlideIndex);
                            }
                        },
                        onFirstInit: function (swiper) {
                            console.log("first init wide");
                        },

                    });
                    $("#presentation-next").on("click", function () {
                        presentation.swipeNext();
                    });
                    $("#presentation-prev").on("click", function () {
                        presentation.swipePrev();
                    });

                }


            },


        }
    }
]

);