(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownEls = document.querySelectorAll('.dropdown-trigger');
        if (dropdownEls) {
            const instances = M.Dropdown.init(dropdownEls, {
                coverTrigger: false,
                constrainWidth: false,
                alignment: 'right'
            });
        }

        const modalElms = document.querySelectorAll('.modal');
        if (modalElms) {
            M.Modal.init(modalElms, { opacity: 0.16 });
        }

        const replyButton = document.querySelector('.btn-reply');
        if (replyButton) {
            replyButton.addEventListener('click', () => {
                document.querySelector('.ticket-reply').classList.add('active');
            });
        }

        const deleteButton = document.querySelector(
            '.ticket-reply .btn-delete'
        );
        if (deleteButton) {
            deleteButton.addEventListener('click', () => {
                document.querySelector('.ticket-reply-editor').innerHTML = '';
                document
                    .querySelector('.ticket-reply')
                    .classList.remove('active');
            });
        }

        const conversationsWrapper = document.querySelector(
            '.user-ticket-conversations'
        );
        if (conversationsWrapper) {
            conversationsWrapper.addEventListener('scroll', event => {
                console.log('scroll');
                console.log(arguments);
            });
        }
    });
})();
