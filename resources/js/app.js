import './bootstrap';
import 'bootstrap'

import $ from 'jquery';
window.$ = window.jQuery = $;
function ajaxRequest(url, method = 'GET', data = null, successCallback = null, errorCallback = null, timeout = 5000) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        dataType: 'json',
        timeout: timeout,
        success: function(response) {
            if (successCallback && typeof successCallback === 'function') {
                successCallback(response);
            }
        },
        error: function(xhr) {
            if (errorCallback && typeof errorCallback === 'function') {
                errorCallback(xhr);
            } else {
                console.error('Ошибка AJAX:', xhr.responseText);
            }
        }
    });
}
