<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GitHub Add Me — Animated Card</title>
  <style>
    :root {
      --bg1: #0f172a;
      --bg2: #1e293b;
      --accent1: #06b6d4;
      --accent2: #3b82f6;
      --text: #f8fafc;
      --muted: #94a3b8;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: radial-gradient(circle at top, var(--bg1), var(--bg2));
      font-family: "Poppins", system-ui, sans-serif;
      color: var(--text);
      overflow-x: hidden;
    }
    .card {
      width: 400px;
      border-radius: 20px;
      background: rgba(255,255,255,0.05);
      backdrop-filter: blur(14px);
      padding: 25px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.5);
      position: relative;
      overflow: hidden;
    }
    .card::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: conic-gradient(from 0deg, var(--accent1), var(--accent2), var(--accent1));
      animation: spin 10s linear infinite;
      z-index: 0;
    }
    .card::after {
      content: "";
      position: absolute;
      inset: 2px;
      border-radius: 18px;
      background: linear-gradient(160deg, var(--bg1), var(--bg2));
      z-index: 1;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
    .content { position: relative; z-index: 2; animation: fadeIn 1s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px);} to {opacity:1; transform:translateY(0);} }
    .top { display: flex; gap: 16px; align-items: center; }
    .avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      overflow: hidden;
      border: 3px solid var(--accent1);
      box-shadow: 0 0 20px rgba(6,182,212,0.6);
    }
    .avatar img { width: 100%; height: 100%; object-fit: cover; }
    .meta h2 { margin: 0; font-size: 20px; }
    .meta p { margin: 4px 0 0; font-size: 14px; color: var(--muted); }
    .bio { margin: 16px 0; font-size: 14px; line-height: 1.4; color: #cbd5e1; }
    .repos { margin-top: 12px; display: grid; gap: 8px; }
    .repo { background: rgba(255,255,255,0.04); padding: 10px; border-radius: 10px; text-align:left; transition: transform 0.3s; }
    .repo:hover { transform: translateX(6px) scale(1.02); background: rgba(6,182,212,0.1); }
    .repo h4 { margin: 0; font-size: 14px; color: var(--accent1); }
    .repo p { margin: 4px 0 0; font-size: 12px; color: var(--muted); }
    .actions { display:flex; gap:12px; margin-top:18px; }
    .btn { flex:1; padding:10px 12px; border-radius:10px; border:0; cursor:pointer; font-weight:600; transition: transform 0.2s; }
    .btn:hover { transform: scale(1.05); }
    .btn-primary { background: linear-gradient(90deg,var(--accent1),var(--accent2)); color:#0f172a; }
    .btn-ghost { background: transparent; border:1px solid rgba(255,255,255,0.1); color:var(--text); }
  </style>
</head>
<body>
  <div class="card">
    <div class="content">
      <div class="top">
        <div class="avatar">
          <img id="avatar" src="https://github.com/sreeharibsnair.png" alt="avatar">
        </div>
        <div class="meta">
          <h2 id="name">sreeharibsnair</h2>
          <p>Cybersecurity • Open Source</p>
        </div>
      </div>
      <div class="bio">Passionate about ethical hacking, vulnerability scanners, phishing detection, and open-source contributions.</div>
      <div class="repos" id="repos"></div>
      <div class="actions">
        <button class="btn btn-primary" id="followBtn">Follow</button>
        <button class="btn btn-ghost" id="openBtn">Profile</button>
      </div>
    </div>
  </div>
  <script>
    const GITHUB_USERNAME = 'sreeharibsnair';
    const profileUrl = `https://github.com/${GITHUB_USERNAME}`;

    document.getElementById('followBtn').addEventListener('click', () => window.open(profileUrl,'_blank'));
    document.getElementById('openBtn').addEventListener('click', () => window.open(profileUrl,'_blank'));

    // Fetch repositories
    fetch(`https://api.github.com/users/${GITHUB_USERNAME}/repos?sort=updated&per_page=4`)
      .then(r => r.json())
      .then(repos => {
        const container = document.getElementById('repos');
        repos.forEach(repo => {
          const div = document.createElement('div');
          div.className = 'repo';
          div.innerHTML = `<h4>${repo.name}</h4><p>${repo.description || ''}</p>`;
          div.addEventListener('click', () => window.open(repo.html_url,'_blank'));
          container.appendChild(div);
        });
      });
  </script>
</body>
</html>
