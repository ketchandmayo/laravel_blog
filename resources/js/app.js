import './theme.js';
//<script type="module">
import 'bootstrap'
import $ from 'jquery';

window.$ = window.jQuery = $;
import './bootstrap';
const savedTheme = localStorage.getItem('theme') || 'light';
document.documentElement.setAttribute('data-bs-theme', savedTheme);
setTimeout(function() {
    $('#alert').fadeOut(1000); // Исчезновение за 1 секунду (1000 миллисекунд)
}, 3000);

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
                    console.error(jqXHR + textStatus + errorThrown); // Общая ошибка
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

window.ajaxPaginateRequest = function ajaxPaginateRequest(target_id) {
    document.addEventListener('DOMContentLoaded', function() {
        // Функция обработки кликов по ссылкам пагинации
        document.addEventListener('click', function(event) {
            if (event.target.closest('.pagination a')) {
                event.preventDefault();

                let url = event.target.getAttribute('href');

                let urlParams = new URLSearchParams(window.location.search);
                urlParams.delete('page'); // Удаляем параметр page
                urlParams = urlParams.toString();

                let fetchUrl = urlParams ? `${url}&${urlParams}` : url

                ajaxHtmlRequest(fetchUrl, target_id, urlParams);
            }
        });
    });
}

window.ajaxHtmlRequest = function ajaxHtmlQuery(url, target_id) {
    fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById(target_id).innerHTML = data;
            window.history.pushState(null, null, url);
        })
        .catch(error => console.error('Ошибка загрузки:', error));
}
