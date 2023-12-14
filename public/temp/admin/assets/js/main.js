jQuery(function () {
    $('#logout').on('click', function (event) {
        event.preventDefault();
        document.querySelector('#logout-form').submit();
    })
})
