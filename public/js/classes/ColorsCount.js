/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/classes/ColorsCount.js":
/*!*********************************************!*\
  !*** ./resources/js/classes/ColorsCount.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ColorsCount; });


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var ColorsCount =
/*#__PURE__*/
function () {
  function ColorsCount() {
    _classCallCheck(this, ColorsCount);

    this.target = undefined;
  }

  _createClass(ColorsCount, [{
    key: "add",
    value: function add() {
      var countRow = this.target.closest('tbody').getElementsByTagName('tr');
      var results = {};

      for (var i = 0; i < countRow.length; i++) {
        var count = countRow[i].getElementsByClassName('count-value')[0].value;

        if (!count) {
          count = 0;
        }

        results[i] = {
          count: count,
          color: countRow[i].getElementsByClassName('select-color')[0].dataset.colorId
        };
      }

      var template = '';
      var totalCount = 0;
      Object.keys(results).forEach(function (i) {
        var count = ColorsCount.priceConverter(results[i].count);
        totalCount += count;
        template += ColorsCount.createdRow(results[i].color, count);
      });
      console.log(totalCount);
      var totalCountEl = this.target.closest('table').getElementsByClassName('total-count')[0];
      totalCountEl.textContent = totalCount.toString();
      template += ColorsCount.newRow(0);
      this.target.closest('tbody').innerHTML = template;
    }
  }, {
    key: "delete",
    value: function _delete() {
      this.target.closest('tr').remove();
    }
  }], [{
    key: "priceConverter",
    value: function priceConverter(price) {
      var value = parseInt(price);

      if (!value || isNaN(value)) {
        return 0;
      } else {
        return value;
      }
    }
  }, {
    key: "createdRow",
    value: function createdRow(color, count) {
      return "<tr>" + "<td class=\"p-1\"><div class=\"select-color preset-box\" data-color-id=\"" + color + "\"></div></td>" + "<td class=\"p-1\"><input class=\"count-value form-control form-control-sm\" type=\"text\" value=\"" + count + "\" placeholder=\"0\"></td>" + "<td class=\"p-1\"><button class=\"delete-count btn btn-sm btn-primary\">&times;</button></td>" + "</tr>";
    }
  }, {
    key: "newRow",
    value: function newRow(color) {
      return "<tr>" + "<td class=\"p-1\"><div class=\"select-color preset-box\" data-color-id=\"" + color + "\"></div></td>" + "<td class=\"p-1\"><input class=\"count-value form-control form-control-sm\" type=\"text\" value=\"\" placeholder=\"0\"></td>" + "<td class=\"p-1\"><button class=\"add-count btn btn-sm btn-success\">+</button></td>" + "</tr>";
    }
  }]);

  return ColorsCount;
}();



/***/ }),

/***/ 8:
/*!***************************************************!*\
  !*** multi ./resources/js/classes/ColorsCount.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/projects/eshop/resources/js/classes/ColorsCount.js */"./resources/js/classes/ColorsCount.js");


/***/ })

/******/ });