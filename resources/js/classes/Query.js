'use strict';

export default class Query {

    static get(target, url) {

        let resultsBlock = target.closest('.content-wrapper').querySelector('.resultsBlock');

        const ajax = async () => {
            const rawResponse = await fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });
            const content = await rawResponse.json();

            resultsBlock.innerHTML = content.view;
        };

        ajax().catch(error => {
            console.log(error)
        });
    }
}