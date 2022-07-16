
const log = console.log;
const faqContent = document.querySelectorAll(".faq-content");
const faDownArrow = document.querySelectorAll(".fa-chevron");
const faqSingle = document.querySelectorAll(".faq-single");
const listItems = document.querySelector(".body-list-items");
const header = document.querySelector(".header");
const scrollup = document.querySelector(".scrollup-container");

const closeAllFaq = ()=>{
    faqContent.forEach((content)=>{
        content.classList.add("faq-show");
    })
    faDownArrow.forEach((arrow)=>{
        chChevronToDown(arrow);
    })
    onAllFaqBB();
}

const onAllFaqBB = ()=>{
    faqSingle.forEach((single)=>{
        single.style.borderBottom = "1px solid #f00";
    })
}

const openFaq = (content)=>{
    content.classList.remove("faq-show");
}

const chChevronToUp = (arrow)=>{
    arrow.classList.remove("fa-chevron-down");
    arrow.classList.add("fa-chevron-up");
}

const chChevronToDown = (arrow)=>{
    arrow.classList.remove("fa-chevron-up");
    arrow.classList.add("fa-chevron-down");
}

for(let i=0; i<faDownArrow.length; i++){
    faDownArrow[i].addEventListener("click", ()=>{
        if(faqContent[i].classList.contains("faq-show")){
            closeAllFaq();
            openFaq(faqContent[i]);
            chChevronToUp(faDownArrow[i])
            faqSingle[i].style.borderBottom = "0";
        }else{
            closeAllFaq();            
        }
    })
}

closeAllFaq();

window.addEventListener("scroll", ()=>{
    const scrollable = document.documentElement.scrollHeight - window.innerHeight;
    const scrollValue = window.scrollY;
    if(scrollValue > 500){
        header.classList.add("header-border");
    }
    else if(scrollValue < 500){
        header.classList.remove("header-border");
    }
    

    if(scrollValue < (scrollable/2)){
        scrollup.classList.add("hide-sroll")
    }else{
        scrollup.classList.remove("hide-sroll")
    }
})

	scrollup.classList.remove("hide-sroll")
