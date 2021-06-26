let closeBtn = document.querySelector('.closeBtn');
let hambMenu = document.querySelector('.burger-menu');
const hiddenMenu = document.querySelector('#hiddenMenu'); 
const poc = document.querySelectorAll('.poc');

//on scroll effect
const home = document.querySelector('.home');
const about = document.querySelector('.about');
const service = document.querySelector('.service');
const contact = document.querySelector('.contact');
const headerHome = document.querySelector('.headerHome');
const scrollClasses= document.querySelectorAll('section');

//loader
window.addEventListener('load', () => {
    document.querySelector('.preloader').style.display = 'none';
});


//on scroll anmiation
scrollClasses.forEach((item, index) => {
    if(index > 0){
        window.addEventListener('scroll', () => {
            const prod = item.children[0];
            if(parseInt(window.pageYOffset) >= parseInt(item.offsetTop) - 350){ 
                prod.style.opacity = '1';
                prod.style.transform = 'translateX(0px)';
                prod.style.transition = '0.77s ease-in';  
            }else{
                prod.style.opacity = '0';
                prod.style.transform = 'translateX(-30px)';
            }
        });
    }
});


//closing hidd menu
poc.forEach((item)=>{
    item.addEventListener('click', () =>{ hiddenMenu.style.display = 'none'; }) 
});


//mobile hamb menu
hambMenu.addEventListener('click', () =>{ 
    hiddenMenu.style.display = 'flex';
    hiddenMenu.classList.add('sameProp');
});

closeBtn.addEventListener('click', () => {
  hiddenMenu.classList.remove('sameProp');
  hiddenMenu.style.display = 'none';
});


// fixed header on scroll
window.addEventListener('scroll', () => {
    if(window.innerWidth <= 1000){
        if(window.pageYOffset > 100){
            hambMenu.style.position = 'fixed';
            hambMenu.style.zIndex = '2';
        }else{
            hambMenu.style.position = 'static';
        }
    }
         
    if(window.innerWidth > 1000 && window.pageYOffset > 100){
             console.log('more than 1000');
             headerHome.classList.add('fixedHeader');
    }
    else{
            console.log('less than 1000');
            headerHome.classList.remove('fixedHeader'); 
    }
});

