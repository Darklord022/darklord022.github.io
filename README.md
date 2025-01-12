Enter your Email and password (placeholder)
                    <a href="Medusa.html">Login</a>
                   <input type="text" id="username" placeholder="Enter Username">
<body style="background-color: black; color: green;">

function login() {
  const username = document.getElementById("username").value;
  // Simulate a successful login and save the username
  sessionStorage.setItem("username", username); // Use localStorage for permanent storage
  window.location.href = "profile.html"; // Redirect to profile page
}
