const days = new Map([
    [1, 'Mon'],
    [2, 'Tue'],
    [3, 'Weds'],
    [4, 'Thur'],
    [5, 'Fri'],
    [6, 'Sat'],
    [0, 'Sun']
]);

const months = new Map([
    [1, 'Jan'],
    [2, 'Feb'],
    [3, 'Mar'],
    [4, 'Apr'],
    [5, 'May'],
    [6, 'Jun'],
    [7, 'Jul'],
    [8, 'Aug'],
    [9, 'Sept'],
    [10, 'Oct'],
    [11, 'Nov'],
    [12, 'Dec']
]);

export function pad(value) {
    if (value.toString().length === 1) {
        return `0${value}`;
    }
    return value.toString();
}

export function transform(date, format) {
    const date = new Date(date);
    const today = new Date(Date.now());

    const hours = date.getHours();
    const hour = hours <= 12 ? hours : hours - 12;
    const minutes = date.getMinutes();

    const formatedTimeString = `${this.pad(hour)}:${this.pad(minutes)} ${
        hours <= 12 ? 'AM' : 'PM'
    }`;
    if (date.getDate() === today.getDate()) {
        return formatedTimeString;
    }
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const dayString = date.getDay();

    if (format === 'short') {
        return `${this.months.get(month)} ${day}`;
    }
    return `${this.days.get(dayString)} ${day} ${this.months.get(
        month
    )} ${formatedTimeString}`;
}
