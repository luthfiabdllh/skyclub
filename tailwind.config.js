/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
        screens: {
            'xs': '325px',
          },
        boxShadow: {
            'inner-banner': 'inset 0 500px 130px rgba(0, 0, 0, 0.45)',
        },
        padding: {
            '26': '104px',
          },
        width: {
            '128': '32rem',
        },
        fontSize: {
            56: '56px'
        },
        margin: {
            '17.5': '70px',
        },
        fontSize: {
            '56': '56px',
            '4.5xl': '40px',
          },
        width:{
            '765px' : '765px',
            '512px' : '512px',
            '600px' : '600px'
        },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    // require('flowbite-typography')
  ],
}

