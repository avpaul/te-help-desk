import { signupHandler, loginHandler, logoutHandler } from './auth';
import { redirect } from './utils/redirect';

export function init() {
    const signupButton = document.querySelector('.btn-signup');
    const signupPasswordInput = document.querySelector('.user-password');
    const signupEmailInput = document.querySelector('.user-email');

    const loginButton = document.querySelector('.btn-login');
    const loginPasswordInput = document.querySelector('.user-password');
    const loginEmailInput = document.querySelector('.user-email');

    const message = document.querySelector('.message');

    const events = {
        signup: signupHandler,
        login: loginHandler,
        logout: logoutHandler,
        redirect
    };

    if (signupButton) {
        signupButton.addEventListener('click', () => {
            const password = signupPasswordInput.value;
            const email = signupEmailInput.value;
            if (!password && !email) {
                message.textContent = 'email and password required';
                return;
            }
            events
                .signup(password, email)
                .then(value => {
                    // user should verify his/her email before logging in
                    message.classList.add('message-success');
                    message.textContent = 'User created!';
                    const timerId = setTimeout(() => {
                        events.redirect('/login');
                        clearTimeout(timerId);
                    }, 500);
                })
                .catch(error => {
                    message.classList.add('message-error');
                    message.textContent = error;
                });
        });
    }

    if (loginButton) {
        loginButton.addEventListener('click', () => {
            const password = loginPasswordInput.value;
            const email = loginEmailInput.value;
            if (!password && !email) {
                message.textContent = 'email and password required';
                return;
            }
            events
                .login(password, email)
                .then(value => {
                    // events.redirect('/');
                })
                .catch(error => {
                    if (
                        !error ||
                        error.toLowerCase() === 'the given data was invalid.'
                    ) {
                        message.classList.add('message-error');
                        message.textContent = 'Email or Password Incorrect';
                        return;
                    }
                    message.textContent = error;
                    signupPasswordInput.value = '';
                    signupEmailInput.value = '';
                });
        });
    }
}
