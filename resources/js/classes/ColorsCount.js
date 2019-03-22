'use strict';

export default class ColorsCount {

    constructor() {

        this.target = undefined;
    }

    add() {

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

        let template = '';

        let totalCount = 0;

        Object.keys(results).forEach(function (i) {

            let count = ColorsCount.priceConverter(results[i].count);

            totalCount += count;

            template += ColorsCount.createdRow(results[i].color, count);
        });

        console.log(totalCount);

        let totalCountEl = this.target.closest('table').getElementsByClassName('total-count')[0];

        totalCountEl.textContent = totalCount.toString();

        template += ColorsCount.newRow(0);

        this.target.closest('tbody').innerHTML = template;
    }

    delete() {

        this.target.closest('tr').remove();
    }

    static priceConverter(price) {

        let value = parseInt(price);

        if (!value || isNaN(value)) {
            return 0;
        } else {
            return value;
        }
    }

    static createdRow(color, count) {

        return "<tr>" +
            "<td class=\"p-1\"><div class=\"select-color preset-box\" data-color-id=\"" + color + "\"></div></td>" +
            "<td class=\"p-1\"><input class=\"count-value form-control form-control-sm\" type=\"text\" value=\"" + count + "\" placeholder=\"0\"></td>" +
            "<td class=\"p-1\"><button class=\"delete-count btn btn-sm btn-primary\">&times;</button></td>" +
            "</tr>";
    }

    static newRow(color) {

        return "<tr>" +
            "<td class=\"p-1\"><div class=\"select-color preset-box\" data-color-id=\"" + color + "\"></div></td>" +
            "<td class=\"p-1\"><input class=\"count-value form-control form-control-sm\" type=\"text\" value=\"\" placeholder=\"0\"></td>" +
            "<td class=\"p-1\"><button class=\"add-count btn btn-sm btn-success\">+</button></td>" +
            "</tr>";
    }
}