require('./bootstrap');

document.addEventListener('DOMContentLoaded', function() {
    const dropdownElems = document.querySelectorAll('.dropdown-trigger');
    const instances = M.Dropdown.init(dropdownElems, {
        coverTrigger: false,
        constrainWidth: false,
        alignment: 'right'
    });

    const modalElms = document.querySelectorAll('.modal');
    M.Modal.init(modalElms, { opacity: 0.16 });

    document.querySelector('.btn-reply').addEventListener('click', () => {
        document.querySelector('.ticket-reply').classList.add('active');
    });

    document
        .querySelector('.ticket-reply .btn-delete')
        .addEventListener('click', () => {
            document.querySelector('.ticket-reply-editor').innerHTML = '';
            document.querySelector('.ticket-reply').classList.remove('active');
        });

    document
        .querySelector('.user-ticket-conversations')
        .addEventListener('scroll', event => {
            console.log('scroll');
            console.log(arguments);
        });
});
