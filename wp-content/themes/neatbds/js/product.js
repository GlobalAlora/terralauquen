jQuery(document).ready(function ($) {
    $('#filter-form input[type="checkbox"]').on('change', function () {
        var selectedCategories = [];

        $('#filter-form input[type="checkbox"]:checked').each(function () {
            selectedCategories.push($(this).val());
        });

        if (selectedCategories.length === 0) {
            selectedCategories.push(0);
        }

        $.ajax({
            url: ajax_var.url,
            type: 'POST',
            data: {
                action: 'filter_products',
                categories: selectedCategories
            },
            success: function (response) {
                $('#products-grid').html(response);
            }
        });
    });

    $('#clear-filters').on('click', function () {
        $('#filter-form input[type="checkbox"]').prop('checked', false);
        window.location.href = window.location.pathname;
    });


    $('#go-back').on('click', function () {
        window.location.href = '/nuestros-productos';
    });

});



