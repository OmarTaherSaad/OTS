// Modern Skills Visualization
class SkillsVisualization {
    constructor(containerId, skillsData) {
        this.container = document.getElementById(containerId);
        this.skillsData = skillsData;
        this.expandedCategories = new Set();
        this.hoveredSkill = null;
        this.circumference = 2 * Math.PI * 34; // radius = 34
        
        this.init();
    }
    
    init() {
        if (!this.container) return;
        
        this.render();
        this.attachEventListeners();
        this.animateProgressRings();
        
        // Expand first category by default
        const firstCategory = Object.keys(this.skillsData)[0];
        if (firstCategory) {
            this.toggleCategory(firstCategory);
        }
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
        return Object.entries(this.skillsData).map(([categoryName, categorySkills]) => `
            <div class="skill-category" data-category="${categoryName}">
                <div class="category-header" data-category="${categoryName}">
                    <h4 class="category-title">
                        <i class="fas fa-chevron-right category-icon"></i>
                        ${categoryName}
                    </h4>
                    <span class="skill-count">${Object.keys(categorySkills).length} skills</span>
                </div>
                
                <div class="skills-grid" data-category="${categoryName}">
                    ${this.renderSkills(categorySkills)}
                </div>
            </div>
        `).join('');
    }
    
    renderSkills(skills) {
        return Object.entries(skills).map(([skillName, skill]) => `
            <div class="skill-card" data-skill="${skillName}">
                <div class="skill-icon">
                    <i class="${skill.icon}" style="color: ${skill.color}"></i>
                </div>
                
                <div class="skill-info">
                    <h5 class="skill-name">${skillName}</h5>
                    <div class="skill-level ${skill.level.toLowerCase()}">
                        ${skill.level}
                    </div>
                </div>
                
                <div class="circular-progress">
                    <svg class="progress-ring" width="80" height="80">
                        <circle
                            class="progress-ring-circle-bg"
                            stroke="#e6e6e6"
                            stroke-width="6"
                            fill="transparent"
                            r="34"
                            cx="40"
                            cy="40"
                        />
                        <circle
                            class="progress-ring-circle"
                            stroke="${skill.color}"
                            stroke-width="6"
                            fill="transparent"
                            r="34"
                            cx="40"
                            cy="40"
                            style="stroke-dasharray: ${this.circumference}; stroke-dashoffset: ${this.getOffset(skill.percentage)}"
                        />
                    </svg>
                    <div class="progress-text">${skill.percentage}%</div>
                </div>
                
                <div class="skill-description">
                    ${skill.description}
                </div>
            </div>
        `).join('');
    }
    
    attachEventListeners() {
        // Category toggle
        this.container.addEventListener('click', (e) => {
            if (e.target.closest('.category-header')) {
                const category = e.target.closest('.category-header').dataset.category;
                this.toggleCategory(category);
            }
        });
        
        // Skill hover effects
        this.container.addEventListener('mouseenter', (e) => {
            if (e.target.closest('.skill-card')) {
                const skillCard = e.target.closest('.skill-card');
                const skillName = skillCard.dataset.skill;
                this.hoveredSkill = skillName;
                skillCard.classList.add('hovered');
            }
        }, true);
        
        this.container.addEventListener('mouseleave', (e) => {
            if (e.target.closest('.skill-card')) {
                const skillCard = e.target.closest('.skill-card');
                skillCard.classList.remove('hovered');
                this.hoveredSkill = null;
            }
        }, true);
    }
    
    toggleCategory(categoryName) {
        const categoryElement = this.container.querySelector(`[data-category="${categoryName}"]`);
        const skillsGrid = categoryElement.querySelector('.skills-grid');
        const categoryIcon = categoryElement.querySelector('.category-icon');
        
        if (this.expandedCategories.has(categoryName)) {
            this.expandedCategories.delete(categoryName);
            skillsGrid.classList.remove('expanded');
            categoryIcon.classList.remove('rotated');
        } else {
            this.expandedCategories.add(categoryName);
            skillsGrid.classList.add('expanded');
            categoryIcon.classList.add('rotated');
        }
    }
    
    getOffset(percentage) {
        return this.circumference - (percentage / 100) * this.circumference;
    }
    
    animateProgressRings() {
        const rings = this.container.querySelectorAll('.progress-ring-circle');
        rings.forEach((ring, index) => {
            setTimeout(() => {
                ring.style.transition = 'stroke-dashoffset 1.5s ease-in-out';
            }, index * 100);
        });
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Get skills data from the global variable set by Laravel
    if (typeof window.skillsData !== 'undefined') {
        new SkillsVisualization('skills-container', window.skillsData);
    }
});