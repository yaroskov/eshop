'use strict';

import Query from './Query';

export default class User {

    constructor() {

        this.target = undefined;
    }

    addUser() {

        let url = this.target.dataset.url;
        let form = this.target.closest('form');
        let name = form.querySelector('#name').value;
        let password = form.querySelector('#password').value;
        let email = form.querySelector('#email').value;
        let userType = form.querySelector('#userType').value;

        this.url = url + '?name=' + name + '&email=' + email + '&password=' + password + '&userType=' + userType;

        Query.get(this.target, url);
    }
}