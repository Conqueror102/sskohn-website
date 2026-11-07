# Push the non-secret production settings Laravel needs on Vercel into the linked project.
# Usage (from the project root, after `vercel link`):  powershell -File scripts/vercel-env.ps1 [-Scope <team-slug>]
# APP_KEY is secret and is added separately:
#   vercel env add APP_KEY production --sensitive --force --value (php artisan key:generate --show)
param([string]$Scope = '')

$vars = [ordered]@{
    APP_NAME           = 'SSKOHN'
    APP_ENV            = 'production'
    APP_DEBUG          = 'false'
    # Lambda's filesystem is read-only except /tmp, so every runtime cache goes there.
    APP_CONFIG_CACHE   = '/tmp/config.php'
    APP_EVENTS_CACHE   = '/tmp/events.php'
    APP_PACKAGES_CACHE = '/tmp/packages.php'
    APP_ROUTES_CACHE   = '/tmp/routes.php'
    APP_SERVICES_CACHE = '/tmp/services.php'
    VIEW_COMPILED_PATH = '/tmp'
    CACHE_STORE        = 'array'
    SESSION_DRIVER     = 'cookie'
    LOG_CHANNEL        = 'stderr'
    # Throwaway SQLite in /tmp (see AppServiceProvider). Swap for a hosted database to keep submissions.
    DB_CONNECTION      = 'sqlite'
    DB_DATABASE        = '/tmp/database.sqlite'
    EPHEMERAL_SQLITE   = 'true'
}

$scopeArgs = @()
if ($Scope) { $scopeArgs = @('--scope', $Scope) }

foreach ($name in $vars.Keys) {
    # --value, not stdin: piping from PowerShell appends a CRLF that ends up inside the stored value.
    npx.cmd --yes vercel@latest env add $name production --value $vars[$name] --no-sensitive --force @scopeArgs 2>&1 | Out-Null
    Write-Host ("{0,-20} {1}" -f $name, $(if ($LASTEXITCODE -eq 0) { 'set' } else { 'FAILED' }))
}
