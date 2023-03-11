const activeNav = window.location.href;
const navLinks = document.querySelectorAll('nav li a').forEach(link => {
    if(link.href.includes(`${activeNav}`)){
        link.classList.add('active');
    }
})
console.log(activeNav);
// console log da nos um objecto com varias informações
// o q nos procuramos e o path name