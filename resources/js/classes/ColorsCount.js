'use strict';

import Query from './Query';

export default class ColorsCount {

    constructor() {

        this.target = undefined;
    }

    add() {

        let url = this.target.dataset.url;

        let countRow = this.target.closest('tbody').getElementsByTagName('tr');

        let results = {};

        for (let i = 0; i < countRow.length; i++) {

            let count = countRow[i].getElementsByClassName('count-value')[0].value;

            if (!count) {
                count = 0;
            }

            results[i] = {
                count: count,
                color: countRow[i].getElementsByClassName('select-color')[0].dataset.colorId
            };
        }

        results = {data: results};

        Query.post(this.target, url, results);
    }
}