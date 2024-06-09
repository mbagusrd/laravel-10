var selected_menu = function() {
    menu_item = $("a.nav-link[href=\"" + window.location.href + "\"]");

    menu_item.addClass('active');

    parent0 = menu_item.parent();

    if (parent0.length > 1) {
        for (var i = 0; i < parent0.length; i++) {
            if ($(parent0[i]).is('li') && $(parent0[i]).hasClass('nav-item') && $(parent0[i]).hasClass('ml-3')) {
                parent1 = $(parent0[i]).parent();

                if (parent1.is('ul') && parent1.hasClass('nav-treeview')) {
                    parent1prev = parent1.prev();

                    parent1prev.addClass('active');

                    parent2 = parent1.parent();

                    if (parent2.is('li') && parent2.hasClass('nav-item') && parent2.hasClass('has-treeview')) {
                        parent2.addClass('menu-open')

                        parent3 = parent2.parent();

                        parent3prev = parent3.prev();

                        parent3prev.addClass('active');

                        parent4 = parent3.parent();

                        if (parent4.is('li') && parent4.hasClass('nav-item') && parent4.hasClass('has-treeview')) {
                            parent4.addClass('menu-open');
                        }
                    }
                }
            }
        }
    }
}
var dt_search = function(id_tabel, obj) {
    var input = $("#" + id_tabel + "_filter input").unbind(),
        self = obj.api(),
        $searchButton = $('<button>').addClass('btn btn-primary').text('Cari').click(function() {
            self.search(input.val()).draw();
        }),
        $clearButton = $('<button>').addClass('btn btn-default').text('Reset').click(function() {
            input.val('');
            self.search('').draw();
        });

    $("#" + id_tabel + "_filter").append("&nbsp;", $searchButton, "&nbsp;", $clearButton);
    $("#" + id_tabel + "_filter input").keyup(function(e) {
        if (e.keyCode == "13") {
            self.search(input.val()).draw();
        }
    });
}
var clear_form = function(id) {
    var allInputs = $("#" + id).serializeArray();
    $.each(allInputs, function(k, v) {
        elTag = $("#" + id + " #" + v['name']).prop("tagName").toLowerCase();
        switch (elTag) {
            case "select":
                if ($("#" + id + " #" + v['name']).hasClass("select2-hidden-accessible")) { $("#" + id + " #" + v['name']).val(null).trigger('change'); } else { $("#" + id + " #" + v['name']).val(''); }
                break;
            default:
                $("#" + id + " #" + v['name']).val('');
        }
    });
};
var set_form = function(id, dataset) {
    var allInputs = $("#" + id).serializeArray();
    $.each(
        allInputs,
        function(k, v) {
            elTag = $("#" + id + " #" + v['name']).prop("tagName").toLowerCase();
            if (typeof(dataset[v['name']]) != "undefined") {
                switch (elTag) {
                    case "input":
                        if ($("#" + id + " #" + v['name']).hasClass("datepicker")) { $("#" + id + " #" + v['name']).datepicker("update", dataset[v['name']]); } else if ($("#" + id + " #" + v['name']).hasClass("number_format")) { $("#" + id + " #" + v['name']).val(number_format(dataset[v['name']], 2)); } else { $("#" + id + " #" + v['name']).val(dataset[v['name']]); }
                        break;
                    default:
                        $("#" + id + " #" + v['name']).val(dataset[v['name']]);
                }
            }
        }
    );
};
var set_select2_value = function(elmID, id, text) {
    var newOption = new Option(text, id, true, true);
    $(elmID).html(newOption).trigger('change');
};
var pesan = function(pesan, waktu, tipe) {
    detik = (waktu == true) ? 3000 : null;
    tipe_swal = (!tipe) ? "info" : tipe;
    setTimeout(function() { swal({ title: "", type: tipe_swal, text: pesan, timer: detik, showConfirmButton: true, onBeforeOpen: function() { if (swal.isVisible()) { no_proses(); } } }); }, 300);
};
var proses = function() { swal({ title: "Harap Tunggu!", text: "Memproses data", type: "info", showConfirmButton: false, allowOutsideClick: false, allowEscapeKey: false, allowEnterKey: false, onBeforeOpen: function() { if (swal.isVisible()) { no_proses(); } }, onOpen: function() { swal.showLoading(); } }); };
var no_proses = function() { swal.close(); };
var swal_progress = function() { swal({ type: "info", title: "Harap Tunggu!", text: "Memproses data", html: "<div id=\"swal_pg\" class=\"text-center\"><b>0% (0/0)</b></div>", showConfirmButton: false, allowOutsideClick: false, allowEscapeKey: false, allowEnterKey: false, onBeforeOpen: function() { if (swal.isVisible()) { no_proses(); } }, onOpen: function() { swal.showLoading(); } }); };
var hapus_koma = function($string) { return $string.toString().replace(/,/g, ''); };
var get_form_array = function(id_form) {
    var $new_array = {};
    var $data_form = $("#" + id_form).serializeArray();
    $.map($data_form, function(n, i) { $new_array[n['name']] = n['value']; });
    return $new_array;
};
var toHTML = function(str) {
    return str.replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&amp;nbsp;/g, ' ');
}

jQuery.validator.setDefaults({
    debug: true,
    errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass) {
        $(element).addClass("is-invalid");
    },
    unhighlight: function(element, errorClass) {
        $(element).removeClass("is-invalid");
    }
});

$.fn.datepicker.defaults.format = "dd-mm-yyyy";
$.fn.datepicker.defaults.todayHighlight = true;
$.fn.datepicker.defaults.autoclose = true;
$.fn.datepicker.defaults.todayBtn = "linked";
$.fn.datepicker.defaults.orientation = "bottom auto";

// $.fn.modal.Constructor.prototype.enforceFocus = function() {};

$(document).ready(function() {
    selected_menu();

    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 700); 

    $(".datepicker").datepicker();

    $(".number_format").on("change", function() { $(this).val(number_format($(this).val(), 2)); });

    $('.select2').on('select2:select', function() {
        closestForm = $(this).closest('form');

        if(closestForm.is("form")) {
            closestForm.valid();
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});