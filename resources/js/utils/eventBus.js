const events = {};

/**
 *
 * @param {string} event
 * @param {any} payload
 * publish a new event that can be subscribed to
 */
export function publishEvent(event, payload) {
    const listeners = events[event];
    if (listeners) {
        listeners.forEach(listener => {
            listener.call(null, payload);
        });
    } else {
        throw new Error(`Event ${event} not found`);
    }
}

/**
 *
 * @param {string} event
 * @param {function} listener
 * subscribe to an event with a callback
 */
export function subscribeEvent(event, listener) {
    if (events[event]) {
        events[event].push(listener);
    } else {
        events[event] = [listener];
    }
}
