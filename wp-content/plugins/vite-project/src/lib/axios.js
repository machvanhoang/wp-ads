import axios from 'axios';
const http = axios.create({
    baseURL: 'http://wp-ads.local/wp-admin',
    timeout: 5000,
});
export default http;