'use strict';

import Query from './Query';

export default class Products {

    constructor() {

        this.target = undefined;
        this.url = undefined;

        this.menuBoxEl = undefined;
        this.menuBoxId = '';
        this.menuBoxParam = '';
        this.elId = 0;
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

        Query.get(this.target, this.url);
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
                Products.switchTitle(menuEls[el], false);
            }
        });

        this.target.classList.add('active');

        let section = undefined;

        if (titled) {
            section = Products.switchTitle(this.target);
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
}