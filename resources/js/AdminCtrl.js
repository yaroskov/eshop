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

    addRow(sectionId) {

        let data = this.target.closest('.form-group').querySelector('input').value;
        this.url = this.url + '?data=' + data + '&sectionId=' + sectionId;

        this.query();
    }

    deleteRow() {

        let id = this.target.dataset.id;
        this.url = this.url + '?id=' + id;

        this.query();
    }

    events() {
        let _this = this;

        window.addEventListener('click', function (event) {

            _this.target = event.target;
            _this.url = _this.target.dataset.url;

            if (_this.target.classList.contains('add-row')) {

                _this.addRow(0);

            } else if (_this.target.classList.contains('add-sub-row')) {

                _this.addRow(_this.target.dataset.sectionId);

            } else if (_this.target.classList.contains('delete-row')) {

                _this.deleteRow();
            }
        });
    }
}

let admin = new AdminCtrl();
admin.events();