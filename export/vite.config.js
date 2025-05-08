import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: ["resources/js/site.js", "resources/css/site.css"],
            refresh: ["resources/views/**"],
        }),
    ],
    envPrefix: "MIX_",
});
