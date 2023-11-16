function redirectToAnimalPage(animalName) {
  var url = "chosen_animal.php?animalName=" + encodeURIComponent(animalName);
  window.location.href = url;
}

function redirectToEventPage(eventName) {
  var url = "chosen_event.php?eventName=" + encodeURIComponent(eventName);
  window.location.href = url;
}