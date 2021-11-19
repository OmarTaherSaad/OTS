/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[1]!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[2]!./node_modules/animate.css/animate.css":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[1]!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[2]!./node_modules/animate.css/animate.css ***!
  \********************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "@charset \"UTF-8\";/*!\n * animate.css - https://animate.style/\n * Version - 4.1.1\n * Licensed under the MIT license - http://opensource.org/licenses/MIT\n *\n * Copyright (c) 2020 Animate.css\n */\n:root {\n  --animate-duration: 1s;\n  --animate-delay: 1s;\n  --animate-repeat: 1;\n}\n.animate__animated {\n  -webkit-animation-duration: 1s;\n  animation-duration: 1s;\n  -webkit-animation-duration: var(--animate-duration);\n  animation-duration: var(--animate-duration);\n  -webkit-animation-fill-mode: both;\n  animation-fill-mode: both;\n}\n.animate__animated.animate__infinite {\n  -webkit-animation-iteration-count: infinite;\n  animation-iteration-count: infinite;\n}\n.animate__animated.animate__repeat-1 {\n  -webkit-animation-iteration-count: 1;\n  animation-iteration-count: 1;\n  -webkit-animation-iteration-count: var(--animate-repeat);\n  animation-iteration-count: var(--animate-repeat);\n}\n.animate__animated.animate__repeat-2 {\n  -webkit-animation-iteration-count: calc(1 * 2);\n  animation-iteration-count: calc(1 * 2);\n  -webkit-animation-iteration-count: calc(var(--animate-repeat) * 2);\n  animation-iteration-count: calc(var(--animate-repeat) * 2);\n}\n.animate__animated.animate__repeat-3 {\n  -webkit-animation-iteration-count: calc(1 * 3);\n  animation-iteration-count: calc(1 * 3);\n  -webkit-animation-iteration-count: calc(var(--animate-repeat) * 3);\n  animation-iteration-count: calc(var(--animate-repeat) * 3);\n}\n.animate__animated.animate__delay-1s {\n  -webkit-animation-delay: 1s;\n  animation-delay: 1s;\n  -webkit-animation-delay: var(--animate-delay);\n  animation-delay: var(--animate-delay);\n}\n.animate__animated.animate__delay-2s {\n  -webkit-animation-delay: calc(1s * 2);\n  animation-delay: calc(1s * 2);\n  -webkit-animation-delay: calc(var(--animate-delay) * 2);\n  animation-delay: calc(var(--animate-delay) * 2);\n}\n.animate__animated.animate__delay-3s {\n  -webkit-animation-delay: calc(1s * 3);\n  animation-delay: calc(1s * 3);\n  -webkit-animation-delay: calc(var(--animate-delay) * 3);\n  animation-delay: calc(var(--animate-delay) * 3);\n}\n.animate__animated.animate__delay-4s {\n  -webkit-animation-delay: calc(1s * 4);\n  animation-delay: calc(1s * 4);\n  -webkit-animation-delay: calc(var(--animate-delay) * 4);\n  animation-delay: calc(var(--animate-delay) * 4);\n}\n.animate__animated.animate__delay-5s {\n  -webkit-animation-delay: calc(1s * 5);\n  animation-delay: calc(1s * 5);\n  -webkit-animation-delay: calc(var(--animate-delay) * 5);\n  animation-delay: calc(var(--animate-delay) * 5);\n}\n.animate__animated.animate__faster {\n  -webkit-animation-duration: calc(1s / 2);\n  animation-duration: calc(1s / 2);\n  -webkit-animation-duration: calc(var(--animate-duration) / 2);\n  animation-duration: calc(var(--animate-duration) / 2);\n}\n.animate__animated.animate__fast {\n  -webkit-animation-duration: calc(1s * 0.8);\n  animation-duration: calc(1s * 0.8);\n  -webkit-animation-duration: calc(var(--animate-duration) * 0.8);\n  animation-duration: calc(var(--animate-duration) * 0.8);\n}\n.animate__animated.animate__slow {\n  -webkit-animation-duration: calc(1s * 2);\n  animation-duration: calc(1s * 2);\n  -webkit-animation-duration: calc(var(--animate-duration) * 2);\n  animation-duration: calc(var(--animate-duration) * 2);\n}\n.animate__animated.animate__slower {\n  -webkit-animation-duration: calc(1s * 3);\n  animation-duration: calc(1s * 3);\n  -webkit-animation-duration: calc(var(--animate-duration) * 3);\n  animation-duration: calc(var(--animate-duration) * 3);\n}\n@media print, (prefers-reduced-motion: reduce) {\n  .animate__animated {\n    -webkit-animation-duration: 1ms !important;\n    animation-duration: 1ms !important;\n    -webkit-transition-duration: 1ms !important;\n    transition-duration: 1ms !important;\n    -webkit-animation-iteration-count: 1 !important;\n    animation-iteration-count: 1 !important;\n  }\n\n  .animate__animated[class*='Out'] {\n    opacity: 0;\n  }\n}\n/* Attention seekers  */\n@-webkit-keyframes bounce {\n  from,\n  20%,\n  53%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  40%,\n  43% {\n    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    -webkit-transform: translate3d(0, -30px, 0) scaleY(1.1);\n    transform: translate3d(0, -30px, 0) scaleY(1.1);\n  }\n\n  70% {\n    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    -webkit-transform: translate3d(0, -15px, 0) scaleY(1.05);\n    transform: translate3d(0, -15px, 0) scaleY(1.05);\n  }\n\n  80% {\n    -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    -webkit-transform: translate3d(0, 0, 0) scaleY(0.95);\n    transform: translate3d(0, 0, 0) scaleY(0.95);\n  }\n\n  90% {\n    -webkit-transform: translate3d(0, -4px, 0) scaleY(1.02);\n    transform: translate3d(0, -4px, 0) scaleY(1.02);\n  }\n}\n@keyframes bounce {\n  from,\n  20%,\n  53%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  40%,\n  43% {\n    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    -webkit-transform: translate3d(0, -30px, 0) scaleY(1.1);\n    transform: translate3d(0, -30px, 0) scaleY(1.1);\n  }\n\n  70% {\n    -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);\n    -webkit-transform: translate3d(0, -15px, 0) scaleY(1.05);\n    transform: translate3d(0, -15px, 0) scaleY(1.05);\n  }\n\n  80% {\n    -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    -webkit-transform: translate3d(0, 0, 0) scaleY(0.95);\n    transform: translate3d(0, 0, 0) scaleY(0.95);\n  }\n\n  90% {\n    -webkit-transform: translate3d(0, -4px, 0) scaleY(1.02);\n    transform: translate3d(0, -4px, 0) scaleY(1.02);\n  }\n}\n.animate__bounce {\n  -webkit-animation-name: bounce;\n  animation-name: bounce;\n  -webkit-transform-origin: center bottom;\n  transform-origin: center bottom;\n}\n@-webkit-keyframes flash {\n  from,\n  50%,\n  to {\n    opacity: 1;\n  }\n\n  25%,\n  75% {\n    opacity: 0;\n  }\n}\n@keyframes flash {\n  from,\n  50%,\n  to {\n    opacity: 1;\n  }\n\n  25%,\n  75% {\n    opacity: 0;\n  }\n}\n.animate__flash {\n  -webkit-animation-name: flash;\n  animation-name: flash;\n}\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n@-webkit-keyframes pulse {\n  from {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n\n  50% {\n    -webkit-transform: scale3d(1.05, 1.05, 1.05);\n    transform: scale3d(1.05, 1.05, 1.05);\n  }\n\n  to {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n@keyframes pulse {\n  from {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n\n  50% {\n    -webkit-transform: scale3d(1.05, 1.05, 1.05);\n    transform: scale3d(1.05, 1.05, 1.05);\n  }\n\n  to {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n.animate__pulse {\n  -webkit-animation-name: pulse;\n  animation-name: pulse;\n  -webkit-animation-timing-function: ease-in-out;\n  animation-timing-function: ease-in-out;\n}\n@-webkit-keyframes rubberBand {\n  from {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n\n  30% {\n    -webkit-transform: scale3d(1.25, 0.75, 1);\n    transform: scale3d(1.25, 0.75, 1);\n  }\n\n  40% {\n    -webkit-transform: scale3d(0.75, 1.25, 1);\n    transform: scale3d(0.75, 1.25, 1);\n  }\n\n  50% {\n    -webkit-transform: scale3d(1.15, 0.85, 1);\n    transform: scale3d(1.15, 0.85, 1);\n  }\n\n  65% {\n    -webkit-transform: scale3d(0.95, 1.05, 1);\n    transform: scale3d(0.95, 1.05, 1);\n  }\n\n  75% {\n    -webkit-transform: scale3d(1.05, 0.95, 1);\n    transform: scale3d(1.05, 0.95, 1);\n  }\n\n  to {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n@keyframes rubberBand {\n  from {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n\n  30% {\n    -webkit-transform: scale3d(1.25, 0.75, 1);\n    transform: scale3d(1.25, 0.75, 1);\n  }\n\n  40% {\n    -webkit-transform: scale3d(0.75, 1.25, 1);\n    transform: scale3d(0.75, 1.25, 1);\n  }\n\n  50% {\n    -webkit-transform: scale3d(1.15, 0.85, 1);\n    transform: scale3d(1.15, 0.85, 1);\n  }\n\n  65% {\n    -webkit-transform: scale3d(0.95, 1.05, 1);\n    transform: scale3d(0.95, 1.05, 1);\n  }\n\n  75% {\n    -webkit-transform: scale3d(1.05, 0.95, 1);\n    transform: scale3d(1.05, 0.95, 1);\n  }\n\n  to {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n.animate__rubberBand {\n  -webkit-animation-name: rubberBand;\n  animation-name: rubberBand;\n}\n@-webkit-keyframes shakeX {\n  from,\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  10%,\n  30%,\n  50%,\n  70%,\n  90% {\n    -webkit-transform: translate3d(-10px, 0, 0);\n    transform: translate3d(-10px, 0, 0);\n  }\n\n  20%,\n  40%,\n  60%,\n  80% {\n    -webkit-transform: translate3d(10px, 0, 0);\n    transform: translate3d(10px, 0, 0);\n  }\n}\n@keyframes shakeX {\n  from,\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  10%,\n  30%,\n  50%,\n  70%,\n  90% {\n    -webkit-transform: translate3d(-10px, 0, 0);\n    transform: translate3d(-10px, 0, 0);\n  }\n\n  20%,\n  40%,\n  60%,\n  80% {\n    -webkit-transform: translate3d(10px, 0, 0);\n    transform: translate3d(10px, 0, 0);\n  }\n}\n.animate__shakeX {\n  -webkit-animation-name: shakeX;\n  animation-name: shakeX;\n}\n@-webkit-keyframes shakeY {\n  from,\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  10%,\n  30%,\n  50%,\n  70%,\n  90% {\n    -webkit-transform: translate3d(0, -10px, 0);\n    transform: translate3d(0, -10px, 0);\n  }\n\n  20%,\n  40%,\n  60%,\n  80% {\n    -webkit-transform: translate3d(0, 10px, 0);\n    transform: translate3d(0, 10px, 0);\n  }\n}\n@keyframes shakeY {\n  from,\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  10%,\n  30%,\n  50%,\n  70%,\n  90% {\n    -webkit-transform: translate3d(0, -10px, 0);\n    transform: translate3d(0, -10px, 0);\n  }\n\n  20%,\n  40%,\n  60%,\n  80% {\n    -webkit-transform: translate3d(0, 10px, 0);\n    transform: translate3d(0, 10px, 0);\n  }\n}\n.animate__shakeY {\n  -webkit-animation-name: shakeY;\n  animation-name: shakeY;\n}\n@-webkit-keyframes headShake {\n  0% {\n    -webkit-transform: translateX(0);\n    transform: translateX(0);\n  }\n\n  6.5% {\n    -webkit-transform: translateX(-6px) rotateY(-9deg);\n    transform: translateX(-6px) rotateY(-9deg);\n  }\n\n  18.5% {\n    -webkit-transform: translateX(5px) rotateY(7deg);\n    transform: translateX(5px) rotateY(7deg);\n  }\n\n  31.5% {\n    -webkit-transform: translateX(-3px) rotateY(-5deg);\n    transform: translateX(-3px) rotateY(-5deg);\n  }\n\n  43.5% {\n    -webkit-transform: translateX(2px) rotateY(3deg);\n    transform: translateX(2px) rotateY(3deg);\n  }\n\n  50% {\n    -webkit-transform: translateX(0);\n    transform: translateX(0);\n  }\n}\n@keyframes headShake {\n  0% {\n    -webkit-transform: translateX(0);\n    transform: translateX(0);\n  }\n\n  6.5% {\n    -webkit-transform: translateX(-6px) rotateY(-9deg);\n    transform: translateX(-6px) rotateY(-9deg);\n  }\n\n  18.5% {\n    -webkit-transform: translateX(5px) rotateY(7deg);\n    transform: translateX(5px) rotateY(7deg);\n  }\n\n  31.5% {\n    -webkit-transform: translateX(-3px) rotateY(-5deg);\n    transform: translateX(-3px) rotateY(-5deg);\n  }\n\n  43.5% {\n    -webkit-transform: translateX(2px) rotateY(3deg);\n    transform: translateX(2px) rotateY(3deg);\n  }\n\n  50% {\n    -webkit-transform: translateX(0);\n    transform: translateX(0);\n  }\n}\n.animate__headShake {\n  -webkit-animation-timing-function: ease-in-out;\n  animation-timing-function: ease-in-out;\n  -webkit-animation-name: headShake;\n  animation-name: headShake;\n}\n@-webkit-keyframes swing {\n  20% {\n    -webkit-transform: rotate3d(0, 0, 1, 15deg);\n    transform: rotate3d(0, 0, 1, 15deg);\n  }\n\n  40% {\n    -webkit-transform: rotate3d(0, 0, 1, -10deg);\n    transform: rotate3d(0, 0, 1, -10deg);\n  }\n\n  60% {\n    -webkit-transform: rotate3d(0, 0, 1, 5deg);\n    transform: rotate3d(0, 0, 1, 5deg);\n  }\n\n  80% {\n    -webkit-transform: rotate3d(0, 0, 1, -5deg);\n    transform: rotate3d(0, 0, 1, -5deg);\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 0deg);\n    transform: rotate3d(0, 0, 1, 0deg);\n  }\n}\n@keyframes swing {\n  20% {\n    -webkit-transform: rotate3d(0, 0, 1, 15deg);\n    transform: rotate3d(0, 0, 1, 15deg);\n  }\n\n  40% {\n    -webkit-transform: rotate3d(0, 0, 1, -10deg);\n    transform: rotate3d(0, 0, 1, -10deg);\n  }\n\n  60% {\n    -webkit-transform: rotate3d(0, 0, 1, 5deg);\n    transform: rotate3d(0, 0, 1, 5deg);\n  }\n\n  80% {\n    -webkit-transform: rotate3d(0, 0, 1, -5deg);\n    transform: rotate3d(0, 0, 1, -5deg);\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 0deg);\n    transform: rotate3d(0, 0, 1, 0deg);\n  }\n}\n.animate__swing {\n  -webkit-transform-origin: top center;\n  transform-origin: top center;\n  -webkit-animation-name: swing;\n  animation-name: swing;\n}\n@-webkit-keyframes tada {\n  from {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n\n  10%,\n  20% {\n    -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);\n    transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);\n  }\n\n  30%,\n  50%,\n  70%,\n  90% {\n    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);\n    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);\n  }\n\n  40%,\n  60%,\n  80% {\n    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);\n    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);\n  }\n\n  to {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n@keyframes tada {\n  from {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n\n  10%,\n  20% {\n    -webkit-transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);\n    transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);\n  }\n\n  30%,\n  50%,\n  70%,\n  90% {\n    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);\n    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);\n  }\n\n  40%,\n  60%,\n  80% {\n    -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);\n    transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);\n  }\n\n  to {\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n.animate__tada {\n  -webkit-animation-name: tada;\n  animation-name: tada;\n}\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n@-webkit-keyframes wobble {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  15% {\n    -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);\n    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);\n  }\n\n  30% {\n    -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);\n    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);\n  }\n\n  45% {\n    -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);\n    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);\n  }\n\n  60% {\n    -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);\n    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);\n  }\n\n  75% {\n    -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);\n    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes wobble {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  15% {\n    -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);\n    transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);\n  }\n\n  30% {\n    -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);\n    transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);\n  }\n\n  45% {\n    -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);\n    transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);\n  }\n\n  60% {\n    -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);\n    transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);\n  }\n\n  75% {\n    -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);\n    transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__wobble {\n  -webkit-animation-name: wobble;\n  animation-name: wobble;\n}\n@-webkit-keyframes jello {\n  from,\n  11.1%,\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  22.2% {\n    -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);\n    transform: skewX(-12.5deg) skewY(-12.5deg);\n  }\n\n  33.3% {\n    -webkit-transform: skewX(6.25deg) skewY(6.25deg);\n    transform: skewX(6.25deg) skewY(6.25deg);\n  }\n\n  44.4% {\n    -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);\n    transform: skewX(-3.125deg) skewY(-3.125deg);\n  }\n\n  55.5% {\n    -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);\n    transform: skewX(1.5625deg) skewY(1.5625deg);\n  }\n\n  66.6% {\n    -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);\n    transform: skewX(-0.78125deg) skewY(-0.78125deg);\n  }\n\n  77.7% {\n    -webkit-transform: skewX(0.390625deg) skewY(0.390625deg);\n    transform: skewX(0.390625deg) skewY(0.390625deg);\n  }\n\n  88.8% {\n    -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);\n    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);\n  }\n}\n@keyframes jello {\n  from,\n  11.1%,\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  22.2% {\n    -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);\n    transform: skewX(-12.5deg) skewY(-12.5deg);\n  }\n\n  33.3% {\n    -webkit-transform: skewX(6.25deg) skewY(6.25deg);\n    transform: skewX(6.25deg) skewY(6.25deg);\n  }\n\n  44.4% {\n    -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);\n    transform: skewX(-3.125deg) skewY(-3.125deg);\n  }\n\n  55.5% {\n    -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);\n    transform: skewX(1.5625deg) skewY(1.5625deg);\n  }\n\n  66.6% {\n    -webkit-transform: skewX(-0.78125deg) skewY(-0.78125deg);\n    transform: skewX(-0.78125deg) skewY(-0.78125deg);\n  }\n\n  77.7% {\n    -webkit-transform: skewX(0.390625deg) skewY(0.390625deg);\n    transform: skewX(0.390625deg) skewY(0.390625deg);\n  }\n\n  88.8% {\n    -webkit-transform: skewX(-0.1953125deg) skewY(-0.1953125deg);\n    transform: skewX(-0.1953125deg) skewY(-0.1953125deg);\n  }\n}\n.animate__jello {\n  -webkit-animation-name: jello;\n  animation-name: jello;\n  -webkit-transform-origin: center;\n  transform-origin: center;\n}\n@-webkit-keyframes heartBeat {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n\n  14% {\n    -webkit-transform: scale(1.3);\n    transform: scale(1.3);\n  }\n\n  28% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n\n  42% {\n    -webkit-transform: scale(1.3);\n    transform: scale(1.3);\n  }\n\n  70% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n}\n@keyframes heartBeat {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n\n  14% {\n    -webkit-transform: scale(1.3);\n    transform: scale(1.3);\n  }\n\n  28% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n\n  42% {\n    -webkit-transform: scale(1.3);\n    transform: scale(1.3);\n  }\n\n  70% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n}\n.animate__heartBeat {\n  -webkit-animation-name: heartBeat;\n  animation-name: heartBeat;\n  -webkit-animation-duration: calc(1s * 1.3);\n  animation-duration: calc(1s * 1.3);\n  -webkit-animation-duration: calc(var(--animate-duration) * 1.3);\n  animation-duration: calc(var(--animate-duration) * 1.3);\n  -webkit-animation-timing-function: ease-in-out;\n  animation-timing-function: ease-in-out;\n}\n/* Back entrances */\n@-webkit-keyframes backInDown {\n  0% {\n    -webkit-transform: translateY(-1200px) scale(0.7);\n    transform: translateY(-1200px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n@keyframes backInDown {\n  0% {\n    -webkit-transform: translateY(-1200px) scale(0.7);\n    transform: translateY(-1200px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n.animate__backInDown {\n  -webkit-animation-name: backInDown;\n  animation-name: backInDown;\n}\n@-webkit-keyframes backInLeft {\n  0% {\n    -webkit-transform: translateX(-2000px) scale(0.7);\n    transform: translateX(-2000px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n@keyframes backInLeft {\n  0% {\n    -webkit-transform: translateX(-2000px) scale(0.7);\n    transform: translateX(-2000px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n.animate__backInLeft {\n  -webkit-animation-name: backInLeft;\n  animation-name: backInLeft;\n}\n@-webkit-keyframes backInRight {\n  0% {\n    -webkit-transform: translateX(2000px) scale(0.7);\n    transform: translateX(2000px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n@keyframes backInRight {\n  0% {\n    -webkit-transform: translateX(2000px) scale(0.7);\n    transform: translateX(2000px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n.animate__backInRight {\n  -webkit-animation-name: backInRight;\n  animation-name: backInRight;\n}\n@-webkit-keyframes backInUp {\n  0% {\n    -webkit-transform: translateY(1200px) scale(0.7);\n    transform: translateY(1200px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n@keyframes backInUp {\n  0% {\n    -webkit-transform: translateY(1200px) scale(0.7);\n    transform: translateY(1200px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  80% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n}\n.animate__backInUp {\n  -webkit-animation-name: backInUp;\n  animation-name: backInUp;\n}\n/* Back exits */\n@-webkit-keyframes backOutDown {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateY(700px) scale(0.7);\n    transform: translateY(700px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n@keyframes backOutDown {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateY(700px) scale(0.7);\n    transform: translateY(700px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n.animate__backOutDown {\n  -webkit-animation-name: backOutDown;\n  animation-name: backOutDown;\n}\n@-webkit-keyframes backOutLeft {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateX(-2000px) scale(0.7);\n    transform: translateX(-2000px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n@keyframes backOutLeft {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateX(-2000px) scale(0.7);\n    transform: translateX(-2000px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n.animate__backOutLeft {\n  -webkit-animation-name: backOutLeft;\n  animation-name: backOutLeft;\n}\n@-webkit-keyframes backOutRight {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateX(2000px) scale(0.7);\n    transform: translateX(2000px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n@keyframes backOutRight {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateX(0px) scale(0.7);\n    transform: translateX(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateX(2000px) scale(0.7);\n    transform: translateX(2000px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n.animate__backOutRight {\n  -webkit-animation-name: backOutRight;\n  animation-name: backOutRight;\n}\n@-webkit-keyframes backOutUp {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateY(-700px) scale(0.7);\n    transform: translateY(-700px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n@keyframes backOutUp {\n  0% {\n    -webkit-transform: scale(1);\n    transform: scale(1);\n    opacity: 1;\n  }\n\n  20% {\n    -webkit-transform: translateY(0px) scale(0.7);\n    transform: translateY(0px) scale(0.7);\n    opacity: 0.7;\n  }\n\n  100% {\n    -webkit-transform: translateY(-700px) scale(0.7);\n    transform: translateY(-700px) scale(0.7);\n    opacity: 0.7;\n  }\n}\n.animate__backOutUp {\n  -webkit-animation-name: backOutUp;\n  animation-name: backOutUp;\n}\n/* Bouncing entrances  */\n@-webkit-keyframes bounceIn {\n  from,\n  20%,\n  40%,\n  60%,\n  80%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  0% {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n\n  20% {\n    -webkit-transform: scale3d(1.1, 1.1, 1.1);\n    transform: scale3d(1.1, 1.1, 1.1);\n  }\n\n  40% {\n    -webkit-transform: scale3d(0.9, 0.9, 0.9);\n    transform: scale3d(0.9, 0.9, 0.9);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(1.03, 1.03, 1.03);\n    transform: scale3d(1.03, 1.03, 1.03);\n  }\n\n  80% {\n    -webkit-transform: scale3d(0.97, 0.97, 0.97);\n    transform: scale3d(0.97, 0.97, 0.97);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n@keyframes bounceIn {\n  from,\n  20%,\n  40%,\n  60%,\n  80%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  0% {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n\n  20% {\n    -webkit-transform: scale3d(1.1, 1.1, 1.1);\n    transform: scale3d(1.1, 1.1, 1.1);\n  }\n\n  40% {\n    -webkit-transform: scale3d(0.9, 0.9, 0.9);\n    transform: scale3d(0.9, 0.9, 0.9);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(1.03, 1.03, 1.03);\n    transform: scale3d(1.03, 1.03, 1.03);\n  }\n\n  80% {\n    -webkit-transform: scale3d(0.97, 0.97, 0.97);\n    transform: scale3d(0.97, 0.97, 0.97);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: scale3d(1, 1, 1);\n    transform: scale3d(1, 1, 1);\n  }\n}\n.animate__bounceIn {\n  -webkit-animation-duration: calc(1s * 0.75);\n  animation-duration: calc(1s * 0.75);\n  -webkit-animation-duration: calc(var(--animate-duration) * 0.75);\n  animation-duration: calc(var(--animate-duration) * 0.75);\n  -webkit-animation-name: bounceIn;\n  animation-name: bounceIn;\n}\n@-webkit-keyframes bounceInDown {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  0% {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -3000px, 0) scaleY(3);\n    transform: translate3d(0, -3000px, 0) scaleY(3);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 25px, 0) scaleY(0.9);\n    transform: translate3d(0, 25px, 0) scaleY(0.9);\n  }\n\n  75% {\n    -webkit-transform: translate3d(0, -10px, 0) scaleY(0.95);\n    transform: translate3d(0, -10px, 0) scaleY(0.95);\n  }\n\n  90% {\n    -webkit-transform: translate3d(0, 5px, 0) scaleY(0.985);\n    transform: translate3d(0, 5px, 0) scaleY(0.985);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes bounceInDown {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  0% {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -3000px, 0) scaleY(3);\n    transform: translate3d(0, -3000px, 0) scaleY(3);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 25px, 0) scaleY(0.9);\n    transform: translate3d(0, 25px, 0) scaleY(0.9);\n  }\n\n  75% {\n    -webkit-transform: translate3d(0, -10px, 0) scaleY(0.95);\n    transform: translate3d(0, -10px, 0) scaleY(0.95);\n  }\n\n  90% {\n    -webkit-transform: translate3d(0, 5px, 0) scaleY(0.985);\n    transform: translate3d(0, 5px, 0) scaleY(0.985);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__bounceInDown {\n  -webkit-animation-name: bounceInDown;\n  animation-name: bounceInDown;\n}\n@-webkit-keyframes bounceInLeft {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  0% {\n    opacity: 0;\n    -webkit-transform: translate3d(-3000px, 0, 0) scaleX(3);\n    transform: translate3d(-3000px, 0, 0) scaleX(3);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(25px, 0, 0) scaleX(1);\n    transform: translate3d(25px, 0, 0) scaleX(1);\n  }\n\n  75% {\n    -webkit-transform: translate3d(-10px, 0, 0) scaleX(0.98);\n    transform: translate3d(-10px, 0, 0) scaleX(0.98);\n  }\n\n  90% {\n    -webkit-transform: translate3d(5px, 0, 0) scaleX(0.995);\n    transform: translate3d(5px, 0, 0) scaleX(0.995);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes bounceInLeft {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  0% {\n    opacity: 0;\n    -webkit-transform: translate3d(-3000px, 0, 0) scaleX(3);\n    transform: translate3d(-3000px, 0, 0) scaleX(3);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(25px, 0, 0) scaleX(1);\n    transform: translate3d(25px, 0, 0) scaleX(1);\n  }\n\n  75% {\n    -webkit-transform: translate3d(-10px, 0, 0) scaleX(0.98);\n    transform: translate3d(-10px, 0, 0) scaleX(0.98);\n  }\n\n  90% {\n    -webkit-transform: translate3d(5px, 0, 0) scaleX(0.995);\n    transform: translate3d(5px, 0, 0) scaleX(0.995);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__bounceInLeft {\n  -webkit-animation-name: bounceInLeft;\n  animation-name: bounceInLeft;\n}\n@-webkit-keyframes bounceInRight {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(3000px, 0, 0) scaleX(3);\n    transform: translate3d(3000px, 0, 0) scaleX(3);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(-25px, 0, 0) scaleX(1);\n    transform: translate3d(-25px, 0, 0) scaleX(1);\n  }\n\n  75% {\n    -webkit-transform: translate3d(10px, 0, 0) scaleX(0.98);\n    transform: translate3d(10px, 0, 0) scaleX(0.98);\n  }\n\n  90% {\n    -webkit-transform: translate3d(-5px, 0, 0) scaleX(0.995);\n    transform: translate3d(-5px, 0, 0) scaleX(0.995);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes bounceInRight {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(3000px, 0, 0) scaleX(3);\n    transform: translate3d(3000px, 0, 0) scaleX(3);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(-25px, 0, 0) scaleX(1);\n    transform: translate3d(-25px, 0, 0) scaleX(1);\n  }\n\n  75% {\n    -webkit-transform: translate3d(10px, 0, 0) scaleX(0.98);\n    transform: translate3d(10px, 0, 0) scaleX(0.98);\n  }\n\n  90% {\n    -webkit-transform: translate3d(-5px, 0, 0) scaleX(0.995);\n    transform: translate3d(-5px, 0, 0) scaleX(0.995);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__bounceInRight {\n  -webkit-animation-name: bounceInRight;\n  animation-name: bounceInRight;\n}\n@-webkit-keyframes bounceInUp {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 3000px, 0) scaleY(5);\n    transform: translate3d(0, 3000px, 0) scaleY(5);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, -20px, 0) scaleY(0.9);\n    transform: translate3d(0, -20px, 0) scaleY(0.9);\n  }\n\n  75% {\n    -webkit-transform: translate3d(0, 10px, 0) scaleY(0.95);\n    transform: translate3d(0, 10px, 0) scaleY(0.95);\n  }\n\n  90% {\n    -webkit-transform: translate3d(0, -5px, 0) scaleY(0.985);\n    transform: translate3d(0, -5px, 0) scaleY(0.985);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes bounceInUp {\n  from,\n  60%,\n  75%,\n  90%,\n  to {\n    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);\n  }\n\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 3000px, 0) scaleY(5);\n    transform: translate3d(0, 3000px, 0) scaleY(5);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, -20px, 0) scaleY(0.9);\n    transform: translate3d(0, -20px, 0) scaleY(0.9);\n  }\n\n  75% {\n    -webkit-transform: translate3d(0, 10px, 0) scaleY(0.95);\n    transform: translate3d(0, 10px, 0) scaleY(0.95);\n  }\n\n  90% {\n    -webkit-transform: translate3d(0, -5px, 0) scaleY(0.985);\n    transform: translate3d(0, -5px, 0) scaleY(0.985);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__bounceInUp {\n  -webkit-animation-name: bounceInUp;\n  animation-name: bounceInUp;\n}\n/* Bouncing exits  */\n@-webkit-keyframes bounceOut {\n  20% {\n    -webkit-transform: scale3d(0.9, 0.9, 0.9);\n    transform: scale3d(0.9, 0.9, 0.9);\n  }\n\n  50%,\n  55% {\n    opacity: 1;\n    -webkit-transform: scale3d(1.1, 1.1, 1.1);\n    transform: scale3d(1.1, 1.1, 1.1);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n}\n@keyframes bounceOut {\n  20% {\n    -webkit-transform: scale3d(0.9, 0.9, 0.9);\n    transform: scale3d(0.9, 0.9, 0.9);\n  }\n\n  50%,\n  55% {\n    opacity: 1;\n    -webkit-transform: scale3d(1.1, 1.1, 1.1);\n    transform: scale3d(1.1, 1.1, 1.1);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n}\n.animate__bounceOut {\n  -webkit-animation-duration: calc(1s * 0.75);\n  animation-duration: calc(1s * 0.75);\n  -webkit-animation-duration: calc(var(--animate-duration) * 0.75);\n  animation-duration: calc(var(--animate-duration) * 0.75);\n  -webkit-animation-name: bounceOut;\n  animation-name: bounceOut;\n}\n@-webkit-keyframes bounceOutDown {\n  20% {\n    -webkit-transform: translate3d(0, 10px, 0) scaleY(0.985);\n    transform: translate3d(0, 10px, 0) scaleY(0.985);\n  }\n\n  40%,\n  45% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, -20px, 0) scaleY(0.9);\n    transform: translate3d(0, -20px, 0) scaleY(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 2000px, 0) scaleY(3);\n    transform: translate3d(0, 2000px, 0) scaleY(3);\n  }\n}\n@keyframes bounceOutDown {\n  20% {\n    -webkit-transform: translate3d(0, 10px, 0) scaleY(0.985);\n    transform: translate3d(0, 10px, 0) scaleY(0.985);\n  }\n\n  40%,\n  45% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, -20px, 0) scaleY(0.9);\n    transform: translate3d(0, -20px, 0) scaleY(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 2000px, 0) scaleY(3);\n    transform: translate3d(0, 2000px, 0) scaleY(3);\n  }\n}\n.animate__bounceOutDown {\n  -webkit-animation-name: bounceOutDown;\n  animation-name: bounceOutDown;\n}\n@-webkit-keyframes bounceOutLeft {\n  20% {\n    opacity: 1;\n    -webkit-transform: translate3d(20px, 0, 0) scaleX(0.9);\n    transform: translate3d(20px, 0, 0) scaleX(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-2000px, 0, 0) scaleX(2);\n    transform: translate3d(-2000px, 0, 0) scaleX(2);\n  }\n}\n@keyframes bounceOutLeft {\n  20% {\n    opacity: 1;\n    -webkit-transform: translate3d(20px, 0, 0) scaleX(0.9);\n    transform: translate3d(20px, 0, 0) scaleX(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-2000px, 0, 0) scaleX(2);\n    transform: translate3d(-2000px, 0, 0) scaleX(2);\n  }\n}\n.animate__bounceOutLeft {\n  -webkit-animation-name: bounceOutLeft;\n  animation-name: bounceOutLeft;\n}\n@-webkit-keyframes bounceOutRight {\n  20% {\n    opacity: 1;\n    -webkit-transform: translate3d(-20px, 0, 0) scaleX(0.9);\n    transform: translate3d(-20px, 0, 0) scaleX(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(2000px, 0, 0) scaleX(2);\n    transform: translate3d(2000px, 0, 0) scaleX(2);\n  }\n}\n@keyframes bounceOutRight {\n  20% {\n    opacity: 1;\n    -webkit-transform: translate3d(-20px, 0, 0) scaleX(0.9);\n    transform: translate3d(-20px, 0, 0) scaleX(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(2000px, 0, 0) scaleX(2);\n    transform: translate3d(2000px, 0, 0) scaleX(2);\n  }\n}\n.animate__bounceOutRight {\n  -webkit-animation-name: bounceOutRight;\n  animation-name: bounceOutRight;\n}\n@-webkit-keyframes bounceOutUp {\n  20% {\n    -webkit-transform: translate3d(0, -10px, 0) scaleY(0.985);\n    transform: translate3d(0, -10px, 0) scaleY(0.985);\n  }\n\n  40%,\n  45% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 20px, 0) scaleY(0.9);\n    transform: translate3d(0, 20px, 0) scaleY(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -2000px, 0) scaleY(3);\n    transform: translate3d(0, -2000px, 0) scaleY(3);\n  }\n}\n@keyframes bounceOutUp {\n  20% {\n    -webkit-transform: translate3d(0, -10px, 0) scaleY(0.985);\n    transform: translate3d(0, -10px, 0) scaleY(0.985);\n  }\n\n  40%,\n  45% {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 20px, 0) scaleY(0.9);\n    transform: translate3d(0, 20px, 0) scaleY(0.9);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -2000px, 0) scaleY(3);\n    transform: translate3d(0, -2000px, 0) scaleY(3);\n  }\n}\n.animate__bounceOutUp {\n  -webkit-animation-name: bounceOutUp;\n  animation-name: bounceOutUp;\n}\n/* Fading entrances  */\n@-webkit-keyframes fadeIn {\n  from {\n    opacity: 0;\n  }\n\n  to {\n    opacity: 1;\n  }\n}\n@keyframes fadeIn {\n  from {\n    opacity: 0;\n  }\n\n  to {\n    opacity: 1;\n  }\n}\n.animate__fadeIn {\n  -webkit-animation-name: fadeIn;\n  animation-name: fadeIn;\n}\n@-webkit-keyframes fadeInDown {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInDown {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInDown {\n  -webkit-animation-name: fadeInDown;\n  animation-name: fadeInDown;\n}\n@-webkit-keyframes fadeInDownBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -2000px, 0);\n    transform: translate3d(0, -2000px, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInDownBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -2000px, 0);\n    transform: translate3d(0, -2000px, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInDownBig {\n  -webkit-animation-name: fadeInDownBig;\n  animation-name: fadeInDownBig;\n}\n@-webkit-keyframes fadeInLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInLeft {\n  -webkit-animation-name: fadeInLeft;\n  animation-name: fadeInLeft;\n}\n@-webkit-keyframes fadeInLeftBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-2000px, 0, 0);\n    transform: translate3d(-2000px, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInLeftBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-2000px, 0, 0);\n    transform: translate3d(-2000px, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInLeftBig {\n  -webkit-animation-name: fadeInLeftBig;\n  animation-name: fadeInLeftBig;\n}\n@-webkit-keyframes fadeInRight {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInRight {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInRight {\n  -webkit-animation-name: fadeInRight;\n  animation-name: fadeInRight;\n}\n@-webkit-keyframes fadeInRightBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(2000px, 0, 0);\n    transform: translate3d(2000px, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInRightBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(2000px, 0, 0);\n    transform: translate3d(2000px, 0, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInRightBig {\n  -webkit-animation-name: fadeInRightBig;\n  animation-name: fadeInRightBig;\n}\n@-webkit-keyframes fadeInUp {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInUp {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInUp {\n  -webkit-animation-name: fadeInUp;\n  animation-name: fadeInUp;\n}\n@-webkit-keyframes fadeInUpBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 2000px, 0);\n    transform: translate3d(0, 2000px, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInUpBig {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 2000px, 0);\n    transform: translate3d(0, 2000px, 0);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInUpBig {\n  -webkit-animation-name: fadeInUpBig;\n  animation-name: fadeInUpBig;\n}\n@-webkit-keyframes fadeInTopLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, -100%, 0);\n    transform: translate3d(-100%, -100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInTopLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, -100%, 0);\n    transform: translate3d(-100%, -100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInTopLeft {\n  -webkit-animation-name: fadeInTopLeft;\n  animation-name: fadeInTopLeft;\n}\n@-webkit-keyframes fadeInTopRight {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, -100%, 0);\n    transform: translate3d(100%, -100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInTopRight {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, -100%, 0);\n    transform: translate3d(100%, -100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInTopRight {\n  -webkit-animation-name: fadeInTopRight;\n  animation-name: fadeInTopRight;\n}\n@-webkit-keyframes fadeInBottomLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 100%, 0);\n    transform: translate3d(-100%, 100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInBottomLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 100%, 0);\n    transform: translate3d(-100%, 100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInBottomLeft {\n  -webkit-animation-name: fadeInBottomLeft;\n  animation-name: fadeInBottomLeft;\n}\n@-webkit-keyframes fadeInBottomRight {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 100%, 0);\n    transform: translate3d(100%, 100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes fadeInBottomRight {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 100%, 0);\n    transform: translate3d(100%, 100%, 0);\n  }\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__fadeInBottomRight {\n  -webkit-animation-name: fadeInBottomRight;\n  animation-name: fadeInBottomRight;\n}\n/* Fading exits */\n@-webkit-keyframes fadeOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n  }\n}\n@keyframes fadeOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n  }\n}\n.animate__fadeOut {\n  -webkit-animation-name: fadeOut;\n  animation-name: fadeOut;\n}\n@-webkit-keyframes fadeOutDown {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n  }\n}\n@keyframes fadeOutDown {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n  }\n}\n.animate__fadeOutDown {\n  -webkit-animation-name: fadeOutDown;\n  animation-name: fadeOutDown;\n}\n@-webkit-keyframes fadeOutDownBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 2000px, 0);\n    transform: translate3d(0, 2000px, 0);\n  }\n}\n@keyframes fadeOutDownBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, 2000px, 0);\n    transform: translate3d(0, 2000px, 0);\n  }\n}\n.animate__fadeOutDownBig {\n  -webkit-animation-name: fadeOutDownBig;\n  animation-name: fadeOutDownBig;\n}\n@-webkit-keyframes fadeOutLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n  }\n}\n@keyframes fadeOutLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n  }\n}\n.animate__fadeOutLeft {\n  -webkit-animation-name: fadeOutLeft;\n  animation-name: fadeOutLeft;\n}\n@-webkit-keyframes fadeOutLeftBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-2000px, 0, 0);\n    transform: translate3d(-2000px, 0, 0);\n  }\n}\n@keyframes fadeOutLeftBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-2000px, 0, 0);\n    transform: translate3d(-2000px, 0, 0);\n  }\n}\n.animate__fadeOutLeftBig {\n  -webkit-animation-name: fadeOutLeftBig;\n  animation-name: fadeOutLeftBig;\n}\n@-webkit-keyframes fadeOutRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n  }\n}\n@keyframes fadeOutRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n  }\n}\n.animate__fadeOutRight {\n  -webkit-animation-name: fadeOutRight;\n  animation-name: fadeOutRight;\n}\n@-webkit-keyframes fadeOutRightBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(2000px, 0, 0);\n    transform: translate3d(2000px, 0, 0);\n  }\n}\n@keyframes fadeOutRightBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(2000px, 0, 0);\n    transform: translate3d(2000px, 0, 0);\n  }\n}\n.animate__fadeOutRightBig {\n  -webkit-animation-name: fadeOutRightBig;\n  animation-name: fadeOutRightBig;\n}\n@-webkit-keyframes fadeOutUp {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n  }\n}\n@keyframes fadeOutUp {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n  }\n}\n.animate__fadeOutUp {\n  -webkit-animation-name: fadeOutUp;\n  animation-name: fadeOutUp;\n}\n@-webkit-keyframes fadeOutUpBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -2000px, 0);\n    transform: translate3d(0, -2000px, 0);\n  }\n}\n@keyframes fadeOutUpBig {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(0, -2000px, 0);\n    transform: translate3d(0, -2000px, 0);\n  }\n}\n.animate__fadeOutUpBig {\n  -webkit-animation-name: fadeOutUpBig;\n  animation-name: fadeOutUpBig;\n}\n@-webkit-keyframes fadeOutTopLeft {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, -100%, 0);\n    transform: translate3d(-100%, -100%, 0);\n  }\n}\n@keyframes fadeOutTopLeft {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, -100%, 0);\n    transform: translate3d(-100%, -100%, 0);\n  }\n}\n.animate__fadeOutTopLeft {\n  -webkit-animation-name: fadeOutTopLeft;\n  animation-name: fadeOutTopLeft;\n}\n@-webkit-keyframes fadeOutTopRight {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, -100%, 0);\n    transform: translate3d(100%, -100%, 0);\n  }\n}\n@keyframes fadeOutTopRight {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, -100%, 0);\n    transform: translate3d(100%, -100%, 0);\n  }\n}\n.animate__fadeOutTopRight {\n  -webkit-animation-name: fadeOutTopRight;\n  animation-name: fadeOutTopRight;\n}\n@-webkit-keyframes fadeOutBottomRight {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 100%, 0);\n    transform: translate3d(100%, 100%, 0);\n  }\n}\n@keyframes fadeOutBottomRight {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 100%, 0);\n    transform: translate3d(100%, 100%, 0);\n  }\n}\n.animate__fadeOutBottomRight {\n  -webkit-animation-name: fadeOutBottomRight;\n  animation-name: fadeOutBottomRight;\n}\n@-webkit-keyframes fadeOutBottomLeft {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 100%, 0);\n    transform: translate3d(-100%, 100%, 0);\n  }\n}\n@keyframes fadeOutBottomLeft {\n  from {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 100%, 0);\n    transform: translate3d(-100%, 100%, 0);\n  }\n}\n.animate__fadeOutBottomLeft {\n  -webkit-animation-name: fadeOutBottomLeft;\n  animation-name: fadeOutBottomLeft;\n}\n/* Flippers */\n@-webkit-keyframes flip {\n  from {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);\n    -webkit-animation-timing-function: ease-out;\n    animation-timing-function: ease-out;\n  }\n\n  40% {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -190deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -190deg);\n    -webkit-animation-timing-function: ease-out;\n    animation-timing-function: ease-out;\n  }\n\n  50% {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -170deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -170deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  80% {\n    -webkit-transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0)\n      rotate3d(0, 1, 0, 0deg);\n    transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0)\n      rotate3d(0, 1, 0, 0deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  to {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n}\n@keyframes flip {\n  from {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, -360deg);\n    -webkit-animation-timing-function: ease-out;\n    animation-timing-function: ease-out;\n  }\n\n  40% {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -190deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -190deg);\n    -webkit-animation-timing-function: ease-out;\n    animation-timing-function: ease-out;\n  }\n\n  50% {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -170deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 150px)\n      rotate3d(0, 1, 0, -170deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  80% {\n    -webkit-transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0)\n      rotate3d(0, 1, 0, 0deg);\n    transform: perspective(400px) scale3d(0.95, 0.95, 0.95) translate3d(0, 0, 0)\n      rotate3d(0, 1, 0, 0deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  to {\n    -webkit-transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);\n    transform: perspective(400px) scale3d(1, 1, 1) translate3d(0, 0, 0) rotate3d(0, 1, 0, 0deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n}\n.animate__animated.animate__flip {\n  -webkit-backface-visibility: visible;\n  backface-visibility: visible;\n  -webkit-animation-name: flip;\n  animation-name: flip;\n}\n@-webkit-keyframes flipInX {\n  from {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n    opacity: 0;\n  }\n\n  40% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  60% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);\n  }\n\n  to {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n}\n@keyframes flipInX {\n  from {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n    opacity: 0;\n  }\n\n  40% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  60% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, 10deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, -5deg);\n  }\n\n  to {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n}\n.animate__flipInX {\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n  -webkit-animation-name: flipInX;\n  animation-name: flipInX;\n}\n@-webkit-keyframes flipInY {\n  from {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n    opacity: 0;\n  }\n\n  40% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  60% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);\n  }\n\n  to {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n}\n@keyframes flipInY {\n  from {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n    opacity: 0;\n  }\n\n  40% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, -20deg);\n    -webkit-animation-timing-function: ease-in;\n    animation-timing-function: ease-in;\n  }\n\n  60% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, 10deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, -5deg);\n  }\n\n  to {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n}\n.animate__flipInY {\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n  -webkit-animation-name: flipInY;\n  animation-name: flipInY;\n}\n@-webkit-keyframes flipOutX {\n  from {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n\n  30% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    opacity: 0;\n  }\n}\n@keyframes flipOutX {\n  from {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n\n  30% {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, -20deg);\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    transform: perspective(400px) rotate3d(1, 0, 0, 90deg);\n    opacity: 0;\n  }\n}\n.animate__flipOutX {\n  -webkit-animation-duration: calc(1s * 0.75);\n  animation-duration: calc(1s * 0.75);\n  -webkit-animation-duration: calc(var(--animate-duration) * 0.75);\n  animation-duration: calc(var(--animate-duration) * 0.75);\n  -webkit-animation-name: flipOutX;\n  animation-name: flipOutX;\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n}\n@-webkit-keyframes flipOutY {\n  from {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n\n  30% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    opacity: 0;\n  }\n}\n@keyframes flipOutY {\n  from {\n    -webkit-transform: perspective(400px);\n    transform: perspective(400px);\n  }\n\n  30% {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, -15deg);\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    transform: perspective(400px) rotate3d(0, 1, 0, 90deg);\n    opacity: 0;\n  }\n}\n.animate__flipOutY {\n  -webkit-animation-duration: calc(1s * 0.75);\n  animation-duration: calc(1s * 0.75);\n  -webkit-animation-duration: calc(var(--animate-duration) * 0.75);\n  animation-duration: calc(var(--animate-duration) * 0.75);\n  -webkit-backface-visibility: visible !important;\n  backface-visibility: visible !important;\n  -webkit-animation-name: flipOutY;\n  animation-name: flipOutY;\n}\n/* Lightspeed */\n@-webkit-keyframes lightSpeedInRight {\n  from {\n    -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);\n    transform: translate3d(100%, 0, 0) skewX(-30deg);\n    opacity: 0;\n  }\n\n  60% {\n    -webkit-transform: skewX(20deg);\n    transform: skewX(20deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: skewX(-5deg);\n    transform: skewX(-5deg);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes lightSpeedInRight {\n  from {\n    -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);\n    transform: translate3d(100%, 0, 0) skewX(-30deg);\n    opacity: 0;\n  }\n\n  60% {\n    -webkit-transform: skewX(20deg);\n    transform: skewX(20deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: skewX(-5deg);\n    transform: skewX(-5deg);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__lightSpeedInRight {\n  -webkit-animation-name: lightSpeedInRight;\n  animation-name: lightSpeedInRight;\n  -webkit-animation-timing-function: ease-out;\n  animation-timing-function: ease-out;\n}\n@-webkit-keyframes lightSpeedInLeft {\n  from {\n    -webkit-transform: translate3d(-100%, 0, 0) skewX(30deg);\n    transform: translate3d(-100%, 0, 0) skewX(30deg);\n    opacity: 0;\n  }\n\n  60% {\n    -webkit-transform: skewX(-20deg);\n    transform: skewX(-20deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: skewX(5deg);\n    transform: skewX(5deg);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes lightSpeedInLeft {\n  from {\n    -webkit-transform: translate3d(-100%, 0, 0) skewX(30deg);\n    transform: translate3d(-100%, 0, 0) skewX(30deg);\n    opacity: 0;\n  }\n\n  60% {\n    -webkit-transform: skewX(-20deg);\n    transform: skewX(-20deg);\n    opacity: 1;\n  }\n\n  80% {\n    -webkit-transform: skewX(5deg);\n    transform: skewX(5deg);\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__lightSpeedInLeft {\n  -webkit-animation-name: lightSpeedInLeft;\n  animation-name: lightSpeedInLeft;\n  -webkit-animation-timing-function: ease-out;\n  animation-timing-function: ease-out;\n}\n@-webkit-keyframes lightSpeedOutRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);\n    transform: translate3d(100%, 0, 0) skewX(30deg);\n    opacity: 0;\n  }\n}\n@keyframes lightSpeedOutRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);\n    transform: translate3d(100%, 0, 0) skewX(30deg);\n    opacity: 0;\n  }\n}\n.animate__lightSpeedOutRight {\n  -webkit-animation-name: lightSpeedOutRight;\n  animation-name: lightSpeedOutRight;\n  -webkit-animation-timing-function: ease-in;\n  animation-timing-function: ease-in;\n}\n@-webkit-keyframes lightSpeedOutLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: translate3d(-100%, 0, 0) skewX(-30deg);\n    transform: translate3d(-100%, 0, 0) skewX(-30deg);\n    opacity: 0;\n  }\n}\n@keyframes lightSpeedOutLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: translate3d(-100%, 0, 0) skewX(-30deg);\n    transform: translate3d(-100%, 0, 0) skewX(-30deg);\n    opacity: 0;\n  }\n}\n.animate__lightSpeedOutLeft {\n  -webkit-animation-name: lightSpeedOutLeft;\n  animation-name: lightSpeedOutLeft;\n  -webkit-animation-timing-function: ease-in;\n  animation-timing-function: ease-in;\n}\n/* Rotating entrances */\n@-webkit-keyframes rotateIn {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, -200deg);\n    transform: rotate3d(0, 0, 1, -200deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n@keyframes rotateIn {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, -200deg);\n    transform: rotate3d(0, 0, 1, -200deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n.animate__rotateIn {\n  -webkit-animation-name: rotateIn;\n  animation-name: rotateIn;\n  -webkit-transform-origin: center;\n  transform-origin: center;\n}\n@-webkit-keyframes rotateInDownLeft {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, -45deg);\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n@keyframes rotateInDownLeft {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, -45deg);\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n.animate__rotateInDownLeft {\n  -webkit-animation-name: rotateInDownLeft;\n  animation-name: rotateInDownLeft;\n  -webkit-transform-origin: left bottom;\n  transform-origin: left bottom;\n}\n@-webkit-keyframes rotateInDownRight {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, 45deg);\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n@keyframes rotateInDownRight {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, 45deg);\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n.animate__rotateInDownRight {\n  -webkit-animation-name: rotateInDownRight;\n  animation-name: rotateInDownRight;\n  -webkit-transform-origin: right bottom;\n  transform-origin: right bottom;\n}\n@-webkit-keyframes rotateInUpLeft {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, 45deg);\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n@keyframes rotateInUpLeft {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, 45deg);\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n.animate__rotateInUpLeft {\n  -webkit-animation-name: rotateInUpLeft;\n  animation-name: rotateInUpLeft;\n  -webkit-transform-origin: left bottom;\n  transform-origin: left bottom;\n}\n@-webkit-keyframes rotateInUpRight {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, -90deg);\n    transform: rotate3d(0, 0, 1, -90deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n@keyframes rotateInUpRight {\n  from {\n    -webkit-transform: rotate3d(0, 0, 1, -90deg);\n    transform: rotate3d(0, 0, 1, -90deg);\n    opacity: 0;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n    opacity: 1;\n  }\n}\n.animate__rotateInUpRight {\n  -webkit-animation-name: rotateInUpRight;\n  animation-name: rotateInUpRight;\n  -webkit-transform-origin: right bottom;\n  transform-origin: right bottom;\n}\n/* Rotating exits */\n@-webkit-keyframes rotateOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 200deg);\n    transform: rotate3d(0, 0, 1, 200deg);\n    opacity: 0;\n  }\n}\n@keyframes rotateOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 200deg);\n    transform: rotate3d(0, 0, 1, 200deg);\n    opacity: 0;\n  }\n}\n.animate__rotateOut {\n  -webkit-animation-name: rotateOut;\n  animation-name: rotateOut;\n  -webkit-transform-origin: center;\n  transform-origin: center;\n}\n@-webkit-keyframes rotateOutDownLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 45deg);\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n}\n@keyframes rotateOutDownLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 45deg);\n    transform: rotate3d(0, 0, 1, 45deg);\n    opacity: 0;\n  }\n}\n.animate__rotateOutDownLeft {\n  -webkit-animation-name: rotateOutDownLeft;\n  animation-name: rotateOutDownLeft;\n  -webkit-transform-origin: left bottom;\n  transform-origin: left bottom;\n}\n@-webkit-keyframes rotateOutDownRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, -45deg);\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n}\n@keyframes rotateOutDownRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, -45deg);\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n}\n.animate__rotateOutDownRight {\n  -webkit-animation-name: rotateOutDownRight;\n  animation-name: rotateOutDownRight;\n  -webkit-transform-origin: right bottom;\n  transform-origin: right bottom;\n}\n@-webkit-keyframes rotateOutUpLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, -45deg);\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n}\n@keyframes rotateOutUpLeft {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, -45deg);\n    transform: rotate3d(0, 0, 1, -45deg);\n    opacity: 0;\n  }\n}\n.animate__rotateOutUpLeft {\n  -webkit-animation-name: rotateOutUpLeft;\n  animation-name: rotateOutUpLeft;\n  -webkit-transform-origin: left bottom;\n  transform-origin: left bottom;\n}\n@-webkit-keyframes rotateOutUpRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 90deg);\n    transform: rotate3d(0, 0, 1, 90deg);\n    opacity: 0;\n  }\n}\n@keyframes rotateOutUpRight {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: rotate3d(0, 0, 1, 90deg);\n    transform: rotate3d(0, 0, 1, 90deg);\n    opacity: 0;\n  }\n}\n.animate__rotateOutUpRight {\n  -webkit-animation-name: rotateOutUpRight;\n  animation-name: rotateOutUpRight;\n  -webkit-transform-origin: right bottom;\n  transform-origin: right bottom;\n}\n/* Specials */\n@-webkit-keyframes hinge {\n  0% {\n    -webkit-animation-timing-function: ease-in-out;\n    animation-timing-function: ease-in-out;\n  }\n\n  20%,\n  60% {\n    -webkit-transform: rotate3d(0, 0, 1, 80deg);\n    transform: rotate3d(0, 0, 1, 80deg);\n    -webkit-animation-timing-function: ease-in-out;\n    animation-timing-function: ease-in-out;\n  }\n\n  40%,\n  80% {\n    -webkit-transform: rotate3d(0, 0, 1, 60deg);\n    transform: rotate3d(0, 0, 1, 60deg);\n    -webkit-animation-timing-function: ease-in-out;\n    animation-timing-function: ease-in-out;\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 700px, 0);\n    transform: translate3d(0, 700px, 0);\n    opacity: 0;\n  }\n}\n@keyframes hinge {\n  0% {\n    -webkit-animation-timing-function: ease-in-out;\n    animation-timing-function: ease-in-out;\n  }\n\n  20%,\n  60% {\n    -webkit-transform: rotate3d(0, 0, 1, 80deg);\n    transform: rotate3d(0, 0, 1, 80deg);\n    -webkit-animation-timing-function: ease-in-out;\n    animation-timing-function: ease-in-out;\n  }\n\n  40%,\n  80% {\n    -webkit-transform: rotate3d(0, 0, 1, 60deg);\n    transform: rotate3d(0, 0, 1, 60deg);\n    -webkit-animation-timing-function: ease-in-out;\n    animation-timing-function: ease-in-out;\n    opacity: 1;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 700px, 0);\n    transform: translate3d(0, 700px, 0);\n    opacity: 0;\n  }\n}\n.animate__hinge {\n  -webkit-animation-duration: calc(1s * 2);\n  animation-duration: calc(1s * 2);\n  -webkit-animation-duration: calc(var(--animate-duration) * 2);\n  animation-duration: calc(var(--animate-duration) * 2);\n  -webkit-animation-name: hinge;\n  animation-name: hinge;\n  -webkit-transform-origin: top left;\n  transform-origin: top left;\n}\n@-webkit-keyframes jackInTheBox {\n  from {\n    opacity: 0;\n    -webkit-transform: scale(0.1) rotate(30deg);\n    transform: scale(0.1) rotate(30deg);\n    -webkit-transform-origin: center bottom;\n    transform-origin: center bottom;\n  }\n\n  50% {\n    -webkit-transform: rotate(-10deg);\n    transform: rotate(-10deg);\n  }\n\n  70% {\n    -webkit-transform: rotate(3deg);\n    transform: rotate(3deg);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n}\n@keyframes jackInTheBox {\n  from {\n    opacity: 0;\n    -webkit-transform: scale(0.1) rotate(30deg);\n    transform: scale(0.1) rotate(30deg);\n    -webkit-transform-origin: center bottom;\n    transform-origin: center bottom;\n  }\n\n  50% {\n    -webkit-transform: rotate(-10deg);\n    transform: rotate(-10deg);\n  }\n\n  70% {\n    -webkit-transform: rotate(3deg);\n    transform: rotate(3deg);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: scale(1);\n    transform: scale(1);\n  }\n}\n.animate__jackInTheBox {\n  -webkit-animation-name: jackInTheBox;\n  animation-name: jackInTheBox;\n}\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n@-webkit-keyframes rollIn {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);\n    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes rollIn {\n  from {\n    opacity: 0;\n    -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);\n    transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);\n  }\n\n  to {\n    opacity: 1;\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__rollIn {\n  -webkit-animation-name: rollIn;\n  animation-name: rollIn;\n}\n/* originally authored by Nick Pettit - https://github.com/nickpettit/glide */\n@-webkit-keyframes rollOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);\n    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);\n  }\n}\n@keyframes rollOut {\n  from {\n    opacity: 1;\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);\n    transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);\n  }\n}\n.animate__rollOut {\n  -webkit-animation-name: rollOut;\n  animation-name: rollOut;\n}\n/* Zooming entrances */\n@-webkit-keyframes zoomIn {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n\n  50% {\n    opacity: 1;\n  }\n}\n@keyframes zoomIn {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n\n  50% {\n    opacity: 1;\n  }\n}\n.animate__zoomIn {\n  -webkit-animation-name: zoomIn;\n  animation-name: zoomIn;\n}\n@-webkit-keyframes zoomInDown {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n@keyframes zoomInDown {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -1000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n.animate__zoomInDown {\n  -webkit-animation-name: zoomInDown;\n  animation-name: zoomInDown;\n}\n@-webkit-keyframes zoomInLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n@keyframes zoomInLeft {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(-1000px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(10px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n.animate__zoomInLeft {\n  -webkit-animation-name: zoomInLeft;\n  animation-name: zoomInLeft;\n}\n@-webkit-keyframes zoomInRight {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n@keyframes zoomInRight {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(1000px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(-10px, 0, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n.animate__zoomInRight {\n  -webkit-animation-name: zoomInRight;\n  animation-name: zoomInRight;\n}\n@-webkit-keyframes zoomInUp {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n@keyframes zoomInUp {\n  from {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 1000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  60% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n.animate__zoomInUp {\n  -webkit-animation-name: zoomInUp;\n  animation-name: zoomInUp;\n}\n/* Zooming exits */\n@-webkit-keyframes zoomOut {\n  from {\n    opacity: 1;\n  }\n\n  50% {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n\n  to {\n    opacity: 0;\n  }\n}\n@keyframes zoomOut {\n  from {\n    opacity: 1;\n  }\n\n  50% {\n    opacity: 0;\n    -webkit-transform: scale3d(0.3, 0.3, 0.3);\n    transform: scale3d(0.3, 0.3, 0.3);\n  }\n\n  to {\n    opacity: 0;\n  }\n}\n.animate__zoomOut {\n  -webkit-animation-name: zoomOut;\n  animation-name: zoomOut;\n}\n@-webkit-keyframes zoomOutDown {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n@keyframes zoomOutDown {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, -60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, 2000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n.animate__zoomOutDown {\n  -webkit-animation-name: zoomOutDown;\n  animation-name: zoomOutDown;\n  -webkit-transform-origin: center bottom;\n  transform-origin: center bottom;\n}\n@-webkit-keyframes zoomOutLeft {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale(0.1) translate3d(-2000px, 0, 0);\n    transform: scale(0.1) translate3d(-2000px, 0, 0);\n  }\n}\n@keyframes zoomOutLeft {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(42px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale(0.1) translate3d(-2000px, 0, 0);\n    transform: scale(0.1) translate3d(-2000px, 0, 0);\n  }\n}\n.animate__zoomOutLeft {\n  -webkit-animation-name: zoomOutLeft;\n  animation-name: zoomOutLeft;\n  -webkit-transform-origin: left center;\n  transform-origin: left center;\n}\n@-webkit-keyframes zoomOutRight {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale(0.1) translate3d(2000px, 0, 0);\n    transform: scale(0.1) translate3d(2000px, 0, 0);\n  }\n}\n@keyframes zoomOutRight {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(-42px, 0, 0);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale(0.1) translate3d(2000px, 0, 0);\n    transform: scale(0.1) translate3d(2000px, 0, 0);\n  }\n}\n.animate__zoomOutRight {\n  -webkit-animation-name: zoomOutRight;\n  animation-name: zoomOutRight;\n  -webkit-transform-origin: right center;\n  transform-origin: right center;\n}\n@-webkit-keyframes zoomOutUp {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n@keyframes zoomOutUp {\n  40% {\n    opacity: 1;\n    -webkit-transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    transform: scale3d(0.475, 0.475, 0.475) translate3d(0, 60px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);\n  }\n\n  to {\n    opacity: 0;\n    -webkit-transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);\n    transform: scale3d(0.1, 0.1, 0.1) translate3d(0, -2000px, 0);\n    -webkit-animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n    animation-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1);\n  }\n}\n.animate__zoomOutUp {\n  -webkit-animation-name: zoomOutUp;\n  animation-name: zoomOutUp;\n  -webkit-transform-origin: center bottom;\n  transform-origin: center bottom;\n}\n/* Sliding entrances */\n@-webkit-keyframes slideInDown {\n  from {\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes slideInDown {\n  from {\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__slideInDown {\n  -webkit-animation-name: slideInDown;\n  animation-name: slideInDown;\n}\n@-webkit-keyframes slideInLeft {\n  from {\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes slideInLeft {\n  from {\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__slideInLeft {\n  -webkit-animation-name: slideInLeft;\n  animation-name: slideInLeft;\n}\n@-webkit-keyframes slideInRight {\n  from {\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes slideInRight {\n  from {\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__slideInRight {\n  -webkit-animation-name: slideInRight;\n  animation-name: slideInRight;\n}\n@-webkit-keyframes slideInUp {\n  from {\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n@keyframes slideInUp {\n  from {\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n    visibility: visible;\n  }\n\n  to {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n}\n.animate__slideInUp {\n  -webkit-animation-name: slideInUp;\n  animation-name: slideInUp;\n}\n/* Sliding exits */\n@-webkit-keyframes slideOutDown {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n  }\n}\n@keyframes slideOutDown {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(0, 100%, 0);\n    transform: translate3d(0, 100%, 0);\n  }\n}\n.animate__slideOutDown {\n  -webkit-animation-name: slideOutDown;\n  animation-name: slideOutDown;\n}\n@-webkit-keyframes slideOutLeft {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n  }\n}\n@keyframes slideOutLeft {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(-100%, 0, 0);\n    transform: translate3d(-100%, 0, 0);\n  }\n}\n.animate__slideOutLeft {\n  -webkit-animation-name: slideOutLeft;\n  animation-name: slideOutLeft;\n}\n@-webkit-keyframes slideOutRight {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n  }\n}\n@keyframes slideOutRight {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(100%, 0, 0);\n    transform: translate3d(100%, 0, 0);\n  }\n}\n.animate__slideOutRight {\n  -webkit-animation-name: slideOutRight;\n  animation-name: slideOutRight;\n}\n@-webkit-keyframes slideOutUp {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n  }\n}\n@keyframes slideOutUp {\n  from {\n    -webkit-transform: translate3d(0, 0, 0);\n    transform: translate3d(0, 0, 0);\n  }\n\n  to {\n    visibility: hidden;\n    -webkit-transform: translate3d(0, -100%, 0);\n    transform: translate3d(0, -100%, 0);\n  }\n}\n.animate__slideOutUp {\n  -webkit-animation-name: slideOutUp;\n  animation-name: slideOutUp;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/runtime/api.js":
