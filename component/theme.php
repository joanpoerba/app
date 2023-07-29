<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  * {
    box-sizing: border-box;
  }

  .toggleWrapper {
    width: 70px;
    height: 35px;
    cursor: pointer;
  }

  .toggle {
    width: 30px;
    height: 30px;
  }
</style>

<body>
  <h4 class='fw-bold'>Theme</h4>
  <p class='mt-2'>for your convenience, we provide a dark mode for those of you who are more comfortable with dark mode</p>
  <div class="toggleWrapper">
    <div class="toggle rounded-5 bg-light"></div>
  </div>
</body>
<script>
  const body = document.body
  const toggleWrapper = document.querySelector(".toggleWrapper")
  const toggle = document.querySelector(".toggle")

  toggleWrapper.setAttribute("class", "toggleWrapper bg-secondary mt-3 rounded-5 d-flex justify-content-start align-items-center px-1")

  toggleWrapper.addEventListener("click", () => {
    body.classList.toggle("modeOn")
    if (body.classList.contains("modeon")) {
      toggleWrapper.setAttribute("class", "toggleWrapper bg-secondary mt-3 rounded-5 d-flex justify-content-start align-items-center px-1")
    } else {
      toggleWrapper.setAttribute("class", "toggleWrapper bg-secondary mt-3 rounded-5 d-flex justify-content-end align-items-center px-1")
    }
  })
</script>

</html>