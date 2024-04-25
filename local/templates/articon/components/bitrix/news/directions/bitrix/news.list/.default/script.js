$(function () {
    let filterTabs = $('.courses-tab');

    if (filterTabs.length) {
        filterTabs.on('click', function () {
            let tab = $(this),
                contentBlock = $('.courses-tab-content'),
                id = tab.data('section');

            contentBlock.animate({
                opacity: 0,
            }, 300, function () {
                $.ajax({
                    type: 'GET',
                    url: coursesListTemplatePath + '/ajax.php?iblock=' + iBlockId + '&section=' + id,
                    dataType: 'html',
                    success: function(data) {
                        // console.log(data);
                        let filteredData = $(data).find('.course-items-block'),
                            filterItems = filteredData.find('.col-12.col-lg-6');

                        if (filterItems.length > 0) {
                            $('.course-items-block').replaceWith(filteredData);
                        } else {
                            $('.course-items-block').html('<p style="margin: 30px 0; text-align: center; font-family: Montserrat, Arial, sans-serif;">Нет подходящих результатов</p>');
                        }
                    },
                    error: function(obj, err) {
                        console.log(obj);
                        console.log(err);
                    },
                    complete: function() {
                        contentBlock.animate({
                            opacity: 1,
                        }, 300);
                    }
                });
            });
        });
    }
});