<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Mahendra Secondary School')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-bright": "#f7f9fb",
                    "outline": "#916f6e",
                    "background": "#f7f9fb",
                    "error": "#ba1a1a",
                    "surface": "#f7f9fb",
                    "surface-container": "#eceef0",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#5c3f3f",
                    "surface-variant": "#e0e3e5",
                    "on-secondary-fixed": "#00164e",
                    "surface-tint": "#bf0030",
                    "surface-dim": "#d8dadc",
                    "on-primary": "#ffffff",
                    "on-tertiary-fixed": "#221b00",
                    "error-container": "#ffdad6",
                    "secondary-container": "#446ce4",
                    "tertiary-fixed-dim": "#e9c400",
                    "secondary-fixed": "#dce1ff",
                    "on-tertiary-fixed-variant": "#544600",
                    "on-error-container": "#93000a",
                    "on-surface": "#191c1e",
                    "outline-variant": "#e6bdbc",
                    "inverse-primary": "#ffb3b3",
                    "on-secondary-container": "#fffbff",
                    "surface-container-low": "#f2f4f6",
                    "primary": "#b1002c",
                    "on-primary-fixed-variant": "#920022",
                    "secondary": "#2552ca",
                    "on-primary-container": "#fff1f0",
                    "surface-container-lowest": "#ffffff",
                    "secondary-fixed-dim": "#b6c4ff",
                    "primary-fixed-dim": "#ffb3b3",
                    "on-secondary": "#ffffff",
                    "on-background": "#191c1e",
                    "inverse-surface": "#2d3133",
                    "tertiary-container": "#c9a900",
                    "surface-container-high": "#e6e8ea",
                    "on-primary-fixed": "#40000a",
                    "primary-fixed": "#ffdad9",
                    "tertiary-fixed": "#ffe16d",
                    "on-error": "#ffffff",
                    "primary-container": "#dc143c",
                    "tertiary": "#705d00",
                    "surface-container-highest": "#e0e3e5",
                    "on-tertiary-container": "#4c3f00",
                    "inverse-on-surface": "#eff1f3",
                    "on-secondary-fixed-variant": "#003baf"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "container-max": "1280px",
                    "base": "8px",
                    "margin-desktop": "64px",
                    "margin-mobile": "20px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "display-lg-mobile": ["Montserrat"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-lg": ["Montserrat"],
                    "display-lg": ["Montserrat"],
                    "body-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-md": ["Montserrat"]
            },
            "fontSize": {
                    "display-lg-mobile": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500"}],
                    "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                    "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "600"}]
            }
          },
        },
      }
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    @stack('styles')
</head>
<body class="@yield('body-class', 'bg-background text-on-background font-body-md text-body-md overflow-x-hidden')">
    @include('layouts.navigation')
    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('assets/js/global.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
