(()=>{"use strict";!function(){const e=document.querySelector("[data-password]"),t=document.querySelector(".box-toggle-pass"),s=document.querySelector(".show-pass"),i=document.querySelector(".hide-pass");let n=!0;i&&t.addEventListener("click",(function(){n?(n=!1,s.style.display="none",i.style.display="block",e.type="text"):(n=!0,s.style.display="block",i.style.display="none",e.type="password")}))}(),function(){const e=document.querySelectorAll('[data-textarea="autoGrow"]');function t(e){e.scrollHeight>e.clientHeight&&(e.style.height=e.scrollHeight+"px")}function s(e){e.style.height="1px",e.style.height=e.scrollHeight+"px"}function i(e){t(e.target),s(e.target)}e&&(e.forEach((e=>{t(e),s(e)})),e.forEach((e=>e.addEventListener("keyup",i))))}(),function(){const e=document.querySelectorAll('[data-actionbtn="delete"]');function t(e){if(!confirm("Você tem certeza que quer excluir esse usuário?"))return e.preventDefault(),!1}e&&e.forEach((e=>{e.addEventListener("click",t)}))}(),new class{constructor(e,t,s,i){this.openBtn=document.querySelector(e),this.closeBtn=document.querySelector(t),this.menuBox=document.querySelector(s),this.activeState=i,this._expanded=this.expanded,this.toggle=this.toggle.bind(this),this.clickOutMenu=this.clickOutMenu.bind(this),this.keyPress=this.keyPress.bind(this)}get expanded(){if(this.menuBox)return JSON.parse(this.menuBox.getAttribute("aria-expanded"))}open(){this.openBtn.setAttribute("aria-expanded",!0),this.closeBtn.setAttribute("aria-expanded",!0),this.menuBox.setAttribute("aria-expanded",!0),this.menuBox.classList.add(this.activeState)}close(){this.openBtn.setAttribute("aria-expanded",!1),this.closeBtn.setAttribute("aria-expanded",!1),this.menuBox.setAttribute("aria-expanded",!1),this.menuBox.classList.remove(this.activeState)}toggle(){this.expanded?this.close():this.open()}clickOutMenu(e){e.target==this.menuBox&&this.close()}keyPress(e){"Escape"===e.key&&this.close()}handleEvents(){[this.openBtn,this.closeBtn].forEach((e=>{e.addEventListener("click",this.toggle)})),this.menuBox.addEventListener("click",this.clickOutMenu),window.addEventListener("keydown",this.keyPress)}init(){this.openBtn,this.closeBtn,this.menuBox&&this.handleEvents()}}('[data-menubtn="open"]','[data-menubtn="close"]','[data-menu="overflow"]',"actived").init(),new class{constructor(e){this.feedbackBox=document.querySelector(e),this.activeState="active",this.handleClick=this.handleClick.bind(this)}handleClick(){this.feedbackBox.remove()}handleFeedbackBox(){this.feedbackBox.classList.add(this.activeState),this.feedbackBox.addEventListener("click",this.handleClick),setTimeout((()=>this.feedbackBox.classList.remove(this.activeState)),3e3),setTimeout((()=>this.feedbackBox.remove()),3100)}init(){this.feedbackBox&&this.handleFeedbackBox()}}("[data-response]").init()})();