/*!*****************************************************!*\
  !*** ./node_modules/css-loader/dist/runtime/api.js ***!
  \*****************************************************/
/***/ ((module) => {

"use strict";


/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
// eslint-disable-next-line func-names
module.exports = function (cssWithMappingToString) {
  var list = []; // return the list of modules as css string

  list.toString = function toString() {
    return this.map(function (item) {
      var content = cssWithMappingToString(item);

      if (item[2]) {
        return "@media ".concat(item[2], " {").concat(content, "}");
      }

      return content;
    }).join("");
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === "string") {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, ""]];
    }

    var alreadyImportedModules = {};

    if (dedupe) {
      for (var i = 0; i < this.length; i++) {
        // eslint-disable-next-line prefer-destructuring
        var id = this[i][0];

        if (id != null) {
          alreadyImportedModules[id] = true;
        }
      }
    }

    for (var _i = 0; _i < modules.length; _i++) {
      var item = [].concat(modules[_i]);

      if (dedupe && alreadyImportedModules[item[0]]) {
        // eslint-disable-next-line no-continue
        continue;
      }

      if (mediaQuery) {
        if (!item[2]) {
          item[2] = mediaQuery;
        } else {
          item[2] = "".concat(mediaQuery, " and ").concat(item[2]);
        }
      }

      list.push(item);
    }
  };

  return list;
};

