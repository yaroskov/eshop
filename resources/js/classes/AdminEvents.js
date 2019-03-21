'use strict';

import Products from './Products';
import Row from './Row';
import User from './User';
import ColorsCount from './ColorsCount';

class AdminEvents {

    constructor() {

        this.products = new Products();
        this.row = new Row();
        this.user = new User();
        this.colorsCount = new ColorsCount();
    }

    run() {
        let _this = this;

        window.addEventListener('click', function (event) {

            let target = event.target;

            if (target.classList.contains('add-row')) {

                _this.row.target = target;
                _this.row.addRow(0);

            } else if (target.classList.contains('add-sub-row')) {

                _this.row.target = target;
                _this.row.addRow(target.dataset.sectionId);

            } else if (target.classList.contains('delete-row')) {

                _this.row.target = target;
                _this.row.deleteRow();

            } else if (target.classList.contains('add-user')) {

                _this.user.target = target;
                _this.user.addUser();

            } else if (target.classList.contains('add-product')) {

                _this.products.target = target;
                _this.products.addProduct();

            } else if (target.classList.contains('menu-box-el')) {

                _this.products.target = target;
                _this.products.clickMenu();

            } else if (target.classList.contains('menu-box-ok')) {

                _this.products.target = target;
                _this.products.menuSelect();

            } else if (target.classList.contains('add-count')) {

                _this.colorsCount.target = target;
                _this.colorsCount.add();

            }
        });
    }
}

let adminEvents = new AdminEvents();
adminEvents.run();