// pop up script 
function showPopup() {
    setTimeout(() => {
        document.querySelector('.popup').classList.add('show');
        document.querySelector('.popup-bg').classList.add('show');
    }, 4000);
}

showPopup();

function hidePopup() {
    document.querySelector('.popup').classList.remove('show');
    document.querySelector('.popup-bg').classList.remove('show');
}