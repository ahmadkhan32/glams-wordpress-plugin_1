/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{js,jsx}"],
  theme: {
    extend: {
      colors: {
        glams: {
          primary: "#006B5E",
          red: "#C8102E",
          gold: "#B8962E",
        },
      },
    },
  },
  plugins: [],
};
