# Web-Programming

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GitHub "Add Me" — Profile Card</title>
  <style>
    :root{--bg:#0f1720;--card:#0b1220;--accent:#2dd4bf;--muted:#94a3b8}
    *{box-sizing:border-box}
    body{margin:0;min-height:100vh;display:grid;place-items:center;background:linear-gradient(180deg,#071024 0%, #071a2a 100%);font-family:Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial}
    .card{width:340px;background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));border-radius:16px;padding:20px;box-shadow:0 8px 30px rgba(2,6,23,0.6);color:#e6eef6}
    .top{display:flex;gap:14px;align-items:center}
    .avatar{width:72px;height:72px;border-radius:14px;overflow:hidden;flex:0 0 72px;border:2px solid rgba(255,255,255,0.06)}
    .avatar img{width:100%;height:100%;object-fit:cover;display:block}
    .meta{flex:1}
    .meta h2{margin:0;font-size:18px;letter-spacing:0.2px}
    .meta p{margin:4px 0 0;font-size:13px;color:var(--muted)}
    .bio{margin:14px 0 0;font-size:13px;color:#cfe9e2}
    .stats{display:flex;gap:10px;margin-top:14px}
    .stat{flex:1;background:linear-gradient(180deg, rgba(255,255,255,0.01), rgba(255,255,255,0.005));padding:10px;border-radius:10px;text-align:center}
    .stat h3{margin:0;font-size:14px}
    .stat p{margin:6px 0 0;color:var(--muted);font-size:12px}
    .actions{display:flex;gap:10px;margin-top:16px}
    .btn{flex:1;padding:10px 12px;border-radius:10px;border:0;cursor:pointer;font-weight:600}
    .btn-primary{background:linear-gradient(90deg,var(--accent),#06b6d4);color:#042022}
    .btn-ghost{background:transparent;border:1px solid rgba(255,255,255,0.06);color:#e6eef6}
    .small{font-size:12px;color:var(--muted);text-align:center;margin-top:10px}
    .note{font-size:11px;color:var(--muted);margin-top:8px}
    .center{display:flex;justify-content:center}
    /* responsive */
    @media (max-width:380px){.card{width:92vw}}
  </style>
</head>
<body>
  <div class="card" id="card">
    <div class="top">
      <div class="avatar">
        <!-- Avatar from GitHub username (replace below src with your username) -->
        <img id="avatar" src="https://github.com/sreeharibsnair.png" alt="avatar">
      </div>
      <div class="meta">
        <h2 id="name">sreeharibsnair</h2>
        <p id="handle">Full-stack web & security tinkerer</p>
      </div>
    </div>

    <div class="bio" id="bio">Open-source projects: vulnerability scanner, phishing detector, Wi‑Fi tools. Click to visit my GitHub.</div>

    <div class="stats">
      <div class="stat">
        <h3 id="repos">--</h3>
        <p>Repositories</p>
      </div>
      <div class="stat">
        <h3 id="followers">--</h3>
        <p>Followers</p>
      </div>
    </div>

    <div class="actions">
      <button class="btn btn-primary" id="followBtn">Follow on GitHub</button>
      <button class="btn btn-ghost" id="openBtn">Open Profile</button>
    </div>

    <div class="center small">Want this on your website? Copy the snippet below.</div>
    <div class="note" id="snippet" style="background:rgba(255,255,255,0.02);padding:8px;border-radius:8px;margin-top:8px;font-family:monospace;font-size:12px;">&lt;!-- Paste this where you want the card --&gt;<br>&lt;iframe src="/path/to/github_addme.html" style="width:340px;height:220px;border:0;border-radius:12px;"&gt;&lt;/iframe&gt;</div>
  </div>

  <script>
    // Configuration: set your GitHub username here
    const GITHUB_USERNAME = 'sreeharibsnair';
    const profileUrl = `https://github.com/${GITHUB_USERNAME}`;

    // Wire up buttons
    document.getElementById('followBtn').addEventListener('click', () => {
      // GitHub doesn't allow follow via URL; open profile so user can follow
      window.open(profileUrl, '_blank');
    });
    document.getElementById('openBtn').addEventListener('click', () => window.open(profileUrl, '_blank'));

    // Fill in avatar and username
    document.getElementById('avatar').src = `https://github.com/${GITHUB_USERNAME}.png`;
    document.getElementById('name').textContent = GITHUB_USERNAME;

    // Optional: try to fetch public repo & follower counts via GitHub public API (rate-limited)
    fetch(`https://api.github.com/users/${GITHUB_USERNAME}`)
      .then(r => r.json())
      .then(data => {
        if (data && !data.message) {
          document.getElementById('repos').textContent = data.public_repos;
          document.getElementById('followers').textContent = data.followers;
          if (data.bio) document.getElementById('bio').textContent = data.bio;
        } else {
          // keep placeholders
          document.getElementById('repos').textContent = '--';
          document.getElementById('followers').textContent = '--';
        }
      }).catch(()=>{})

    // Provide a ready-to-copy snippet (customized)
    const snippetEl = document.getElementById('snippet');
    snippetEl.textContent = `<div style="width:340px;max-width:92vw;margin:0 auto">\n  <a href=\"${profileUrl}\" target=\"_blank\">\n    <img src=\"https://github.com/${GITHUB_USERNAME}.png\" alt=\"${GITHUB_USERNAME}\" style=\"width:72px;border-radius:12px;\">\n  </a>\n</div>`;
  </script>
</body>
</html>
