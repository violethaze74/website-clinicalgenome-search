!function(e){var t={};function o(i){if(t[i])return t[i].exports;var a=t[i]={i:i,l:!1,exports:{}};return e[i].call(a.exports,a,a.exports,o),a.l=!0,a.exports}o.m=e,o.c=t,o.d=function(e,t,i){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(o.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)o.d(i,a,function(t){return e[t]}.bind(null,a));return i},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="/",o(o.s=38)}({38:function(e,t,o){e.exports=o(39)},39:function(e,t){$("#modalSettings").on("change",".api-update",(function(e){$.ajaxSetup({cache:!0,contentType:"application/x-www-form-urlencoded",processData:!0,headers:{"X-Requested-With":"XMLHttpRequest","X-CSRF-TOKEN":window.token,Authorization:"Bearer "+Cookies.get("clingen_dash_token")}});var t=new Object;t._token=window.token,t.name=$(this).attr("name"),"checkbox"==$(this).attr("type")?t.value=$(this).is(":checked")?"1":"0":t.value=$(this).val();$(this).attr("value");var o=$(this);$.post("/api/profile",t,(function(e){if("credentials"==e.field)$("#profile-credentials").html(e.value);else if("name"==e.field)$("#profile-name").html(e.value);else if("actionability_interest"==e.field)"1"==e.value?$("#profile-interest-actionability").show():$("#profile-interest-actionability").hide();else if("dosage_interest"==e.field)"1"==e.value?$("#profile-interest-dosage").show():$("#profile-interest-dosage").hide();else if("validity_interest"==e.field)"1"==e.value?$("#profile-interest-validity").show():$("#profile-interest-validity").hide();else if("validity_notify"==e.field){var t="/api/home/follow/reload";$.get(t,(function(e){$("#follow-table").bootstrapTable("load",e.data),$("#follow-table").bootstrapTable("resetSearch","")})).fail((function(e){alert("Error reloading table")}))}else if("dosage_notify"==e.field){t="/api/home/follow/reload";$.get(t,(function(e){$("#follow-table").bootstrapTable("load",e.data),$("#follow-table").bootstrapTable("resetSearch","")})).fail((function(e){alert("Error reloading table")}))}else if("actionability_notify"==e.field){t="/api/home/follow/reload";$.get(t,(function(e){$("#follow-table").bootstrapTable("load",e.data),$("#follow-table").bootstrapTable("resetSearch","")})).fail((function(e){alert("Error reloading table")}))}})).fail((function(e){o.val(o.attr("value")),swal({title:"Error!",text:"An error was encountered communicating with the server",icon:"warning",button:"OK"})}))}))}});