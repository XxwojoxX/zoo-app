function redirectToAnimalPage(animalName) {
  var url = "chosen_animal.php?animalName=" + encodeURIComponent(animalName);
  window.location.href = url;
}
