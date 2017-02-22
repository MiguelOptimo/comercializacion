/**
 * https://cmatskas.com/getting-started-with-typescript-and-sublime-text/
 *
 * Ctrl+Shft+P -> Typescript: ShowErrorList
 * Rename =>    Ctrl+T Ctrl+M  
 * Find references =>    Ctrl+T Ctrl+R  
 * Next reference =>    Ctrl+T Ctrl+N  
 * Prev reference =>    Ctrl+T Ctrl+P  
 * Format document =>    Ctrl+T Ctrl+F  
 * Format selection =>    Ctrl+T Ctrl+F  
 * Format line =>    Ctrl+;  
 * Format braces =>    Ctrl+Shift ]  
 * Navigate to symbol =>    Ctrl+ Alt R  
 * Go to definition =>    Ctrl+T Ctrl+D or F12  
 * Paste and format =>    Ctrl+V or Command+V  
 * Quick info =>    Ctrl+T Ctrl+Q  
 * Build    (Win)Ctrl+B or F7, (OSX) Command+B or F7  
 * Error list =>    (via Command Palette)
 * */
//"use strict";
/// <reference path="jquery/jquery.d.ts" />
if(typeof _site_url === "undefined") {
  /*
   *  // This article:
   *  // http://stackoverflow.com/questions/21246818/how-to-get-the-base-url-in-javascript
   *  
   *  var base_url = window.location.origin;
   *  // "http://stackoverflow.com"
   *  
   *  var host = window.location.host;
   *  // stackoverflow.com
   *  
   *  var pathArray = window.location.pathname.split( '/' );
   *  // ["", "questions", "21246818", "how-to-get-the-base-url-in-javascript"]
   * */
  var _site_url : string;
  _site_url = window.location.origin;
}


/**
 *  Autoajustar a alto de pantalla
 */
jQuery( document ).ready(function( $ ) {

  resizeContent();

  $(window).resize(function() {
      console.log("$(window).resize(function(){}");
      resizeContent();
  });


});

//  str.replace("Microsoft", "W3Schools");
function clearString(str: string) {
  str = (str + "").replace("$","");
  str = str.replace(",","");
  str = str.replace(/^\s+|\s+$/gm,'');
  return str;
}

function getMethods(obj){
    var res = [];
    for(var m in obj) {
        if(typeof obj[m] == "function") {
            res.push(m)
        }
    }
    return res;
}

function resizeContent() {
    var _height : number;
    _height = $(window).height();
    if($('.full_height').length ){
      $('.full_height').height(_height);
    }
}

