import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import path from "path";

const isVercel = process.env.VERCEL === "1";

export default defineConfig({
  plugins: [react()],
  define: {
    "process.env.NODE_ENV": JSON.stringify("production"),
  },
  build: {
    outDir: isVercel ? "dist" : path.resolve(__dirname, "../assets/react"),
    emptyOutDir: true,
    rollupOptions: {
      output: isVercel
        ? {
            entryFileNames: "glams-react.js",
            chunkFileNames: "glams-[name].js",
            assetFileNames: "glams-[name].[ext]",
          }
        : {
            format: "iife",
            name: "GlamsReactApp",
            inlineDynamicImports: true,
            entryFileNames: "glams-react.js",
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
