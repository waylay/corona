!function(e){function t(a){if(n[a])return n[a].exports;var o=n[a]={i:a,l:!1,exports:{}};return e[a].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var n={};t.m=e,t.c=n,t.d=function(e,n,a){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:a})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=39)}({39:function(e,t,n){e.exports=n(40)},40:function(e,t){jQuery(document).ready(function(e){var t={fr:"//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json",en:""};e("#entries").DataTable({language:{url:t[document.documentElement.lang]},ajax:"/api/entries",processing:!0,columns:[{data:"id"},{data:"created_at"},{data:"firstname"},{data:"lastname"},{data:"email"},{data:"province"},{data:"birthday"},{data:"language"}],iDisplayLength:20,lengthMenu:[[10,20,50,-1],[10,20,50,"All"]],columnDefs:[{targets:"invisible",visible:!1}],order:[[0,"desc"]],dom:"Bfrtlip",buttons:[{extend:"copy"},{extend:"csv"},{extend:"excel"},{extend:"print"}],responsive:{details:{display:e.fn.dataTable.Responsive.display.childRow,type:""}},initComplete:function(){this.api().columns(".select-filter").every(function(){var t=this;e('<select><option value="">All</option><option value="Y">Yes</option><option value="N">No</option></select>').appendTo(e(t.footer()).empty()).on("change",function(){var n=e.fn.dataTable.util.escapeRegex(e(this).val());t.search(n?"^"+n+"$":"",!0,!1).draw()})}),this.api().columns(".text-filter").every(function(t){var n=this;e('<input type="text" />').appendTo(e(n.footer()).empty()).on("keyup change",function(){n.search()!==this.value&&n.search(this.value).draw()})})}})})}});