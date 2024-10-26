//<script type="module">

import './bootstrap';
import 'bootstrap'

import $ from 'jquery';

window.$ = window.jQuery = $;

window.ajaxRequest = function ajaxRequest(method, url, data = {}, successCallback, errorCallback) {
    $.ajax({
        type: method, // Метод запроса (GET, POST, PUT, DELETE)
        url: url, // URL для запроса
        data: data, // Данные, которые нужно отправить
        dataType: 'json', // Тип данных, ожидаемый от сервера
        success: function (response) {
            // Обработка успешного ответа
            if (typeof successCallback === 'function') {
                successCallback(response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Обработка ошибки
            if (typeof errorCallback === 'function') {
                errorCallback(jqXHR, textStatus, errorThrown);
            } else {
                if (jqXHR.status === 422) { // Статус 422 для ошибок валидации
                    const errors = jqXHR.responseJSON.errors; // Получаем ошибки валидации
                    $('.error').text(''); // Очищаем предыдущие ошибки

                    // Перебираем ошибки и отображаем их
                    for (const [key, value] of Object.entries(errors)) {
                        $(`#${key}.error`).text(value[0]);// Отображаем первую ошибку для каждого поля
                    }
                } else {
                    alert('Произошла ошибка. Пожалуйста, попробуйте еще раз.'); // Общая ошибка
                }
            }
        }
    });
}

window.ajaxRedirectForm = function ajaxRedirectForm(form_id = '', route = '', method = 'POST') {
    $(`#${form_id}`).on('submit', function() {
        event.preventDefault();

        const formData = $(this).serialize();

        ajaxRequest(method, route, formData, function (response) {
            window.location.href = response.redirect
        })
    });
}
// function ajaxRequest(url, method = 'GET', data = null, successCallback = null, errorCallback = null, timeout = 5000) {
//     $.ajax({
//         url: url,
//         method: method,
//         data: data,
//         dataType: 'json',
//         timeout: timeout,
//         success: function (response) {
//             if (successCallback && typeof successCallback === 'function') {
//                 successCallback(response);
//             }
//         },
//         error: function (xhr) {
//             if (errorCallback && typeof errorCallback === 'function') {
//                 errorCallback(xhr);
//             } else {
//                 console.error('Ошибка AJAX:', xhr.responseText);
//             }
//         }
//     });}
