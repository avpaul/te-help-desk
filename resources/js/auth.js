const axios = window.axios;
const urlBase = location.origin;

export function loginHandler(password, email) {
    return new Promise(async (resolve, reject) => {
        const url = `${urlBase}/api/v1/login`;

        try {
            const { status } = await axios.post(url, {
                password,
                email
            });
            if (status === 200) {
                return resolve('user logged in successfully');
            }
        } catch (error) {
            const {
                response: { data }
            } = error;
            return reject(data.error);
        }
    });
}

export function signupHandler(password, email) {
    return new Promise(async (resolve, reject) => {
        const url = `${urlBase}/api/v1/register`;

        try {
            const { status } = await axios.post(url, {
                password,
                email
            });
            if (status === 201) {
                resolve('Check your inbox to verify email!');
            }
        } catch (error) {
            const {
                response: { data }
            } = error;
            reject(data.error || 'Password or Email Incorrect');
        }
    });
}

export function logoutHandler() {
    return new Promise(async (resolve, reject) => {
        const url = `${urlBase}/api/v1/logout`;

        try {
            const { status } = await axios.post(url);
            if (status === 200) {
                resolve('user logged out successfully');
            }
        } catch (error) {
            reject('try again');
        }
    });
}
