class c{constructor(e,t){this.container=document.getElementById(e),this.skillsData=t,this.expandedCategories=new Set,this.hoveredSkill=null,this.init()}init(){this.container&&(this.render(),this.attachEventListeners())}render(){this.container.innerHTML=`
            <div class="skills-visualization">
                <div class="skills-header">
                    <h3 class="title-s">Technical Skills</h3>
                    <p class="skills-subtitle">Technologies and tools I work with</p>
                </div>

                <div class="skills-container">
                    ${this.renderCategories()}
                </div>
            </div>
        `}renderCategories(){return Object.entries(this.skillsData).map(([e,t])=>`
            <div class="skill-category" data-category="${e}">
                <div class="category-header" data-category="${e}">
                    <h4 class="category-title">
                               <i class="icon icon-chevron-right category-icon"></i>
                        ${e}
                    </h4>
                    <span class="skill-count">${Object.keys(t).length} skills</span>
                </div>

                <div class="skills-grid" data-category="${e}">
                    ${this.renderSkills(t)}
                </div>
            </div>
        `).join("")}renderSkills(e){return Object.entries(e).map(([t,s])=>`
            <div class="skill-card" data-skill="${t}">
                <div class="skill-icon">
                    ${s.logo?`<img src="/storage/${s.logo}" alt="${t}" class="skill-logo" style="width: 60px; height: 60px; object-fit: contain; max-width: 80px; max-height: 50px;">`:`<i class="${s.icon}" style="color: ${s.color}; font-size: 2.5rem;"></i>`}
                </div>

                <div class="skill-info">
                    <h5 class="skill-name">${t}</h5>
                    <div class="skill-level ${s.level.toLowerCase()}">
                        ${s.level}
                    </div>
                </div>

                <div class="skill-description">
                    ${s.description}
                </div>
            </div>
        `).join("")}attachEventListeners(){this.container.addEventListener("click",e=>{if(e.target.closest(".category-header")){const t=e.target.closest(".category-header").dataset.category;this.toggleCategory(t)}}),this.container.addEventListener("mouseenter",e=>{if(e.target.closest(".skill-card")){const t=e.target.closest(".skill-card"),s=t.dataset.skill;this.hoveredSkill=s,t.classList.add("hovered")}},!0),this.container.addEventListener("mouseleave",e=>{e.target.closest(".skill-card")&&(e.target.closest(".skill-card").classList.remove("hovered"),this.hoveredSkill=null)},!0)}toggleCategory(e){const t=this.container.querySelector(`[data-category="${e}"]`),s=t.querySelector(".skills-grid"),i=t.querySelector(".category-icon");if(this.expandedCategories.has(e))this.expandedCategories.delete(e),s.classList.remove("expanded"),i.classList.remove("rotated");else{const l=this.calculateTargetScrollPosition(t);this.closeAllCategories(),this.expandedCategories.add(e),s.classList.add("expanded"),i.classList.add("rotated"),setTimeout(()=>{this.scrollToPosition(l)},50)}}closeAllCategories(){this.expandedCategories.forEach(e=>{const t=this.container.querySelector(`[data-category="${e}"]`);if(t){const s=t.querySelector(".skills-grid"),i=t.querySelector(".category-icon");s&&i&&(s.classList.remove("expanded"),i.classList.remove("rotated"))}}),this.expandedCategories.clear()}calculateTargetScrollPosition(e){const t=e.querySelector(".category-header");if(t){const l=t.getBoundingClientRect().top+window.pageYOffset-20;let a=0;return this.expandedCategories.forEach(n=>{const r=this.container.querySelector(`[data-category="${n}"]`);if(r){const o=r.querySelector(".skills-grid");o&&o.classList.contains("expanded")&&(a+=o.scrollHeight)}}),l-a}return null}scrollToPosition(e){e!==null&&window.scrollTo({top:e,behavior:"smooth"})}}document.addEventListener("DOMContentLoaded",function(){typeof window.skillsData<"u"&&new c("skills-container",window.skillsData)});
