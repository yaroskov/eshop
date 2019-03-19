'use strict';

class AdminCtrl {

    constructor() {

        this.target = undefined;
        this.url = undefined;
    }

    query() {

        let resultsBlock = this.target.closest('.content-wrapper').querySelector('.resultsBlock');

        const ajax = async () => {
            const rawResponse = await fetch(this.url, {
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

    addProduct() {

        let url = this.target.dataset.url;

        let title = document.getElementById('title').value;
        let description = document.getElementById('description').value;
        let cost = document.getElementById('cost').value;

        this.url = url + '?title=' + title
            + '&description=' + description
            + '&cost=' + cost;

        this.query();
    }

    addUser() {

        let url = this.target.dataset.url;
        let form = this.target.closest('form');
        let name = form.querySelector('#name').value;
        let password = form.querySelector('#password').value;
        let email = form.querySelector('#email').value;
        let userType = form.querySelector('#userType').value;

        this.url = url + '?name=' + name
            + '&email=' + email
            + '&password=' + password
            + '&userType=' + userType;

        this.query();
    }

    addRow(sectionId) {

        let url = this.target.dataset.url;
        let data = this.target.closest('.form-group').querySelector('input').value;
        this.url = url + '?data=' + data + '&sectionId=' + sectionId;

        this.query();
    }

    deleteRow() {

        let url = this.target.dataset.url;
        let id = this.target.dataset.id;
        this.url = url + '?id=' + id;

        this.query();
    }

    events() {
        let _this = this;

        window.addEventListener('click', function (event) {

            _this.target = event.target;

            if (_this.target.classList.contains('add-row')) {

                _this.addRow(0);

            } else if (_this.target.classList.contains('add-sub-row')) {

                _this.addRow(_this.target.dataset.sectionId);

            } else if (_this.target.classList.contains('delete-row')) {

                _this.deleteRow();

            } else if (_this.target.classList.contains('add-user')) {

                _this.addUser();

            } else if (_this.target.classList.contains('add-product')) {

                _this.addProduct();

            }
        });
    }
}

let admin = new AdminCtrl();
admin.events();