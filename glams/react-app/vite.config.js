import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import path from "path";

export default defineConfig({
  plugins: [react()],
  build: {
    outDir: path.resolve(__dirname, "../assets/react"),
    emptyOutDir: true,
    rollupOptions: {
      output: {
        entryFileNames: "glams-react.js",
        chunkFileNames: "glams-[name].js",
        assetFileNames: "glams-[name].[ext]",
      },
    },
  },
  server: {
    port: 3000,
    proxy: {
      "/wp-json": "http://localhost:8080",
    },
  },
});
