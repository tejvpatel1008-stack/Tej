let userEmail = "";

function handleCredentialResponse(response) {
  const data = JSON.parse(atob(response.credential.split(".")[1]));
  userEmail = data.email;

  document.getElementById("loginBox").classList.add("hidden");
  document.getElementById("clockBox").classList.remove("hidden");

  document.getElementById("welcome").textContent =
    `Welcome, ${data.name}`;

  loadPreferences();
  updateDateTime();
  setInterval(updateDateTime, 1000);
}

function updateDateTime() {
  const now = new Date();
  const format = localStorage.getItem(userEmail + "_format") || "12";

  const dateOptions = {
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  };

  const timeOptions = {
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
    hour12: format === "12"
  };

  document.getElementById("date").textContent =
    now.toLocaleDateString(undefined, dateOptions);

  document.getElementById("time").textContent =
    now.toLocaleTimeString(undefined, timeOptions);

  document.getElementById("timezone").textContent =
    Intl.DateTimeFormat().resolvedOptions().timeZone;
}

function loadPreferences() {
  const theme = localStorage.getItem(userEmail + "_theme") || "dark";
  const format = localStorage.getItem(userEmail + "_format") || "12";

  document.getElementById("theme").value = theme;
  document.getElementById("format").value = format;

  applyTheme(theme);
}

document.getElementById("theme").addEventListener("change", e => {
  localStorage.setItem(userEmail + "_theme", e.target.value);
  applyTheme(e.target.value);
});

document.getElementById("format").addEventListener("change", e => {
  localStorage.setItem(userEmail + "_format", e.target.value);
});

function applyTheme(theme) {
  document.body.className = theme === "light" ? "light" : "";
}

function logout() {
  location.reload();
}
