/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,css,js}"],
  theme: {
    extend: {
      colors: {
        bgColor: '#f8f8f8',
        darkBgColor: '#171b2e',
        darkSectionBgColor: '#262d42',
        darkTextColor: '#b8bac0',
        textColor: "#7367f0",
        active: '#84c225',
        customGreen: '#84c225'
      },
      fontFamily: {
        Poppins: ['Poppins', 'sans-serif'],
        Barlow: ['Barlow', 'sans-serif'],
        IBMPlexSans: ['IBM Plex Sans', 'sans-serif'],
        Inter: ['Inter', 'sans-serif'],
        Montserrat: ['Montserrat', 'sans-serif'],
        NotoSans: ['Noto Sans', 'sans-serif'],
        OpenSans: ['Open Sans', 'sans-serif'],
        Outfit: ['Outfit', 'sans-serif'],
        Roboto: ['Roboto', 'sans-serif'],
        Raleway: ['Raleway', 'sans-serif'],
        SlaboBig: ['Slabo 27px', 'sans-serif'],
        Oswald: ['Oswald', 'sans-serif'],
        Lato: ['Lato', 'sans-serif']
      },
      fontSize: {
        larger: '16px'
      },
      padding: {
        largerScreenPadding: '10px 160px',
        mediumScreenPadding: '',
        miniScreenPadding: '',
        phonesPadding: ''
      }
    },
  },
  plugins: [],
}