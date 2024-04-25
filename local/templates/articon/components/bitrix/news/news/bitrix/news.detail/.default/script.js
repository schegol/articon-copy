$(function () {
    let copyLinkBtn = $('.news-single-share-menu-link--copy'),
        unsecuredCopyToClipboard = function(text) {
            let textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
            } catch (err) {
                console.error('Unable to copy to clipboard', err);
            }
            document.body.removeChild(textArea);
        }

    if (copyLinkBtn.length) {
        copyLinkBtn.on('click', function (e) {
            e.preventDefault();

            let link = $(this).data('link');

            if (window.isSecureContext && navigator.clipboard) {
                navigator.clipboard.writeText(link);
            } else {
                unsecuredCopyToClipboard(link);
            }
        });
    }
});