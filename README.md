![CI/CD](https://github.com/SlovakNationalGallery/akcia-zet/workflows/CI/CD/badge.svg)

# Akcia ZET
https://akciazet.sng.sk/

## Kiosk Mode
This app comes with a kiosk mode. Simply navigate to `/kiosk` and you'll get a session
with disabled external links and a 5-minute idle timer (which navigates back to `/`).

## Development
For Media Library Pro to work, don't forget to
1. Create `auth.json` with credentials to Spatie repository. See `auth.json.example`
1. Run `php artisan storage:link`

