import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload'
import { resolve } from 'node:path'
import tailwindcss from '@tailwindcss/vite'
export default defineConfig({
  plugins: [vue(),tailwindcss()],
  root: 'src',

  base: process.env.APP_ENV === 'development'  ? '/' : '/dist/',

  build: {
    outDir: '../../web/js/dist',
    emptyOutDir: true,
    sourcemap: true,
    manifest: true,

    // our entry
    rollupOptions: {
      input: resolve(__dirname, 'src/main.js'),
      output: {
        manualChunks(id) {
          // all third-party code will be in vendor chunk
          if (id.includes('node_modules')) {
            return 'vendor'
          }
          // example on how to create another chunk
          // if (id.includes('src/'components')) {
          //   return 'components'
          // }
          // console.log(id)
        },
      },
    }
  },

  server: {
    // we need a strict port to match on PHP side
    // change freely, but update on PHP to match the same port
    // tip: choose a different port per project to run them at the same time
    strictPort: true,
    allowedHosts: true,
    port: 5133,
    cors: {
      origin: 'http://yii2',
    }
  },

  // required for in-browser template compilation
  // https://vuejs.org/guide/scaling-up/tooling.html#note-on-in-browser-template-compilation
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js'
    }
  }
})
