/******/ (function(modules) { // webpackBootstrap
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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 39);
/******/ })
/************************************************************************/
/******/ ({

/***/ 39:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(40);


/***/ }),

/***/ 40:
/***/ (function(module, exports) {

jQuery(document).ready(function ($) {
    var $languages = {
        'fr': '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json',
        'en': ''
    };

    var table = $('#entries').DataTable({
        language: {
            "url": $languages[document.documentElement.lang]
        },
        ajax: '/api/entries',
        processing: true,
        columns: [{ 'data': 'id' }, { 'data': 'created_at' }, { 'data': 'firstname' }, { 'data': 'lastname' }, { 'data': 'email' }, { 'data': 'province' }, { 'data': 'birthday' }, { 'data': 'language' }],
        iDisplayLength: 20,
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
        columnDefs: [{
            "targets": 'invisible',
            "visible": false
        }],
        order: [[0, "desc"]],
        dom: 'Bfrtlip',
        buttons: [{
            extend: 'copy'
        }, {
            extend: 'csv'

        }, {
            extend: 'excel'
        }, {
            extend: 'print'
        }],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRow,
                type: ''
            }
        },
        initComplete: function initComplete() {
            this.api().columns('.select-filter').every(function () {
                var column = this;
                var select = $('<select><option value="">All</option><option value="Y">Yes</option><option value="N">No</option></select>').appendTo($(column.footer()).empty()).on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                });
            });

            this.api().columns('.text-filter').every(function (index) {
                var that = this;
                var input = $('<input type="text" />').appendTo($(that.footer()).empty()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
        }
    });
});

/***/ })

/******/ });