/***/ }),

/***/ "./node_modules/animate.css/animate.css":
/*!**********************************************!*\
  !*** ./node_modules/animate.css/animate.css ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _css_loader_dist_cjs_js_clonedRuleSet_15_0_rules_0_use_1_postcss_loader_dist_cjs_js_clonedRuleSet_15_0_rules_0_use_2_animate_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../css-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[1]!../postcss-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[2]!./animate.css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[1]!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-15[0].rules[0].use[2]!./node_modules/animate.css/animate.css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_css_loader_dist_cjs_js_clonedRuleSet_15_0_rules_0_use_1_postcss_loader_dist_cjs_js_clonedRuleSet_15_0_rules_0_use_2_animate_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_css_loader_dist_cjs_js_clonedRuleSet_15_0_rules_0_use_1_postcss_loader_dist_cjs_js_clonedRuleSet_15_0_rules_0_use_2_animate_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : 0;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && typeof btoa !== 'undefined') {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

/***/ }),

/***/ "./node_modules/typed.js/lib/typed.js":
/*!********************************************!*\
  !*** ./node_modules/typed.js/lib/typed.js ***!
  \********************************************/
/***/ (function(module) {

/*!
 * 
 *   typed.js - A JavaScript Typing Animation Library
 *   Author: Matt Boldt <me@mattboldt.com>
 *   Version: v2.0.12
 *   Url: https://github.com/mattboldt/typed.js
 *   License(s): MIT
 * 
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(true)
		module.exports = factory();
	else {}
})(this, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __nested_webpack_require_737__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __nested_webpack_require_737__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__nested_webpack_require_737__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__nested_webpack_require_737__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__nested_webpack_require_737__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __nested_webpack_require_737__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __nested_webpack_require_2018__) {

	'use strict';
	
	Object.defineProperty(exports, '__esModule', {
	  value: true
	});
	
	var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }
	
	var _initializerJs = __nested_webpack_require_2018__(1);
	
	var _htmlParserJs = __nested_webpack_require_2018__(3);
	
	/**
	 * Welcome to Typed.js!
	 * @param {string} elementId HTML element ID _OR_ HTML element
	 * @param {object} options options object
	 * @returns {object} a new Typed object
	 */
	
	var Typed = (function () {
	  function Typed(elementId, options) {
	    _classCallCheck(this, Typed);
	
	    // Initialize it up
	    _initializerJs.initializer.load(this, options, elementId);
	    // All systems go!
	    this.begin();
	  }
	
	  /**
	   * Toggle start() and stop() of the Typed instance
	   * @public
	   */
	
	  _createClass(Typed, [{
	    key: 'toggle',
	    value: function toggle() {
	      this.pause.status ? this.start() : this.stop();
	    }
	
	    /**
	     * Stop typing / backspacing and enable cursor blinking
	     * @public
	     */
	  }, {
	    key: 'stop',
	    value: function stop() {
	      if (this.typingComplete) return;
	      if (this.pause.status) return;
	      this.toggleBlinking(true);
	      this.pause.status = true;
	      this.options.onStop(this.arrayPos, this);
	    }
	
	    /**
	     * Start typing / backspacing after being stopped
	     * @public
	     */
	  }, {
	    key: 'start',
	    value: function start() {
	      if (this.typingComplete) return;
	      if (!this.pause.status) return;
	      this.pause.status = false;
	      if (this.pause.typewrite) {
	        this.typewrite(this.pause.curString, this.pause.curStrPos);
	      } else {
	        this.backspace(this.pause.curString, this.pause.curStrPos);
	      }
	      this.options.onStart(this.arrayPos, this);
	    }
	
	    /**
	     * Destroy this instance of Typed
	     * @public
	     */
	  }, {
	    key: 'destroy',
	    value: function destroy() {
	      this.reset(false);
	      this.options.onDestroy(this);
	    }
	
	    /**
	     * Reset Typed and optionally restarts
	     * @param {boolean} restart
	     * @public
	     */
	  }, {
	    key: 'reset',
	    value: function reset() {
	      var restart = arguments.length <= 0 || arguments[0] === undefined ? true : arguments[0];
	
	      clearInterval(this.timeout);
	      this.replaceText('');
	      if (this.cursor && this.cursor.parentNode) {
	        this.cursor.parentNode.removeChild(this.cursor);
	        this.cursor = null;
	      }
	      this.strPos = 0;
	      this.arrayPos = 0;
	      this.curLoop = 0;
	      if (restart) {
	        this.insertCursor();
	        this.options.onReset(this);
	        this.begin();
	      }
	    }
	
	    /**
	     * Begins the typing animation
	     * @private
	     */
	  }, {
	    key: 'begin',
	    value: function begin() {
	      var _this = this;
	
	      this.options.onBegin(this);
	      this.typingComplete = false;
	      this.shuffleStringsIfNeeded(this);
	      this.insertCursor();
	      if (this.bindInputFocusEvents) this.bindFocusEvents();
	      this.timeout = setTimeout(function () {
	        // Check if there is some text in the element, if yes start by backspacing the default message
	        if (!_this.currentElContent || _this.currentElContent.length === 0) {
	          _this.typewrite(_this.strings[_this.sequence[_this.arrayPos]], _this.strPos);
	        } else {
	          // Start typing
	          _this.backspace(_this.currentElContent, _this.currentElContent.length);
	        }
	      }, this.startDelay);
	    }
	
	    /**
	     * Called for each character typed
	     * @param {string} curString the current string in the strings array
	     * @param {number} curStrPos the current position in the curString
	     * @private
	     */
	  }, {
	    key: 'typewrite',
	    value: function typewrite(curString, curStrPos) {
	      var _this2 = this;
	
	      if (this.fadeOut && this.el.classList.contains(this.fadeOutClass)) {
	        this.el.classList.remove(this.fadeOutClass);
	        if (this.cursor) this.cursor.classList.remove(this.fadeOutClass);
	      }
	
	      var humanize = this.humanizer(this.typeSpeed);
	      var numChars = 1;
	
	      if (this.pause.status === true) {
	        this.setPauseStatus(curString, curStrPos, true);
	        return;
	      }
	
	      // contain typing function in a timeout humanize'd delay
	      this.timeout = setTimeout(function () {
	        // skip over any HTML chars
	        curStrPos = _htmlParserJs.htmlParser.typeHtmlChars(curString, curStrPos, _this2);
	
	        var pauseTime = 0;
	        var substr = curString.substr(curStrPos);
	        // check for an escape character before a pause value
	        // format: \^\d+ .. eg: ^1000 .. should be able to print the ^ too using ^^
	        // single ^ are removed from string
	        if (substr.charAt(0) === '^') {
	          if (/^\^\d+/.test(substr)) {
	            var skip = 1; // skip at least 1
	            substr = /\d+/.exec(substr)[0];
	            skip += substr.length;
	            pauseTime = parseInt(substr);
	            _this2.temporaryPause = true;
	            _this2.options.onTypingPaused(_this2.arrayPos, _this2);
	            // strip out the escape character and pause value so they're not printed
	            curString = curString.substring(0, curStrPos) + curString.substring(curStrPos + skip);
	            _this2.toggleBlinking(true);
	          }
	        }
	
	        // check for skip characters formatted as
	        // "this is a `string to print NOW` ..."
	        if (substr.charAt(0) === '`') {
	          while (curString.substr(curStrPos + numChars).charAt(0) !== '`') {
	            numChars++;
	            if (curStrPos + numChars > curString.length) break;
	          }
	          // strip out the escape characters and append all the string in between
	          var stringBeforeSkip = curString.substring(0, curStrPos);
	          var stringSkipped = curString.substring(stringBeforeSkip.length + 1, curStrPos + numChars);
	          var stringAfterSkip = curString.substring(curStrPos + numChars + 1);
	          curString = stringBeforeSkip + stringSkipped + stringAfterSkip;
	          numChars--;
	        }
	
	        // timeout for any pause after a character
	        _this2.timeout = setTimeout(function () {
	          // Accounts for blinking while paused
	          _this2.toggleBlinking(false);
	
	          // We're done with this sentence!
	          if (curStrPos >= curString.length) {
	            _this2.doneTyping(curString, curStrPos);
	          } else {
	            _this2.keepTyping(curString, curStrPos, numChars);
	          }
	          // end of character pause
	          if (_this2.temporaryPause) {
	            _this2.temporaryPause = false;
	            _this2.options.onTypingResumed(_this2.arrayPos, _this2);
	          }
	        }, pauseTime);
	
	        // humanized value for typing
	      }, humanize);
	    }
	
	    /**
	     * Continue to the next string & begin typing
	     * @param {string} curString the current string in the strings array
	     * @param {number} curStrPos the current position in the curString
	     * @private
	     */
	  }, {
	    key: 'keepTyping',
	    value: function keepTyping(curString, curStrPos, numChars) {
	      // call before functions if applicable
	      if (curStrPos === 0) {
	        this.toggleBlinking(false);
	        this.options.preStringTyped(this.arrayPos, this);
	      }
	      // start typing each new char into existing string
	      // curString: arg, this.el.html: original text inside element
	      curStrPos += numChars;
	      var nextString = curString.substr(0, curStrPos);
	      this.replaceText(nextString);
	      // loop the function
	      this.typewrite(curString, curStrPos);
	    }
	
	    /**
	     * We're done typing the current string
	     * @param {string} curString the current string in the strings array
	     * @param {number} curStrPos the current position in the curString
	     * @private
	     */
	  }, {
	    key: 'doneTyping',
	    value: function doneTyping(curString, curStrPos) {
	      var _this3 = this;
	
	      // fires callback function
	      this.options.onStringTyped(this.arrayPos, this);
	      this.toggleBlinking(true);
	      // is this the final string
	      if (this.arrayPos === this.strings.length - 1) {
	        // callback that occurs on the last typed string
	        this.complete();
	        // quit if we wont loop back
	        if (this.loop === false || this.curLoop === this.loopCount) {
	          return;
	        }
	      }
	      this.timeout = setTimeout(function () {
	        _this3.backspace(curString, curStrPos);
	      }, this.backDelay);
	    }
	
	    /**
	     * Backspaces 1 character at a time
	     * @param {string} curString the current string in the strings array
	     * @param {number} curStrPos the current position in the curString
	     * @private
	     */
	  }, {
	    key: 'backspace',
	    value: function backspace(curString, curStrPos) {
	      var _this4 = this;
	
	      if (this.pause.status === true) {
	        this.setPauseStatus(curString, curStrPos, false);
	        return;
	      }
	      if (this.fadeOut) return this.initFadeOut();
	
	      this.toggleBlinking(false);
	      var humanize = this.humanizer(this.backSpeed);
	
	      this.timeout = setTimeout(function () {
	        curStrPos = _htmlParserJs.htmlParser.backSpaceHtmlChars(curString, curStrPos, _this4);
	        // replace text with base text + typed characters
	        var curStringAtPosition = curString.substr(0, curStrPos);
	        _this4.replaceText(curStringAtPosition);
	
	        // if smartBack is enabled
	        if (_this4.smartBackspace) {
	          // the remaining part of the current string is equal of the same part of the new string
	          var nextString = _this4.strings[_this4.arrayPos + 1];
	          if (nextString && curStringAtPosition === nextString.substr(0, curStrPos)) {
	            _this4.stopNum = curStrPos;
	          } else {
	            _this4.stopNum = 0;
	          }
	        }
	
	        // if the number (id of character in current string) is
	        // less than the stop number, keep going
	        if (curStrPos > _this4.stopNum) {
	          // subtract characters one by one
	          curStrPos--;
	          // loop the function
	          _this4.backspace(curString, curStrPos);
	        } else if (curStrPos <= _this4.stopNum) {
	          // if the stop number has been reached, increase
	          // array position to next string
	          _this4.arrayPos++;
	          // When looping, begin at the beginning after backspace complete
	          if (_this4.arrayPos === _this4.strings.length) {
	            _this4.arrayPos = 0;
	            _this4.options.onLastStringBackspaced();
	            _this4.shuffleStringsIfNeeded();
	            _this4.begin();
	          } else {
	            _this4.typewrite(_this4.strings[_this4.sequence[_this4.arrayPos]], curStrPos);
	          }
	        }
	        // humanized value for typing
	      }, humanize);
	    }
	
	    /**
	     * Full animation is complete
	     * @private
	     */
	  }, {
	    key: 'complete',
	    value: function complete() {
	      this.options.onComplete(this);
	      if (this.loop) {
	        this.curLoop++;
	      } else {
	        this.typingComplete = true;
	      }
	    }
	
	    /**
	     * Has the typing been stopped
	     * @param {string} curString the current string in the strings array
	     * @param {number} curStrPos the current position in the curString
	     * @param {boolean} isTyping
	     * @private
	     */
	  }, {
	    key: 'setPauseStatus',
	    value: function setPauseStatus(curString, curStrPos, isTyping) {
	      this.pause.typewrite = isTyping;
	      this.pause.curString = curString;
	      this.pause.curStrPos = curStrPos;
	    }
	
	    /**
	     * Toggle the blinking cursor
	     * @param {boolean} isBlinking
	     * @private
	     */
	  }, {
	    key: 'toggleBlinking',
	    value: function toggleBlinking(isBlinking) {
	      if (!this.cursor) return;
	      // if in paused state, don't toggle blinking a 2nd time
	      if (this.pause.status) return;
	      if (this.cursorBlinking === isBlinking) return;
	      this.cursorBlinking = isBlinking;
	      if (isBlinking) {
	        this.cursor.classList.add('typed-cursor--blink');
	      } else {
	        this.cursor.classList.remove('typed-cursor--blink');
	      }
	    }
	
	    /**
	     * Speed in MS to type
	     * @param {number} speed
	     * @private
	     */
	  }, {
	    key: 'humanizer',
	    value: function humanizer(speed) {
	      return Math.round(Math.random() * speed / 2) + speed;
	    }
	
	    /**
	     * Shuffle the sequence of the strings array
	     * @private
	     */
	  }, {
	    key: 'shuffleStringsIfNeeded',
	    value: function shuffleStringsIfNeeded() {
	      if (!this.shuffle) return;
	      this.sequence = this.sequence.sort(function () {
	        return Math.random() - 0.5;
	      });
	    }
	
	    /**
	     * Adds a CSS class to fade out current string
	     * @private
	     */
	  }, {
	    key: 'initFadeOut',
	    value: function initFadeOut() {
	      var _this5 = this;
	
	      this.el.className += ' ' + this.fadeOutClass;
	      if (this.cursor) this.cursor.className += ' ' + this.fadeOutClass;
	      return setTimeout(function () {
	        _this5.arrayPos++;
	        _this5.replaceText('');
	
	        // Resets current string if end of loop reached
	        if (_this5.strings.length > _this5.arrayPos) {
	          _this5.typewrite(_this5.strings[_this5.sequence[_this5.arrayPos]], 0);
	        } else {
	          _this5.typewrite(_this5.strings[0], 0);
	          _this5.arrayPos = 0;
	        }
	      }, this.fadeOutDelay);
	    }
	
	    /**
	     * Replaces current text in the HTML element
	     * depending on element type
	     * @param {string} str
	     * @private
	     */
	  }, {
	    key: 'replaceText',
	    value: function replaceText(str) {
	      if (this.attr) {
	        this.el.setAttribute(this.attr, str);
	      } else {
	        if (this.isInput) {
	          this.el.value = str;
	        } else if (this.contentType === 'html') {
	          this.el.innerHTML = str;
	        } else {
	          this.el.textContent = str;
	        }
	      }
	    }
	
	    /**
	     * If using input elements, bind focus in order to
	     * start and stop the animation
	     * @private
	     */
	  }, {
	    key: 'bindFocusEvents',
	    value: function bindFocusEvents() {
	      var _this6 = this;
	
	      if (!this.isInput) return;
	      this.el.addEventListener('focus', function (e) {
	        _this6.stop();
	      });
	      this.el.addEventListener('blur', function (e) {
	        if (_this6.el.value && _this6.el.value.length !== 0) {
	          return;
	        }
	        _this6.start();
	      });
	    }
	
	    /**
	     * On init, insert the cursor element
	     * @private
	     */
	  }, {
	    key: 'insertCursor',
	    value: function insertCursor() {
	      if (!this.showCursor) return;
	      if (this.cursor) return;
	      this.cursor = document.createElement('span');
	      this.cursor.className = 'typed-cursor';
	      this.cursor.setAttribute('aria-hidden', true);
	      this.cursor.innerHTML = this.cursorChar;
	      this.el.parentNode && this.el.parentNode.insertBefore(this.cursor, this.el.nextSibling);
	    }
	  }]);
	
	  return Typed;
	})();
	
	exports['default'] = Typed;
	module.exports = exports['default'];

/***/ }),
/* 1 */
/***/ (function(module, exports, __nested_webpack_require_18228__) {

	'use strict';
	
	Object.defineProperty(exports, '__esModule', {
	  value: true
	});
	
	var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
	
	var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }
	
	var _defaultsJs = __nested_webpack_require_18228__(2);
	
	var _defaultsJs2 = _interopRequireDefault(_defaultsJs);
	
	/**
	 * Initialize the Typed object
	 */
	
	var Initializer = (function () {
	  function Initializer() {
	    _classCallCheck(this, Initializer);
	  }
	
	  _createClass(Initializer, [{
	    key: 'load',
	
	    /**
	     * Load up defaults & options on the Typed instance
	     * @param {Typed} self instance of Typed
	     * @param {object} options options object
	     * @param {string} elementId HTML element ID _OR_ instance of HTML element
	     * @private
	     */
	
	    value: function load(self, options, elementId) {
	      // chosen element to manipulate text
	      if (typeof elementId === 'string') {
	        self.el = document.querySelector(elementId);
	      } else {
	        self.el = elementId;
	      }
	
	      self.options = _extends({}, _defaultsJs2['default'], options);
	
	      // attribute to type into
	      self.isInput = self.el.tagName.toLowerCase() === 'input';
	      self.attr = self.options.attr;
	      self.bindInputFocusEvents = self.options.bindInputFocusEvents;
	
	      // show cursor
	      self.showCursor = self.isInput ? false : self.options.showCursor;
	
	      // custom cursor
	      self.cursorChar = self.options.cursorChar;
	
	      // Is the cursor blinking
	      self.cursorBlinking = true;
	
	      // text content of element
	      self.elContent = self.attr ? self.el.getAttribute(self.attr) : self.el.textContent;
	
	      // html or plain text
	      self.contentType = self.options.contentType;
	
	      // typing speed
	      self.typeSpeed = self.options.typeSpeed;
	
	      // add a delay before typing starts
	      self.startDelay = self.options.startDelay;
	
	      // backspacing speed
	      self.backSpeed = self.options.backSpeed;
	
	      // only backspace what doesn't match the previous string
	      self.smartBackspace = self.options.smartBackspace;
	
	      // amount of time to wait before backspacing
	      self.backDelay = self.options.backDelay;
	
	      // Fade out instead of backspace
	      self.fadeOut = self.options.fadeOut;
	      self.fadeOutClass = self.options.fadeOutClass;
	      self.fadeOutDelay = self.options.fadeOutDelay;
	
	      // variable to check whether typing is currently paused
	      self.isPaused = false;
	
	      // input strings of text
	      self.strings = self.options.strings.map(function (s) {
	        return s.trim();
	      });
	
	      // div containing strings
	      if (typeof self.options.stringsElement === 'string') {
	        self.stringsElement = document.querySelector(self.options.stringsElement);
	      } else {
	        self.stringsElement = self.options.stringsElement;
	      }
	
	      if (self.stringsElement) {
	        self.strings = [];
	        self.stringsElement.style.display = 'none';
	        var strings = Array.prototype.slice.apply(self.stringsElement.children);
	        var stringsLength = strings.length;
	
	        if (stringsLength) {
	          for (var i = 0; i < stringsLength; i += 1) {
	            var stringEl = strings[i];
	            self.strings.push(stringEl.innerHTML.trim());
	          }
	        }
	      }
	
	      // character number position of current string
	      self.strPos = 0;
	
	      // current array position
	      self.arrayPos = 0;
	
	      // index of string to stop backspacing on
	      self.stopNum = 0;
	
	      // Looping logic
	      self.loop = self.options.loop;
	      self.loopCount = self.options.loopCount;
	      self.curLoop = 0;
	
	      // shuffle the strings
	      self.shuffle = self.options.shuffle;
	      // the order of strings
	      self.sequence = [];
	
	      self.pause = {
	        status: false,
	        typewrite: true,
	        curString: '',
	        curStrPos: 0
	      };
	
	      // When the typing is complete (when not looped)
	      self.typingComplete = false;
	
	      // Set the order in which the strings are typed
	      for (var i in self.strings) {
	        self.sequence[i] = i;
	      }
	
	      // If there is some text in the element
	      self.currentElContent = this.getCurrentElContent(self);
	
	      self.autoInsertCss = self.options.autoInsertCss;
	
	      this.appendAnimationCss(self);
	    }
	  }, {
	    key: 'getCurrentElContent',
	    value: function getCurrentElContent(self) {
	      var elContent = '';
	      if (self.attr) {
	        elContent = self.el.getAttribute(self.attr);
	      } else if (self.isInput) {
	        elContent = self.el.value;
	      } else if (self.contentType === 'html') {
	        elContent = self.el.innerHTML;
	      } else {
	        elContent = self.el.textContent;
	      }
	      return elContent;
	    }
	  }, {
	    key: 'appendAnimationCss',
	    value: function appendAnimationCss(self) {
	      var cssDataName = 'data-typed-js-css';
	      if (!self.autoInsertCss) {
	        return;
	      }
	      if (!self.showCursor && !self.fadeOut) {
	        return;
	      }
	      if (document.querySelector('[' + cssDataName + ']')) {
	        return;
	      }
	
	      var css = document.createElement('style');
	      css.type = 'text/css';
	      css.setAttribute(cssDataName, true);
	
	      var innerCss = '';
	      if (self.showCursor) {
	        innerCss += '\n        .typed-cursor{\n          opacity: 1;\n        }\n        .typed-cursor.typed-cursor--blink{\n          animation: typedjsBlink 0.7s infinite;\n          -webkit-animation: typedjsBlink 0.7s infinite;\n                  animation: typedjsBlink 0.7s infinite;\n        }\n        @keyframes typedjsBlink{\n          50% { opacity: 0.0; }\n        }\n        @-webkit-keyframes typedjsBlink{\n          0% { opacity: 1; }\n          50% { opacity: 0.0; }\n          100% { opacity: 1; }\n        }\n      ';
	      }
	      if (self.fadeOut) {
	        innerCss += '\n        .typed-fade-out{\n          opacity: 0;\n          transition: opacity .25s;\n        }\n        .typed-cursor.typed-cursor--blink.typed-fade-out{\n          -webkit-animation: 0;\n          animation: 0;\n        }\n      ';
	      }
	      if (css.length === 0) {
	        return;
	      }
	      css.innerHTML = innerCss;
	      document.body.appendChild(css);
	    }
	  }]);
	
	  return Initializer;
	})();
	
	exports['default'] = Initializer;
	var initializer = new Initializer();
	exports.initializer = initializer;

/***/ }),
/* 2 */
/***/ (function(module, exports) {

	/**
	 * Defaults & options
	 * @returns {object} Typed defaults & options
	 * @public
	 */
	
	'use strict';
	
	Object.defineProperty(exports, '__esModule', {
	  value: true
	});
	var defaults = {
	  /**
	   * @property {array} strings strings to be typed
	   * @property {string} stringsElement ID of element containing string children
	   */
	  strings: ['These are the default values...', 'You know what you should do?', 'Use your own!', 'Have a great day!'],
	  stringsElement: null,
	
	  /**
	   * @property {number} typeSpeed type speed in milliseconds
	   */
	  typeSpeed: 0,
	
	  /**
	   * @property {number} startDelay time before typing starts in milliseconds
	   */
	  startDelay: 0,
	
	  /**
	   * @property {number} backSpeed backspacing speed in milliseconds
	   */
	  backSpeed: 0,
	
	  /**
	   * @property {boolean} smartBackspace only backspace what doesn't match the previous string
	   */
	  smartBackspace: true,
	
	  /**
	   * @property {boolean} shuffle shuffle the strings
	   */
	  shuffle: false,
	
	  /**
	   * @property {number} backDelay time before backspacing in milliseconds
	   */
	  backDelay: 700,
	
	  /**
	   * @property {boolean} fadeOut Fade out instead of backspace
	   * @property {string} fadeOutClass css class for fade animation
	   * @property {boolean} fadeOutDelay Fade out delay in milliseconds
	   */
	  fadeOut: false,
	  fadeOutClass: 'typed-fade-out',
	  fadeOutDelay: 500,
	
	  /**
	   * @property {boolean} loop loop strings
	   * @property {number} loopCount amount of loops
	   */
	  loop: false,
	  loopCount: Infinity,
	
	  /**
	   * @property {boolean} showCursor show cursor
	   * @property {string} cursorChar character for cursor
	   * @property {boolean} autoInsertCss insert CSS for cursor and fadeOut into HTML <head>
	   */
	  showCursor: true,
	  cursorChar: '|',
	  autoInsertCss: true,
	
	  /**
	   * @property {string} attr attribute for typing
	   * Ex: input placeholder, value, or just HTML text
	   */
	  attr: null,
	
	  /**
	   * @property {boolean} bindInputFocusEvents bind to focus and blur if el is text input
	   */
	  bindInputFocusEvents: false,
	
	  /**
	   * @property {string} contentType 'html' or 'null' for plaintext
	   */
	  contentType: 'html',
	
	  /**
	   * Before it begins typing
	   * @param {Typed} self
	   */
	  onBegin: function onBegin(self) {},
	
	  /**
	   * All typing is complete
	   * @param {Typed} self
	   */
	  onComplete: function onComplete(self) {},
	
	  /**
	   * Before each string is typed
	   * @param {number} arrayPos
	   * @param {Typed} self
	   */
	  preStringTyped: function preStringTyped(arrayPos, self) {},
	
	  /**
	   * After each string is typed
	   * @param {number} arrayPos
	   * @param {Typed} self
	   */
	  onStringTyped: function onStringTyped(arrayPos, self) {},
	
	  /**
	   * During looping, after last string is typed
	   * @param {Typed} self
	   */
	  onLastStringBackspaced: function onLastStringBackspaced(self) {},
	
	  /**
	   * Typing has been stopped
	   * @param {number} arrayPos
	   * @param {Typed} self
	   */
	  onTypingPaused: function onTypingPaused(arrayPos, self) {},
	
	  /**
	   * Typing has been started after being stopped
	   * @param {number} arrayPos
	   * @param {Typed} self
	   */
	  onTypingResumed: function onTypingResumed(arrayPos, self) {},
	
	  /**
	   * After reset
	   * @param {Typed} self
	   */
	  onReset: function onReset(self) {},
	
	  /**
	   * After stop
	   * @param {number} arrayPos
	   * @param {Typed} self
	   */
	  onStop: function onStop(arrayPos, self) {},
	
	  /**
	   * After start
	   * @param {number} arrayPos
	   * @param {Typed} self
	   */
	  onStart: function onStart(arrayPos, self) {},
	
	  /**
	   * After destroy
	   * @param {Typed} self
	   */
	  onDestroy: function onDestroy(self) {}
	};
	
	exports['default'] = defaults;
	module.exports = exports['default'];

/***/ }),
/* 3 */
/***/ (function(module, exports) {

	/**
	 * TODO: These methods can probably be combined somehow
	 * Parse HTML tags & HTML Characters
	 */
	
	'use strict';
	
	Object.defineProperty(exports, '__esModule', {
	  value: true
	});
	
	var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }
	
	var HTMLParser = (function () {
	  function HTMLParser() {
	    _classCallCheck(this, HTMLParser);
	  }
	
	  _createClass(HTMLParser, [{
	    key: 'typeHtmlChars',
	
	    /**
	     * Type HTML tags & HTML Characters
	     * @param {string} curString Current string
	     * @param {number} curStrPos Position in current string
	     * @param {Typed} self instance of Typed
	     * @returns {number} a new string position
	     * @private
	     */
	
	    value: function typeHtmlChars(curString, curStrPos, self) {
	      if (self.contentType !== 'html') return curStrPos;
	      var curChar = curString.substr(curStrPos).charAt(0);
	      if (curChar === '<' || curChar === '&') {
	        var endTag = '';
	        if (curChar === '<') {
	          endTag = '>';
	        } else {
	          endTag = ';';
	        }
	        while (curString.substr(curStrPos + 1).charAt(0) !== endTag) {
	          curStrPos++;
	          if (curStrPos + 1 > curString.length) {
	            break;
	          }
	        }
	        curStrPos++;
	      }
	      return curStrPos;
	    }
	
	    /**
	     * Backspace HTML tags and HTML Characters
	     * @param {string} curString Current string
	     * @param {number} curStrPos Position in current string
	     * @param {Typed} self instance of Typed
	     * @returns {number} a new string position
	     * @private
	     */
	  }, {
	    key: 'backSpaceHtmlChars',
	    value: function backSpaceHtmlChars(curString, curStrPos, self) {
	      if (self.contentType !== 'html') return curStrPos;
	      var curChar = curString.substr(curStrPos).charAt(0);
	      if (curChar === '>' || curChar === ';') {
	        var endTag = '';
	        if (curChar === '>') {
	          endTag = '<';
	        } else {
	          endTag = '&';
	        }
	        while (curString.substr(curStrPos - 1).charAt(0) !== endTag) {
	          curStrPos--;
	          if (curStrPos < 0) {
	            break;
	          }
	        }
	        curStrPos--;
	      }
	      return curStrPos;
	    }
	  }]);
	
	  return HTMLParser;
	})();
	
	exports['default'] = HTMLParser;
	var htmlParser = new HTMLParser();
	exports.htmlParser = htmlParser;

/***/ })
/******/ ])
});
;

