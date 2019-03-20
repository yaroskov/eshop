'use strict';

class AdminCtrl {

    constructor() {

        this.target = undefined;
        this.url = undefined;

        this.menuBoxEl = undefined;
        this.menuBoxId = '';
        this.menuBoxParam = '';
        this.elId = 0;
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
        let section = document.getElementById('section').dataset.elId;
        let manufacturer = document.getElementById('manufacturer').dataset.elId;

        this.url = url + '?title=' + title + '&description=' + description + '&cost=' + cost
            + '&section=' + section + '&manufacturer=' + manufacturer;

        this.query();
    }

    addUser() {

        let url = this.target.dataset.url;
        let form = this.target.closest('form');
        let name = form.querySelector('#name').value;
        let password = form.querySelector('#password').value;
        let email = form.querySelector('#email').value;
        let userType = form.querySelector('#userType').value;

        this.url = url + '?name=' + name + '&email=' + email + '&password=' + password + '&userType=' + userType;

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

    clickMenu() {
        let menuBox = this.target.closest('.menu-box');

        let titled = false;

        if (menuBox.classList.contains('menu-box-titled')) {
            titled = true;
        }

        let menuEls = menuBox.querySelectorAll('.menu-box-el');

        Object.keys(menuEls).forEach(function (el) {

            menuEls[el].classList.remove('active');

            if (titled) {
                AdminCtrl.switchTitle(menuEls[el], false);
            }
        });

        this.target.classList.add('active');

        let section = undefined;

        if (titled) {
            section = AdminCtrl.switchTitle(this.target);
        }

        if (titled) {
            this.menuBoxEl = section + ' / ' + this.target.innerHTML;
        } else {
            this.menuBoxEl = this.target.innerHTML;
        }

        this.elId = this.target.dataset.elId;

        let modal = this.target.closest('.modal');
        this.menuBoxId = modal.dataset.id;
        this.menuBoxParam = modal.dataset.param;
    }

    static switchTitle(element, add = true) {

        let title = element.closest('.menu-box-block').querySelector('.menu-box-title');

        if (add) {
            title.classList.remove('text-muted');
            title.classList.add('text-primary');
        } else {
            title.classList.remove('text-primary');
            title.classList.add('text-muted');
        }

        return title.innerHTML;
    }

    menuSelect() {

        let button = document.querySelector('.menu-box-activator[data-id="' + this.menuBoxId + '"]' +
            '[data-param="' + this.menuBoxParam + '"]');
        button.innerHTML = this.menuBoxEl;
        button.dataset.elId = this.elId;
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

            } else if (_this.target.classList.contains('menu-box-el')) {

                _this.clickMenu();

            } else if (_this.target.classList.contains('menu-box-ok')) {

                _this.menuSelect();

            }
        });
    }
}

let admin = new AdminCtrl();
admin.events();