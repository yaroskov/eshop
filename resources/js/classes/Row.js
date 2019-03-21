'use strict';

import Query from './Query';

export default class Row {

    constructor() {

        this.target = undefined;
    }

    addRow(sectionId) {

        let url = this.target.dataset.url;
        let data = this.target.closest('.form-group').querySelector('input').value;
        url = url + '?data=' + data + '&sectionId=' + sectionId;

        Query.get(this.target, url);
    }

    deleteRow() {

        let url = this.target.dataset.url;
        let id = this.target.dataset.id;
        url = url + '?id=' + id;

        Query.get(this.target, url);
    }
}