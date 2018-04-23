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
/******/ 	return __webpack_require__(__webpack_require__.s = 40);
/******/ })
/************************************************************************/
/******/ ({

/***/ 40:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(41);


/***/ }),

/***/ 41:
/***/ (function(module, exports) {

function show_notes(notes) {
    var output = '';
    if (notes.length) {
        output += '<ul>';
        notes.forEach(function (note) {
            output += '<li><div>' + note.note + '</div>' + '<em><small>By <strong>' + note.user.name + '</strong>, on ' + note.created_at + '</small></em></li>';
        });
        output += '</ul>';
    }
    return output;
}

function format(d) {
    return '<div class="details"><form class="details-form">' + '<div class="col-sm-4">' + '<input type="hidden" name="id" value="' + d.id + '">' + '<strong>ID:</strong> ' + d.id + '<br>' + '<strong>Submission Date:</strong> ' + d.created_at + '<br>' + '<strong>IMEI:</strong> ' + d.imei + '<br>' + '<strong>Language:</strong> ' + d.language + '<br>' + '</div>' + '<div class="col-sm-4">' + '<strong>' + d.firstname + ' ' + d.lastname + '</strong><br>' + d.address + (d.address2 ? ', ' + d.address2 : '') + '<br>' + d.city + ', ' + d.province + ' ' + d.postalcode + '<br>' + d.phone + '<br>' + '<a class="text-info" href="mailto:' + d.email + '">' + d.email + '</a><br>' + '</div>' + '<div class="col-sm-4">' + '<p><a target="_blank" class="text-info" href="' + d.receipt + '"> View Receipt </a></p>' + '<label class="form-check-label"><input type="checkbox" id="emailed" name="emailed" ' + (d.emailed ? ' checked ' : '') + '">Sent email confirmation</label>' + '<label class="form-check-label"><input type="checkbox" id="validated" name="validated" ' + (d.validated ? ' checked ' : '') + '">IMEI Code validated</label>' + '<label class="form-check-label"><input type="checkbox" id="shipped" name="shipped" ' + (d.shipped ? ' checked ' : '') + '">Product shipped</label>' + '</div>' + '<div class="col-sm-8">' + '<br><label class="form-check-label"><strong>Admin notes:</strong></label>' + show_notes(d.notes) + '<textarea name="note" class="form-control" placeholder="Add note"></textarea>' + '</div>' + '<div class="col-sm-4">' + '<button class="btn btn-success btn-save btn-md text-uppercase save" type="submit">SAVE</button>' + '<div class="response"></div>';
    '</div>' + '</form></div>';
}

jQuery(document).ready(function ($) {
    var $languages = {
        'fr': '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json',
        'en': ''
    };

    $.fn.dataTable.ext.buttons.download = {
        text: 'Download Receipts',
        action: function action(e, dt, node, config) {
            window.location = "/download-receipts";
        }
    };

    var table = $('#entries').DataTable({
        language: {
            "url": $languages[document.documentElement.lang]
        },
        ajax: '/api/entries',
        processing: true,
        columns: [{ 'data': 'id', 'responsivePriority': 1 }, { 'data': 'created_at', 'responsivePriority': 9 }, { 'data': 'firstname', 'responsivePriority': 2 }, { 'data': 'lastname', 'responsivePriority': 3 }, { 'data': 'phone' }, { 'data': 'email' }, { 'data': 'address' }, { 'data': 'address2' }, { 'data': 'city' }, { 'data': 'province' }, { 'data': 'postalcode' }, { 'data': 'imei' }, { 'data': 'purchased' }, { 'data': 'language' }, { 'data': 'receipt' }, { 'data': 'emailed',
            'className': 'text-center',
            'responsivePriority': 4,
            render: function render(data, type, row) {
                return '<span class="label label-' + (data ? 'success' : 'danger') + ' ">' + (data ? 'Y' : 'N') + '</span>';
            }
        }, { 'data': 'validated',
            'className': 'text-center',
            'responsivePriority': 5,
            render: function render(data, type, row) {
                return '<span class="label label-' + (data ? 'success' : 'danger') + ' ">' + (data ? 'Y' : 'N') + '</span>';
            }
        }, { 'data': 'shipped',
            'className': 'text-center',
            'responsivePriority': 6,
            render: function render(data, type, row) {
                return '<span class="label label-' + (data ? 'success' : 'danger') + ' ">' + (data ? 'Y' : 'N') + '</span>';
            }
        }, { 'data': 'notes',
            'className': 'text-center',
            'responsivePriority': 7,
            render: function render(data, type, row) {
                return '<span class="label label-' + (data.length ? 'success' : 'danger') + ' ">' + (data.length ? 'Y' : 'N') + '</span>';
            }
        }],
        iDisplayLength: 20,
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
        columnDefs: [{
            "targets": 'invisible',
            "visible": false
        }],
        order: [[0, "desc"]],
        dom: 'Bfrtlip',
        buttons: [{
            extend: 'copy',
            exportOptions: {
                columns: ':not(.not-export-col)'
            }
        }, {
            extend: 'csv',
            exportOptions: {
                columns: ':not(.not-export-col)'
            }
        }, {
            extend: 'excel',
            exportOptions: {
                columns: ':not(.not-export-col)'
            }
        }, {
            extend: 'print',
            exportOptions: {
                columns: ':not(.not-export-col)'
            }
        }, "download"],
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

    // Add event listener for opening and closing details
    $('#entries tbody').on('click', 'td', function (event) {
        event.stopPropagation();

        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            $('.details', row.child()).slideUp(function () {
                row.child.hide();
                tr.removeClass('shown');
            });
        } else if (row.data()) {
            // Open this row
            row.child(format(row.data())).show();
            $('.details', row.child()).slideDown();
            tr.addClass('shown');
        }
    });

    $('#entries tbody').on("submit", ".details-form", function (event) {
        event.preventDefault();

        var tr = $(this).closest("tr").prev()[0];
        var row = table.row(tr);
        var data = {};
        $.each($(this).serializeArray(), function (i, field) {
            data[field.name] = field.value;
        });

        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/api/entries/' + data.id,
            data: data,
            success: function success(response) {
                // Save row index before redraw
                var idx = row.index();
                // Redraw row using ajax response data
                row.data(response.data).draw('page');
                // Redraw content of the row child (update notes if any)
                table.row(idx).child(format(row.data())).show();
                // Show the child
                $('.details').show();

                // Fake delay for user feedback
                $('.details .btn-save', table.row(idx).child()).toggleClass('btn-success').text('Updating..').prop('disabled', true);
                setTimeout(function () {
                    $('.details .btn-save', table.row(idx).child()).toggleClass('btn-success').text('Save').prop('disabled', false);
                }, 250);
            }
        });
    });
});

/***/ })

/******/ });