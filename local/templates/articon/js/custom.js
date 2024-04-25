$(function () {
    //форма на странице контактов:
    let body = $('body');

    body.on('keypress', '.field--error input, .field--error textarea', function () {
        let wrapper = $(this).closest('.field');

        wrapper.removeClass('field--error');
    });

    body.on('change', '.custom-checkbox-label input[type="checkbox"]', function () {
        let wrapper = $(this).closest('.custom-checkbox-label');

        wrapper.removeClass('custom-checkbox-label--error');
    });

    body.on('click', '.form-success-btn', function () {
        $(this).fancybox({
            btnTpl: {
                smallBtn:
                    '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}"></button>'
            },
            touch: false,
        });
    });
});
