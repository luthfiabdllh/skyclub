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
            '79' : '316px',
            '128': '32rem',
            '765px' : '765px',
            '512px' : '512px',
            '600px' : '600px',
            'banner-profile' : '1232px'
        },
        height: {
            '45' : '180px',
            'banner-profile' : '350px'
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

    },
  },
  plugins: [
    require('flowbite/plugin'),
    // require('flowbite-typography')
  ],
}

