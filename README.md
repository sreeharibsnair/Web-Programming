<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GitHub Add Me</title>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: radial-gradient(circle at top, #0f172a, #1e293b);
      font-family: "Poppins", sans-serif;
      color: #f8fafc;
    }
    .card {
      width: 380px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(12px);
      padding: 24px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.5);
      animation: fadeIn 1s ease-out;
    }
    @keyframes fadeIn { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
    .top { display: flex; gap: 14px; align-items: center; }
    .avatar { width: 70px; height: 70px; border-radius: 50%; overflow: hidden; border: 2px solid #06b6d4; }
    .avatar img { width: 100%; height: 100%; object-fit: cover; }
    .meta h2 { margin: 0; font-size: 18px; }
    .meta p { margin: 4px 0 0; font-size: 13px; color: #94a3b8; }
    .bio { margin: 14px 0; font-size: 14px; color: #cbd5e1; }
    .repos { display: grid; gap: 8px; margin-top: 12px; }
    .repo { background: rgba(255,255,255,0.04); padding: 10px; border-radius: 10px; transition: transform 0.3s; cursor: pointer; }
    .repo:hover { transform: translateX(6px) scale(1.02); background: rgba(6,182,212,0.1); }
    .repo h4 { margin: 0; font-size: 14px; color: #06b6d4; }
    .repo p { margin: 4px 0 0; font-size: 12px; color: #94a3b8; }
    .actions { display:flex; gap:10px; margin-top:16px; }
    .btn { flex:1; padding:10px; border-radius:8px; border:0; cursor:pointer; font-weight:600; }
    .btn-primary { background: linear-gradient(90deg,#06b6d4,#3b82f6); color:#0f172a; }
    .btn-ghost { background: transparent; border:1px solid rgba(255,255,255,0.2); color:#f8fafc; }
  </style>
</head>
<body>
  <div class="card">
    <div class="top">
      <div class="avatar"><img id="avatar" src="" alt="avatar"></div>
      <div class="meta">
        <h2 id="name"></h2>
        <p id="handle"></p>
      </div>
    </div>
    <div class="bio" id="bio"></div>
    <div class="repos" id="repos"></div>
    <div class="actions">
      <button class="btn btn-primary" id="followBtn">Follow</button>
      <button class="btn btn-ghost" id="openBtn">Profile</button>
    </div>
  </div>

  <script>
    const USERNAME = "sreeharibsnair";
    const profileUrl = `https://github.com/${USERNAME}`;

    document.getElementById("followBtn").onclick = () => window.open(profileUrl, "_blank");
    document.getElementById("openBtn").onclick = () => window.open(profileUrl, "_blank");

    fetch(`https://api.github.com/users/${USERNAME}`)
      .then(r => r.json())
      .then(data => {
        document.getElementById("avatar").src = data.avatar_url;
        document.getElementById("name").textContent = data.login;
        document.getElementById("handle").textContent = data.name || "";
        document.getElementById("bio").textContent = data.bio || "GitHub developer profile.";
      });

    fetch(`https://api.github.com/users/${USERNAME}/repos?sort=updated&per_page=3`)
      .then(r => r.json())
      .then(repos => {
        const container = document.getElementById("repos");
        repos.forEach(repo => {
          const div = document.createElement("div");
          div.className = "repo";
          div.innerHTML = `<h4>${repo.name}</h4><p>${repo.description || ""}</p>`;
          div.onclick = () => window.open(repo.html_url, "_blank");
          container.appendChild(div);
        });
      });
  </script>
</body>
</html>
