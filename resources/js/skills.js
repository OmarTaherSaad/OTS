// Modern Skills Visualization
class SkillsVisualization {
    constructor(containerId, skillsData) {
        this.container = document.getElementById(containerId);
        this.skillsData = skillsData;
        this.expandedCategories = new Set();
        this.hoveredSkill = null;

        this.init();
    }

    init() {
        if (!this.container) return;

        this.render();
        this.attachEventListeners();
    }

    render() {
        this.container.innerHTML = `
            <div class="skills-visualization">
                <div class="skills-header">
                    <h3 class="title-s">Technical Skills</h3>
                    <p class="skills-subtitle">Technologies and tools I work with</p>
                </div>

                <div class="skills-container">
                    ${this.renderCategories()}
                </div>
            </div>
        `;
    }

    renderCategories() {
        return Object.entries(this.skillsData)
            .map(
                ([categoryName, categorySkills]) => `
            <div class="skill-category" data-category="${categoryName}">
                <div class="category-header" data-category="${categoryName}">
                    <h4 class="category-title">
                               <i class="icon icon-chevron-right category-icon"></i>
                        ${categoryName}
                    </h4>
                    <span class="skill-count">${
                        Object.keys(categorySkills).length
                    } skills</span>
                </div>

                <div class="skills-grid" data-category="${categoryName}">
                    ${this.renderSkills(categorySkills)}
                </div>
            </div>
        `
            )
            .join("");
    }

    renderSkills(skills) {
        return Object.entries(skills)
            .map(
                ([skillName, skill]) => `
            <div class="skill-card" data-skill="${skillName}">
                <div class="skill-icon">
                    ${
                        skill.logo
                            ? `<img src="/storage/${skill.logo}" alt="${skillName}" class="skill-logo" style="width: 60px; height: 60px; object-fit: contain; max-width: 80px; max-height: 50px;">`
                            : `<i class="${skill.icon}" style="color: ${skill.color}; font-size: 2.5rem;"></i>`
                    }
                </div>

                <div class="skill-info">
                    <h5 class="skill-name">${skillName}</h5>
                    <div class="skill-level ${skill.level.toLowerCase()}">
                        ${skill.level}
                    </div>
                </div>

                <div class="skill-description">
                    ${skill.description}
                </div>
            </div>
        `
            )
            .join("");
    }

    attachEventListeners() {
        // Category toggle
        this.container.addEventListener("click", (e) => {
            if (e.target.closest(".category-header")) {
                const category =
                    e.target.closest(".category-header").dataset.category;
                this.toggleCategory(category);
            }
        });

        // Skill hover effects
        this.container.addEventListener(
            "mouseenter",
            (e) => {
                if (e.target.closest(".skill-card")) {
                    const skillCard = e.target.closest(".skill-card");
                    const skillName = skillCard.dataset.skill;
                    this.hoveredSkill = skillName;
                    skillCard.classList.add("hovered");
                }
            },
            true
        );

        this.container.addEventListener(
            "mouseleave",
            (e) => {
                if (e.target.closest(".skill-card")) {
                    const skillCard = e.target.closest(".skill-card");
                    skillCard.classList.remove("hovered");
                    this.hoveredSkill = null;
                }
            },
            true
        );
    }

    toggleCategory(categoryName) {
        const categoryElement = this.container.querySelector(
            `[data-category="${categoryName}"]`
        );
        const skillsGrid = categoryElement.querySelector(".skills-grid");
        const categoryIcon = categoryElement.querySelector(".category-icon");

        if (this.expandedCategories.has(categoryName)) {
            // If clicking on an already expanded category, close it
            this.expandedCategories.delete(categoryName);
            skillsGrid.classList.remove("expanded");
            categoryIcon.classList.remove("rotated");
        } else {
            // Calculate the target scroll position before any DOM changes
            const targetScrollPosition =
                this.calculateTargetScrollPosition(categoryElement);

            // Close all other categories first
            this.closeAllCategories();

            // Open the selected category
            this.expandedCategories.add(categoryName);
            skillsGrid.classList.add("expanded");
            categoryIcon.classList.add("rotated");

            // Use setTimeout to ensure DOM changes are complete before scrolling
            setTimeout(() => {
                this.scrollToPosition(targetScrollPosition);
            }, 50);
        }
    }

    closeAllCategories() {
        // Close all currently expanded categories
        this.expandedCategories.forEach((categoryName) => {
            const categoryElement = this.container.querySelector(
                `[data-category="${categoryName}"]`
            );
            if (categoryElement) {
                const skillsGrid =
                    categoryElement.querySelector(".skills-grid");
                const categoryIcon =
                    categoryElement.querySelector(".category-icon");

                if (skillsGrid && categoryIcon) {
                    skillsGrid.classList.remove("expanded");
                    categoryIcon.classList.remove("rotated");
                }
            }
        });

        // Clear the expanded categories set
        this.expandedCategories.clear();
    }

    calculateTargetScrollPosition(categoryElement) {
        // Get the category header element
        const categoryHeader =
            categoryElement.querySelector(".category-header");

        if (categoryHeader) {
            // Calculate the offset to account for any fixed headers or padding
            const offset = 20; // Adjust this value as needed

            // Get the current position of the category header (before DOM changes)
            const elementPosition = categoryHeader.getBoundingClientRect().top;
            const currentScrollPosition =
                elementPosition + window.pageYOffset - offset;

            // Calculate the total height that will be removed when other categories collapse
            let heightToRemove = 0;
            this.expandedCategories.forEach((categoryName) => {
                const otherCategoryElement = this.container.querySelector(
                    `[data-category="${categoryName}"]`
                );
                if (otherCategoryElement) {
                    const otherSkillsGrid =
                        otherCategoryElement.querySelector(".skills-grid");
                    if (
                        otherSkillsGrid &&
                        otherSkillsGrid.classList.contains("expanded")
                    ) {
                        heightToRemove += otherSkillsGrid.scrollHeight;
                    }
                }
            });

            // Adjust the scroll position by the height that will be removed
            return currentScrollPosition - heightToRemove;
        }

        return null;
    }

    scrollToPosition(scrollPosition) {
        if (scrollPosition !== null) {
            // Smooth scroll to the calculated position
            window.scrollTo({
                top: scrollPosition,
                behavior: "smooth",
            });
        }
    }
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
    // Get skills data from the global variable set by Laravel
    if (typeof window.skillsData !== "undefined") {
        new SkillsVisualization("skills-container", window.skillsData);
    }
});
