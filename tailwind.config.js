import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "success-soft": "var(--color-success-soft, #dcfce7)", // atau hex/rgb
                "fg-success-strong": "var(--color-fg-success-strong, #166534)",
                "danger-soft": "#fef2f2",
                "fg-danger-strong": "#b91c1c",
            },
            borderRadius: {
                base: "var(--radius-base, 0.5rem)",
            },
            animation: {
                "fade-in-up": "fadeInUp 0.6s ease-out forwards",
            },
            keyframes: {
                fadeInUp: {
                    "0%": { opacity: "0", transform: "translateY(20px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
            },
        },
    },
    plugins: [forms],
};
