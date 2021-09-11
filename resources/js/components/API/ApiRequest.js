import axios from 'axios';

const client = axios.create({
      baseURL: '/api/',
});

function getConfig() {
    let token = localStorage.getItem('auth_token_default');
    let config = {}
    if (token) {
        config.headers = {
            'Authorization': 'Bearer ' + token
        }
    }
    return config;
}

function queryBuild(params) {
    let query = [];
    for (let key in params) {
        query.push(key + '=' + params[key])
    }
    query = query.join('&');
    return query;
}

export default (base) => class ApiRequest {
    constructor() {
    }

    all() {
        let token = localStorage.getItem('token');

        return client.get(`/${base}`, getConfig());
        //return client.get(`/api/${base}`, getConfig());
    }
    byPage(page, params) {
        params = params || {};
        let query = queryBuild(params);
        if (query !== '') {
            query = '&' + query;
        }
        return client.get(`/api/${base}?page=${page}${query}`, getConfig());
    }
    get(id) {
        return client.get(`/api/${base}/${id}`, getConfig());
    }
    query(data) {
        return client.post(`/${base}/query`, data, getConfig());
    }
    request(action, data, reqType, params) {
        reqType = reqType || 'post';
        params = params || {};
        let query = queryBuild(params);
        if (query !== '') {
            action += '?' + query;
        }
        let url = `${base}/${action}`;
        switch (reqType) {
            case 'post':
                return client.post(url, data, getConfig());
            case 'get':
                return client.get(url, getConfig());
            case 'put':
                return client.put(url, data, getConfig());
            case 'delete':
                return client.delete(url, getConfig());
        }
    }
    update(id, data) {
        return client.put(`/api/${base}/${id}`, data, getConfig());
    }
    updateAll(data) {
        return client.put(`/api/${base}`, data, getConfig());
    }
    delete(id) {
        return client.delete(`/api/${base}/${id}`, getConfig());
    }
    deleteAll() {
        return client.post(`/api/${base}`, getConfig());
    }
    create(data) {
        return client.post(`/api/${base}`, data, getConfig());
    }
};

