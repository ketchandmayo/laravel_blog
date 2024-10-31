import axios from 'axios';
window.axios = axios;

import 'bootstrap'
import 'bootstrap-datepicker'
import $ from 'jquery';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
