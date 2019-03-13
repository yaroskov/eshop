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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin_add.js":
/*!***********************************!*\
  !*** ./resources/js/admin_add.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  addRow();
  addSubRow();
  deleteRow();
  registerUser();
});

function registerUser() {
  $('#register-user').on('click', function () {
    var data = {
      name: $('#name').val(),
      email: $('#email').val(),
      password: $('#password').val(),
      userType: $('#userType').val()
    };
    $.ajax({
      type: 'GET',
      url: 'register-user',
      data: data,
      contentType: 'application/json',
      success: function success(data) {
        console.log(data);
        $('#usersTable').html(data.view);
      }
    });
  });
}

function addRow() {
  $('.add-row').on('click', function () {
    this.sectionId = 0;
    addRowProcess(this);
  });
}

function addSubRow() {
  $('.resultsBlock').on('click', '.add-sub-row', function () {
    this.sectionId = $(this).data('section-id');
    addRowProcess(this);
  });
}

function addRowProcess(event) {
  var url = $(event).data('url');
  var data = $(event).parents('.form-group').find('input').val();
  var resultsBlock = $(event).parents('.tab-pane').find('.resultsBlock');
  $.ajax({
    type: 'GET',
    url: url,
    data: {
      data: data,
      sectionId: event.sectionId
    },
    contentType: 'application/json',
    success: function success(data) {
      resultsBlock.html(data.view);
    }
  });
}

function deleteRow() {
  $('body').on('click', '.delete-row', function () {
    var url = $(this).data('url');
    var id = $(this).data('id');
    var resultsBlock = $(this).parents('.resultsBlock');
    $.ajax({
      type: 'GET',
      url: url,
      data: {
        id: id
      },
      contentType: 'application/json',
      success: function success(data) {
        resultsBlock.html(data.view);
      }
    });
  });
}

/***/ }),

/***/ 2:
/*!*****************************************!*\
  !*** multi ./resources/js/admin_add.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/vagrant/projects/eshop/resources/js/admin_add.js */"./resources/js/admin_add.js");


/***/ })

/******/ });