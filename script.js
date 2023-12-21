const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click',()=> {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click',()=> {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click',()=> {
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click',()=> {
    wrapper.classList.remove('active-popup');
});

const openFormButton = document.getElementById("openForm");
const closeFormButton = document.getElementById("closeForm");
const formContainer = document.getElementById("formContainer");
openFormButton.addEventListener("click", () => {
    formContainer.style.display = "block";
});

closeFormButton.addEventListener("click", () => {
    formContainer.style.display = "none";
});