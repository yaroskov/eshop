'use strict';

export default class Query {

    static get(target, url) {

        let params = {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        };

        Query.request(target, url, params);
    }

    static post(target, url, data) {

        let params = {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        };

        Query.request(target, url, params);
    }

    static request(target, url, params) {

        let resultsBlock = target.closest('.content-wrapper').querySelector('.resultsBlock');

        const ajax = async () => {
            const rawResponse = await fetch(url, params);
            const content = await rawResponse.json();

            resultsBlock.innerHTML = content.view;
        };

        ajax().catch(error => {
            console.log(error);
        });
    }
}