/***/ }),

/***/ "./node_modules/venobox/venobox/venobox.min.js":
/*!*****************************************************!*\
  !*** ./node_modules/venobox/venobox/venobox.min.js ***!
  \*****************************************************/
/***/ (() => {

/**
 * VenoBox - jQuery Plugin
 * version: 1.9.4
 * Copyright 2013-2021 Nicola Franchini - @nicolafranchini
 * @license: https://github.com/nicolafranchini/VenoBox/blob/master/LICENSE
 */
!function(x){"use strict";var w,y,_,C,z,B,P,M,E,O,D,N,U,V,I,j,A,R,X,Y,S,W,q,$,T,H,Q,Z,F,G,J,K,L,ee,se,ae,ie,te,oe,ce,re,le,de,ne;x.fn.extend({venobox:function(e){var m=this,f=x.extend({arrowsColor:"#B6B6B6",noArrows:!1,autoplay:!1,bgcolor:"#fff",border:"0",closeBackground:"transparent",closeColor:"#d2d2d2",framewidth:"",frameheight:"",gallItems:!1,infinigall:!1,htmlClose:"&times;",htmlNext:"<span>Next</span>",htmlPrev:"<span>Prev</span>",navSpeed:500,numeratio:!1,numerationBackground:"#161617",numerationColor:"#d2d2d2",numerationPosition:"top",overlayClose:!0,overlayColor:"rgba(23,23,23,0.85)",spinner:"double-bounce",spinColor:"#d2d2d2",titleattr:"title",titleBackground:"#161617",titleColor:"#d2d2d2",titlePosition:"top",share:[],cb_pre_open:function(){return!0},cb_post_open:function(){},cb_pre_close:function(){return!0},cb_post_close:function(){},cb_post_resize:function(){},cb_after_nav:function(){},cb_content_loaded:function(){},cb_init:function(){}},e);return f.cb_init(m),this.each(function(){if((G=x(this)).data("venobox"))return!0;function s(){W=G.data("gall"),R=G.data("numeratio"),U=G.data("gallItems"),V=G.data("infinigall"),le=G.data("share"),A=G.data("noArrows"),C.html(""),"iframe"!==G.data("vbtype")&&"inline"!==G.data("vbtype")&&"ajax"!==G.data("vbtype")&&(de={pinterest:'<a target="_blank" href="https://pinterest.com/pin/create/button/?url='+G.prop("href")+"&media="+G.prop("href")+"&description="+S+'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" fill-rule="evenodd" clip-rule="evenodd"/></svg></a>',facebook:'<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='+G.prop("href")+'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg></a>',twitter:'<a target="_blank" href="https://twitter.com/intent/tweet?text='+S+"&url="+G.prop("href")+'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/></svg></a>',linkedin:'<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url='+G.prop("href")+'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/></svg></a>',download:'<a target="_blank" href="'+G.prop("href")+'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm2 9h-4v-1h4v1zm0-3v1h-4v-1h4zm-2 13l-6-6h4v-3h4v3h4l-6 6z"/></svg></a>'},x.each(le,function(e,s){C.append(de[s])})),(W=U||x('.vbox-item[data-gall="'+W+'"]')).length<2&&(R=V=!1),q=W.eq(W.index(G)+1),$=W.eq(W.index(G)-1),q.length||!0!==V||(q=W.eq(0)),1<=W.length?(J=W.index(G)+1,_.html(J+" / "+W.length)):J=1,!0===R?_.show():_.hide(),""!==S?z.show():z.hide(),T=q.length||!0===V?(x(".vbox-next").css("display","block"),!0):(x(".vbox-next").css("display","none"),!1),H=0<W.index(G)||!0===V?(x(".vbox-prev").css("display","block"),!0):(x(".vbox-prev").css("display","none"),!1),1==A&&(x(".vbox-prev, .vbox-next ").css("display","none"),H=!1),!0!==H&&!0!==T||(M.on(d.DOWN,o),M.on(d.MOVE,c),M.on(d.UP,r))}function i(e){e.length<1||I||(I=!0,X=e.data("overlay")||e.data("overlaycolor"),D=e.data("framewidth"),N=e.data("frameheight"),B=e.data("border"),y=e.data("bgcolor"),E=e.data("href")||e.attr("href"),w=e.data("autoplay"),S=e.data("titleattr")&&e.attr(e.data("titleattr"))||"",e===$&&M.addClass("vbox-animated").addClass("swipe-right"),e===q&&M.addClass("vbox-animated").addClass("swipe-left"),Z.show(),M.animate({opacity:0},f.navSpeed,function(){Y.css("background",X),M.removeClass("vbox-animated").removeClass("swipe-left").removeClass("swipe-right").css({"margin-left":0,"margin-right":0}),"iframe"==e.data("vbtype")?u():"inline"==e.data("vbtype")?h():"ajax"==e.data("vbtype")?v():"video"==e.data("vbtype")?b(w):(M.html('<img src="'+E+'">'),k()),G=e,s(),I=!1,f.cb_after_nav(G,J,q,$)}))}function a(e){27===e.keyCode&&t(),37==e.keyCode&&!0===H&&i($),39==e.keyCode&&!0===T&&i(q)}function t(){!1!==f.cb_pre_close(G,J,q,$)&&(x("body").off("keydown",a).removeClass("vbox-open"),G.focus(),Y.animate({opacity:0},500,function(){Y.remove(),I=!1,f.cb_post_close()}))}m.VBclose=function(){t()},G.addClass("vbox-item"),G.data("framewidth",f.framewidth),G.data("frameheight",f.frameheight),G.data("border",f.border),G.data("bgcolor",f.bgcolor),G.data("numeratio",f.numeratio),G.data("gallItems",f.gallItems),G.data("infinigall",f.infinigall),G.data("noArrows",f.noArrows),G.data("overlaycolor",f.overlayColor),G.data("titleattr",f.titleattr),G.data("share",f.share),G.data("venobox",!0),G.on("click",function(e){if(e.preventDefault(),G=x(this),!1===f.cb_pre_open(G))return!1;switch(G.blur(),m.VBnext=function(){i(q)},m.VBprev=function(){i($)},X=G.data("overlay")||G.data("overlaycolor"),D=G.data("framewidth"),N=G.data("frameheight"),w=G.data("autoplay")||f.autoplay,B=G.data("border"),y=G.data("bgcolor"),I=H=T=!1,E=G.data("href")||G.attr("href"),O=G.data("css")||"",S=G.attr(G.data("titleattr"))||"",le=G.data("share"),Q='<div class="vbox-preloader">',f.spinner){case"rotating-plane":Q+='<div class="sk-rotating-plane"></div>';break;case"double-bounce":Q+='<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';break;case"wave":Q+='<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';break;case"wandering-cubes":Q+='<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';break;case"spinner-pulse":Q+='<div class="sk-spinner sk-spinner-pulse"></div>';break;case"chasing-dots":Q+='<div class="sk-chasing-dots"><div class="sk-child sk-dot1"></div><div class="sk-child sk-dot2"></div></div>';break;case"three-bounce":Q+='<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>';break;case"circle":Q+='<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>';break;case"cube-grid":Q+='<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>';break;case"fading-circle":Q+='<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>';break;case"folding-cube":Q+='<div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div>'}return Q+="</div>",F='<a class="vbox-next">'+f.htmlNext+'</a><a class="vbox-prev">'+f.htmlPrev+"</a>",ne='<div class="vbox-title"></div><div class="vbox-left"><div class="vbox-num">0/0</div></div><div class="vbox-close">'+f.htmlClose+"</div>",ne='<div class="vbox-overlay '+O+'" style="background:'+X+'">'+Q+'<div class="vbox-container"><div class="vbox-content"></div></div>'+ne+F+'<div class="vbox-share"></div></div>',x("body").append(ne).addClass("vbox-open"),x(".vbox-preloader div:not(.sk-circle) .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader div:not(.sk-folding-cube) .sk-cube, .vbox-preloader .sk-spinner-pulse").css("background-color",f.spinColor),Y=x(".vbox-overlay"),P=x(".vbox-container"),M=x(".vbox-content"),F=x(".vbox-left"),_=x(".vbox-num"),C=x(".vbox-share"),z=x(".vbox-title"),(Z=x(".vbox-preloader")).show(),ne="top"==f.titlePosition?"bottom":"top",C.css(ne,"-1px"),C.css({color:f.titleColor,fill:f.titleColor,"background-color":f.titleBackground}),z.css(f.titlePosition,"-1px"),z.css({color:f.titleColor,"background-color":f.titleBackground}),x(".vbox-close").css({color:f.closeColor,"background-color":f.closeBackground}),F.css(f.numerationPosition,"-1px"),F.css({color:f.numerationColor,"background-color":f.numerationBackground}),x(".vbox-next span, .vbox-prev span").css({"border-top-color":f.arrowsColor,"border-right-color":f.arrowsColor}),M.html(""),M.css("opacity","0"),Y.css("opacity","0"),s(),Y.animate({opacity:1},250,function(){"iframe"==G.data("vbtype")?u():"inline"==G.data("vbtype")?h():"ajax"==G.data("vbtype")?v():"video"==G.data("vbtype")?b(w):(M.html('<img src="'+E+'">'),k()),f.cb_post_open(G,J,q,$)}),x("body").keydown(a),x(".vbox-prev").on("click",function(){i($)}),x(".vbox-next").on("click",function(){i(q)}),!1});var e=".vbox-overlay";function o(e){M.addClass("vbox-animated"),ee=ae=e.pageY,se=ie=e.pageX,K=!0}function c(e){var s;!0===K&&(ie=e.pageX,ae=e.pageY,oe=ie-se,ce=ae-ee,s=Math.abs(oe),Math.abs(ce)<s&&s<=100&&(e.preventDefault(),M.css("margin-left",oe)))}function r(e){var s,a;!0===K&&(s=G,a=K=!1,(te=ie-se)<0&&!0===T&&(s=q,a=!0),0<te&&!0===H&&(s=$,a=!0),Math.abs(te)>=re&&!0===a?i(s):M.css({"margin-left":0,"margin-right":0}))}f.overlayClose||(e=".vbox-close"),x("body").on("click touchstart",e,function(e){(x(e.target).is(".vbox-overlay")||x(e.target).is(".vbox-content")||x(e.target).is(".vbox-close")||x(e.target).is(".vbox-preloader")||x(e.target).is(".vbox-container"))&&t()}),te=ie=se=0,K=!(re=50);function l(e){var s;switch(e.type){case"mousedown":s=d.DOWN;break;case"mouseup":case"mouseout":s=d.UP;break;case"mousemove":s=d.MOVE;break;default:return}var a=n(s,e,e.pageX,e.pageY);x(e.target).trigger(a)}var d={DOWN:"touchmousedown",UP:"touchmouseup",MOVE:"touchmousemove"},e=function(e){var s;switch(e.type){case"touchstart":s=d.DOWN;break;case"touchend":s=d.UP;break;case"touchmove":s=d.MOVE;break;default:return}var a=e.originalEvent.touches[0],a=s==d.UP?n(s,e,null,null):n(s,e,a.pageX,a.pageY);x(e.target).trigger(a)},n=function(e,s,a,i){return x.Event(e,{pageX:a,pageY:i,originalEvent:s})};function v(){x.ajax({url:E,cache:!1}).done(function(e){M.html('<div class="vbox-inline">'+e+"</div>"),k()}).fail(function(){M.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'),p()})}function u(){M.html('<iframe class="venoframe" src="'+E+'"></iframe>'),p()}function b(e){var s,a=function(e){var s;e.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),-1<RegExp.$3.indexOf("youtu")?s="youtube":-1<RegExp.$3.indexOf("vimeo")&&(s="vimeo");return{type:s,id:RegExp.$6}}(E),e=(e?"?rel=0&autoplay=1":"?rel=0")+function(e){var s,a,i="",e=decodeURIComponent(e).split("?");if(void 0!==e[1]){var t=e[1].split("&");for(a=0;a<t.length;a++)s=t[a].split("="),i=i+"&"+s[0]+"="+s[1]}return encodeURI(i)}(E);"vimeo"==a.type?s="https://player.vimeo.com/video/":"youtube"==a.type&&(s="https://www.youtube.com/embed/"),M.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay" frameborder="0" src="'+s+a.id+e+'"></iframe>'),p()}function h(){M.html('<div class="vbox-inline">'+x(E).html()+"</div>"),p()}function k(){(L=M.find("img")).length?L.each(function(){x(this).one("load",function(){p()})}):p()}function p(){z.html(S),M.find(">:first-child").addClass("vbox-figlio").css({width:D,height:N,padding:B,background:y}),x("img.vbox-figlio").on("dragstart",function(e){e.preventDefault()}),P.scrollTop(0),g(),M.animate({opacity:1},f.navSpeed,function(){Z.hide()}),f.cb_content_loaded(G,J,q,$)}function g(){var e=M.outerHeight(),s=x(window).height();j=e+60<s?(s-e)/2:"30px",M.css("margin-top",j),M.css("margin-bottom",j),f.cb_post_resize()}"ontouchstart"in window?(x(document).on("touchstart",e),x(document).on("touchmove",e),x(document).on("touchend",e)):(x(document).on("mousedown",l),x(document).on("mouseup",l),x(document).on("mouseout",l),x(document).on("mousemove",l)),x(window).resize(function(){x(".vbox-content").length&&setTimeout(g(),800)})})}})}(jQuery);

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
/******/ 			id: moduleId,
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var venobox__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! venobox */ "./node_modules/venobox/venobox/venobox.min.js");
/* harmony import */ var venobox__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(venobox__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var typed_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! typed.js */ "./node_modules/typed.js/lib/typed.js");
/* harmony import */ var typed_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(typed_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var animate_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! animate.css */ "./node_modules/animate.css/animate.css");




if ($(".text-slider").length == 1) {
  var typed_strings = $(".text-slider-items").text();
  var typed = new (typed_js__WEBPACK_IMPORTED_MODULE_1___default())(".text-slider", {
    strings: typed_strings.split(","),
    typeSpeed: 80,
    loop: true,
    backDelay: 1100,
    backSpeed: 30
  });
} // Initiate venobox (lightbox feature used in portofilo)


jQuery(function () {
  $(".venobox").venobox({
    spinner: "wave",
    share: []
  });
});
})();

/******/ })()
;