// this functiion is for sliding in the responsive nav bar
const navSlide = ()=>{
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".nav-links-container");

  const [...navLinks] = document.querySelectorAll(".nav-link ");
  console.log(navLinks)
// this line animate the burger nav
  burger.addEventListener("click",()=>{
    nav.classList.toggle("nav-active");
    // this line animate the links
    navLinks.forEach((link,index)=>{
      console.log(index);
     if(link.style.animation){
       link.style.animation ="";
     }else{
        link.style.animation = `navLinkFade 0.5s ease forwards ${index /7 +1}s`;
     }
    })

    // burger animation
    burger.classList.toggle("toggle");
  })
}
const app =()=>{
  navSlide();
}
app();