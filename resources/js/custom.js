/* $(document).ready(function () {    
    $('.tab-pane').each(function (index, tab) {             
            if (index == 0) {
                $(this).addClass('active');
                $(this).addClass('show');                
            }            
    });
}); */

document.addEventListener('DOMContentLoaded', function () {

    const popupOverlay = document.getElementById('popupOverlay');
    const closePopup = document.getElementById('closePopup');
    const submitButton = document.getElementById('submitButton');

    // Function to open the popup
    function openPopup() {
      popupOverlay.style.display = 'block';
    }

    // Function to close the popup
    function closePopupFunc() {
      // popupOverlay.css({display:"none"})
      popupOverlay.style.display = 'none';
    }
    // Automatically open the popup when the page loads
    openPopup();

    // Close popup when the close button is clicked
    closePopup.addEventListener('click', closePopupFunc);

    // Close popup when clicking outside the popup content
    popupOverlay.addEventListener('click', function (event) {
      if (event.target === popupOverlay) {
        closePopupFunc();
      }
    });

    // Handle form submission
    submitButton.addEventListener('click', closePopupFunc);
  });
