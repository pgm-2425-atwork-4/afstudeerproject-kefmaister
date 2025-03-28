import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import dotenv from "dotenv";

dotenv.config();

export default defineConfig({
    base: process.env.APP_URL + "/",
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
