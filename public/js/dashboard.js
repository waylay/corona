!function(e){var t={};function n(a){if(t[a])return t[a].exports;var o=t[a]={i:a,l:!1,exports:{}};return e[a].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,a){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:a})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=1)}({1:function(e,t,n){e.exports=n("Rs6P")},Rs6P:function(e,t){jQuery(document).ready(function(e){e("#entries").DataTable({language:{url:{fr:"//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json",en:""}[document.documentElement.lang]},ajax:"/api/entries",processing:!0,columns:[{data:"id"},{data:"created_at"},{data:"name"},{data:"email"},{data:"phone"},{data:"province"},{data:"birthday"},{data:"language"}],iDisplayLength:20,lengthMenu:[[10,20,50,-1],[10,20,50,"All"]],columnDefs:[{targets:"invisible",visible:!1}],order:[[0,"desc"]],dom:"Bfrtlip",buttons:[{extend:"copy"},{extend:"csv"},{extend:"excel"},{extend:"print"}],responsive:{details:{display:e.fn.dataTable.Responsive.display.childRow,type:""}},initComplete:function(){this.api().columns(".select-filter").every(function(){var t=this;e('<select><option value="">All</option><option value="Y">Yes</option><option value="N">No</option></select>').appendTo(e(t.footer()).empty()).on("change",function(){var n=e.fn.dataTable.util.escapeRegex(e(this).val());t.search(n?"^"+n+"$":"",!0,!1).draw()})}),this.api().columns(".text-filter").every(function(t){var n=this;e('<input type="text" />').appendTo(e(n.footer()).empty()).on("keyup change",function(){n.search()!==this.value&&n.search(this.value).draw()})})}})})}});