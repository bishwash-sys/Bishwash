function revealGallery() {
  // Get the container holding the hidden items by its ID
  var moreItemsContainer = document.getElementById("moreItems");
  
  // Get the initial visible item (the trigger)
  var triggerItem = document.querySelector(".visible-item");

  // Add the 'show-items' class to make the hidden items visible
  moreItemsContainer.classList.add("show-items");

  // Optional: Hide the initial trigger photo/button after the gallery is revealed
  if (triggerItem) {
    triggerItem.style.display = "none";
  }

  // Optional: Prevent the function from running again if already clicked
  // triggerItem.onclick = null; 
}


