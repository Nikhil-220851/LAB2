# Run this from the `LAB2` folder (PowerShell)
param(
    [int]$Port = 8000
)

$cwd = Split-Path -Path $MyInvocation.MyCommand.Definition -Parent
if (-not $cwd) { $cwd = Get-Location }
Set-Location $cwd

Write-Host "Starting Python simple HTTP server on http://localhost:$Port" -ForegroundColor Green
Start-Process "http://localhost:$Port"
python -m http.server $Port
