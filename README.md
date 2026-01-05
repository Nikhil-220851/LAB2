# Local server for LAB2

This project contains `index.html` and `style.css`. To play the embedded YouTube video reliably from `index.html`, serve the folder over HTTP (some browsers restrict iframe/content on `file://`).

Options:

- Quick (Python 3 required):

  ```powershell
  cd "C:\Users\bobba\Documents\LAB2"
  python -m http.server 8000
  ```

  Then open: http://localhost:8000

- PowerShell script (Windows):

  ```powershell
  .\run_local_server.ps1
  ```

- Batch script (Windows cmd):

  ```powershell
  .\run_local_server.bat
  ```

Notes:
- Press Ctrl+C in the terminal to stop the Python server.
- If you prefer Node-based tools, install `http-server` (`npm i -g http-server`) and run `http-server -p 8000`.

If you want, I can add a Node `package.json` and install a dev dependency to serve with one command.