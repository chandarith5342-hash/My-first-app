<header>
  <div class="wrap bar">
    <a href="{{ url('/landing') }}" class="logo">Tech<span>News</span></a>

    <nav class="menu" id="menu">
      <a href="{{ url('/landing') }}#latest">Latest</a>
      <a href="{{ url('/landing') }}#why">Why TechNews</a>
      <a href="{{ url('/news-blog') }}">All News</a>
      <a href="{{ url('/about') }}">About</a>
      <a href="{{ url('/contact') }}">Contact</a>
      <a href="{{ url('/report') }}">Report us</a>
      <a href="{{ url('/landing') }}#subscribe" class="btn">Subscribe</a>
    </nav>

    <div class="tools">
      <button class="icon-btn" id="themeBtn">🌙</button>
      <button class="icon-btn burger" id="burgerBtn">☰</button>
    </div>
  </div>
</header>

<script>
  // dark mode button
  let themeBtn = document.getElementById("themeBtn");

  if (localStorage.getItem("theme") == "dark") {
    document.documentElement.setAttribute("data-theme", "dark");
    themeBtn.innerHTML = "☀️";
  }

  themeBtn.onclick = function () {
    if (document.documentElement.getAttribute("data-theme") == "dark") {
      document.documentElement.setAttribute("data-theme", "light");
      themeBtn.innerHTML = "🌙";
      localStorage.setItem("theme", "light");
    } else {
      document.documentElement.setAttribute("data-theme", "dark");
      themeBtn.innerHTML = "☀️";
      localStorage.setItem("theme", "dark");
    }
  };

  // menu button for phone
  let burgerBtn = document.getElementById("burgerBtn");
  let menu = document.getElementById("menu");

  burgerBtn.onclick = function () {
    menu.classList.toggle("open");
  };
</script>
