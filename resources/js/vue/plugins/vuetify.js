// Vuetify

import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import { createVuetify } from 'vuetify'

// import colors from 'vuetify/lib/util/colors'

const vuetify = createVuetify({
    icons: {
      defaultSet: 'mdi',
    },
    theme: {
      themes: {
        light: {
          dark: false,
          colors: {
            primary: "#2d529f",
          }
        },
      },
    },
  })


export default vuetify;