import axios from 'axios';
window.axios = axios;

import 'bootstrap'
import 'bootstrap-datepicker'

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
