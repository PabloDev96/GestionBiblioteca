/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue'
  ],
  theme: {
    extend: {
      colors: {
        verdeBase: 'rgb(0,107,86)', // 🎯 aquí defines el color personalizado
      },
    },
  },
  plugins: [],
}
