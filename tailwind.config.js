/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
module.exports = {
  content: [
      "./resources/views/**/*.blade.php",
      "./resources/views/**/**/*.blade.php",
  ],
theme: {
    container: {
        center: true,
        padding: '1rem',
    },
    extend: {
        colors:{
            'dark-purple' : '#2c2c54'
        },
        fontFamily:{
            iransans: "'IRANSans'"
        },
    },
},
  plugins: [
      plugin(function({ addVariant }) { addVariant('radio-checked', '&:checked ~ label') })
  ],
}
