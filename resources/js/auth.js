const axios = window.axios;

export function loginHandler(password, email) {
    return new Promise(async (resolve, reject) => {
        const url = 'http://localhost:8000/api/v1/login';

        try {
            const { status, data } = await axios.post(url, {
                password,
                email
            });
            if (status === 200) {
                localStorage.setItem('token', data.data.token);
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
        const url = `http://localhost:8000/api/v1/register`;

        try {
            const { status } = await axios.post(url, {
                password,
                email
            });
            if (status === 201) {
                resolve('user created');
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
        const url = `http://localhost:8000/api/v1/logout`;

        try {
            const {
                status,
                data: { token }
            } = await axios.post(url);
            if (status === 200) {
                localStorage.removeItem('token', token);
                resolve('user logged out successfully');
            }
        } catch (error) {
            console.log(error);

            reject('try again');
        }
    });
}