function _window_modal_height(){
    var _height = Math.round( $(window).height() / 4 * 3 );
    return _height;
}
function _window_modal_width(){
    var _width = Math.round( $(window).width() / 4 * 3 );
    return _width;
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function round (value : number , precision : number, mode? : string) {
  //  discuss at: http://phpjs.org/functions/round/
  // original by: Philip Peterson
  //  revised by: Onno Marsman
  //  revised by: T.Wild
  //  revised by: Rafał Kukawski (http://blog.kukawski.pl/)
  //    input by: Greenseed
  //    input by: meo
  //    input by: William
  //    input by: Josep Sanz (http://www.ws3.es/)
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  //        note: Great work. Ideas for improvement:
  //        note: - code more compliant with developer guidelines
  //        note: - for implementing PHP constant arguments look at
  //        note: the pathinfo() function, it offers the greatest
  //        note: flexibility & compatibility possible
  //   example 1: round(1241757, -3);
  //   returns 1: 1242000
  //   example 2: round(3.6);
  //   returns 2: 4
  //   example 3: round(2.835, 2);
  //   returns 3: 2.84
  //   example 4: round(1.1749999999999, 2);
  //   returns 4: 1.17
  //   example 5: round(58551.799999999996, 2);
  //   returns 5: 58551.8

  var m, f, isHalf, sgn : number; // helper variables
  // making sure precision is integer
  precision |= 0;
  m = Math.pow(10, precision);
  value *= m;
  // sign of the number
  if(value > 0){
    sgn = 1;
  }
  else{
    sgn = -1;
  }
  //  sgn = (value > 0) | -(value < 0);
  isHalf = value % 1 === 0.5 * sgn;
  f = Math.floor(value);

  if (isHalf) {
    switch (mode) {
      case 'PHP_ROUND_HALF_DOWN':
      // rounds .5 toward zero
        value = f + (sgn < 0)
        break
      case 'PHP_ROUND_HALF_EVEN':
      // rouds .5 towards the next even integer
        value = f + (f % 2 * sgn)
        break
      case 'PHP_ROUND_HALF_ODD':
      // rounds .5 towards the next odd integer
        value = f + !(f % 2)
        break
      default:
      // rounds .5 away from zero
        value = f + (sgn > 0)
    }
  }

  return (isHalf ? value : Math.round(value)) / m
}

function toFloat(val : string) {
    var output : number;
    if (val == ""){
      return 0;
    }
    if(val == null){
        return 0;
    }
    if(val == "null"){
        return 0;
    }
    if(val == "undefined"){
        return 0;
    }

    val = (val + "").replace(",", "");
    val = val.replace(" ", "");

    if (val.indexOf(',') !== -1){
        val.replace(',', '');
    }
    if (val.indexOf(',') !== -1){
        val.replace(',', '');
    }
    if (val.indexOf(',') !== -1){
        val.replace(',', '');
    }
    output = parseFloat(val);
    return output;
}

function toMoney( val : string ){
  var valueToFloat : number;
    valueToFloat = toFloat( val );
    return round( valueToFloat, 2 );
}

function clearFileName(filename){
  return (filename.replace(/\s/g,"_"));
}

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function applyEditable(){
      console.log("applyEditable();");
      $('.editable').editable({
        success: function(response, newValue) {
          var name             = $(this).data('name');
          var pk               = $(this).data('pk');
          var callbackfunction = $(this).data('callbackfunction');
          console.log(response);
          if( isset( callbackfunction ) ){
            if (typeof window[callbackfunction] === "function") {
              window[callbackfunction](name,newValue,pk); //To call the function dynamically!
            }
                else{
                  console.log(callbackfunction + ' no es una funcion:'+typeof(callbackfunction));
                }
          }
          else{
            callbackfunction = 'callback_function';
            if (typeof window[callbackfunction] === "function") {
              //  Invocar funcion predeterminada en caso de existir
              var output = window[callbackfunction](name,newValue,pk);
              if(output != ""){
                console.log("callbackfunction retornó:" + output);
                newValue = output;
              }
            }
          }

          if(response.status == 'success') {
            return newValue;
          }
          else{
            return response.msg
          }
        },
        display: function(value) {
          var format = $(this).data("format");
          var output = clearString(value);
          console.log("---------------------------------");
          console.log("Format:" + $(this).data("format"));
          console.log("---------------------------------");
          switch(format){
            case "money":
              output = toMoney( output );
              output = output.formatMoney(2);
              break;
            default:
              break;
          }
            $(this).html( output ); 
        },
        error: function(errors) {
          var msg = '';
          if(errors && errors.responseText) { //ajax error, errors = xhr object
                   msg = errors.responseText;
          } else { //validation error (client-side or server-side)
            $.each(errors, function(k, v) { msg += k+": "+v+"<br>"; });
          } 
          //$('#msg').removeClass('alert-success').addClass('alert-error').html(msg).show();
          console.log( msg );
        },
        validate: function(value) {
          var name = $(this).data('name');
          value = $.trim(value);
          var callbackfunction = $(this).data('validatefunction');
          if( isset( callbackfunction ) ){
            if (typeof window[callbackfunction] === "function") {
               // Ejecutar funcion enviada como parametro
              return window[callbackfunction](name,value);
            }
                else{
                  console.log(callbackfunction + ' no es una funcion:'+typeof(callbackfunction));
                }
          }
          else{
            callbackfunction = 'callback_validate';
            if (typeof window[callbackfunction] === "function") {
              //  Invocar funcion predeterminada en caso de existir
              return window[callbackfunction](name,value);
            }
          }
        }
      });

}

function ShowPaneLeft( pageToLoad /* ,args */ ){
  var callbackfunction = function(){ console.log('Call to funcToExecute();'); };
  var title = 'Informaci&oacute;n';
  var text = '';
  var position = 'right';
  var _layout_container = $(".ui-layout-east");
  var controller = '';
  var primaryKey = '';

  if(arguments.length == 1){
    args = arguments[0];
  }
  else{
    if(arguments.length == 2){
        if( typeof(arguments[1]) == 'object' ){
            args = arguments[1];
        }
    }    
  }

  if( typeof(args) == 'object' ){
      if( isset(args['title']) == true){
        title = args['title'];
      }
      if( isset(args['text']) == true){
        text = args['text'];
      }
      if( isset(args['primaryKey']) == true){
        primaryKey = args['primaryKey'];
        /**
         *  Convertir a MD5 en caso de haber pasado una clave sin encriptar
         * */
        if(primaryKey.length != 32){
          primaryKey=md5(primaryKey);
        }
      }
      if( isset(args['controller']) == true){
        controller = args['controller'];

        pageToLoad = _site_url + "/"+controller+"/upd/"+primaryKey+"/?issingle=true&timestamp="+$.now() ;
      }
      if( isset(args['callback']) == true){
        callbackfunction = args['callback'];
        console.log( "typeof(callbackfunction): " + typeof(callbackfunction) );
      }
      if( isset(args['url']) == true){
        pageToLoad = args['url'];
      }
  }
  else{
    pageToLoad = args;    
  }

  _layout_container.html( '<div class="spinner"></div>' );
  //window.location.href = _site_url +"/" + _option_controller_ + "/upd/"+md5(_datatable_row_id_);
  _layout_container.load(pageToLoad, function(){
    /**
     *  EDITAR EN LINEA LOS ELEMENTOS ToDo
     * */
    //$.getScript( _site_url + "/layout/view-inline-edit.js?timestamp="+$.now(), function( data, textStatus, jqxhr ) {});
    //callbackfunction();
    applyEditable();
  });
}

function ShowDialogSlide( pageToLoad /* ,args */ ){
  var callbackfunction = function(){ console.log('Call to funcToExecute();'); };
  var title = 'Informaci&oacute;n';
  var text = '';
  var position = 'right';
  var _modal = $("#ModalRight");

  if(arguments.length == 1){
    args = arguments[0];
  }
  else{
    if(arguments.length == 2){
        if( typeof(arguments[1]) == 'object' ){
            args = arguments[1];
        }
    }    
  }

  if( typeof(args) == 'object' ){
      if( isset(args['title']) == true){
        title = args['title'];
      }
      if( isset(args['text']) == true){
        text = args['text'];
      }
      if( isset(args['callback']) == true){
        callbackfunction = args['callback'];
        console.log( "typeof(callbackfunction): " + typeof(callbackfunction) );
      }
      if( isset(args['url']) == true){
        pageToLoad = args['url'];
      }
  }
  else{
    pageToLoad = args;    
  }

  if(position != 'right'){
    _modal = $("#ModalLeft");
  }

  _modal.find('.modal-title').text( html_entity_decode(title) );
  var _modal_body = _modal.find('.modal-body');
  // isset
  _modal_body.html( '<div class="spinner"></div>' );

  _modal.modal('show');

  _modal_body.load(pageToLoad, function(){
    /**
     *  EDITAR EN LINEA LOS ELEMENTOS ToDo
     * */
    //$.getScript( _site_url + "/layout/view-inline-edit.js?timestamp="+$.now(), function( data, textStatus, jqxhr ) {});
    callbackfunction();
  });

}

function ShowDialog( url /* ,funcToExecute */ ){
    var funcToExecute = function(){ console.log('Call to funcToExecute();'); };

    console.log( url );

    if(arguments.length == 2){
        if( typeof(arguments[1]) == 'function' ){
            funcToExecute = arguments[1];
        }
    }
    console.log( "typeof(funcToExecute): " + typeof(funcToExecute) );

    BootstrapDialog.show({
        size: BootstrapDialog.SIZE_WIDE,
        message: function(dialog) {
            //var $message = $('<div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>');
            var _spinner_id_     = $.now();
            //var $message         = $('<div class="spinner" id="'+_spinner_id_+'"></div>');
            var $message         = $('<div></div>');
            var pageToLoad       = dialog.getData( 'pageToLoad' );
            var callbackfunction = dialog.getData( 'callbackfunction' );

            $message.load(pageToLoad, function(){
                callbackfunction();
                $('#'+_spinner_id_).removeClass('spinner');
            });
            return $message;
        },
        data: {
            'pageToLoad': url,
            'callbackfunction': funcToExecute
        },
        buttons: [
            {
                label: 'Cerrar',
                cssClass: 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
            }
        ]
    });
}

function ShowDialogView(/* option_controller, option_primaryKey, option_callback_grid */){
  var option_controller    = "blank";
  var option_primaryKey    = "";
  var option_callback_grid = "";

  if(arguments.length > 0){
    if(arguments.length == 1){
      option_controller = arguments[0];
    }
    if(arguments.length == 2){
      option_controller = arguments[0];
      option_primaryKey = arguments[1];
    }
    if(arguments.length === 3){
      option_controller = arguments[0];
      option_primaryKey = arguments[1];
      option_callback_grid = arguments[2];
    }
  }
  console.log("ShowDialogView("+option_controller+","+option_primaryKey+")");

  if(option_primaryKey == '' || option_primaryKey == 0){
    return true;
  }
  /**
   *  Convertir a MD5 en caso de haber pasado una clave sin encriptar
   * */
  if(option_primaryKey.length != 32){
    option_primaryKey=md5(option_primaryKey);
  }
  var url = _site_url + "/index/blank" ;
  var url = _site_url + "/"+option_controller+"/upd/"+option_primaryKey+"/?issingle=true&timestamp="+$.now() ;
  //console.log(url);return true;
  ShowDialogSlide(url, {
    callback: function(){ console.log('-- Ventana mostrada: '+$.now()+' ---'); },
    url: url,
    position: 'right'
  });

}


var callbackfunction_updateInline;
function updateInline(controller,name,value,pk /* ,callbackfunction */ ){
  console.log('updateInline('+controller+','+name+','+value+','+pk+');');
  var url = _site_url + '/'+controller+'/updateInline?name='+name+'&value='+value+'&pk='+pk+'&timestamp='+$.now() ;
  var callbackfunction_updateInline = '';
      
    if(arguments.length == 5){
      console.log('Argumento asignado');
          callbackfunction_updateInline = arguments[5];
    }
      var jqxhr  = $.ajax({url: url, dataType: "json"});

      jqxhr.done(function(response) {
        console.log(response);
        if( typeof(callbackfunction_updateInline) == 'function' ){
          callbackfunction_updateInline(response);
        }
        else{
      if( callbackfunction_updateInline == '' ){
          console.log('No hay funcion a ejecutar en updateInline.');
          if( isset($("#"+name)) ){
            html_element = $("#"+name);
            if( html_element.is( "input" ) ){
              html_element.val( value );
            }
            else{
              html_element.html( value );
            }
          }

      }
      else{
        if (typeof window[callbackfunction_updateInline] === "function") {
           // Ejecutar funcion enviada como parametro
          return window[callbackfunction_updateInline](response);
        }
            else{
              console.log(callbackfunction_updateInline + ' no es una funcion:'+typeof(callbackfunction_updateInline));
            }
      }
          
        }

  });

      return jqxhr;

}
/**
 *  AUTOSELECCIONAR LAS CAJAS DE TEXTO
 */
$("body").on("focus","input[type='text']", function () {
  console.log("input[type='text']");
  var save_this = $(this);
  window.setTimeout (function(){ 
    save_this.select(); 
  },100);
});
/*
$("body").on("focus",".editable-input > input",function(){
  console.log('body>focus>input');
  $(this).select();
  //set flag for preventing MOUSEUP event....
  //$(this).data("preventMouseUp", true);
});
$("body").on("mouseup",".editable-input > input",function(){
  console.log("body>mouseup>input")
  var preventEvent = $(this).data("preventMouseUp");
  //only prevent default if the flag is TRUE
  if (preventEvent) {
      e.preventDefault();
  }
  //reset flag so MOUSEUP event deselect the text
  $(this).data("preventMouseUp", false);
});
*/
/**
 *  ./AUTOSELECCIONAR LAS CAJAS DE TEXTO
 */

Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };

(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);