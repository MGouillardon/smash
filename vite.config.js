import { defineConfig } from "vite"
import eslint from "vite-plugin-eslint"

export default defineConfig({
    build: {
      manifest: true,
      rollupOptions: {
        input: './resources/js/main.js'
      }
    },
    plugins: [
        eslint({
            include: [ 'resources/js/**/*.js'],
            fix: true
       }),
   ],

  })