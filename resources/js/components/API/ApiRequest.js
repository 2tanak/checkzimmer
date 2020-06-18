import axios from 'axios';

const client = axios.create({
    //  baseURL: '/api',
});

export default (base) => class ApiRequest {
    constructor() {
        console.log(base);
    }
    all() {
        return client.get(`api/${base}`);
    }
    get(id) {
        return client.get(`api/${base}/${id}`);
    }
    query(data) {
        return client.post(`api/${base}/query`, data);
    }
    update(id, data) {
        return client.put(`api/${base}/${id}`, data);
    }
    updateAll(data) {
        return client.put(`api/${base}`, data);
    }
    delete(id) {
        return client.delete(`api/${base}/${id}`);
    }
    create(data) {
        return client.post(`api/${base}`, data);
    }
};

