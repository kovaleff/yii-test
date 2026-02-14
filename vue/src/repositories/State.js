import Axios from './Clients/AxiosClient';
const resource = '/api/states';
export default {
    get() {
        return Axios.get(`${resource}`);
    },
    getState(id) {
        return Axios.get(`${resource}/${id}`);
    },
    create(payload) {
        return Axios.post(`${resource}`, payload);
    },
    update(payload, id) {
        return Axios.put(`${resource}/${id}`, payload);
    },
    delete(id) {
        return Axios.delete(`${resource}/${id}`)
    },
};