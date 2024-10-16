// Form Validation
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        const name = document.getElementById("name").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const message = document.getElementById("message").value.trim();
        
        if (name === "" || phone === "" || message === "") {
            alert("Please fill in all fields.");
            event.preventDefault();
        } else if (!/^\d{10}$/.test(phone)) {
            alert("Please enter a valid phone number.");
            event.preventDefault();
        }
    });
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function(event) {
        event.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });
    });
});
const $next =document.querySelector('.next');
const $prev =document.querySelector('.prev');
$next.addEventListener(
    'click',()=>{
        const items =document.querySelectorAll('.item');
        document.querySelector('.slide').appendChild(items[0]);
    },
);
$prev.addEventListener(
    'click',()=>{
        const items =document.querySelectorAll('.item');
        document.querySelector('.slide').prepend(items[items.length-1]);
    },
);