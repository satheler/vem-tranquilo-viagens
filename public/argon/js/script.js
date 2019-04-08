if($.fn.dataTable) {
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: '/argon/vendor/datatables/dist/json/Portuguese-Brasil.json'
        }
    })
}

$(window).on('load', function () {
    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 250);
})

