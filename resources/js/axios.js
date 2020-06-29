import axios from 'axios'


const http = axios.create({
    baseURL: 'http://localhost:8000/api',
    timeout: 60000,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': "*"
    }
});

http.defaults.headers.common['Access-Control-Allow-Origin'] = '*';


window.axios = http