if ($.fn.dataTable) {
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: '/argon/vendor/datatables/dist/json/Portuguese-Brasil.json'
        }
    })
}

setTimeout(function() {
    $('.page-loader-wrapper').fadeOut()
}, 250)
