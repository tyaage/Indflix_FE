/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      // padding: '16px',
    },
    extend: {

      colors: {
        cstmdark: '#181818',
        cstmlightdark: '#322f2f',
        cstmorange: '#ffa600',
        cstmgray: '#d9d9d9',
        
      },

      fontFamily:{
        pixel: ['VT323'], poppins: ['Poppins'], inter: ['Inter'],
      },
    },
  },
  plugins: [],
}