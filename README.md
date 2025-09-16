<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GitHub Add Me</title>
  <style>
    /* Background Animation */
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(270deg, #0f172a, #1e293b, #0f172a);
      background-size: 600% 600%;
      animation: bgWave 20s ease infinite;
      font-family: "Poppins", sans-serif;
      color: #f8fafc;
      overflow: hidden;
    }
    @keyframes bgWave {
      0% {background-position: 0% 50%;}
      50% {background-position: 100% 50%;}
      100% {background-position: 0% 50%;}
    }

    /* Floating Particles */
    .particles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      top: 0;
      left: 0;
      z-index: 0;
    }
    .particles span {
      position: absolute;
      width: 6px;
      height: 6px;
      background: rgba(255,255,255,0.4);
      border-radius: 50%;
      animation: float 12s linear infinite;
    }
    @keyframes float {
      from { transform: translateY(100vh) scale(0.5); opacity: 0; }
      to { transform: translateY(-10vh) scale(1.2); opacity: 1; }
    }

    /* GitHub Card */
    .card {
      position: relative;
      z-index: 1;
      width: 380px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      padding: 24px;
      box-shadow: 0 15px 50px rgba(0,0,0,0.6), 0 0 25px rgba(6,182,212,0.6);
      animation: fadeIn 1.5s ease-out;
    }
    @keyframes fadeIn { from {opacity:0; transform:translateY(40px);} to {opacity:1; transform:translateY(0);} }

    .top { display: flex; gap: 14px; align-items: center; }
    .avatar { width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 3px solid #06b6d4; box-shadow: 0 0 15px rgba(6,182,212,0.6); }
    .avatar img { width: 100%; height: 100%; object-fit: cover; }
    .meta h2 { margin: 0; font-size: 20px; color: #06b6d4; }
    .meta p { margin: 4px 0 0; font-size: 14px; color: #94a3b8; }

    .bio { margin: 16px 0; font-size: 14px; color: #cbd5e1; }

    .repos { display: grid; gap: 10px; margin-top: 14px; }
    .repo {
      background: rgba(255,255,255,0.05);
      padding: 12px;
      border-radius: 12px;
      transition: transform 0.4s, background 0.4s;
      cursor: pointer;
    }
    .repo:hover {
      transform: translateX(8px) scale(1.05);
      background: rgba(6,182,212,0.2);
    }
    .repo h4 { margin: 0; font-size: 15px; color: #38bdf8; }
    .repo p { margin: 4px 0 0; font-size: 12px; color: #94a3b8; }

    .actions { display:flex; gap:12px; margin-top:18px; }
    .btn {
      flex:1; padding:12px; border-radius:10px; border:0; cursor:pointer; font-weight:600;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .btn:hover { transform: translateY(-3px) scale(1.05); box-shadow: 0 8px 20px rgba(0,0,0,0.3); }
    .btn-primary { background: linear-gradient(90deg,#06b6d4,#3b82f6); color:#0f172a; }
    .btn-ghost { background: transparent; border:1px solid rgba(255,255,255,0.3); color:#f8fafc; }
  </style>
</head>
<body>
  <!-- Floating particles -->
  <div class="particles">
    <span style="left:10%; animation-duration:12s; animation-delay:0s;"></span>
    <span style="left:25%; animation-duration:15s; animation-delay:2s;"></span>
    <span style="left:40%; animation-duration:18s; animation-delay:4s;"></span>
    <span style="left:60%; animation-duration:20s; animation-delay:1s;"></span>
    <span style="left:80%; animation-duration:22s; animation-delay:3s;"></span>
  </div>

  <!-- GitHub Card -->
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
