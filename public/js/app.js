/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _swiper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./swiper */ "./resources/js/swiper.js");
/* harmony import */ var _swiper__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_swiper__WEBPACK_IMPORTED_MODULE_0__);

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('img').forEach(function (img) {
    var src = img.getAttribute('src');
    var noHasSrc = src == '';
    if (noHasSrc) {
      img.src = '/images/image_blank.webp';
      img.error = false;
    }
    img.addEventListener('error', function () {
      img.src = "/images/image_blank.webp";
      img.error = false;
    });
  });
});

/***/ }),

/***/ "./resources/js/swiper.js":
/*!********************************!*\
  !*** ./resources/js/swiper.js ***!
  \********************************/
/***/ (() => {

(function () {
  var swiper = new Swiper('.product-related__slider .swiper', {
    loop: true,
    autoplay: {
      delay: 5000
    },
    navigation: {
      nextEl: '.product-related__slider .swiper-button-next',
      prevEl: '.product-related__slider .swiper-button-prev'
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 16
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 16
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 4
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 24
      }
    }
  });
})();
(function () {
  var swiper = new Swiper('.home-page__slider.swiper', {
    loop: true,
    autoplay: {
      delay: 5000
    },
    navigation: {
      nextEl: '.home-page__slider .swiper-button-next',
      prevEl: '.home-page__slider .swiper-button-prev'
    }
  });
})();
(function () {
  var swiper = new Swiper('.product-latest__slider .swiper', {
    loop: true,
    autoplay: {
      delay: 5000
    },
    navigation: {
      nextEl: '.product-latest__slider .swiper-button-next',
      prevEl: '.product-latest__slider .swiper-button-prev'
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 16
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 16
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 4
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 24
      }
    }
  });
})();
(function () {
  var swiper = new Swiper('.brand__slider .swiper', {
    loop: true,
    autoplay: {
      delay: 5000
    },
    navigation: {
      nextEl: '.brand__slider .swiper-button-next',
      prevEl: '.brand__slider .swiper-button-prev'
    },
    slidesPerView: 2,
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 16
      },
      576: {
        slidesPerView: 3,
        spaceBetween: 16
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 20
      },
      1024: {
        slidesPerView: 5,
        spaceBetween: 24
      },
      1200: {
        slidesPerView: 6,
        spaceBetween: 24
      }
    }
  });
})();

/***/ }),

/***/ "./resources/sass/footer.scss":
/*!************************************!*\
  !*** ./resources/sass/footer.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/product-detail.scss":
/*!********************************************!*\
  !*** ./resources/sass/product-detail.scss ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/product-category.scss":
/*!**********************************************!*\
  !*** ./resources/sass/product-category.scss ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/search-page.scss":
/*!*****************************************!*\
  !*** ./resources/sass/search-page.scss ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/style.scss":
/*!***********************************!*\
  !*** ./resources/sass/style.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/global.scss":
/*!************************************!*\
  !*** ./resources/sass/global.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/home-page.scss":
/*!***************************************!*\
  !*** ./resources/sass/home-page.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/common.scss":
/*!************************************!*\
  !*** ./resources/sass/common.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/header.scss":
/*!************************************!*\
  !*** ./resources/sass/header.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/global": 0,
/******/ 			"css/header": 0,
/******/ 			"css/common": 0,
/******/ 			"css/home-page": 0,
/******/ 			"css/style": 0,
/******/ 			"css/search-page": 0,
/******/ 			"css/product-category": 0,
/******/ 			"css/product-detail": 0,
/******/ 			"css/footer": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/style.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/global.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/home-page.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/common.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/header.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/footer.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/product-detail.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/product-category.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/global","css/header","css/common","css/home-page","css/style","css/search-page","css/product-category","css/product-detail","css/footer"], () => (__webpack_require__("./resources/sass/search-page.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;