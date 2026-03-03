import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],

  // エントリポイント
  build: {
    manifest: true,
    outDir: 'dist',
    rollupOptions: {
      input: {
        'app-css': 'src/css/app.css',
        'app-js': 'src/js/app.js',
      },
    },
  },

  // 開発サーバー設定 (Docker対応)
  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    watch: {
      usePolling: true,
      interval: 1000,
    },
    // WordPressコンテナからのアクセスを許可
    cors: true,
    allowedHosts: ['node', 'localhost'],
    // HMR設定 (ブラウザからはlocalhostでアクセス)
    hmr: {
      host: 'localhost',
      port: 5173,
    },
  },
})
