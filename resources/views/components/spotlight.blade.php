<div {{ $attributes->merge(['class' => 'absolute w-full h-6 -top-6 opacity-60 pointer-events-none']) }}>
    <svg preserveAspectRatio="none" viewBox="0 0 12 12" class="h-full w-full">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%" class="to-yellow-400">
              <stop offset="0%" style="stop-color:var(--tw-gradient-to); stop-opacity: 0" />
              <stop offset="50%" style="stop-color:var(--tw-gradient-to); stop-opacity: .7" />
              <stop offset="100%" style="stop-color:var(--tw-gradient-to); stop-opacity:0" />
            </linearGradient>
          </defs>
        <polygon points="4,0 0,12 12,12 8,0" fill="url(#gradient)" />
    </svg>
</div>
