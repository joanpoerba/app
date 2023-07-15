const body = document.body;
const eye = document.querySelector(".eye");
const input = document.getElementById("passwordInput");

eye.setAttribute(
  "class",
  "eye bi bi-eye-slash-fill fs-4 d-flex justify-content-center align-items-center text-secondary"
);

eye.addEventListener("click", () => {
  body.classList.toggle("showPassword");

  if (body.classList.contains("showPassword")) {
    eye.setAttribute(
      "class",
      "eye bi bi-eye-fill fs-4 d-flex justify-content-center align-items-center text-secondary"
    );
    input.setAttribute("type", "text");
  } else {
    eye.setAttribute(
      "class",
      "eye bi bi-eye-slash-fill fs-4 d-flex justify-content-center align-items-center text-secondary"
    );
    input.setAttribute("type", "password");
  }
});
