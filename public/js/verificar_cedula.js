!function(e){var r={};function t(n){if(r[n])return r[n].exports;var i=r[n]={i:n,l:!1,exports:{}};return e[n].call(i.exports,i,i.exports,t),i.l=!0,i.exports}t.m=e,t.c=r,t.d=function(e,r,n){t.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:n})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,r){if(1&r&&(e=t(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(t.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var i in e)t.d(n,i,function(r){return e[r]}.bind(null,i));return n},t.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(r,"a",r),r},t.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},t.p="/",t(t.s=2)}({2:function(e,r,t){e.exports=t("85In")},"85In":function(e,r,t){"use strict";var n=$("#identification, #user_identification");function i(e){for(var r=String(e),t=0,n=0,i=r.length;n<i;n++)t+=Number(r.charAt(n));return t}window.isIdCorrect=new Array(n.length),n.keypress((function(e){var r=String.fromCharCode(e.keyCode);return/\d/.test(r)})),window.verificaCedula=function(){n.each((function(e,r){var t=0;"user_identification"==r.id&&(t=1);var n=r.value.toString(),a=n.length;if(10==a){for(var o=0,d=0;d<a-1;d++){var u=Number(n.charAt(d));o=d%2==0?o+i(2*u):o+u}var l=o%a;a-(0==l?a:l)==Number(n.charAt(a-1))?($().add(r).addClass("is-valid").removeClass("is-invalid"),isIdCorrect[t]=!0):($(this).parent().children(".id-message").text("La cédula digitada no es válida."),$().add(r).addClass("is-invalid").removeClass("is-valid"),isIdCorrect[t]=!1)}else $(this).parent().children(".id-message").text("El campo cédula debe de tener 10 dígitos numéricos."),$().add(r).addClass("is-invalid").removeClass("is-valid"),isIdCorrect[t]=!1}))},window.onload=verificaCedula,n.keyup(verificaCedula)}});