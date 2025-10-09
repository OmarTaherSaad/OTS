/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/skills.js ***!
  \********************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
// Modern Skills Visualization
var SkillsVisualization = /*#__PURE__*/function () {
  function SkillsVisualization(containerId, skillsData) {
    _classCallCheck(this, SkillsVisualization);
    this.container = document.getElementById(containerId);
    this.skillsData = skillsData;
    this.expandedCategories = new Set();
    this.hoveredSkill = null;
    this.circumference = 2 * Math.PI * 34; // radius = 34

    this.init();
  }
  _createClass(SkillsVisualization, [{
    key: "init",
    value: function init() {
      if (!this.container) return;
      this.render();
      this.attachEventListeners();
      this.animateProgressRings();

      // Expand first category by default
      var firstCategory = Object.keys(this.skillsData)[0];
      if (firstCategory) {
        this.toggleCategory(firstCategory);
      }
    }
  }, {
    key: "render",
    value: function render() {
      this.container.innerHTML = "\n            <div class=\"skills-visualization\">\n                <div class=\"skills-header\">\n                    <h3 class=\"title-s\">Technical Skills</h3>\n                    <p class=\"skills-subtitle\">Technologies and tools I work with</p>\n                </div>\n                \n                <div class=\"skills-container\">\n                    ".concat(this.renderCategories(), "\n                </div>\n            </div>\n        ");
    }
  }, {
    key: "renderCategories",
    value: function renderCategories() {
      var _this = this;
      return Object.entries(this.skillsData).map(function (_ref) {
        var _ref2 = _slicedToArray(_ref, 2),
          categoryName = _ref2[0],
          categorySkills = _ref2[1];
        return "\n            <div class=\"skill-category\" data-category=\"".concat(categoryName, "\">\n                <div class=\"category-header\" data-category=\"").concat(categoryName, "\">\n                    <h4 class=\"category-title\">\n                        <i class=\"fas fa-chevron-right category-icon\"></i>\n                        ").concat(categoryName, "\n                    </h4>\n                    <span class=\"skill-count\">").concat(Object.keys(categorySkills).length, " skills</span>\n                </div>\n                \n                <div class=\"skills-grid\" data-category=\"").concat(categoryName, "\">\n                    ").concat(_this.renderSkills(categorySkills), "\n                </div>\n            </div>\n        ");
      }).join('');
    }
  }, {
    key: "renderSkills",
    value: function renderSkills(skills) {
      var _this2 = this;
      return Object.entries(skills).map(function (_ref3) {
        var _ref4 = _slicedToArray(_ref3, 2),
          skillName = _ref4[0],
          skill = _ref4[1];
        return "\n            <div class=\"skill-card\" data-skill=\"".concat(skillName, "\">\n                <div class=\"skill-icon\">\n                    <i class=\"").concat(skill.icon, "\" style=\"color: ").concat(skill.color, "\"></i>\n                </div>\n                \n                <div class=\"skill-info\">\n                    <h5 class=\"skill-name\">").concat(skillName, "</h5>\n                    <div class=\"skill-level ").concat(skill.level.toLowerCase(), "\">\n                        ").concat(skill.level, "\n                    </div>\n                </div>\n                \n                <div class=\"circular-progress\">\n                    <svg class=\"progress-ring\" width=\"80\" height=\"80\">\n                        <circle\n                            class=\"progress-ring-circle-bg\"\n                            stroke=\"#e6e6e6\"\n                            stroke-width=\"6\"\n                            fill=\"transparent\"\n                            r=\"34\"\n                            cx=\"40\"\n                            cy=\"40\"\n                        />\n                        <circle\n                            class=\"progress-ring-circle\"\n                            stroke=\"").concat(skill.color, "\"\n                            stroke-width=\"6\"\n                            fill=\"transparent\"\n                            r=\"34\"\n                            cx=\"40\"\n                            cy=\"40\"\n                            style=\"stroke-dasharray: ").concat(_this2.circumference, "; stroke-dashoffset: ").concat(_this2.getOffset(skill.percentage), "\"\n                        />\n                    </svg>\n                    <div class=\"progress-text\">").concat(skill.percentage, "%</div>\n                </div>\n                \n                <div class=\"skill-description\">\n                    ").concat(skill.description, "\n                </div>\n            </div>\n        ");
      }).join('');
    }
  }, {
    key: "attachEventListeners",
    value: function attachEventListeners() {
      var _this3 = this;
      // Category toggle
      this.container.addEventListener('click', function (e) {
        if (e.target.closest('.category-header')) {
          var category = e.target.closest('.category-header').dataset.category;
          _this3.toggleCategory(category);
        }
      });

      // Skill hover effects
      this.container.addEventListener('mouseenter', function (e) {
        if (e.target.closest('.skill-card')) {
          var skillCard = e.target.closest('.skill-card');
          var skillName = skillCard.dataset.skill;
          _this3.hoveredSkill = skillName;
          skillCard.classList.add('hovered');
        }
      }, true);
      this.container.addEventListener('mouseleave', function (e) {
        if (e.target.closest('.skill-card')) {
          var skillCard = e.target.closest('.skill-card');
          skillCard.classList.remove('hovered');
          _this3.hoveredSkill = null;
        }
      }, true);
    }
  }, {
    key: "toggleCategory",
    value: function toggleCategory(categoryName) {
      var categoryElement = this.container.querySelector("[data-category=\"".concat(categoryName, "\"]"));
      var skillsGrid = categoryElement.querySelector('.skills-grid');
      var categoryIcon = categoryElement.querySelector('.category-icon');
      if (this.expandedCategories.has(categoryName)) {
        this.expandedCategories["delete"](categoryName);
        skillsGrid.classList.remove('expanded');
        categoryIcon.classList.remove('rotated');
      } else {
        this.expandedCategories.add(categoryName);
        skillsGrid.classList.add('expanded');
        categoryIcon.classList.add('rotated');
      }
    }
  }, {
    key: "getOffset",
    value: function getOffset(percentage) {
      return this.circumference - percentage / 100 * this.circumference;
    }
  }, {
    key: "animateProgressRings",
    value: function animateProgressRings() {
      var rings = this.container.querySelectorAll('.progress-ring-circle');
      rings.forEach(function (ring, index) {
        setTimeout(function () {
          ring.style.transition = 'stroke-dashoffset 1.5s ease-in-out';
        }, index * 100);
      });
    }
  }]);
  return SkillsVisualization;
}(); // Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
  // Get skills data from the global variable set by Laravel
  if (typeof window.skillsData !== 'undefined') {
    new SkillsVisualization('skills-container', window.skillsData);
  }
});
/******/ })()
;