function takeNext($word) {
  return !$word.is(":last-child")
    ? $word.next()
    : $word.parent().children().eq(0);
}

function takePrev($word) {
  return !$word.is(":first-child")
    ? $word.prev()
    : $word.parent().children().last();
}

function switchWord($oldWord, $newWord) {
  $oldWord.removeClass("is-visible").addClass("is-hidden");
  $newWord.removeClass("is-hidden").addClass("is-visible");
}

const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
