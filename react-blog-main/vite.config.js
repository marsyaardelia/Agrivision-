import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vite.dev/config/
export default defineConfig({
  base: './',
  plugins: [react()],
  server: {
    proxy: {
      '/ci3_project_praktikum9': {
        target: 'http://localhost',
        changeOrigin: true,
      },
    },
  },
})
