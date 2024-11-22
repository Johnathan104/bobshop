$(document).ready(function() {
    console.log("animate js ready")
    const observer = new IntersectionObserver((entries)=>{
        entries.forEach(entry=>{
            console.log("yey")
            if(entry.isIntersecting){
                entry.target.classList.add("show")
            }else{
                entry.target.classList.remove("show")
            }
        })
    })
    const hiddenElements = document.querySelectorAll(".hidden")
    const masterElement = document.querySelectorAll(".hidden-head")
<<<<<<< HEAD
=======
    const fadeElements = document.querySelectorAll(".hidden-fade")
>>>>>>> accccec839be48e0e0ebde625c829670f98ec6b1
    hiddenElements.forEach(element=>{
        observer.observe(element)
    })
    masterElement.forEach(element=>{
        observer.observe(element)
    })
<<<<<<< HEAD
=======
    fadeElements.forEach(element=>{
        observer.observe(element)
    })
>>>>>>> accccec839be48e0e0ebde625c829670f98ec6b1
});
