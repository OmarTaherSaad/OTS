/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/forms.js ***!
  \*******************************/
$(document).on("focus", "input:not([type=submit]), textarea", function () {
  $(this).parents('.form-group').addClass('focused');
});
$(document).on("click", "label:not(.form-check-label)", function () {
  $(this).parents('.form-group').addClass('focused');
  $(this).siblings("input, textarea").focus();
});
$(document).on("blur", "input:not([type=submit]), textarea", function () {
  var inputValue = $(this).val(); //If Invalid input

  if ($(this).is(":invalid") && inputValue !== "") {
    $(this).addClass('invalid');
  } else if (inputValue === "") {
    //If Empty
    $(this).removeClass('filled invalid');
    $(this).parents('.form-group').removeClass('focused');
  } else {
    $(this).addClass('filled');
    $(this).removeClass('invalid');
  }
}); // Example starter JavaScript for disabling form submissions if there are invalid fields

(function () {
  'use strict';

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation'); // Loop over them and prevent submission

    var validation = Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
/******/ })()
;