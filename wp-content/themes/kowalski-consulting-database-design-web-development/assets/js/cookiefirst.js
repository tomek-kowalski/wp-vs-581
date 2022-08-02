document.addEventListener('DOMContentLoaded', () => {

    
  document.getElementById("CookieBanner").style.display = "block";
  
  function dismiss() {
        document.querySelector('.js-cookie-banner').remove();
  }
  
    const buttonElement = document.querySelector('.cookie-btn');
    if (buttonElement) {
        buttonElement.addEventListener('click', dismiss);
    } 
  
});